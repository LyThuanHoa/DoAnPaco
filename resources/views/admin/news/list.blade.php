@extends('admin.main')
@section('content')
<div class="admin-content-main-content-product-list">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tiêu đề</th>
                                        <th>Ảnh chính</th>
                                        <th>Mô tả</th>
                                        <th>Ngày tạo</th>
                                        <th>Tùy chỉnh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($news as $value)
                                        <tr>
                                        <td>{{$value -> id}}</td>
                                        <td>{{$value -> title}}</td>
                                        <td><img style="width: 70px;" src="{{asset($value -> avatar)}}" alt=""></td>
                                        <td style="text-align: left;">{{$value -> summary}}</td>
                                        <td>{{$value -> created_at}}</td>
                                        <td>
                                            <a href="/admin/news/edit/{{$value -> id}}" class="edit-class">Sửa</a>
                                            |
                                            <a onclick="removeRow(news_id = {{$value -> id}},url='/admin/news/delete')" class="delete-class" href="#">Xóa</a>
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

<script>
    //Delete
    function removeRow(news_id, url){
        if(confirm('Bạn có chắc chắn muốn xóa không?')){
            $.ajax({
                 url: url,
                 data: {news_id},
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