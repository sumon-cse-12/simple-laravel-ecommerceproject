@extends('frontend.layouts.app')
@section('extra-css')
    <style>
        .category-link {
            color: #000;
            margin: 10px 0px;
        }
    </style>
@endsection
@section('main-content')
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                    <li class="breadcrumb-item active">Shop</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="section-6 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 sidebar">
                    <div class="sub-title">
                        <h2>Categories</h3>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            @if ($categories->isNotEmpty())
                                <div class="category-list-sec">
                                    @foreach ($categories as $category)
                                        <a href="{{ route('front.shop', $category->slug) }}" class="category-link {{($categorySelected==$category->id)?'text-primary':''}}">
                                            <div class="category-name">
                                                {{ isset($category) && $category->name ? $category->name : '' }}
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                            <div class="accordion accordion-flush d-none" id="accordionExample">
                                <div class="accordion-item ">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseFour" aria-expanded="false"
                                            aria-controls="collapseFour">
                                            Applicances
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                        data-bs-parent="#accordionExample" style="">
                                        <div class="accordion-body">
                                            <div class="navbar-nav">
                                                <a href="" class="nav-item nav-link">TV</a>
                                                <a href="" class="nav-item nav-link">Washing Machines</a>
                                                <a href="" class="nav-item nav-link">Air Conditioners</a>
                                                <a href="" class="nav-item nav-link">Vacuum Cleaner</a>
                                                <a href="" class="nav-item nav-link">Fans</a>
                                                <a href="" class="nav-item nav-link">Air Coolers</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="sub-title mt-5">
                        <h2>Price</h3>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <input type="text" class="js-range-slider" name="my_range" value=""
                            data-type="double"
                            data-min="0"
                            data-max="1000"
                            data-from="200"
                            data-to="500"
                            data-grid="true"
                        />
                            <div class="form-check mb-2 d-none">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    $0-$100
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row pb-3">
                        <div class="col-12 pb-1">
                            <div class="d-flex align-items-center justify-content-end mb-4">
                                <div class="ml-2">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                            data-bs-toggle="dropdown">Sorting</button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Latest</a>
                                            <a class="dropdown-item" href="#">Price High</a>
                                            <a class="dropdown-item" href="#">Price Low</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($products->isNotEmpty())
                            @foreach ($products as $product)
                                <div class="col-md-4">
                                    <div class="card product-card">
                                        <div class="product-image position-relative">
                                            @if (isset($product) && $product)
                                                @php
                                                    $images = json_decode($product->image);
                                                    $singleImage = $images[0];
                                                @endphp
                                                <a href="#" class="product-img"><img class="card-img-top"
                                                        src="{{asset('uploads/'. $singleImage->image)}}" alt=""></a>
                                            @endif
                                            <a class="whishlist" href="222"><i class="far fa-heart"></i></a>

                                            <div class="product-action">
                                                <a class="btn btn-dark" href="javascript:void(0);" onclick="addToCart({{$product->id}});">
                                                    <i class="fa fa-shopping-cart"></i> Add To Cart
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-body text-center mt-3">
                                            <a class="h6 link" href="product.php">Dummy Product Title</a>
                                            <div class="price mt-2">
                                                <span class="h5"><strong>$100</strong></span>
                                                <span class="h6 text-underline"><del>$120</del></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('extra-js')
<script>
     $(".js-range-slider").ionRangeSlider({
        type: "double",
        min: 0,
        max: 1000,
        from: 0,
        step:10,
        to: 1000,
        skin:"round",
        max_postfix:"+",
        prefix: "tk",
        // onFinish:function(){
        //     apply_filters()
        // }
    });
    let my_range = $(".js-range-slider").data("ionRangeSlider");
    console.log(my_range);
</script>
@endsection
