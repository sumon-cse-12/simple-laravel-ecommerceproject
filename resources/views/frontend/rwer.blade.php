<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Hello new ecommerce</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/ion.rangeSlider.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/ion.rangeSlider.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/slick-theme.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/video-js.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.min.css') }}" />
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}" /> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/custom.css') }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('backend/plugins/toastr/toastr.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;500&family=Raleway:ital,wght@0,400;0,600;0,800;1,200&family=Roboto+Condensed:wght@400;700&family=Roboto:wght@300;400;700;900&display=swap"
        rel="stylesheet">
    <!-- Fav Icon -->
    @yield('extra-css')

</head>
@php 
$app_section = get_settings('app_section')?json_decode(get_settings('app_section')):''; 
@endphp
<body >
    <div class="top-header-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-12 text-center">
                    <div class="app-logo-sec">
                        <a href="{{route('front.index')}}" class="text-decoration-none">
                            <!-- @if(get_settings('app_logo')) -->
                            <img src="images/Untitled design (5).png" class="logo-img" alt="">
                            <!-- <img src="{{asset('uploads/'.get_settings('app_logo'))}}" class="logo-img" alt="logo"> -->
                           <!-- @endif -->
                        </a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <form action="" method="get">
                    <!-- <form action="{{route('front.search.product')}}" method="get"> -->
                    <div class="search">
                        <input type="text" class="searchTerm" name="name" placeholder="Search For Products">
                        <button type="submit" class="searchButton">
                            <i class="fa fa-search" aria-hidden="true"></i>
                       </button>
                     </div>
                    </form>
                </div>
                <div class="col-lg-2 col-6">
                    <span class="pn-number"> <i class="fa fa-phone "></i>7567567</span>
                    <!-- <span class="pn-number"> <i class="fas fa-phone "></i>{{isset($app_section->phone_number)?$app_section->phone_number:''}}</span> -->
                  </div>
                  <div class="col-lg-2 col-6 text-right">
                      <span class="cart-icon-sec">
                         <a href="#" class="cart-item-link">  <i class="fa fa-shopping-cart shopping-cart-icon" aria-hidden="true"></i>
                          <span class="cart-item-number">0</span></a>
                      </span>
                      <div class="right-nav py-0">
                        <a href="{{ route('front.cart') }}" class="ml-3 d-flex pt-2">
                            @php
    
                            $total_item = 0;
                        
                            if (session()->has('cart')) {
                        
                                // Key exists, proceed to get the value
                        
                                $carts = session()->get('cart');
                        
                                if (isset($carts) && $carts) {
                        
                                    foreach ($carts as $key => $cart) {
                        
                                        $total_item = $total_item + $cart['quantity'];
                        
                                    }
                        
                                }
                        
                            }
                        
                        @endphp
                            <i class="fas fa-shopping-cart text-primary">{{ isset($total_item) ? $total_item : 0 }}</i>
                        </a>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    <div class="header-section-bg">
        <div class="nav-section">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('front.index')}}" title="Products">Home</a>
                             </li>
                             <li class="nav-item">
                               <a class="nav-link"  href="{{route('front.products')}}" title="Products"> Products</a>
         
                            </li>
                            <li class="nav-item">
                               <a class="nav-link" href="{{route('front.about')}}" title="About us">About Us</a>
                       
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  href="{{route('front.contact')}}" title="About us">Contact Us</a>
                        
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{route('front.blogs')}}" title="Blogs">Blogs</a> 
                         
                            </li>
                          </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
        @yield('main-content')

        <div class="footer-section mt-5 ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="company-address">
                            <h4>Company Name</h4>
                            <div class="short-des-company">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam nesciunt optio beatae consequuntur impedit voluptas obcaecati labore est, provident voluptatibus.
                            </div>
                            <ul>
                                <li><a href="#" title="Facebook"><span><i class="fab fa-facebook social-icon" aria-hidden="true"></i>
                                </span>Facebook</a></li>
                                <li><a href="#" title="Instagram"><span><i class="fab fa-instagram social-icon" aria-hidden="true"></i>
                                </span>Instagram</a></li>
                                <li><a href="#" title="Whatsapp"><span><i class="fab fa-whatsapp social-icon" aria-hidden="true"></i>
                                </span>Whatsapp</a></li>
                            </ul>
                          
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="company-address">
                            <h4>Important Link</h4>
                            <div class="short-des-company">
                                <ul>
                                    @foreach(get_pages('footer') as $page)
                                    <li><a href="{{url($page->url)}}">{{$page->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="company-address">
                            <h4>Contact Info</h4>
                            <div class="short-des-company">
                                <div class="address">
                                    <p>{{isset($app_section->contact_address)?$app_section->contact_address:''}}</p>
                                    <p>{{isset($app_section->phone_number)?$app_section->phone_number:''}}</p>
                                    <p>{{isset($app_section->email_address)?$app_section->email_address:''}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
          </div>
    <footer class="bg-dark mt-5 d-none">
        <div class="container pb-5 pt-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-card">
                        <h3>Contact Info</h3>
                        <p>{{isset($app_section->contact_address)?$app_section->contact_address:''}}</p>
                        <p>{{isset($app_section->phone_number)?$app_section->phone_number:''}}</p>
                        <p>{{isset($app_section->email_address)?$app_section->email_address:''}}</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="footer-card">
                        <h3>Important Links</h3>
                        <ul>
                            @foreach(get_pages('footer') as $page)
                            <li><a href="{{url($page->url)}}">{{$page->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="footer-card">
                        <h3>Social Link</h3>
                        <ul>
                            <li><a href="#" title="Facebook"><span><i class="fab fa-facebook social-icon" aria-hidden="true"></i>
                            </span>Facebook</a></li>
                            <li><a href="#" title="Instagram"><span><i class="fab fa-instagram social-icon" aria-hidden="true"></i>
                            </span>Instagram</a></li>
                            <li><a href="#" title="Whatsapp"><span><i class="fab fa-whatsapp social-icon" aria-hidden="true"></i>
                            </span>Whatsapp</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="copy-right text-center">
                            <p>© Copyright 2023 Aribas Care. All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    {{-- <script src="{{asset('frontend/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.bundle.5.1.3.min.js')}}"></script> --}}
    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
    {{-- <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script> --}}
    <!-- Bootstrap 4 -->
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="{{ asset('frontend/js/lazyload.17.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/js/ion.rangeSlider.js') }}"></script>
    <script src="{{ asset('frontend/js/ion.rangeSlider.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('backend/plugins/toastr/toastr.min.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Toastr -->

    @php $allErrors=''; @endphp

    @if (isset($errors) && count($errors) > 0)
        @foreach ($errors->all() as $error)
            @php$allErrors .= $error . '<br/>';
            @endphp
        @endforeach
        @php
            $errors = strip_tags($allErrors);
        @endphp
        <script>
            $(function() {
                toastr.error('{{ $errors }}', 'Failed', {
                    timeOut: 5000
                });
            });
        </script>
    @endif
    @if (session()->has('success'))
        <script>
            $(function() {
                toastr.success('{{ session()->get('success') }}', 'Success', {
                    positionClass: "toast-top-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "2000",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                });
            });
        </script>
    @endif
    <script>
        window.onscroll = function() {
            myFunction()
        };

        var navbar = document.getElementById("navbar");
        var sticky = navbar.offsetTop;

        function myFunction() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
            } else {
                navbar.classList.remove("sticky");
            }
        }
    </script>
    <script type="text/javascript">
        function addToCart(id) {
            $.ajax({
                type: "POST",
                url: '{{ route('front.add.to.cart') }}',
                data: {
                    product_id: id,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function(res) {
                    console.log(res.data);
                    if (res.status == 'true') {
                        console.log('p ok p ok');
                        window.location.reload();
                    } else {
                        console.log('error');
                    }
                }
            });
        }
    </script>
    @yield('extra-js')
</body>

</html>
