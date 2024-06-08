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

    // public function insert_warehouse(Request $request){
        
    //     $warehouse = new warehouse();
    //     $warehouse -> name = $request -> input('name');
    //     $warehouse -> description = $request -> input('description');
    //     $warehouse->product_id = $request->input('product_id');
    //     $warehouse -> quantity_received = $request -> input('quantity_received');
    //     $warehouse -> save();
    //     return redirect() -> back();
    // }
    public function insert_warehouse(Request $request)
    {
        $product_id = $request->input('product_id');
        $quantity_received = $request->input('quantity_received');
        
        // Kiểm tra xem sản phẩm đã có trong bảng warehouses chưa
        $existingWarehouse = Warehouse::where('product_id', $product_id)->first();
        
        if ($existingWarehouse) {
            // Nếu sản phẩm đã tồn tại, cập nhật số lượng nhận
            $existingWarehouse->quantity_received += $quantity_received;
            $existingWarehouse->description = $request->input('description');
            $existingWarehouse->save();
        } else {
            // Nếu sản phẩm chưa tồn tại, thêm mới vào bảng warehouses
            $warehouse = new Warehouse();
            $warehouse->name = $request->input('name');
            $warehouse->description = $request->input('description');
            $warehouse->product_id = $product_id;
            $warehouse->quantity_received = $quantity_received;
            $warehouse->save();
        }

        return redirect()->back()->with('success', 'Product added/updated successfully.');
    }
    public function list_warehouse(Request $request)
    {
        // Truy vấn tất cả các đơn hàng
        $orders = Order::all();
        
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
        
        // Cập nhật thông tin số lượng bán và inventory vào kho
        $warehouses = Warehouse::all(); // Lấy tất cả kho hàng
    
        foreach ($warehouses as $warehouse) {
            $productId = $warehouse->product_id;
            // Kiểm tra xem sản phẩm có trong danh sách $soldQuantities hay không
            if (isset($soldQuantities[$productId])) {
                $quantitySold = $soldQuantities[$productId];
                $warehouse->quantity_sold = $quantitySold;
                // Tính toán inventory
                $warehouse->inventory = $warehouse->quantity_received - $quantitySold;
            } else {
                // Nếu sản phẩm chưa bán thì số lượng tồn bằng số lượng nhập
                $warehouse->quantity_sold = 0;
                $warehouse->inventory = $warehouse->quantity_received;
            }
    
            // Lưu thông tin vào cơ sở dữ liệu
            $warehouse->save();
        }
    
        // Xử lý tìm kiếm theo tên sản phẩm
        $search = $request->input('search');
        if ($search) {
            $products = Product::where('name', 'like', '%' . $search . '%')->get();
            $productIds = $products->pluck('id')->toArray();
            $warehouses = Warehouse::whereIn('product_id', $productIds)->get();
        } else {
            // Truy vấn tất cả kho hàng
            $warehouses = Warehouse::all();
        }
    
        // Truy vấn tất cả các sản phẩm để lấy số lượng tồn kho ban đầu
        $products = Product::all();
        
        return view('admin.warehouse.list', [
            'warehouses' => $warehouses,
            'products' => $products,
            'soldQuantities' => $soldQuantities,
            'search' => $search,
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
