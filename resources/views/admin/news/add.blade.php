@extends('admin.main')
@section('content')
<form action="/admin/news/add" enctype="multipart/form-data" method="post">
<div class="admin-content-main-content-product-add">
                            <div class="admin-content-main-content-left">
                                <div style="width:500px" class="cart-section-right-input-email">
                                    <input type="text" name="title" placeholder="Tiêu đề">
                                </div>
                                <div class="cart-section-right-input-email">
                                    <input type="text" name="summary" placeholder="Mô tả vắn tắt">
                                </div>
                                <textarea class="editor2" name="content" id="" placeholder="Nội dung"></textarea>
                                
                            </div>
                            <div class="admin-content-main-content-right">
                            <div class="admin-content-main-content-right-image">
                                    <label for="file"><i class="ri-file-image-line"></i> Ảnh Đại Diện</label>
                                    <input id="file" type="file">
                                    <input type="hidden" name="avatar" id="input-file-img-hiden">
                                    <div class="image-show" id="input-file-img">
    
                                    </div>
                                </div>
                                <button class="main-btn" type="submit">Thêm tin tức</button>
                            </div>

</div>
@csrf
</form>
<script type="text/javascript" src="{{asset('backend\asset\js\product_ajax.js')}}"></script>
@endsection

    