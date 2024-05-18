<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\book;
use App\Models\product;
class DashboardController extends Controller
{
    public function show(Request $request)
    {
        // Đếm tổng số sản phẩm
        $totalProducts = product::count();

        // Lấy năm và tháng từ request, mặc định là năm và tháng hiện tại
        $year = $request->input('year', date('Y'));
        $month = $request->input('month', date('m'));

        // Đếm tổng số đơn hàng theo tháng và năm
        $totalOrders = order::whereYear('created_at', $year)
                            ->whereMonth('created_at', $month)
                            ->count();
        
        // Truyền dữ liệu tới view
        return view('admin.dashboard', [
            'totalProducts' => $totalProducts,
            'totalOrders' => $totalOrders,
            'year' => $year,
            'month' => $month
        ]);
    }
}
