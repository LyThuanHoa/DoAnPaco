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
                                        <th>Số lượng khách</th>
                                        <th>Ngày</th>
                                        <th>Giờ</th>
                                        <th>Ngày đặt</th>
                                        <th>Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($books as $book)
                                        
                                        <tr>
                                            <td>{{($book -> id)}}</td>
                                            <td>{{($book -> name)}}</td>
                                            <td>{{($book -> phone)}}</td>
                                            <td>{{($book -> email)}}</td>
                                            <td>{{($book -> quantity)}}</td>
                                            <td>{{($book -> date)}}</td>
                                            <td>{{($book -> hour)}}</td>
                                            <td>{{($book -> created_at)}}</td>

                                           
                                            <td>
                                                <a class="edit-class" href="/admin/book/edit/{{$book -> id}}">Sửa</a>
                                                <a onclick="removeRow(book_id = {{$book -> id}},url='/admin/book/delete')" class="delete-class" href="#">Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
<script>
    //Delete
    function removeRow(book_id, url){
        if(confirm('Bạn có chắc chắn muốn xóa không?')){
            $.ajax({
                 url: url,
                 data: {book_id},
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