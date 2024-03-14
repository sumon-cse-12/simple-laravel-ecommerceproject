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
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="about-us-main-head-sec">
                        <div class="about-us-title-text">
                           No Data Available
                        </div>
                    </div>
                </div>
            </div>
       
        </div>
    </div>
  
</section>
@endsection
@section('extra-js')

@endsection