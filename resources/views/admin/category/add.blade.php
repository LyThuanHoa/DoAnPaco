@extends('admin.main')
@section('content')
<form action="/admin/category/add" enctype="multipart/form-data" method="post">
                            <div class="container">
                            <div class="input-admin">
                                    <input type="text" name="name" placeholder="Tên danh mục">
                                </div>
                                <div class="input-admin">
                                    <input type="text" name="description" placeholder="Mô tả">
                                </div>
                           
                           
                                <button style="margin-left: 20px;" class="main-btn" type="submit">Thêm danh mục</button>
@csrf
                            </div>
                                
</form>
<script type="text/javascript" src="{{asset('backend\asset\js\product_ajax.js')}}"></script>
@endsection

    