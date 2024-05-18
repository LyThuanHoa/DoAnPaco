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
                        <li class="productMenu"><a href="/product">SẢN PHẨM</i></a>
                        </li>
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
                    <a href="/cart"><i number="5"><img src="{{asset('frontend/asset/images/cart.png')}}"></i></a>
                    
                </div>
            </div>
        </div>
</header>