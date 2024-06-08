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
                            <p>{{number_format($product -> price_sale)}}<sup>đ</sup> <span>{{number_format($product -> price_normal)}}<sup>đ</sup></span></p>
                        <br/>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="btnXemThem"><a href="/product">>> Xem thêm</a></div>
            <!-- <div class="pagination" style="color: white; background-color: brown; width: fit-content; padding-left: 15px; 
            padding-right: 15px; text-align: center; margin: 0 auto; border-radius: 5px; font-size: large; display: flex; 
            justify-content: center; align-items: center;padding-bottom: 15px">
    {{ $products->links() }}
</div> -->
            </div>
</section>
    <br/>
    <!---------San Pham Pho Bien------------->
    <section class="hot-products">
<div class="container">
            <div class="row-grid">
                <p class="heading-text">Sản Phẩm Cao cấp</p>
                <br/>
            </div>
            <div class="row-grid row-grid-hot-products">
                @foreach($allProducts as $allProduct)
                    <div class="hot-product-item">
                        <a href="/product/{{$allProduct -> id}}"><img src="{{asset($allProduct -> image)}}" alt=""></a>
                        <a href="/product/{{$allProduct -> id}}"><p>{{$allProduct -> name}}</p></a>
                        <span>{{$allProduct -> material}}</span>
                        <div class="hot-product-item-price">
                            <p>{{number_format($allProduct -> price_sale)}}<sup>đ</sup> <span>{{number_format($allProduct -> price_normal)}}<sup>đ</sup></span></p>
                            <br/>
                        </div>
                        
                    </div>
                @endforeach
            </div>
            <div class="btnXemThem"><a href="/product">>> Xem thêm</a></div>
            <!-- <div class="pagination" style="color: white; background-color: brown; width: fit-content; padding-left: 15px; 
            padding-right: 15px; text-align: center; margin: 0 auto; border-radius: 5px; font-size: large; display: flex; 
            justify-content: center; align-items: center;padding-bottom: 15px">
    {{ $allProducts->links() }}
</div> -->
        </div>
</section>
        @include('parts.footer')
    
    
</body>
</html>