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
use Barryvdh\DomPDF\Facade\Pdf;
class OrderController extends Controller
{
    public function list_order()
    {
        $orders = \App\Models\order::orderBy('created_at', 'desc')->paginate(15); // Sử dụng toán tử :: để truy cập vào model Order
        return view('admin.order.list', [
            'orders' => $orders,
            'title' => 'Danh sách đơn hàng'
        ]);
    }
    
    //  public function detail_order(Request $request)
    //  {
    //      $order_detail = json_decode($request->order_detail, true);
    //      $orders = order::whereIn('id', $order_detail);
    //      $product_id = array_keys($order_detail);
    //      $products = product::whereIn('id', $product_id)->get();
    //      return view('admin.order.detail', [
    //          'products' => $products,
    //          'order_detail' => $order_detail,
    //          'title' => 'Chi tiết đơn hàng'
    //      ]);
    //  }
    // public function detail_order(Request $request)
    // {
    //     $order = order::find($request-> id);
    //     return view('admin.order.detail', [
    //         'order' => $order,
    //         'title' => 'Chi tiết đơn hàng'
    //     ]);
    // }
    public function detail_order($order_id, $order_detail)
{
    // Giả sử order_detail là một chuỗi JSON mã hóa chứa ID của các đơn hàng
    $order_detail = json_decode($order_detail, true);

    // Lấy thông tin đơn hàng dựa trên order_id
    $order = order::find($order_id);

    // Lấy danh sách đơn hàng dựa trên danh sách ID trong order_detail
    $orders = order::whereIn('id', $order_detail)->get();

    // Lấy danh sách product_id từ order_detail
    $product_ids = array_keys($order_detail);

    // Lấy danh sách sản phẩm dựa trên product_id
    $products = product::whereIn('id', $product_ids)->get();

    return view('admin.order.detail', [
        'order' => $order,
        'orders' => $orders,
        'products' => $products,
        'order_detail' => $order_detail,
        'title' => 'Chi tiết đơn hàng'
    ]);
}
// public function print_order($order_id)
// {
//     $order = Order::find($order_id);

//     if (!$order) {
//         // Xử lý trường hợp không tìm thấy đơn hàng
//         return redirect()->back()->with('error', 'Order not found.');
//     }
//     $data = [
//         'order' => $order,
//     ];

//     return view('admin.order.invoice', $data);
// }

public function print_order($order_id)
{
    $order = order::find($order_id);

    if (!$order) {
        // Xử lý trường hợp không tìm thấy đơn hàng
        return redirect()->back()->with('error', 'Order not found.');
    }

    // Lấy thông tin order_detail từ order
    $order_detail = $order->order_detail;

    // Nếu cần lấy thêm thông tin sản phẩm và đơn hàng chi tiết
    if ($order_detail) {
        $order_detail = json_decode($order_detail, true);

        // Lấy danh sách đơn hàng dựa trên danh sách ID trong order_detail
        $orders = order::whereIn('id', $order_detail)->get();

        // Lấy danh sách product_id từ order_detail
        $product_ids = array_keys($order_detail);

        // Lấy danh sách sản phẩm dựa trên product_id
        $products = product::whereIn('id', $product_ids)->get();
    } else {
        $orders = collect();
        $products = collect();
    }

    $data = [
        'order' => $order,
        'orders' => $orders,
        'products' => $products,
        'order_detail' => $order_detail,
    ];

    return view('admin.order.invoice', $data);
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
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|regex:/^[0-9]{10}$/',
        'email' => 'required|email|max:255',
        'city' => 'required|string|max:255',
        'district' => 'required|string|max:255',
        'ward' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'product_id' => 'required|array',
        'product_id.*' => 'integer',
        'note' => 'nullable|string',
    ], [
        'name.required' => 'Nhập tên của bạn.',
        'phone.required' => 'Nhập số điện thoại.',
        'phone.regex' => 'Số điện thoại phải có 10 chữ số.',
        'email.required' => 'Nhập email của bạn.',
        'email.email' => 'Địa chỉ email không hợp lệ.',
        'city.required' => 'Chọn tỉnh/TP.',
        'district.required' => 'Chọn quận/huyện.',
        'ward.required' => 'Chọn phường/xã.',
        'address.required' => 'Nhập địa chỉ của bạn.',
    ]);

    $token = Str::random(12);

    $order = new order;
    $order->name = $validatedData['name'];
    $order->phone = $validatedData['phone'];
    $order->email = $validatedData['email'];
    $order->city = $validatedData['city'];
    $order->district = $validatedData['district'];
    $order->ward = $validatedData['ward'];
    $order->address = $validatedData['address'];
    $order->note = $validatedData['note'];
    $order->order_detail = json_encode($validatedData['product_id']);
    $order->token = $token;
    $order->status = 0; // Trạng thái ban đầu là chưa xác nhận
    $order->save();

    $mailIfor = $order->email;
    $nameIfor = $order->name;
    $confirmationUrl = url('/order/confirm/' . $order->token);

    Mail::to($mailIfor)->send(new TestMail($nameIfor, $confirmationUrl));

    return redirect('/order/confirm')->with('success', 'Đặt hàng thành công. Vui lòng kiểm tra email để xác nhận đơn hàng.');
}
}
