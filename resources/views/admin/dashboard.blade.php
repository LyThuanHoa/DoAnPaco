@extends('admin.main')
@section('content')
<div style="display:flex; padding: 10px">
<div style=" padding-right: 100px; background-color:whitesmoke; width:400px;padding:20px;border:1px solid gray; border-radius: 10px;">
    <h2 style="color:brown">SẢN PHẨM</h2><br>
    <div>
        <h3>Tổng số lượng sản phẩm: {{ $totalProducts }}</h3>
    </div>
</div>
    <div style=" padding-right: 100px; background-color:whitesmoke; width:400px;padding:20px;border:1px solid gray;margin-left:30px;border-radius: 10px;">
    <h2 style="color:brown">ĐƠN HÀNG</h2><br>
    <form method="GET" action="/admin/dashboard ">
        <label for="year">Năm:</label>
        <select name="year" id="year">
            @for ($i = date('Y'); $i >= 2023; $i--)
                <option value="{{ $i }}" {{ request('year') == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
        </select>

        <label for="month">Tháng:</label>
        <select name="month" id="month">
            @for ($i = 1; $i <= 12; $i++)
                <option value="{{ $i }}" {{ request('month') == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
        </select>

        <button class="main-btn" type="submit" style="margin-left: 30px;">Xem</button>
    </form>
    <div>
        <br>
        <p>Thống kê số lượng đơn hàng {{ request('month') }}/{{ request('year') }}: <a style="font-size: 18px;font-weight:bold">{{ $totalOrders }}</a></p>
    </div>
    </div>

<div style=" padding-right: 100px; background-color:whitesmoke; width:400px;padding:20px;border:1px solid gray;margin-left:30px;border-radius: 10px;">
    <h2 style="color:brown">LỊCH NẶN GỐM</h2><br>

    </div>
</div>
</div>



    
@endsection