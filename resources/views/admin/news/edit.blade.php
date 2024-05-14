@extends('admin.main')
@section('content')
<form action="" enctype="multipart/form-data" method="post">
<div class="admin-content-main-content-product-add">
                            <div class="admin-content-main-content-left">
                                <div style="width:500px" class="cart-section-right-input-email">
                                    <input type="text" name="title" placeholder="Tiêu đề" value="{{$news -> title}}">
                                </div>
                                <div class="cart-section-right-input-email">
                                    <input type="text" name="summary" placeholder="Mô tả vắn tắt" value="{{$news -> summary}}">
                                </div>
                                <textarea class="editor2" name="content" id="" placeholder="Nội dung" >{{$news -> content}}</textarea>
                                
                            </div>
                            <div class="admin-content-main-content-right">
                            <div class="admin-content-main-content-right-image">
                                    <label for="file"><i class="ri-file-image-line"></i> Ảnh chính</label>
                                    <input id="file" type="file">
                                    <input type="hidden" name="avatar" value="{{$news-> avtar}}" id="input-file-img-hiden">
                                    <div class="image-show" id="input-file-img">
                                        <img src="{{asset($news-> avatar)}}" alt="">
                                    </div>
                                </div>
                                <button class="main-btn" type="submit">Cập nhật tin tức</button>
                            </div>

</div>
@csrf
</form>
<script type="text/javascript" src="{{asset('backend\asset\js\product_ajax.js')}}"></script>
@endsection

    