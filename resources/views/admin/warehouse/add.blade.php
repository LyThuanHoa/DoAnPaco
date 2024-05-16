@extends('admin.main')
@section('content')
<form action="/admin/warehouse/add" enctype="multipart/form-data" method="post">
                            <div class="container">
                            <div class="select" style="margin-left: 20px; padding-top:15px">
                                    <select style="color:grey" id="product_id" name="product_id" required>
                                        <option value="" disabled selected>Chọn sản phẩm</option>
                                        @foreach($products as $product)
                                            <option placeholder="" value="{{ $product->id }}">
                                                {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                                <div class="input-admin">
                                    <input type="text" name="description" placeholder="Mô tả">
                                </div>
                                <div class="input-admin">
                                    <input type="text" name="name" placeholder="Vị trí">
                                </div>
                                <div class="input-admin">
                                    <input type="text" name="quantity_received" placeholder="Số lượng nhập">
                                </div>
                                <button style="margin-left: 20px;" class="main-btn" type="submit">Thêm </button>
@csrf
                            </div>
                                
</form>

@endsection

    