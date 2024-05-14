<!DOCTYPE html>
<html lang="en">
<head>
    @include('parts.head')
</head>
<body>
        @include('parts.header')
    <!-- content -->
    @yield('content')
    <!-- Hot product -->

    <br/>
    <!---------San Pham Pho Bien------------->
    <section class="hot-products">
        <div class="container">
            <div class="row-grid">
                <p class="heading-text">Sản Phẩm Phổ Biến</p>
                <br/>
            </div>
            <div class="row-grid row-grid-hot-products">
                <div class="hot-product-item">
                    <a href=""><img src="{{asset('frontend/asset/images/product4.jpg')}}" alt=""></a>
                    <a href=""><p>Khay mứt kẹo tròn bộ 4</p></a>
                    <span>3 màu</span>
                    <div class="hot-product-item-price">
                        <p>500,000<sup>đ</sup> <span>480,000<sup>đ</sup></span></p>
                    </div>
                </div>
                <div class="hot-product-item">
                    <a href=""><img src="{{asset('frontend/asset/images/product3.jpg')}}" alt=""></a>
                    <a href=""><p>Khay mứt kẹo tròn bộ 4</p></a>
                    <span>3 màu</span>
                    <div class="hot-product-item-price">
                        <p>500,000<sup>đ</sup> <span>480,000<sup>đ</sup></span></p>
                    </div>
                </div>
                <div class="hot-product-item">
                    <a href=""><img src="{{asset('frontend/asset/images/product2.jpg')}}" alt=""></a>
                    <a href=""><p>Khay mứt kẹo tròn bộ 4</p></a>
                    <span>3 màu</span>
                    <div class="hot-product-item-price">
                        <p>500,000<sup>đ</sup> <span>480,000<sup>đ</sup></span></p>
                    </div>
                </div>
                <div class="hot-product-item">
                    <a href=""><img src="{{asset('frontend/asset/images/product1.jpg')}}" alt=""></a>
                    <a href=""><p>Khay mứt kẹo tròn bộ 4</p></a>
                    <span>3 màu</span>
                    <div class="hot-product-item-price">
                        <p>500,000<sup>đ</sup> <span>480,000<sup>đ</sup></span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
        @include('parts.footer')
    
</body>
</html>