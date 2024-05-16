@extends('admin.main')
@section('content')
<form action="" enctype="multipart/form-data" method="post">
    
        <div class="input-admin">
            <input type="text" name="name" placeholder="Tên danh mục" value="{{$category -> name}}">
        </div>
        <div class="input-admin">
            <input type="text" name="description" placeholder="Mô tả" value="{{$category -> description}}">
        </div>
        <button style="margin-left: 20px;" class="main-btn" type="submit">Sửa danh mục</button>
@csrf
                            
                                
</form>
<script type="text/javascript" src="{{asset('backend\asset\js\product_ajax.js')}}"></script>
@endsection

    