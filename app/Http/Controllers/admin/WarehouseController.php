<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\order;
use App\Models\warehouse;
use Illuminate\Support\Facades\DB;

class WarehouseController extends Controller
{
    public function add_warehouse(){
        $products = product::all();
        return view('admin.warehouse.add',[
            'title' => 'Thêm vào kho',
            'products' => $products
        ]);
    }

    public function insert_warehouse(Request $request){
        
        $warehouse = new warehouse();
        $warehouse -> name = $request -> input('name');
        $warehouse -> description = $request -> input('description');
        $warehouse->product_id = $request->input('product_id');
        $warehouse -> quantity_received = $request -> input('quantity_received');
        $warehouse -> save();
        return redirect() -> back();
    }
    // public function list_warehouse(){
    //     $products = product::all();
    //     $orders = order::all();
    //     $warehouses = DB::table('warehouses')->paginate(10);
    //     $soldQuantities = [];
    //     foreach ($orders as $item) {
    //         // Kiểm tra xem sản phẩm đã tồn tại trong mảng $soldQuantities chưa
    //         if (array_key_exists($item->product_id, $soldQuantities)) {
    //             // Nếu đã tồn tại, cộng số lượng đã bán của sản phẩm đó
    //             $soldQuantities[$item->product_id] += $item->quantity;
    //         } else {
    //             // Nếu chưa tồn tại, thêm sản phẩm vào mảng với số lượng đã bán là số lượng của mục đơn hàng
    //             $soldQuantities[$item->product_id] = $item->quantity;
    //         }
    //     }
    //     return view('admin.warehouse.list',[
    //         'title' => 'Danh sách sản phẩm trong kho',
    //         'warehouses' => $warehouses,
    //         'products' => $products,
    //         'orders' => $orders
    //     ]);
    // }
    public function list_warehouse()
    {
        // Truy vấn tất cả các đơn hàng
        $orders = order::all();

        // Khởi tạo mảng để lưu trữ tổng số lượng bán của mỗi sản phẩm
        $soldQuantities = [];

        // Duyệt qua tất cả các đơn hàng
        foreach ($orders as $order) {
            // Giải mã chuỗi JSON từ trường order_detail
            $orderDetails = json_decode($order->order_detail, true);

            // Duyệt qua các sản phẩm trong order_detail
            foreach ($orderDetails as $productId => $quantity) {
                // Nếu sản phẩm đã tồn tại trong mảng $soldQuantities, tăng số lượng
                if (isset($soldQuantities[$productId])) {
                    $soldQuantities[$productId] += $quantity;
                } else {
                    // Nếu chưa tồn tại, khởi tạo với số lượng hiện tại
                    $soldQuantities[$productId] = $quantity;
                }
            }
        }

        // Lấy thông tin chi tiết của các sản phẩm
        $products = product::all();
        
        // Lấy thông tin kho hàng (giả sử bạn có model Warehouse)
        $warehouses = warehouse::all();

        // Truyền dữ liệu tới view
        return view('admin.warehouse.list', [
            'products' => $products,
            'warehouses' => $warehouses,
            'soldQuantities' => $soldQuantities,
            'title' => 'Danh sách sản phẩm trong kho'
        ]);
    }



    public function delete_warehouse(Request $request){
        warehouse::find($request -> warehouse_id)->delete();
        return response() -> json([
            'success' => true
        ]);
    }

    public function edit_warehouse(Request $request){
        $warehouse = warehouse::find($request-> id);
        $products = product::all();
        return view('admin.warehouse.edit',[
            'title' => 'Sửa kho',
            'products' => $products,
            'warehouse' => $warehouse
        ]);
    }
    public function update_warehouse(Request $request){
        $warehouse = warehouse::find($request -> id);
        $warehouse -> name = $request -> input('name');
        $warehouse -> description = $request -> input('description');
        $warehouse->product_id = $request->input('product_id');
        $warehouse -> quantity_received = $request -> input('quantity_received');
        $warehouse -> save();
        return redirect('/admin/warehouse/list');
    }

}
