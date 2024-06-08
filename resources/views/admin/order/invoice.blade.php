<!DOCTYPE html>
<html>
<head>
    <title>Hóa đơn</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        .print_top th,.print_top td{
            padding: 10px;
            border: 1px solid white;
        }
        th, td {
            padding: 10px;
            border: 1px solid black;
        }
        .print_main {
            border: 1px solid black;
            width: 700px;
            margin: 0 auto;
            padding: 20px;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('backend/asset/css/style.css') }}">
</head>
<body>
    <div class="print_main">
        <div style="display: flex; margin: 0 auto;">
            <div class="print_order_logo" style="display: flex;">
                <img width="60px" src="{{ asset('backend/asset/images/logoPaco.png') }}" alt="">
                <div>
                    <h3 style="margin: 5px 10px;">PACO</h3>
                    <p style="margin: 5px 10px;">Gốm sứ Bát Tràng</p>
                </div>
            </div>
            <div style="padding-left: 200px;">
                <h3 style="margin: 5px 10px;">HÓA ĐƠN: #{{$order-> id}}</h3>
                <p style="margin: 5px 10px;">Ngày đặt: {{$order-> created_at}}</p>
            </div>
        </div>
        <h2 style="text-align: center; margin-top: 15px;">HÓA ĐƠN ĐẶT HÀNG</h2>
        <h4 style="margin: 15px; font-style: italic; font-weight: 500; color: brown;">Thông tin khách hàng</h4>
        <table class="print_top">
            <tr>
                <th>Họ tên:</th>
                <td>{{$order-> name}}</td>
                <th>Số điện thoại:</th>
                <td>{{$order-> phone}}</td>
            </tr>
            <tr>
                <th>Địa chỉ:</th>
                <td>{{$order-> address}}</td>
            </tr>
            <tr>
                <th>Ghi chú:</th>
                <td>{{$order-> note}}</td>
            </tr>

        </table>
        <br>
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá bán</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach($products as $index => $product)
                                        @php
                                            $price = $product -> price_sale * $order_detail[$product -> id];
                                            $total += $price;
                                        @endphp
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{$product -> name}}</td>
                                            <td>{{number_format($product -> price_sale)}}</td>
                                            <td>{{$order_detail[$product -> id]}}</td>
                                            <td>{{number_format($price)}}</td>
                                            
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="4" style="font-weight: bold;">Tổng Cộng</td>
                                        <td style="font-weight: bold;">{{number_format($total)}}</td>
                                    </tr>
                                </tbody>
        </table>
        <div style="display: flex; font-size: small; margin-top: 40px;">
            <div style="width: 50%;">
                <p style="font-weight: 500;">Cảm ơn quý khách đã đặt hàng!</p>
                <p>Hãy liên hệ với chúng tôi nếu có bất kỳ thắc mắc nào về đơn hàng.</p>
                <p>Mọi góp ý của bạn sẽ giúp PACO cải thiện từng ngày.</p>
            </div>
            <div style="width: 10%;"></div>
            <div style="width: 40%;">
                <p style="font-weight: 500;">ĐỊA CHỈ LIÊN HỆ</p>
                Đ/C: Lô K 15 KCN Bát Tràng - Xã Bát Tràng - Gia Lâm - Hà Nội<br>
                Hotline: 0985478595<br>
                Email: gomsupaco@gmail.com
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
