@extends('admin.main')
@section('content')
    <div class="admin-content-main-content-order-list">
        <h3 style="margin: 15px;  font-style:italic; font-weight:500; color:brown">Thông tin khách hàng</h3>
        <a href="/admin/order/invoice/{{ $order->id }}" class="main-btn" style="position:absolute; right:20px">In hóa đơn</a>
        <div class="order_detail_in4">
            <div class="order_detail_in4_title">
                <p>Họ tên:</p>
                <p>Số điện thoại:</p>
                <p>Email: </p>
            </div>
            <div class="order_detail_in4_main">
                <p>{{$order-> name}}</p>
                <p>{{$order-> phone}}</p>
                <p>{{$order-> email}}</p>
            </div>
            <div class="order_detail_in4_title">
                <p>Địa chỉ:</p>
                <p>Ghi chú:</p>
                <p>Ngày đặt: </p>
            </div>
            <div class="order_detail_in4_main">
                <p>{{$order-> address}}</p>
                <p>{{$order-> note}}</p>
                <p>{{$order-> created_at}}</p>
            </div>
        </div>
        <h3 style="margin: 15px;  font-style:italic;font-weight:500; color:brown">Thông tin sản phẩm</h3>
                        <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ảnh</th>
                                        <th>Tên</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach($products as $product)
                                        @php
                                            $price = $product -> price_sale * $order_detail[$product -> id];
                                            $total += $price;
                                        @endphp
                                        <tr>
                                            <td>{{$product -> id}}</td>
                                            <td><img width="150px" src="{{asset($product -> image)}}" alt=""></td>
                                            <td>{{$product -> name}}</td>
                                            <td>{{number_format($product -> price_sale)}}</td>
                                            <td>{{$order_detail[$product -> id]}}</td>
                                            <td>{{number_format($price)}}</td>
                                            
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5" style="font-weight: bold;">Tổng Cộng</td>
                                        <td style="font-weight: bold;">{{number_format($total)}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                        
@endsection