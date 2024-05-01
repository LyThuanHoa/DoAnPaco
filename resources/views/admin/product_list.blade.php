@extends('admin.main')
@section('content')
<div class="admin-content-main-content-product-list">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá bán</th>
                                        <th>Giá giảm</th>
                                        <th>Ngày đăng</th>
                                        <th>Tùy chỉnh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><img style="width: 150px;" src="{{asset('backend\asset\images\product1.jpg')}}" alt=""></td>
                                        <td>Bình cắm hoa tone tối</td>
                                        <td>500,000</td>
                                        <td>480,000</td>
                                        <td>2024-04-05</td>
                                        <td>
                                            <a class="edit-class" href="">Sửa</a>
                                            |
                                            <a class="delete-class" href="">Xóa</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><img style="width: 150px;" src="{{asset('backend\asset\images\product1.jpg')}}" alt=""></td>
                                        <td>Bình cắm hoa tone tối</td>
                                        <td>500,000</td>
                                        <td>480,000</td>
                                        <td>2024-04-05</td>
                                        <td>
                                            <a class="edit-class" href="">Sửa</a>
                                            |
                                            <a class="delete-class" href="">Xóa</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><img style="width: 150px;" src="{{asset('backend\asset\images\product1.jpg')}}" alt=""></td>
                                        <td>Bình cắm hoa tone tối</td>
                                        <td>500,000</td>
                                        <td>480,000</td>
                                        <td>2024-04-05</td>
                                        <td>
                                            <a class="edit-class" href="">Sửa</a>
                                            |
                                            <a class="delete-class" href="">Xóa</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><img style="width: 150px;" src="{{asset('backend\asset\images\product1.jpg')}}" alt=""></td>
                                        <td>Bình cắm hoa tone tối</td>
                                        <td>500,000</td>
                                        <td>480,000</td>
                                        <td>2024-04-05</td>
                                        <td>
                                            <a class="edit-class" href="">Sửa</a>
                                            |
                                            <a class="delete-class" href="">Xóa</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td><img style="width: 150px;" src="{{asset('backend\asset\images\product1.jpg')}}" alt=""></td>
                                        <td>Bình cắm hoa tone tối</td>
                                        <td>500,000</td>
                                        <td>480,000</td>
                                        <td>2024-04-05</td>
                                        <td>
                                            <a class="edit-class" href="">Sửa</a>
                                            |
                                            <a class="delete-class" href="">Xóa</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td><img style="width: 150px;" src="{{asset('backend\asset\images\product1.jpg')}}" alt=""></td>
                                        <td>Bình cắm hoa tone tối</td>
                                        <td>500,000</td>
                                        <td>480,000</td>
                                        <td>2024-04-05</td>
                                        <td>
                                            <a class="edit-class" href="">Sửa</a>
                                            |
                                            <a class="delete-class" href="">Xóa</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endsection