@extends('frontend.layouts.app')

@section('extra-css')
<style>
    .about-us-header-container {
    background: white;
}
.about-us-title-text {
    font-size: 30px;
    font-weight: 600;
    padding: 20px 0px;
    text-align: center;
}
.about-us-first-heading {
    font-size: 20px;
    font-weight: 700;
}
.about-us-first-des {
    margin: 30px 0px;
}
.about-us-content-wrapper {
    margin: 80px 0px;
}
</style>
@endsection
@section('main-content')
<section class="login-main-wrapper">
    <div class="about-us-header-container">
        <div class="product-list-page">
            <div class="container">
                <div class="row ">
                        <div class="col-md-12">
                            <div class="product-banner-heading">
                                <div class="product-list-title">
                                    About
                                </div>
                                <div class="product-sec-arrow-text">
                                    <span>Home</span> <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    <span>About us</span>
                                </div>
                            </div>
                        </div>
                </div>           
            </div>
          </div>
    </div>
    <div class="about-us-content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                        <div class="about-us-content-sec">
                                <div class="about-us-first-heading">
                                    {{isset($about_us_section_data->about_sec_heading_one)?$about_us_section_data->about_sec_heading_one:''}}
                                </div>
                            <div class="about-us-first-des">
                                {!! isset($about_us_section_data->about_sec_des_one)?$about_us_section_data->about_sec_des_one:'' !!}
                            </div>
                        </div>
                </div>
                <div class="col-md-6">
                    <div class="image-sec-about-us">
                        @if (isset($about_us_section_data->about_us_section_img_one) && $about_us_section_data->about_us_section_img_one)
                        <img src="{{asset('uploads/'.$about_us_section_data->about_us_section_img_one)}}" class="about-sec-img-one" alt="">
                        @endif
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
  
</section>
@endsection
@section('extra-js')

@endsection