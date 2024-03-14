@extends('frontend.layouts.app')
@section('main-content')
<section class="section-5 pt-3 pb-3 mb-3 bg-white">
    <div class="container">
        <div class="light-font">
            <ol class="breadcrumb primary-color mb-0">
                <li class="breadcrumb-item"><a class="white-text" href="{{route('front.index')}}">Home</a></li>
                <li class="breadcrumb-item"><a class="white-text" href="{{route('front.products')}}">Products</a></li>
                <li class="breadcrumb-item">{{isset($product->name)?$product->name:''}}</li>
            </ol>
        </div>
    </div>
</section>

<section class="section-7 pt-3 mb-3">
    <div class="container">
        <div class="row ">
            <div class="col-md-5 d-none">
                <div id="product-carousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner bg-light">
                      
                        @php
                            $images = json_decode($product->image);
                           
                        @endphp
                        @foreach ($images as $key => $product_image)
                        <div class="carousel-item {{$key==0?'active':''}}">
                        <div class="product-shop-img">
                            <img class="img-fluid" src="{{asset('uploads/'.$product_image->image)}}" alt="Image">
                        </div>
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-bs-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-bs-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-5 col-12">
                <div class="product-slider">
                    @php
                        $images = json_decode($product->image);
                    @endphp
            
                    @foreach ($images as $product_image)
                        <div class="product-slide">
                            <img class="img-fluid p-img" src="{{ asset('uploads/' . $product_image->image) }}" alt="Product Image">
                        </div>
                    @endforeach
                </div>
            </div>
            
            <div class="col-lg-7 col-12">
                <div class="product-details-card right">
                    <div class="product-details-sec-p-title">
                        {{isset($product->name)?$product->name:''}}
                    </div>
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <small class="fa fa-star"></small>
                            <small class="fa fa-star"></small>
                            <small class="fa fa-star"></small>
                            <small class="fa fa-star-half-o"></small>
                            <small class="fa fa-star-half-o"></small>
                        </div>
                        <small class="pt-1">(99 Reviews)</small>
                    </div>
                    <div class="product-details-del-price">
                        <del> ৳{{isset($product->regular_price)?$product->regular_price:''}}</del>
                    </div>
                    <div class="product-details-price">
                        ৳{{isset($product->discount_price)?$product->discount_price:''}}
                    </div>
                    <p>{!! isset($product->short_description)?$product->short_description:'' !!}</p>
                    <a href="javascript:void(0);" onclick="addToCart({{$product->id}});" class="buy-now-btn"><i class="fa fa-shopping-cart"></i> &nbsp;ADD TO CART</a>
                </div>
            </div>

            <div class="col-md-12 mt-5">
                <div class="bg-light d-none">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="home" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="shipping-tab" data-toggle="tab" href="#shipping" role="tab" aria-controls="home" aria-selected="true">Shipping & Returns</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="home" aria-selected="true">Reviews</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                            <p>
                                {!! isset($product->description)?$product->description:'' !!}
                             </p>
                        </div>
                        <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit, incidunt blanditiis suscipit quidem magnam doloribus earum hic exercitationem. Distinctio dicta veritatis alias delectus quaerat, quam sint ab nulla aperiam commodi. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit, incidunt blanditiis suscipit quidem magnam doloribus earum hic exercitationem. Distinctio dicta veritatis alias delectus quaerat, quam sint ab nulla aperiam commodi. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit, incidunt blanditiis suscipit quidem magnam doloribus earum hic exercitationem. Distinctio dicta veritatis alias delectus quaerat, quam sint ab nulla aperiam commodi.</p>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                      <p>Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div>
            </div> 
        </div>           
    </div>
</section>

@endsection
@section('extra-js')
<script>
    $(document).ready(function(){
        $('.product-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
        });
    });
</script>
@endsection