@extends('admin.main')
@section('content')
<form action="/admin/product/add" enctype="multipart/form-data" method="post">
<div class="admin-content-main-content-product-add">
                            <div class="admin-content-main-content-left">
                                <div class="admin-content-main-content-two-input">
                                    <input type="text" name="name" placeholder="Tên sản phẩm">
                                    <input type="text" name="material" placeholder="Chất liệu">
                                </div>
                                <div class="admin-content-main-content-two-input">
                                    <input type="text" name="name" placeholder="Danh mục">
                                </div>
                                <div class="admin-content-main-content-two-input">
                                    <input type="text" name="price_normal" placeholder="Giá bán">
                                    <input type="text" name="price_sale" placeholder="Giá giảm">
                                </div>
                                <textarea class="editor1" name="description" id="" placeholder="Điểm nổi bật"></textarea>
                                <textarea class="editor2" name="content" id="" placeholder="Mô tả sản phẩm"></textarea>
                                <button class="main-btn" type="submit">Thêm Sản Phẩm</button>
                            </div>
                            <div class="admin-content-main-content-right">
                                <div class="admin-content-main-content-right-image">
                                    <label for="file"><i class="ri-file-image-line"></i> Ảnh Đại Diện</label>
                                    <input id="file" type="file">
                                    <input type="hidden" name="image" id="input-file-img-hiden">
                                    <div class="image-show" id="input-file-img">
    
                                    </div>
                                </div>
                                <div class="admin-content-main-content-right-images">
                                    <label for="files"><i class="ri-file-image-line"></i> Ảnh Sản Phẩm</label>
                                    <input id="files" type="file" multiple>
                                    <div class="images-show" id="input-file-imgs">
                                        
                                    </div>
                                </div>
                            </div>
</div>
@csrf
</form>
<script type="text/javascript" src="{{asset('backend\asset\js\product_ajax.js')}}"></script>
@endsection

    