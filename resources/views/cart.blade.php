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
                        <select name="city" id="city" onchange="getDistricts()">
                            <option value="">Tỉnh/ TP</option>
                        </select>
                        <select name="district" id="district" onchange="getWards()">
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
<script>
    // Tạo một hàm để gửi yêu cầu AJAX đến API
    function getCities() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'https://vapi.vnappmob.com/api/province', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var data = JSON.parse(xhr.responseText);
                var cities = data.results;

                // Đổ dữ liệu vào danh sách thả xuống city
                var citySelect = document.getElementById('city');
                cities.forEach(function (city) {
                    var option = document.createElement('option');
                    option.text = city.province_name;
                    option.value = city.province_id;
                    citySelect.add(option);
                });
            }
        };
        xhr.send();
    }
    function getDistricts() {
    // Lấy giá trị của tỉnh/thành phố đã chọn từ danh sách thả xuống
    var cityId = document.getElementById('city').value;
    
    // Tạo một đối tượng XMLHttpRequest để gửi yêu cầu đến API
    var xhr = new XMLHttpRequest();
    
    // Thiết lập phương thức và URL của yêu cầu
    xhr.open('GET', 'https://vapi.vnappmob.com/api/province/district/' + cityId, true);
    
    // Xử lý phản hồi từ API khi yêu cầu hoàn thành
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Phân tích dữ liệu JSON từ phản hồi
            var data = JSON.parse(xhr.responseText);
            
            // Lấy danh sách các quận/huyện từ dữ liệu
            var districts = data.results;
            
            // Lấy thẻ select của quận/huyện
            var districtSelect = document.getElementById('district');
            
            // Xóa tất cả các lựa chọn hiện tại trong danh sách thả xuống
            districtSelect.innerHTML = '';
            
            // Duyệt qua danh sách các quận/huyện và thêm vào danh sách thả xuống
            districts.forEach(function (district) {
                var option = document.createElement('option');
                option.text = district.district_name;
                option.value = district.district_id;
                districtSelect.add(option);
            });
        }
    };
    
    // Gửi yêu cầu đến API
    xhr.send();
}
function getWards() {
        var districtId = document.getElementById('district').value;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'https://vapi.vnappmob.com/api/province/ward/' + districtId, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var data = JSON.parse(xhr.responseText);
                var wards = data.results;
                var wardSelect = document.getElementById('ward');
                wardSelect.innerHTML = '';
                wards.forEach(function (ward) {
                    var option = document.createElement('option');
                    option.text = ward.ward_name;
                    option.value = ward.ward_id;
                    wardSelect.add(option);
                });
            }
        };
        xhr.send();
    }


    // Gọi hàm để lấy dữ liệu cities khi trang được tải
    window.onload = getCities;
</script>
</section>
@endsection
@section('footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
@endsection