@extends('main')
@section('content')
<section class="cart-section p-to-top">
<form action="/cart/send" method="POST">
<div class="container">
            <div class="row-flex row-flex-product-detail">
                <p>Giỏ hàng</p>

            </div>
            <div class="row-grid">
                <div class="cart-section-left">
                    <h2 class="main-h2">Chi tiết đơn hàng</h2>
                    <div class="cart-section-left-detail">
                        <table>
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Sản phẩm</th>
                                    <th>Thành tiền</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php 
                                    $total =0;
                                @endphp
                                @foreach($products as $product)
                                    @php 
                                        $price = $product -> price_sale * Session::get('cart')[$product -> id];
                                        $total += $price;
                                    @endphp
                                    <tr>
                                        <td><img style="width: 130px;margin-top: 3px;" src="{{asset($product -> image)}}" alt=""></td>
                                        <td>
                                            <div class="product-detail-right-infor">
                                                <h1>{{$product -> name}}</h1>
                                                <div class="hot-product-item-price">
                                                    <p>{{number_format($product -> price_sale)}}<sup>đ</sup> <span>{{number_format($product -> price_normal)}}<sup>đ</sup></span></p>
                                                </div>
                                            </div>
                                            <div class="product-detail-right-quantity">
                                                <div class="product-detail-right-quantity-input">
                                                    <i class="ri-checkbox-indeterminate-fill"></i>
                                                    <input onKeyDown="return false" class="quantity-input" name="product_id[{{$product -> id}}]" type="number" value="{{Session::get('cart')[$product -> id]}}"/>
                                                    <i class="ri-add-box-fill"></i>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p>{{number_format($price)}}<sup>đ</sup></p>
                                        </td>
                                        <td><a href="/cart/delete/{{$product -> id}}"><i class="ri-close-fill"></i></a></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td style="font-weight: bold;" colspan="2">Tổng tiền</td>
                                    <td style="font-weight: bold; text-align:center">{{number_format($total)}}<sup>đ</sup></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <button formaction="/cart/update" class="main-btn">Cập Nhật Giỏ Hàng</button>
                        <a style="color: brown;font-style: italic;" href="/">>> Tiếp tục mua hàng</a>
                    </div>
                </div>
                <div class="cart-section-right">
                    <h2 class="main-h2">Thông tin giao hàng</h2>
                    <div class="cart-section-right-input-name-phone">
                        <input type="text" placeholder="Tên" name="name" id="">
                        <input type="text" placeholder="Điện thoại" name="phone" id="">
                    </div>
                    <div class="cart-section-right-input-email">
                        <input type="text" placeholder="Email" name="email" id="">
                    </div>
                    <div class="cart-section-right-select">
                        <select name="city" id="city">
                            <option value="">Tỉnh/ TP</option>
                        </select>
                        <select name="district" id="district">
                            <option value="">Quận/ Huyện</option>
                        </select>
                        <select name="ward" id="ward">
                            <option value="">Phường/ Xã</option>
                        </select>
                    </div>
                    <div class="cart-section-right-input-address">
                        <input type="text" placeholder="Địa chỉ" name="address" id="">
                    </div>
                    <div class="cart-section-right-input-note">
                        <input type="text" placeholder="Ghi chú" name="note" id="">
                    </div>
                    <button class="main-btn">Đặt hàng</button>

                </div>
            </div>
</div>
        @csrf
</form>
</section>
@endsection
@section('footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('frontend\asset\js\apiprovince.js')}}"></script>
@endsection