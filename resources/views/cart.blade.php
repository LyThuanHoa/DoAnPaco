@extends('main')
@section('content')
<section class="cart-section p-to-top">
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
                                <tr>
                                    <td><img style="width: 130px;margin-top: 3px;" src="{{asset('frontend/asset/images/product2.jpg')}}" alt=""></td>
                                    <td>
                                        <div class="product-detail-right-infor">
                                            <h1>Bộ mặt trời sứ Bát Tràng </h1>
                                            <div class="hot-product-item-price">
                                                <p>1,550,000<sup>đ</sup> <span>1,600,000<sup>đ</sup></span></p>
                                            </div>
                                        </div>
                                        <div class="product-detail-right-quantity">
                                            <div class="product-detail-right-quantity-input">
                                                <i class="ri-checkbox-indeterminate-fill"></i>
                                                <input class="quantity-input" type="number" value="1" onkeydown="return false"/>
                                                <i class="ri-add-box-fill"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p>1,550,000<sup>đ</sup></p>
                                    </td>
                                    <td>X</td>
                                </tr>
                                <tr>
                                    <td><img style="width: 130px;margin-top: 3px;" src="{{asset('frontend/asset/images/product1.2.jpg')}}" alt=""></td>
                                    <td>
                                        <div class="product-detail-right-infor">
                                            <h1>Bộ mặt trời sứ Bát Tràng </h1>
                                            <div class="hot-product-item-price">
                                                <p>1,550,000<sup>đ</sup> <span>1,600,000<sup>đ</sup></span></p>
                                            </div>
                                        </div>
                                        <div class="product-detail-right-quantity">
                                            <div class="product-detail-right-quantity-input">
                                                <i class="ri-checkbox-indeterminate-fill"></i>
                                                <input class="quantity-input" type="number" value="1" onkeydown="return false"/>
                                                <i class="ri-add-box-fill"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p>1,550,000<sup>đ</sup></p>
                                    </td>
                                    <td>X</td>
                                </tr>
                                <tr>
                                    <td><img style="width: 130px;margin-top: 3px;" src="{{asset('frontend/asset/images/product1.3.jpg')}}" alt=""></td>
                                    <td>
                                        <div class="product-detail-right-infor">
                                            <h1>Bộ mặt trời sứ Bát Tràng </h1>
                                            <div class="hot-product-item-price">
                                                <p>1,550,000<sup>đ</sup> <span>1,600,000<sup>đ</sup></span></p>
                                            </div>
                                        </div>
                                        <div class="product-detail-right-quantity">
                                            <div class="product-detail-right-quantity-input">
                                                <i class="ri-checkbox-indeterminate-fill"></i>
                                                <input class="quantity-input" type="number" value="1" onkeydown="return false"/>
                                                <i class="ri-add-box-fill"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p>1,550,000<sup>đ</sup></p>
                                    </td>
                                    <td>X</td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="main-btn">Cập Nhật Giỏ Hàng</button>
                        <a style="color: brown;font-style: italic;">>> Tiếp tục mua hàng</a>
                    </div>
                </div>
                <div class="cart-section-right">
                    <h2 class="main-h2">Thông tin giao hàng</h2>
                    <div class="cart-section-right-input-name-phone">
                        <input type="text" placeholder="Tên" name="" id="">
                        <input type="text" placeholder="Điện thoại" name="" id="">
                    </div>
                    <div class="cart-section-right-input-email">
                        <input type="text" placeholder="Email" name="" id="">
                    </div>
                    <div class="cart-section-right-select">
                        <select name="" id="city">
                            <option value="">Tỉnh/ TP</option>
                        </select>
                        <select name="" id="district">
                            <option value="">Quận/ Huyện</option>
                        </select>
                        <select name="" id="ward">
                            <option value="">Phường/ Xã</option>
                        </select>
                    </div>
                    <div class="cart-section-right-input-address">
                        <input type="text" placeholder="Địa chỉ" name="" id="">
                    </div>
                    <div class="cart-section-right-input-note">
                        <input type="text" placeholder="Ghi chú" name="" id="">
                    </div>
                    <div class="main-btn">Đặt hàng</div>

                </div>
            </div>
        </div>
    </section>
@endsection

@section 

@endsection