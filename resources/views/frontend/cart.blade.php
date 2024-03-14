@extends('frontend.layouts.app')
@section('main-content')
<section class="section-5 pt-3 pb-3 mb-3 bg-white">
    <div class="container">
        <div class="light-font">
            <ol class="breadcrumb primary-color mb-0">
                <li class="breadcrumb-item"><a class="white-text" href="{{route('front.index')}}">Home</a></li>
                <li class="breadcrumb-item"><a class="white-text" href="{{route('front.products')}}">Products</a></li>
                <li class="breadcrumb-item">Cart</li>
            </ol>
        </div>
    </div>
</section>

<section class=" section-9 pt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table" id="cart">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                       @php
                           $total_price = 0;
                       @endphp
                               @foreach ($cart_products as $key => $cart_product )
                                    @php
                                        $total_price = $total_price + $cart_product['discount_price'] * $cart_product['quantity'];
                                    @endphp
                               <tr>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="images/product-1.jpg" width="" height="">
                                      <div class="cart-product-name">
                                        {{isset($cart_product['name'])?$cart_product['name']:'' }}
                                      </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="product-price-sec-del">
                                        ৳{{isset($cart_product['discount_price'])?$cart_product['discount_price']:'' }}
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-dark btn-minus p-2 pt-1 pb-1 sub" data-id={{$cart_product['id']}}>
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm  border-0 text-center" value="{{$cart_product['quantity'] }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-dark btn-plus p-2 pt-1 pb-1 add" data-id={{$cart_product['id']}}>
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="product-price-sec">
                                        ৳{{isset($cart_product['discount_price']) && $cart_product['quantity'] ? $cart_product['discount_price'] * $cart_product['quantity']:''}}
                                    </div>
                                  
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-danger" onclick="delete_cart('{{$cart_product['id']}}')"><i class="fa fa-times"></i></button>
                                </td>
                            </tr>
                               @endforeach
                           {{-- @endif                               --}}
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">            
                <div class="card cart-summery">
                    <div class="sub-title">
                        <h2 class="bg-white">Cart Summery</h3>
                    </div> 
                    <div class="card-body">
                        <div class="d-flex justify-content-between pb-2">
                            <div>Subtotal</div>
                            <div>৳{{isset($total_price)?$total_price:'0'}}</div>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <div>Shipping</div>
                            <div>৳00</div>
                        </div>
                        <div class="d-flex justify-content-between summery-end">
                            <div>Total</div>
                            <div>৳{{isset($total_price)?$total_price:'0'}}</div>
                        </div>
                        <div class="pt-5">
                            <a href="{{route('front.checkout.cart')}}" class="btn-dark btn btn-block w-100">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>     
                <div class="input-group apply-coupan mt-4">
                    <input type="text" placeholder="Coupon Code" class="form-control">
                    <button class="btn btn-dark" type="button" id="button-addon2">Apply Coupon</button>
                </div> 
            </div>
        </div>
    </div>
</section>
@endsection
@section('extra-js')
    <script>
        $('.add').click(function(){
      var qtyElement = $(this).parent().prev(); // Qty Input
      var qtyValue = parseInt(qtyElement.val());
      if (qtyValue < 10) {
        const rowId = $(this).data('id');
          qtyElement.val(qtyValue+1);
          const quantity = qtyElement.val();
          update_cart(rowId,quantity);
      }            
  });

  $('.sub').click(function(){
      var qtyElement = $(this).parent().next(); 
      var qtyValue = parseInt(qtyElement.val());
      if (qtyValue > 1) {
        const rowId = $(this).data('id');
          qtyElement.val(qtyValue-1);
          const quantity = qtyElement.val();
          update_cart(rowId,quantity);
      }        
  });

  function update_cart(rowId,quantity){
    $.ajax({
                type: "POST",
                url: '{{route('front.update.cart')}}',
                data: {
                    rowId: rowId,
                    quantity: quantity,
                    "_token": "{{ csrf_token() }}"
                },
                dataType:'json',
                success: function (response) {
                       if(response.status == true){
                        location.reload();
                       }
                    }
                });
  }
  
  function delete_cart(rowId){
            if(confirm("Are you want to delete?")){
                $.ajax({
                type: "POST",
                url: '{{route('front.delete.cart')}}',
                data: {
                    rowId: rowId,
                    "_token": "{{ csrf_token() }}"
                },
                dataType:'json',
                success: function (response) {
                       if(response.status == true){
                        location.reload();
                       }
                    }
                });
            }
  }
    </script>

@endsection