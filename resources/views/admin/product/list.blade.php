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
                                    @foreach($products as $product)
                                        <tr>
                                        <td>{{$product -> id}}</td>
                                        <td><img style="width: 120px;" src="{{asset($product -> image)}}" alt=""></td>
                                        <td style="text-align: left;">{{$product -> name}}</td>
                                        <td>{{number_format($product -> price_normal)}}</td>
                                        <td>{{number_format($product -> price_sale)}}</td>
                                        <td>{{$product -> created_at}}</td>
                                        <td>
                                            <a href="/admin/product/edit/{{$product -> id}}" class="edit-class">Sửa</a>
                                            |
                                            <a onclick="removeRow(product_id = {{$product -> id}},url='/admin/product/delete')" class="delete-class" href="#">Xóa</a>
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination" style="display: flex; justify-content: center;">
    {{ $products->links() }}
</div>
                        </div>

<script>
    //Delete
    function removeRow(product_id, url){
        if(confirm('Bạn có chắc chắn muốn xóa không?')){
            $.ajax({
                 url: url,
                 data: {product_id},
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