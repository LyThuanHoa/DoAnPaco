@extends('main')
@section('content')
<section class="order-confirm p-to-top">
        <div class="container">
            <div class="row-flex row-flex-product-detail">
                <p>Xác nhận đơn hàng: <span style="font-weight: bold;">Lý Thuận Hòa#01</span></p>
            </div>
            <div class="row-flex">
                <div class="order-confirm-content">
                    <p>Đơn hàng của bạn được gửi <span style="font-weight: bold;">Thành Công</span>!<br>
                    Vui lòng check <span style="font-style: italic;font-weight: bold;">Email</span> Đã đăng ký để nhận và xác nhận Đơn hàng</p>
                </div>
            </div>
            <a href="/"><button class="main-btn">Tiếp tục mua hàng</button></a>
            
        </div>
    </section>
@endsection