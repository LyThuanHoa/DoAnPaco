@extends('admin.main')
@section('content')
<div class="admin-content-main-content-product-list">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên danh mục</th>
                                        <th>Mô tả</th>
                                        <th>Ngày tạo</th>
                                        <th>Tùy chỉnh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                        <td>{{$category -> id}}</td>
                                        <td>{{$category -> name}}</td>
                                        <td style="text-align: left;">{{$category -> description}}</td>
                                        <td>{{$category -> created_at}}</td>
                                        <td>
                                            <a href="/admin/category/edit/{{$category -> id}}" class="edit-class">Sửa</a>
                                            |
                                            <a onclick="removeRow(category_id = {{$category -> id}},url='/admin/category/delete')" class="delete-class" href="#">Xóa</a>
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

<script>
    //Delete
    function removeRow(category_id, url){
        if(confirm('Bạn có chắc chắn muốn xóa không?')){
            $.ajax({
                 url: url,
                 data: {category_id},
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