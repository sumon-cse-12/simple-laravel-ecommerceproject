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
                            <span>Page</span>
                        </div>
                    </div>
                </div>
        </div>           
    </div>
  </div>
  <div class="page-devider-sec">

  </div>

</section>

@endsection
@section('extra-js')

@endsection