<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\book;
use App\Models\product;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    public function show(Request $request)
    {
        // Đếm tổng số sản phẩm
        $totalProducts = Product::count();

        // Lấy năm và tháng từ request, mặc định là năm và tháng hiện tại
        $year = $request->input('year', date('Y'));
        $month = $request->input('month', date('m'));

        // Đếm tổng số đơn hàng theo tháng và năm
        $totalOrders = Order::whereYear('created_at', $year)
                            ->whereMonth('created_at', $month)
                            ->count();

        // Lấy tổng đơn hàng theo từng tháng của năm
        $monthlyOrders = Order::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total_orders')
        )
        ->whereYear('created_at', $year)
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->orderBy('month')
        ->get();

        // Top 10 sản phẩm bán chạy nhất
        $topProducts = DB::table('warehouses')
                         ->select('products.name', DB::raw('SUM(warehouses.quantity_sold) as total_sold'))
                         ->join('products', 'warehouses.product_id', '=', 'products.id')
                         ->groupBy('products.name')
                         ->orderBy('total_sold', 'desc')
                         ->limit(10)
                         ->get();
        // Tổng số lượng khách hàng theo tháng 
        $monthlyCustomers = book::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(quantity) as total_quantity')
        )
        ->whereYear('created_at', $year)
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->orderBy('month')
        ->get();
        //Tổng doanh thu bán hàng
        $warehouses = DB::table('warehouses as w')
            ->join('products as p', 'w.product_id', '=', 'p.id')
            ->whereYear('w.created_at', $year)
            ->get();

        $totalRevenue = 0;
        foreach ($warehouses as $item) {
            $totalRevenue += $item->quantity_sold * $item->price_sale;
        }
        // Truyền dữ liệu tới view
        return view('admin.dashboard', [
            'totalProducts' => $totalProducts,
            'totalOrders' => $totalOrders,
            'year' => $year,
            'month' => $month,
            'monthlyOrders' => $monthlyOrders,
            'topProducts' => $topProducts,
            'monthlyCustomers' => $monthlyCustomers,
            'totalRevenue' => $totalRevenue,
        ]);
    }
}
