@extends('main')
@section('content')
<section class="product-detail p-to-top">
    <form id="cart-form" action="/cart/add" method="post">
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
                            <p>{{number_format($product -> price_sale)}}<sup>đ</sup> <span>{{number_format($product -> price_normal)}}<sup>đ</sup></span></p>
                        </div>
                    </div>
                    <p style="margin: 10px 0">Số lượng: {{ $quantityInventory }}</p>
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
                            <button type="submit" class="main-btn" id="add-to-cart">Thêm Vào Giỏ Hàng</button>
                        </div>
                        
                    </div>
                    @if ($quantityInventory == 0)
                        <p style="color: red; font-size: small;">Sản phẩm đã bán hết.</p>
                    @else
                        <div id="error-message" style="color: red; display: none; font-size: small; font-style: italic;">
                            Số lượng không hợp lệ.<br> Vui lòng nhập số lượng nhỏ hơn <span id="max-quantity">{{ $quantityInventory }}</span>.
                        </div>
                    @endif
                </div>
            </div>
            <div class="row-flex row-flex-product-detail">
                <h3>Chi tiết sản phẩm</h3>
            </div>
            <div class="row-flex">
                <div class="product-detail-content">
                    {!!($product -> content)!!}
                </div>
            </div>
        </div>
        @csrf
    </form>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to update cart count
        function updateCartCount(newCount) {
            const cartIcon = document.querySelector('.header-cart i');
            cartIcon.setAttribute('number', newCount);
            console.log("Current count after update: " + newCount);
        }

        // Adding product to cart
        document.querySelector('#add-to-cart').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent form from submitting
            let form = document.getElementById('cart-form');
            let formData = new FormData(form);
            let productQty = formData.get('product_qty');
            let maxQuantity = {{ $quantityInventory }};

            // Validate product quantity
            if (productQty < 1 || productQty > maxQuantity) {
                document.getElementById('error-message').style.display = 'block';
                return;
            } else {
                document.getElementById('error-message').style.display = 'none';
            }

            fetch(form.action, {
                method: form.method,
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    updateCartCount(data.cart_count);
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
</script>
@endsection
