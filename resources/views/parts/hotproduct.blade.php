

<section class="hot-products">
<div class="container">
            <div class="row-grid">
                <p class="heading-text">Sản Phẩm Mới</p>
                <br/>
            </div>
            <div class="row-grid row-grid-hot-products">
                @foreach($products as $product)
                    <div class="hot-product-item">
                        <a href=""><img src="{{asset('frontend/asset/images/product1.jpg')}}" alt=""></a>
                        <a href=""><p>Khay mứt kẹo tròn bộ 4</p></a>
                        <span>3 màu</span>
                        <div class="hot-product-item-price">
                            <p>500,000<sup>đ</sup> <span>480,000<sup>đ</sup></span></p>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
</section>