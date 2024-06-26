@extends('main')
@section('content')
<section class="cart-section p-to-top">
<form action="/book/send" method="POST">
<div class="container">
            <div class="row-flex row-flex-product-detail">
                <p>Đặt lịch</p>
            </div>
            <div class="row-grid">
            <div class="cart-section-left">
                    <img style="width:100%; margin-top: 5px" src="{{asset('frontend/asset/images/baotang.jpg')}}" alt="">
                </div>
                <div class="cart-section-right">
                    <h2 class="main-h2">Đặt lịch làm gốm tại Bát Tràng</h2></br>
                    <div class="cart-section-right-input-name-phone">
                        <label for="name">Họ và tên:</label>
                        <input type="text" name="name" id="">
                    </div>
                    <div class="cart-section-right-input-name-phone">
                        <label for="phone">Số điện thoại:</label><br>
                        <input type="text" id="phone" name="phone">
                    </div>
                    <div class="cart-section-right-input-name-phone">
                        <label for="email">Email:</label><br>
                        <input type="email" id="email" name="email">
                    </div>
                    <div class="cart-section-right-input-name-phone">
                    <label for="quantity">Số lượng người:</label><br>
                    <input type="number" id="quantity" name="quantity">
                    </div>
                    <div class="cart-section-right-input-name-phone">
                        <label for="date">Ngày đặt:</label><br>
                        <input type="date" id="date" name="date">
                    </div>
                    <div class="cart-section-right-input-name-phone">
                        <label for="hour">Giờ đặt:</label><br>
                        <input type="time" id="hour" name="hour">
                    </div>
                    <button class="main-btn">Đặt lịch</button>
                </div>
                
            </div>
</div>
        @csrf
</form>
</section>
@endsection
@section('footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection