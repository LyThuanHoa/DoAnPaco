<?php

namespace App\Http\Controllers\admin;

use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function list_order()
    {
        $orders = order::all();
        return view('admin.order.list', [
            'orders' => $orders,
            'title' => 'Danh sách đơn hàng'
        ]);
    }
    public function detail_order(Request $request)
    {
        $order_detail = json_decode($request->order_detail, true);
        $orders = order::whereIn('id', $order_detail);
        $product_id = array_keys($order_detail);
        $products = product::whereIn('id', $product_id)->get();
        return view('admin.order.detail', [
            'products' => $products,
            'order_detail' => $order_detail,
            'title' => 'Chi tiết đơn hàng'
        ]);
    }
    public function delete_order(Request $request)
    {
        order::find($request->order_id)->delete();
        return response()->json([
            'success' => true
        ]);
    }
    public function delete_order_detail(Request $request)
    {
        product::find($request->product_id)->delete();
        return response()->json([
            'success' => true
        ]);
    }
    public function confirmOrder($token)
    {
        // Tìm đơn hàng bằng token xác nhận
        $order = order::where('token', $token)->first();

        if (!$order) {
            return redirect('/')->with('error', 'Đơn hàng không hợp lệ hoặc đã được xác nhận.');
        }

        // Cập nhật trạng thái đơn hàng
        $order->status = 1;
        //$order->token = null; // Xóa token để tránh sử dụng lại
        $order->save();

        return redirect('/order/success')->with('success', 'Đơn hàng đã được xác nhận thành công.');
    }
    public function send_cart(Request $request)
    {
        $token = Str::random(12);
        $order = new Order;
        $order->name = $request->input('name');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->city = $request->input('city');
        $order->district = $request->input('district');
        $order->ward = $request->input('ward');
        $order->address = $request->input('address');
        $order->note = $request->input('note');
        $order_detail = json_encode($request->input('product_id'));
        $order->order_detail = $order_detail;
        $order->token = $token;
        $order->status = 0; // Trạng thái ban đầu là chưa xác nhận
        $order->save();

        $mailIfor = $order->email;
        $nameIfor = $order->name;
        $confirmationUrl = url('/order/confirm/' . $order->token);

        Mail::to($mailIfor)->send(new TestMail($nameIfor, $confirmationUrl));

        return redirect('/order/confirm');
    }
}
