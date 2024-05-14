<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function list_order(){
       $orders = order::all();
        return view('admin.order.list',[
            'orders' => $orders,
             'title' => 'Danh sách đơn hàng'
        ]);
    }
    public function detail_order(Request $request){
        $order_detail = json_decode($request -> order_detail,true);
        $orders = order::whereIn('id',$order_detail);
        $product_id = array_keys($order_detail);
        $products = product::whereIn('id',$product_id) -> get();
        return view('admin.order.detail',[
            'products' => $products,
            'order_detail' => $order_detail,
            'title' => 'Chi tiết đơn hàng'
        ]);
        
    }
    public function delete_order(Request $request){
        order::find($request -> order_id)->delete();
        return response() -> json([
            'success' => true
        ]);
    }
    public function delete_order_detail(Request $request){
        product::find($request -> product_id)->delete();
        return response() -> json([
            'success' => true
        ]);
    }
    
}
