@extends('main')
@section('content')
<section class="product-detail p-to-top">
    <div class="container">
        <div class="row-flex row-flex-product-detail">
            <p>Sản Phẩm Mới</p>
            <i> > </i>
            <p>Khay mứt kẹo tròn bộ 4</p>
        </div>
        <div class="row-grid">
            <div class="product-detail-left">
                <img class="main-image" src="{{asset('frontend/asset/images/product1.1.jpg')}}" alt="">
                <div class="product-images-items">
                    <img class="active" src="{{asset('frontend/asset/images/product1.1.jpg')}}" alt="">
                    <img src="{{asset('frontend/asset/images/product1.2.jpg')}}" alt="">
                    <img src="{{asset('frontend/asset/images/product1.3.jpg')}}" alt="">
                </div>
            </div>
            <div class="product-detail-right">
                <div class="product-detail-right-infor">
                    <h1>Bộ mặt trời sứ Bát Tràng </h1>
                    <span>3 màu</span>
                    <div class="hot-product-item-price">
                        <p>1,550,000<sup>đ</sup> <span>1,600,000<sup>đ</sup></span></p>
                    </div>
                </div>
                <div class="product-detail-right-des">
                    <h3>Thông tin sản phẩm</h3>
                    <ul>
                        <p>Bao gồm: </p>
                        <li>6 Cánh </li>
                        <li>01 Tô chính giữa</li>
                        <li>06 Bát cơm</li>
                        <li>01 Đĩa muối</li>
                        <li>01 Bát mắm</li>
                        <li>Khay tre ép</li>
                    </ul>
                </div>
                <div class="add-to-cart">
                    <div class="product-detail-right-quantity">
                        <h3>Số lượng: </h3>
                        <div class="product-detail-right-quantity-input">
                            <i class="ri-checkbox-indeterminate-fill"></i>
                            <input class="quantity-input" type="number" value="1" onkeydown="return false"/>
                            <i class="ri-add-box-fill"></i>
                        </div>
                    </div>
                    <div class="product-detail-right-addcart">
                        <button class="main-btn">Thêm Vào Giỏ Hàng</button>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="row-flex">
            <div class="product-detail-content">
                <h2>Chi tiết sản phẩm</h2>
                <p>Họa tiết Nền trắng ngà của men kem trang nhã, đơn giản xen kẽ hoa đào hồng tinh tế phù hợp với mọi không gian. Hiện nay bát đĩa hoa mặt trời đang là dòng sản phẩm được đa số các bà các mẹ cùng chị em nội trợ yêu thích và tin dùng bởi sự đa dạng, sáng tạo trong khâu thiết kế, cùng hoa văn, họa tiết, màu sắc tươi sáng phong phú. </p>
                <img style="width: 300px;" src="{{asset('frontend/asset/images/product1.2.jpg')}}" alt="">
            </div>
        </div>
    </div>
    
</section>
@endsection