@extends('frontend.layouts.app')
@section('main-content')
<section class="section-5 pt-3 pb-3 mb-3 bg-white">
    <div class="container">
        <div class="light-font">
            <ol class="breadcrumb primary-color mb-0">
                <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="white-text" href="#">Shop</a></li>
                <li class="breadcrumb-item">Checkout</li>
            </ol>
        </div>
    </div>
</section>

<section class="section-9 pt-4">
    <div class="container">
        @php
            $auth = auth('customer')->user();
            // dd($auth);
        @endphp
        @if (session()->has('cart'))
        <form action="{{route('checkout.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="sub-title">
                        <h2>Shipping Address</h2>
                    </div>
                    <div class="card shadow-lg border-0">
                        <div class="card-body checkout-form">
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
                                    </div>            
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
                                    </div>            
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                                    </div>            
                                </div>
    
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <textarea name="address" id="address" cols="3" rows="3" placeholder="Address" class="form-control"></textarea>
                                    </div>            
                                </div>
    
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" name="city" id="city" class="form-control" placeholder="City">
                                    </div>            
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile No.">
                                    </div>            
                                </div>
                                
    
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <textarea name="order_notes" id="order_notes" cols="3" rows="2" placeholder="Order Notes (optional)" class="form-control"></textarea>
                                    </div>            
                                </div>
    
                            </div>
                        </div>
                    </div>    
                </div>
                <div class="col-md-4">
                    <div class="sub-title">
                        <h2>Order Summery</h3>
                    </div>    
                          
                    <div class="card cart-summery">
                        <div class="card-body">  
                         @if (session()->has('cart'))
                             @php
                                   $data['cart_products'] = session()->get('cart');
                                   $grand_total = 0;
                                   $total_quantity = 0;
                             @endphp
                  
                            @foreach ( $data['cart_products'] as $item)
                            <div class="d-flex justify-content-between pb-2">
                                @php
                                    $grand_total =  $grand_total + $item['discount_price'] * $item['quantity'];
                                    $total_quantity =  $total_quantity +  $item['quantity'];
                                @endphp
                                <div class="h6">{{$item['name']}} X {{$item['quantity']}}</div>
                                <div class="h6">৳{{$item['discount_price'] * $item['quantity']}}</div>
                            </div>
                            @endforeach
                            @endif    
                            <input type="hidden" name="quantity" value="{{$total_quantity}}">                
                            <input type="hidden" name="price" value="{{$grand_total}}">                
                            <input type="hidden" name="shipping" value="0">                
                            <input type="hidden" name="sub_total" value="{{$grand_total}}">                
                            <div class="d-flex justify-content-between summery-end">
                                <div class="h6"><strong>Subtotal</strong></div>
                                <div class="h6"><strong>৳{{$grand_total}}</strong></div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div class="h6"><strong>Shipping</strong></div>
                                <div class="h6"><strong>৳0</strong></div>
                            </div>
                            <div class="d-flex justify-content-between mt-2 summery-end">
                                <div class="h5"><strong>Total</strong></div>
                                <div class="h5"><strong>৳ {{$grand_total}}</strong></div>
                            </div>                            
                        </div>
                    </div>   
                    
                    <div class="card payment-form ">                        
                        <h3 class="card-title h5 mb-3">Payment Method</h3>
                        <div class="card-body p-0">
                            <div class="mb-3 d-none">
                                <label for="card_number" class="mb-2">Card Number</label>
                                <input type="text" name="card_number" id="card_number" placeholder="Valid Card Number" class="form-control">
                            </div>
                            <div class="row d-none">
                                <div class="col-md-6">
                                    <label for="expiry_date" class="mb-2">Expiry Date</label>
                                    <input type="text" name="expiry_date" id="expiry_date" placeholder="MM/YYYY" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="expiry_date" class="mb-2">CVV Code</label>
                                    <input type="text" name="expiry_date" id="expiry_date" placeholder="123" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="hidden" name="delivery_type" value="cash_on_delivery">
                                        <h6>Cash On delivery</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-4">
                                <button type="submit" class="btn-dark btn btn-block w-100">Confirm</button>
                            </div>
                        </div>                        
                    </div>
    
                          
                    <!-- CREDIT CARD FORM ENDS HERE -->
                    
                </div>
            </div>
        </form>
        @else
        <div class="row">
            <div class="col-md-12 text-center">
                    <div class="m-5">
                        <h4>Your cart is Empty</h4>
                    </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection
@section('extra-js')

@endsection