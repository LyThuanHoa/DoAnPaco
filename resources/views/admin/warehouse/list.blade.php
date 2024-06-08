@extends('admin.main')
@section('content')
<div class="admin-content-main-content-product-list">
    <!-- Form tìm kiếm -->
    <form method="GET" action="{{ route('admin.warehouse.list') }}" style="text-align:right; height:50px; width:100%;">
        <input type="text" name="search" placeholder="Tìm kiếm sản phẩm" value="{{ request('search') }}" style="border-radius: 10px;height:30px;width:300px; margin: 10px">
    </form>
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Vị trí</th>
                    <th>Sản phẩm</th>
                    <th>Ảnh</th>
                    <th>SL nhập</th>
                    <th>SL xuất</th>
                    <th>SL tồn kho</th>
                    <th>Tùy chỉnh</th>
                </tr>
            </thead>
            <tbody>
                @foreach($warehouses as $warehouse)
                    <tr>
                        <td>{{ $warehouse->id }}</td>
                        <td>{{ $warehouse->name }}</td>
                        @foreach($products as $product)
                            @if($warehouse->product_id == $product->id)
                                <td>{{ $product->name }}</td>
                                <td><img style="width: 90px;" src="{{ asset($product->image) }}" alt="{{ $product->name }}"></td>
                            @endif
                        @endforeach
                        <td>{{ $warehouse->quantity_received }}</td>
                        <td>{{ $soldQuantities[$warehouse->product_id] ?? 0 }}</td>
                        <td>{{ $warehouse->inventory }}</td>
                        <td>
                            <a href="/admin/warehouse/edit/{{ $warehouse->id }}" class="edit-class">Sửa</a>
                            |
                            <a class="delete-class" onclick="removeRow({{ $warehouse->id }}, '/admin/warehouse/delete')">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    //Delete
    function removeRow(warehouse_id, url){
        if(confirm('Bạn có chắc chắn muốn xóa không?')){
            $.ajax({
                 url: url,
                 data: {warehouse_id},
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
