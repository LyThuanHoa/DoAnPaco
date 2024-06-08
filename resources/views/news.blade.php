@extends('main')
@section('content')

<section class="product-detail p-to-top">
    <div class="container" style="display: flex; width:1000px">
        <div class="new_main">
            @php
                $count = 0;
            @endphp

            @foreach($news as $value)
                @if($count == 0)
                    <h1 style="text-align:center; margin:15px; font-weight:500; color:brown">{{$value->title}}</h1>
                    <div class="row-flex">
                        <div class="product-detail-content">
                            {!! $value->content !!}
                        </div>
                    </div>
                    @php
                        $count++;
                    @endphp
                @else
                    @break
                @endif
            @endforeach
        </div>
    </div>
</section>

<section class="hot-products p-to-top">
    <div class="container">
        <div class="row-grid">
            <p class="heading-text">Tin Tức Mới</p>
            <br/>
        </div>
        <div class="row-grid row-grid-hot-products">
            @foreach($news as $value)
                <div class="hot-product-item">
                    <img style="width: 100%; margin-top:5px" src="{{ asset($value->avatar) }}" alt="">
                    <a href="{{ route('news.show', $value->id) }}">
                        <p>{{$value->title}}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script src="{{ asset('backend/asset/ckeditor5/ckeditor.js') }}"></script>
<script src="{{ asset('backend/asset/ckeditor5/script.js') }}"></script>
@endsection
