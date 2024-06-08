@extends('main')
@section('content')

<section class="product-detail p-to-top">
    <div class="container" style="width:1000px">
        <h1 style="text-align:center; margin:15px; font-weight:500; color:brown">{{ $news->title }}</h1>
        <div class="row-flex">
            <div class="product-detail-content">
                {!! $news->content !!}
            </div>
        </div>
    </div>
</section>

@endsection
