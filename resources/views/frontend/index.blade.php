@extends('frontend.layouts.app')
@section('extra-css')
<style>
    .video-sec-bg-img{
        background: url('{{asset('uploads/video-banner-img.png')}}')
    }
    .video-banner-section{
        background-position: 50%;
    background-size: cover;
    height: 100%;
    position: relative;
    }
    .video-banner-section::before {
    position: absolute;
    content: "";
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    height: 100%;
    width: 100%;
    background: #0f5a0f;
    opacity: 0.5;
}
.pulse {
    height: 150px;
    width: 150px;
    background: linear-gradient(#3c8156, #6ac14a);
    position: absolute;
    margin: auto;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    border-radius: 50%;
    display: grid;
    place-items: center;
    font-size: 50px;
    color: #ffffff;
}
.pulse:before, .pulse:after {
    content: "";
    position: absolute;
    height: 100%;
    width: 100%;
    background-color: #186c35;
    border-radius: 50%;
    z-index: 8;
    opacity: 0.7;
}

.pulse:before{
    animation: pulse 2s ease-out infinite;
}
.pulse:after{
    animation: pulse 2s 2s ease-out infinite;
}
@keyframes pulse{
    100%{
        transform: scale(1.5);
        opacity: 0;
    }
}
.video-play-button-sec {
    cursor: pointer;
}
.video-section-wrapper {
    position: relative;
    padding: 200px 0px;
}
.video-sec-title {
    font-size: 35px;
    font-weight: 600;
    color: #fff;
}
.video-sec-text-des {
    margin: 20px 0px;
    font-size: 20px;
    font-weight: 500;
    color: #fff;
}
.video-play-button-sec {
    cursor: pointer;
    padding: 100px;
    position: relative;
} 
      .main-banner-section {
        padding: 6em 0 8em 0;
        text-align: center;
      width: 100%;
      background-image: url('uploads/video-banner-img.png');
      background-repeat: no-repeat;
      background-size: cover;
      box-shadow: inset 0 0 0 2000px rgba(0,0,0,0.5);
    }

</style>
@endsection
@section('main-content')
@php 
$app_section = get_settings('app_section')?json_decode(get_settings('app_section')):''; 
@endphp
    <div class="main-banner-section">
        <div class="custom-border"> </div>
            <div class="main-banner-content-sec">
                <div class="main-banner-title-sec">
                    {{isset($app_section->banner_heading)?$app_section->banner_heading:''}}
                </div>
                <div class="main-banner-des-sec">
                    {{isset($app_section->banner_short_description)?$app_section->banner_short_description:''}}
                </div>
                <div class="main-banner-button-sec">
                    <a href="{{route('front.products')}}"class="btn btn-primary">Shop Now</a>
                </div>
            </div>
        <div class="custom-border border-bottom"> </div>
    </div>
    <section class="section-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="box shadow-lg">
                        <div class="fa icon fa-check text-primary m-0 mr-3"></div>
                        <h2 class="font-weight-semi-bold m-0">Quality Product</h2>
                    </div>                    
                </div>
                <div class="col-lg-3 col-6">
                    <div class="box shadow-lg">
                        <div class="fa icon fa fa-truck text-primary m-0 mr-3"></div>
                        <h2 class="font-weight-semi-bold m-0">Free Shipping</h2>
                    </div>                    
                </div>
                <div class="col-lg-3 col-6">
                    <div class="box shadow-lg">
                        <div class="fa icon fa fa-random text-primary m-0 mr-3"></div>
                        <h2 class="font-weight-semi-bold m-0">14-Day Return</h2>
                    </div>                    
                </div>
                <div class="col-lg-3 col-6">
                    <div class="box shadow-lg">
                        <div class="fa icon fa fa-phone-square text-primary m-0 mr-3"></div>
                        <h2 class="font-weight-semi-bold m-0">24/7 Support</h2>
                    </div>                    
                </div>
            </div>
        </div>
    </section>
    <section class="section-3">
        <div class="container">
            <div class="section-title">
                <h2>Categories</h2>
            </div>           
            <div class="row pb-3">
    
              @if (isset($categories) && $categories)
                    @foreach ($categories as $category)
                    {{-- <div class="col-2 d-none">
                        <a href="{{route('front.shop',$category->slug)}}">
                            <div class="cat-card">
                                <div class="left">
                                    <img src="{{asset('uploads/'.$category->image)}}" alt="" class="category-img">
                                </div>
                                <div class="right">
                                    <div class="cat-data">
                                       <h2>{{isset($category) && $category->name?$category->name:''}}</h2> 
                                        <p>100 Products</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div> --}}
    
                    <div class="col-lg-4 col-6 mt-3">
                        <div class="category-card-sec">
                            <a href="#">
                                <div class="category-contnet">
                                    <div class="category-content-wrapper">
                                        <div class="category-text-sec">
                                           {{isset($category) && $category->name?$category->name:''}}
                         
                                        </div>
                                        <div class="category-under-line-effect">
    
                                        </div>
                                        <div class="number-of-product">
                                            @if ($category->products_count>1)
                                            {{$category->products_count}} Iitems
                                            @else
                                            {{$category->products_count}} Iitem
                                            @endif
                                          
                                        </div>
                                    </div>
                                    <div class="category-img">
                                       <img src="{{asset('uploads/'.$category->image)}}" alt="" class="category-img">
                                     
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                 @endforeach
           @endif
            </div>
        </div>
    </section>

    <section class="section-4 pt-5">
        <div class="container">
            <div class="section-title">
                <h2>Featured Products</h2>
            </div>    
            <div class="row pb-3 mt-3">
                 @if (isset($feature_products) && $feature_products)
                @foreach ($feature_products as $feature_product)
                <div class="col-lg-3  col-12 mt-3">
                    <div class="product-card-sec">
                            <div class="product-image-sec">
                              @if(isset($feature_product->image) && $feature_product->image)
                                @php
                                    $images = json_decode($feature_product->image);
                                    $singleImage = $images[0];
                                @endphp
                               
                                <a href="#" class="product-img"><img class="img-fluid product-img zoom-effect" src="images/17092973890.png" alt=""></a>
                                 <a href="{{route('front.product',[$feature_product->slug])}}" class="product-img"><img class="img-fluid product-img zoom-effect" src="{{asset('uploads/'.$singleImage->image)}}" alt=""></a
                                 @endif -->
                                 <div class="add-to-cart-section d-none">
                                    <div class="add-to-cart-sec">
                                        <a class="" href="javascript:void(0);" onclick="addToCart({{$feature_product->id}});">
                                            <i class="fa fa-shopping-cart"></i> Add To Cart
                                        </a>
                                    </div>
                                   </div>
                            </div>
                            <div class="product-content-sec">
                                <div class="product-title-sec">
                                   @if (isset($feature_product->name) && $feature_product->name)
                                     @php
                                         $product_name = substr($feature_product->name,0,60);
                                     @endphp   
                                      {{$product_name}}
                                    @endif
                                   
                                   
                                </div>
                                <div class="product-price-sec">
                        
                                    ৳{{isset($feature_product) && $feature_product->discount_price?$feature_product->discount_price:''}} 
                                </div>
                               <span class="product-price-sec-del text-underline"><del> ৳{{isset($feature_product) && $feature_product->regular_price?$feature_product->regular_price:''}}</del></span>
                             
                                <div class="stock-section">
                                    In Stock
                                </div>
                                <div class="buy-now-button">
                                    <a href="javascript:void(0);" onclick="addToCart({{$feature_product->id}});"  class="buy-now-btn">Add to cart</a>
                                </div>
                            </div>
                    </div>                                               
                </div>      
              @endforeach
                @endif  
               
                
           
            </div>
        </div>
    </section>


<section class="section-4 video-banner-section video-sec-bg-img d-none">
<div class="video-section-wrapper">

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="video-sec-description">
                    <div class="video-sec-title">
                        Lorem ipsum dolor sit amet, consectetur adipisicing.
                    </div>
                    <div class="video-sec-text-des">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Modi harum eius reprehenderit enim architecto quod.
                    </div>
                    <div class="video-sec-btn">
                        <a href="#" class="btn btn-outline-primary text-white">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <h4>hello</h4>
                {{-- <div class="video-play-button-sec">
                    <div class="pulse">
                        <i class="fa fa-play-circle"></i>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
</section>

{{-- <div class="background">
    <h3>hrlll</h3>
</div> --}}

<section class="section-4 pt-5 ">
    <div class="container">
        <div class="section-title">
            <h2>Latest Produsts</h2>
        </div>    
        <div class="row pb-3 mt-3">
            @if (isset($best_selling_products) && $best_selling_products)
           @foreach ($best_selling_products as $best_selling_product)
           <div class="col-lg-3  col-6 mt-3">
               <div class="product-card-sec">
                       <div class="product-image-sec">
                         @if(isset($best_selling_product->image) && $best_selling_product->image)
                           @php
                               $images = json_decode($best_selling_product->image);
                               $singleImage = $images[0];
                           @endphp
                          
                           <a href="#" class="product-img"><img class="img-fluid product-img zoom-effect" src="images/17092973890.png" alt=""></a>
                            <a href="{{route('front.product',[$best_selling_product->slug])}}" class="product-img"><img class="img-fluid product-img zoom-effect" src="{{asset('uploads/'.$singleImage->image)}}" alt=""></a
                            @endif -->
                            <div class="add-to-cart-section d-none">
                               <div class="add-to-cart-sec">
                                   <a class="" href="javascript:void(0);" onclick="addToCart({{$best_selling_product->id}});">
                                       <i class="fa fa-shopping-cart"></i> Add To Cart
                                   </a>
                               </div>
                              </div>
                       </div>
                       <div class="product-content-sec">
                           <div class="product-title-sec">
                              @if (isset($best_selling_product->name) && $best_selling_product->name)
                                @php
                                    $product_name = substr($best_selling_product->name,0,60);
                                @endphp   
                                 {{$product_name}}
                               @endif
                              
                              
                           </div>
                           <div class="product-price-sec">
                   
                               ৳{{isset($best_selling_product) && $best_selling_product->discount_price?$best_selling_product->discount_price:''}} 
                           </div>
                          <span class="product-price-sec-del text-underline"><del> ৳{{isset($best_selling_product) && $best_selling_product->regular_price?$best_selling_product->regular_price:''}}</del></span>
                        
                           <div class="stock-section">
                               In Stock
                           </div>
                           <div class="buy-now-button">
                               <a href="javascript:void(0);" onclick="addToCart({{$best_selling_product->id}});" class="buy-now-btn">Add to cart</a>
                           </div>
                       </div>
               </div>                                               
           </div>      
         @endforeach
           @endif  
          
           
        
        </div>
    </div>
</section>
<section>
    <div class="blog-sec-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Latest Blog</h2>
                    </div>    
                </div>
            </div>
            <div class="row">
              @if (isset($blogs) && $blogs)
                    @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-12 mt-3">
                        <div class="blog-card">
                            <a href="{{route('front.blog.details',['url'=>$blog->url])}}" class="blog-card-contnet">
                                <div class="blog-image">
                                     <img src="{{asset('uploads/'.$blog->image)}}" class="blog-img zoom-effect" alt="">
                                </div>
                                <div class="blog-content">
                                    <div class="blog-published-sec d-flex">
                                        <div class="blog-published-by">
                                            <i class="fa fa-user"></i>  Admin
                                        </div>
                                        <div class="blog-published-date mx-5">
                               
                                          <i class="fas fa-calendar-alt"></i> {{isset($blog->created_at)?$blog->created_at:''}}
                                        </div>
                                    </div>
                                    <div class="blog-title">
                                   @php
                                            $title = strip_tags($blog->title);
                                            $max_length = 40;
                                            $ellipsis = '...'; // or you can use an icon here
                                            $truncated_title = mb_substr($title, 0, $max_length);
                                            if (mb_strlen($title, 'UTF-8') > $max_length) {
                                                $truncated_title = mb_substr($truncated_title, 0, mb_strrpos($truncated_title, ' ', 0, 'UTF-8'));
                                                $truncated_title .= $ellipsis; // or icon HTML
                                            }
                                        @endphp
                                        {{ $truncated_title }}
                                   
                                    </div>
                                    
                                        <div class="blog-des-sec">
                                            @php
                                                $description = strip_tags($blog->description);
                                                $max_length = 170;
                                                $ellipsis = '... read more';
                                                $truncated_description = mb_substr($description, 0, $max_length);
                                                if (mb_strlen($description, 'UTF-8') > $max_length) {
                                                    $truncated_description = mb_substr($truncated_description, 0, mb_strrpos($truncated_description, ' ', 0, 'UTF-8'));
                                                    $truncated_description .= $ellipsis;
                                                }
                                            @endphp 
                                            {{ $truncated_description }}
                                          
                                        </div>
                                        
                                        
                              
                                </div>
                            </a>
                        </div>
                    </div>
                  @endforeach
                @endif
               
            </div>
        </div>
    </div>
</section>
<section class="newsletter-section">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="subscriber-section">
                    <div class="subscriber-text">
                        Subscribe to the us New Arrivals
                            & Other Information.
                    </div>
                    <div class="under-line-effect">

                    </div>
                 <div class="row">
                    <div class="col-md-6 m-auto">
                        <form action="">
                           <div class="row align-items-center">
                            <div class="col-md-10 mt-3">
                                <div class="form-group">
                                    <input type="email" class="form-control  cs-form-input-control" name="email" placeholder="Enter Your Email Address *">
                                   </div>
                            </div>
                            <div class="col-md-2">
                                <button class="contact-us-btn">Subscribe</button>
                            </div>
                          
                        </form>
                    </div>
                    </div>
                 </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection