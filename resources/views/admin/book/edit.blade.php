@extends('admin.main')
@section('content')
<form action="" method="post">
                <table>
                    <tr>
                        <td><label for="name">Họ và tên:</label></td>
                        <td><input type="text" id="name" name="name" value="{{$book ->name}}"><br></td>
                    </tr>
                    <tr>
                        <td><label for="phone">Số điện thoại:</label></td>
                        <td><input type="text" id="phone" name="phone" value="{{$book ->phone}}"></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email:</label></td>
                        <td><input type="email" id="email" name="email" value="{{$book ->email}}"></td>
                    </tr>
                    <tr>
                        <td><label for="quantity">Số lượng người:</label></td>
                        <td><input type="number" id="quantity" name="quantity" value="{{$book ->quantity}}"></td>
                    </tr>
                    <tr>
                        <td><label for="date">Ngày đặt:</label></td>
                        <td><input type="date" id="date" name="date" value="{{$book ->date}}"><br></td>
                    </tr>
                    <tr>
                        <td><label for="hour">Giờ đặt:</label></td>
                        <td><input type="time" id="hour" name="hour" value="{{$book ->hour}}"><br><br></td>
                    </tr>
                    <tr>
                        <td><button class="main-btn" type="submit">Cập nhật</button></td>
                        <td></td>
                    </tr>
                    </table>
                @csrf
                </form>
@endsection