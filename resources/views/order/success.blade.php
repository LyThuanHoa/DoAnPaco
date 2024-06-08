@extends('main')
@section('content')
<section class="order-confirm p-to-top">
        <div class="container">
            <div class="row-flex row-flex-product-detail">
                <p>Xác nhận đơn hàng: <span style="font-weight: bold;"> Thành Công</span></p>
            </div>
            <div class="row-flex">
                <div class="order-confirm-content">
                    <p>Đơn hàng của bạn đã được xác nhận <span style="font-weight: bold;">Thành Công</span>!<br>
                    Chúng tôi sẽ <span style="font-style: italic;font-weight: bold;">Giao hàng </span>trong thời gian tối đa <span style="font-style: italic;font-weight: bold;">3 ngày </span>làm việc</p>
                </div>
            </div>
            <a href="/"><button class="main-btn">Tiếp tục mua hàng</button></a>
        </div>
    </section>
@endsection