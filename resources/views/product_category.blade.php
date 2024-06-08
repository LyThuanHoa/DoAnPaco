@extends('main')
@section('content')
<section class="hot-products">
    <div class="container">
        <div class="row-grid" style="display: flex; margin-top:70px; background-color: brown; color:aliceblue;height:35px;text-align:center; align-items: center;text-transform:uppercase;padding-left:10px">
            @foreach($categories as $cat)
                <a href="{{ url('/product_list/' . $cat->id) }}" style="margin-right: 10px; color: white;">{{ $cat->name }}</a>
            @endforeach
        </div>
        <div class="row-grid">
            <p class="heading-text">{{ $category->name }}</p>
            <br/>
        </div>
        <div class="row-grid row-grid-hot-products">
            @foreach($products as $product)
                <div class="hot-product-item">
                    <a href="{{ url('/product/' . $product->id) }}"><img src="{{ asset($product->image) }}" alt=""></a>
                    <a href="{{ url('/product/' . $product->id) }}"><p>{{ $product->name }}</p></a>
                    <span>{{ $product->material }}</span>
                    <div class="hot-product-item-price">
                        <p>{{number_format($product->price_sale)}}<sup>đ</sup> <span>{{number_format($product->price_normal) }}<sup>đ</sup></span></p>
                        
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Hiển thị phân trang -->
        
    </div>
</section>
@endsection
