<!DOCTYPE html>
<html lang="en">
<head>
    @include('parts.head')
</head>
<body>
    
        @include('parts.header')

    <section class="slider">
        <div class="slider-items">
            <div class="slider-item">
                <img src="{{asset('frontend/asset/images/banner1.png')}}" alt="">
            </div>
            <div class="slider-item">
                <img src="{{asset('frontend/asset/images/banner2.png')}}" alt="">
            </div>
            <div class="slider-item">
                <img src="{{asset('frontend/asset/images/banner3.png')}}" alt="">
            </div>
        </div>
        <div class="slider-arrow">
            <i class="ri-arrow-left-s-line"></i>
            <i class="ri-arrow-right-s-line"></i>
        </div>
    </section>
    <!-- Hot product -->
    <!-- @include('parts.hotproduct') -->
    

<section class="hot-products">
<div class="container">
            <div class="row-grid">
                <p class="heading-text">Sản Phẩm Mới</p>
                <br/>
            </div>
            <div class="row-grid row-grid-hot-products">
                @foreach($products as $product)
                    <div class="hot-product-item">
                        <a href="/product/{{$product -> id}}"><img src="{{asset($product -> image)}}" alt=""></a>
                        <a href="/product/{{$product -> id}}"><p>{{$product -> name}}</p></a>
                        <span>{{$product -> material}}</span>
                        <div class="hot-product-item-price">
                            <p>{{$product -> price_normal}}<sup>đ</sup> <span>{{$product -> price_sale}}<sup>đ</sup></span></p>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
</section>
    <br/>
    <!---------San Pham Pho Bien------------->
    <section class="hot-products">
<div class="container">
            <div class="row-grid">
                <p class="heading-text">Sản Phẩm Phổ Biến</p>
                <br/>
            </div>
            <div class="row-grid row-grid-hot-products">
                @foreach($products as $product)
                    <div class="hot-product-item">
                        <a href="/product/{{$product -> id}}"><img src="{{asset($product -> image)}}" alt=""></a>
                        <a href="/product/{{$product -> id}}"><p>{{$product -> name}}</p></a>
                        <span>{{$product -> material}}</span>
                        <div class="hot-product-item-price">
                            <p>{{$product -> price_normal}}<sup>đ</sup> <span>{{$product -> price_sale}}<sup>đ</sup></span></p>
                        </div>
                        
                    </div>
                @endforeach
                
            </div>
        </div>
</section>
        @include('parts.footer')
    
    
</body>
</html>