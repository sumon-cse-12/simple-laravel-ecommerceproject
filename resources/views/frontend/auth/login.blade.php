
@extends('frontend.layouts.app')
@section('main-content')


<section class="section-5 pt-3 pb-3 mb-3 bg-white">
    <div class="container">
        <div class="light-font">
            <ol class="breadcrumb primary-color mb-0">
                <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                <li class="breadcrumb-item">Login</li>
            </ol>
        </div>
    </div>
</section>

<section class=" section-10">
    <div class="container">
        <div class="login-form">    
            <form action="{{route('front.authenticate')}}" method="post">
                @csrf
                <h4 class="modal-title">Login to Your Account</h4>
                <div class="form-group">
                    <input type="hidden" name="checkout_process" id="checkout_process">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" value="{{old('password')}}" required="required">
                </div>
                <div class="form-group small">
                    <a href="#" class="forgot-link">Forgot Password?</a>
                </div> 
                <input type="submit" class="btn btn-dark btn-block btn-lg login_btn" value="Login">              
            </form>			
            <div class="text-center small">Don't have an account? <a href="{{route('front.registration')}}">Sign up</a></div>
        </div>
    </div>
</section>
@endsection
@section('extra-js')
<script>
    
    $(document).on("click", ".login_btn", function(e) {
            const checkout_process = window.location.href.split('?')[1];
            $('#checkout_process').val(checkout_process);
        });
</script>
@endsection

