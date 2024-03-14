@extends('frontend.layouts.app')

@section('extra-css')
<style>


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
.contact-us-sec-wrapper {
    padding: 20px;
}
.form-card {
    border: 1px solid #e3e3e3;
    border-radius: 4px;
    box-shadow: rgb(118 161 62 / 18%) 0px 15px 25px, rgb(218 234 197 / 63%) 0px 5px 10px;
}
button.contact-us-btn {
    background: #76a13e;
    border: none;
    color: #fff;
    border-radius: 4px;
    padding: 10px 15px;
    cursor: pointer;
    font-family: monospace;
    font-size: 18px;
}
</style>
@endsection
@section('main-content')
@php
    $app_section = get_settings('app_section') ? json_decode(get_settings('app_section')) : '';
@endphp
<section class="login-main-wrapper">
    <div class="about-us-header-container">
        <div class="product-list-page">
            <div class="container">
                <div class="row ">
                        <div class="col-md-12">
                            <div class="product-banner-heading">
                                <div class="product-list-title">
                                    Contact Us
                                </div>
                                <div class="product-sec-arrow-text">
                                    <span>Home</span> <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    <span>Contact Us</span>
                                </div>
                            </div>
                        </div>
                </div>           
            </div>
          </div>
    </div>
    <div class="contact-us-section-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="form-card">
                        <form action="{{route('front.contact.us.store')}}" method="POST">
                            @csrf
                            <div class="contact-us-sec-wrapper">
                            <div class="contact-us-title">
                                Send Your Valuable Message
                            </div>
                            <div class="send-message-form-sec">
                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <div class="form-group">
                                            <label class="contact-us-label" for="name">Name</label>
                                         <input type="text" class="form-control  cs-form-input-control" name="name" placeholder="Name *">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="form-group">
                                            <label class="contact-us-label" for="name">Your Email</label>
                                         <input type="text" class="form-control  cs-form-input-control" name="email" placeholder="Email Address *">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label class="contact-us-label" for="name">Subject</label>
                                         <input type="text" class="form-control  cs-form-input-control" name="subject" placeholder="Subject *">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label class="contact-us-label" for="name">Message</label>
                                            <textarea id="" cols="6" rows="6" class="form-control  custom-form-text-area-control" name="message" placeholder="Your Message *"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="button-sec-contact-us">
                                           <button type="submit" class="contact-us-btn">Send Message</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="contact-info-sec-wrapper">
                            <div class="contact-info">
                                Get In Touch
                            </div>
                            <div class="text-line-devider">
    
                            </div>
                        <div class="contact-info-sec-details-address">
                          <div class="contact-info-details-content">
                            <div class="contact-info-title">
                                Office Address
                            </div>
                            <div class="contact-info-value">
                                {{isset($app_section->contact_address)?$app_section->contact_address:''}}
                            </div>
                          </div>
                          <div class="contact-info-details-content">
                            <div class="contact-info-title">
                                Contact Number
                            </div>
                            <div class="contact-info-value">
                                {{isset($app_section->phone_number)?$app_section->phone_number:''}}
                            </div>
                          </div>
                          <div class="contact-info-details-content">
                            <div class="contact-info-title">
                                Email contact_address
                            </div>
                            <div class="contact-info-value">
                                {{isset($app_section->email_address)?$app_section->email_address:''}}
                            </div>
                          </div>
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