@extends('frontend.layouts.app')
@section('main-content')
{{-- <section class="section-5 pt-3 pb-3 mb-3 bg-white">
    <div class="container">
        <div class="light-font">
            <ol class="breadcrumb primary-color mb-0">
                <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="white-text" href="#">Shop</a></li>
                <li class="breadcrumb-item">{{isset($product->name)?$product->name:''}}</li>
            </ol>
        </div>
    </div>
</section> --}}

<section class="section-7">
    <div class="about-us-header-container">
        <div class="product-list-page">
            <div class="container">
                <div class="row ">
                        <div class="col-md-12">
                            <div class="product-banner-heading">
                                <div class="product-list-title">
                                   Products
                                </div>
                                <div class="product-sec-arrow-text">
                                    <span>Home</span> <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    <span>All Products</span>
                                </div>
                            </div>
                        </div>
                </div>           
            </div>
          </div>
    </div>
  <div class="page-devider-sec">

  </div>
  <div class="all-product-card-sec mt-5">
    <div class="container">
            <div class="row pb-3">
                @if (isset($products) && $products)
                @foreach ($products as $product)
                <div class="col-lg-3 col-6 mt-3">
                    <div class="product-card-sec">
                            <div class="product-image-sec">
                                @if(isset($product->image) && $product->image)
                                @php
                                    $images = json_decode($product->image);
                                    $singleImage = $images[0];
                                @endphp
                               
                                <a href="{{route('front.product',[$product->slug])}}" class="product-img"><img class="img-fluid product-img zoom-effect" src="{{asset('uploads/'.$singleImage->image)}}" alt=""></a>
                                @endif
                                <div class="add-to-cart-section d-none">
                                    <div class="add-to-cart-sec">
                                        <a class="" href="javascript:void(0);" onclick="addToCart({{$product->id}});">
                                            <i class="fa fa-shopping-cart"></i> Add To Cart
                                        </a>
                                    </div>
                                   </div>
                            </div>
                            <div class="product-content-sec">
                                <div class="product-title-sec">
                                    {{isset($product) && $product->name?$product->name:''}}
                                </div>
                                <div class="product-price-sec">
                                    {{isset($product) && $product->discount_price?$product->discount_price:''}}
                                </div>
                                <span class="h6 text-underline"><del>{{isset($product) && $product->regular_price?$product->regular_price:''}}</del></span>
                                <div class="stock-section">
                                    In Stock
                                </div>
                                <div class="buy-now-button">
                                    <a href="href="javascript:void(0);" onclick="addToCart({{$product->id}});"" class="buy-now-btn">Buy Now</a>
                                </div>
                           
                            </div>
                    </div>                                               
                </div>      
                @endforeach
                @endif     
        </div>
    </div>
  </div>
</section>

@endsection
@section('extra-js')

@endsection