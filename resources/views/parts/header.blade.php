<header>
<div class="container">
    <div class="row-flex">
        <div class="header-bar-icon">
            <i class="ri-menu-line"></i>
        </div>
        <div class="header-logo">
            <a href="/"><img src="{{asset('frontend/asset/images/logo.png')}}" alt=""></a>
        </div>
        <div class="header-logo-mobile">
            <img src="{{asset('frontend/asset/images/logo_1.png')}}" alt="">
        </div>
        <div class="header-nav">
            <nav>
                <ul>
                    <li class="productMenu"><a href="/product">SẢN PHẨM</a></li>
                    <li><a href="/book/add">ĐẶT LỊCH NẶN GỐM</a></li>
                    <li><a href="/news">GIỚI THIỆU</a></li>
                </ul>
            </nav>
        </div>
        <div class="header-search">
            <form action="{{ route('product.search') }}" method="GET">
                <input type="text" name="query" placeholder="Tìm kiếm">
                <button type="submit">
                    <img src="{{ asset('frontend/asset/images/search.png') }}">
                </button>
            </form>
        </div>
        <div class="header-cart">
            <a href="/cart"><i number="0"><img src="{{asset('frontend/asset/images/cart.png')}}"></i></a>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to update cart count
        function updateCartCount(newCount) {
            const cartIcon = document.querySelector('.header-cart i');
            cartIcon.setAttribute('number', newCount);
        }

        // Fetch cart count on page load
        fetch('/cart/count')
            .then(response => response.json())
            .then(data => {
                updateCartCount(data.cart_count);
            })
            .catch(error => console.error('Error:', error));
    });
</script>
</header>
