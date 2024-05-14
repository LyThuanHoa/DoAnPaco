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
                                    @foreach($orders as $order)
                                        
                                        <tr>
                                            <td>{{($order -> id)}}</td>
                                            <td>{{($order -> name)}}</td>
                                            <td>{{($order -> phone)}}</td>
                                            <td>{{($order -> email)}}</td>
                                            <td>{{($order -> address)}},{{($order -> ward)}},{{($order -> district)}},{{($order -> city)}}</td>
                                            <td>{{($order -> note)}}</td>
                                            <td>
                                                <a class="edit-class" href="/admin/order/detail/{{($order -> order_detail)}}">Chi tiết</a>
                                            </td>
                                            <td>{{($order -> created_at)}}</td>
                                            <td><a class="confirm-order" href="">Chưa xác nhận</a></td>
                                            <td>
                                                <a onclick="removeRow1(order_id = {{$order -> id}}, url='/admin/order/delete')" class="delete-class" href="#">Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
<script>
    //Delete
    function removeRow1(order_id, url){
        if(confirm('Bạn có chắc chắn muốn xóa không?')){
            $.ajax({
                 url: url,
                 data: {order_id},
                 method: 'GET',
                 dataType: 'JSON',
                 success: function (res){
                   if(res.success == true){
                    location.reload();
                   }
                }
             })
        }
    }
</script>
                        @endsection