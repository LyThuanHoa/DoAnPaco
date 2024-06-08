@extends('main')
@section('content')
<section class="hot-products">
    <div class="container">
        
        <div class="row-grid p-to-top">
            <p class="heading-text">Kết quả tìm kiếm cho từ khóa <a style="font-style: italic;">"{{ $query }}"</a></p>
            <br/>
        </div>
        <div class="row-grid row-grid-hot-products">
            
        @if ($noResults)
            <div class="alert alert-warning" style="width:700px" role="alert">
                Không tìm thấy sản phẩm "{{ $query }}".
            </div>
        @else
            @foreach($products as $product)
                <div class="hot-product-item">
                    <a href="/product/{{$product->id}}"><img src="{{asset($product->image)}}" alt=""></a>
                    <a href="/product/{{$product->id}}"><p>{{$product->name}}</p></a>
                    <span>{{$product->material}}</span>
                    <div class="hot-product-item-price">
                        <p>{{$product->price_normal}}<sup>đ</sup> <span>{{$product->price_sale}}<sup>đ</sup></span></p>
                    </div>
                </div>
            @endforeach
            @endif
        </div>
        
        <!-- Hiển thị phân trang -->
        
        <div class="pagination">
            {{ $products->links() }}
        </div>
    </div>
</section>
@endsection
