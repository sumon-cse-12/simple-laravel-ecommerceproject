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
                                   Blogs
                                </div>
                                <div class="product-sec-arrow-text">
                                    <span>Home</span> <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    <span>All blogs</span>
                                </div>
                            </div>
                        </div>
                </div>           
            </div>
          </div>
    </div>
  <div class="page-devider-sec">

  </div>
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

</section>

@endsection
@section('extra-js')

@endsection