@extends('admin.main')
@section('content')
                        <div class="admin-content-main-content-order-list">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ảnh</th>
                                        <th>Tên</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                        <th>Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><img width="150px" src="{{asset('backend/asset/images/product2.jpg')}}" alt=""></td>
                                        <td>Set cổ điển</td>
                                        <td>500,000</td>
                                        <td>1</td>
                                        <td>500,000</td>
                                        <td>
                                            <a class="delete-class" href="">Xóa</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><img width="150px" src="{{asset('backend/asset/images/product1.3.jpg')}}" alt=""></td>
                                        <td>Set hoa mặt trời</td>
                                        <td>400,000</td>
                                        <td>1</td>
                                        <td>400,000</td>
                                        <td>
                                            <a class="delete-class" href="">Xóa</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" style="font-weight: bold;">Tổng Cộng</td>
                                        <td style="font-weight: bold;">900,000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    
@endsection