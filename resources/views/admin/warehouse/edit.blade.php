@extends('admin.main')
@section('content')
<form action="" enctype="multipart/form-data" method="post">
                            <div class="container">
                            <div class="select" style="margin-left: 20px; padding-top:15px">
                                    <select style="color:grey" id="product_id" name="product_id" required>
                                        <option value="" disabled selected>Chọn sản phẩm</option>
                                        @foreach($products as $product) 
                                    <option style="color:grey" value="{{ $product->id }}" {{ $product->id == $warehouse->product_id ? 'selected' : '' }}>
                                        {{ $product->name }}
                                    </option>
                                    @endforeach
                                    </select>
                                    
                                </div>
                                <div class="input-admin">
                                    <input type="text" name="description" placeholder="Mô tả" value="{{$warehouse ->description }}">
                                </div>
                                <div class="input-admin">
                                    <input type="text" name="name" placeholder="Vị trí" value="{{$warehouse ->name}}">
                                </div>
                                <div class="input-admin">
                                    <input type="text" name="quantity_received" placeholder="Số lượng nhập" value="{{$warehouse -> quantity_received}}">
                                </div>
                                <button style="margin-left: 20px;" class="main-btn" type="submit">Cập nhật </button>
@csrf
                            </div>
                                
</form>

@endsection

    