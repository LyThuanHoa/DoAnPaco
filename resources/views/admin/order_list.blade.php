@extends('admin.main')
@section('content')
                        <div class="admin-content-main-content-order-list">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>SĐT</th>
                                        <th>Email</th>
                                        <th>Địa chỉ</th>
                                        <th>Ghi chú</th>
                                        <th>Chi tiết</th>
                                        <th>Ngày</th>
                                        <th>Trạng thái</th>
                                        <th>Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Lý Thuận Hòa</td>
                                        <td>0389145765</td>
                                        <td>hoa@gmail.com</td>
                                        <td>Long Biên, Hà Nội</td>
                                        <td>Ngoài giờ hành chính</td>
                                        <td>
                                            <a class="edit-class" href="/admin/order_detail">Chi tiết</a>
                                        </td>
                                        <td>21/04/2024</td>
                                        <td><a class="confirm-order" href="">Đã xác nhận</a></td>
                                        <td>
                                            <a class="delete-class" href="">Xóa</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Lý Thuận Hòa</td>
                                        <td>0389145765</td>
                                        <td>hoa@gmail.com</td>
                                        <td>Long Biên, Hà Nội</td>
                                        <td>Ngoài giờ hành chính</td>
                                        <td>
                                            <a class="edit-class" href="/admin/order_detail">Chi tiết</a>
                                        </td>
                                        <td>21/04/2024</td>
                                        <td><a class="non-confirm-order" href="">Chưa xác nhận</a></td>
                                        <td>
                                            <a class="delete-class" href="">Xóa</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @endsection