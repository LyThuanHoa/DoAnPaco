@extends('main')
@section('content')
<section class="product-detail p-to-top">
    <form action="/cart/add" method="post">
        <div class="container">
            <div class="row-flex row-flex-product-detail">
                <p>Sản Phẩm Mới</p>
                <i> > </i>
                <p>{{$product -> name}}</p>
            </div>
            <div class="row-grid">
                <div class="product-detail-left">
                    <img class="main-image" src="{{asset($product -> image)}}" alt="">
                    <div class="product-images-items">
                        @php
                            $product_images = explode('*', $product -> images);
                        @endphp

                        @foreach($product_images as $product_image)
                            <img src="{{asset($product_image)}}" alt="">
                        @endforeach
                    </div>
                </div>
                <div class="product-detail-right">
                    <div class="product-detail-right-infor">
                        <h1>{{$product -> name}}</h1>
                        <span>{{$product -> material}}</span>
                        <div class="hot-product-item-price">
                            <p>{{$product -> price_sale}}<sup>đ</sup> <span>{{$product -> price_normal}}<sup>đ</sup></span></p>
                        </div>
                    </div>
                    <h3>Đặc điểm nổi bật</h3>
                    <div class="product-detail-right-des">
                        {!!$product -> description!!}
                    </div>
                    <div class="add-to-cart">
                        <div class="product-detail-right-quantity">
                            <h3>Số lượng: </h3>
                            <div class="product-detail-right-quantity-input">
                                <i class="ri-checkbox-indeterminate-fill"></i>
                                <input onKeyDown="return false" class="quantity-input" type="number" value="1"  name="product_qty"/>
                                <input type="hidden" value="{{$product -> id}}" name="product_id"/>
                                <i class="ri-add-box-fill"></i>
                            </div>
                        </div>
                        <div class="product-detail-right-addcart">
                            <button type="submit" class="main-btn">Thêm Vào Giỏ Hàng</button>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <div class="row-flex row-flex-product-detail">
                <h3>Chi tiết sản phẩm</h3>
            </div>
            <div class="row-flex">
                <div class="product-detail-content">
                {!!($product -> content)!!}
        </div>
    @csrf
    </form>
        </div>
    </div>
    
</section>
@endsection