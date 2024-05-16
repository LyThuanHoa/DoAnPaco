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
    public function list_warehouse(){
        $products = product::all();
        $orders = order::all();
        $warehouses = DB::table('warehouses')->paginate(10);
        return view('admin.warehouse.list',[
            'title' => 'Danh sách sản phẩm trong kho',
            'warehouses' => $warehouses,
            'products' => $products,
            'orders' => $orders
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
