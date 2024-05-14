@extends('main')
@section('content')
<section class="product-detail p-to-top">
        <div class="container">
        @foreach($news as $value)
        <h1>{{$value -> title}}</h1>
        <div>{{$value -> summary}}</div>
        
        <div class="row-flex">
                <div class="product-detail-content">
                {!!($value -> content)!!}
        </div>
    @endforeach
    </div>
    
</section>
<script src="{{asset('backend\asset\ckeditor5\ckeditor.js')}}"></script>
<script src="{{asset('backend\asset\ckeditor5\script.js')}}"></script>
@endsection
