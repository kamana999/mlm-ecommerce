@extends('base')
@section('content')
  <section class="cart-section my-5">
  @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
        </div>
    @endif
    @auth
        <div class="container">
          <div class="row">
            <div class="col-sm-8 cart-item float-left">
              <h2 class=" text-white px-3 p-1 rounded" style=" background-color: rgb(248,26,92);">{{ count($orderitem)}} Item's in Your Cart</h2>
              
              @if (count($orderitem)>0)
                <?php 
                    $total = 0;
                    $discountTotal = 0;
                ?>
              @endif

              @foreach($orderitem as $oi)
                <?php 
                    $total += $oi->cake->price * $oi->qty;
                    $discountTotal += $oi->cake->discount_price * $oi->qty;
                ?>
              @endforeach

             
              @foreach($orderitem as $oi)
                <div class="row  mt-3 border border-1">
                  <div class="col-sm-4">
                      <img src="{{ asset('upload/'.$oi->cake->image)}}" height="200px" class="img-fluid">
                  </div>
                  <div class="col-sm-8 m-auto">
                    <h5>{{$oi->cake->title}}e</h5>
                    <small>Ratings : <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i></small>
                    @if($oi->cake->discount_price)
                            <span class="d-block m-0 text-danger h5">₹{{$oi->cake->discount_price}}/{{$oi->cake->weight_type}}</span><small class="text-secondary"> (Inclusive of all taxes)</small>
                            <span class="d-block m-0 text-muted small"><del>₹{{$oi->cake->price}}</del></span>
                    @else
                        <span class="d-block m-0 text-danger h5">₹{{$oi->cake->price}}/{{$oi->cake->weight_type}}</span><small class="text-secondary"> (Inclusive of all taxes)</small>
                    @endif
                    
                    <small class="fw-bold">Qty :</small>
                    <input type="tel" for="quantity"size="2" class="" value="{{$oi->qty}}" name="qty"><span class="bg-light  fw-bold"> Kg</span>
                    <a href="{{route('add_to_cart_details',['id'=>$oi->cake->id])}}"><i class="fas fa-plus shadow border border-1 p-1" style="cursor: pointer;margin-right: -10px"></i>&nbsp;</a>
                    <a href="{{route('removecart',['id'=>$oi->cake->id])}}"><i class="fas fa-minus shadow border border-1 p-1" style="cursor: pointer;"></i></a>
                    <div class="col-sm-12 text-end">
                      <a href="{{route('removeitem',['id'=>$oi->cake->id])}}"><button class="btn btn-outline-danger float-right">Remove</button></a>
                    </div>
                  </div>
                </div>
              @endforeach
              
            </div>
            @if (count($orderitem)>0)
              <div class="col-sm-3  mx-auto shadow card h-50 position-relative ">
                <div class="checkout-sec  mt-5 p-1">
                  <div class="row  ">
                    <div class="col-sm-8 m-auto">
                      <h4 class="order   p-1">Order Summary</h4>
                    </div>
                  </div>
                  <div class="cart-value mt-3 ">
                    <table class="table table-borderless">
                      <tr class="fw-bold">
                        <td>Subtotal</td>
                        @if($oi->cake->discount_price)
                        <td>&#8377; {{$discountTotal}}</td>
                        @else
                        <td>&#8377; {{$total}}</td>
                        @endif
                      </tr>
                      <tr class="fw-bold">
                        <td>GST(18%)</td>
                        @if($oi->cake->discount_price)
                        <td>&#8377; {{$tax = $discountTotal*18/100}}</td>
                        @else
                        <td>&#8377; {{$tax = $total*18/100}}</td>
                        @endif
                      </tr>
                      
                    </table>
  
                    @if($coupon->coupon_id)
                            @if($coupon->coupon->type == 'percentage')
                            <?php 
                                if($oi->cake->discount_price)
                                $coupons = $discountTotal*$coupon->coupon->value/100;
                                else
                                $coupons = $total*$coupon->coupon->value/100;
                            ?>
                            @else
                            <?php $coupons = $coupon->coupon->value;?>
                            @endif
                            <table class="table table-borderless">
                             
                                @if($coupon->coupon->type == 'percentage')
                                  <tr class="fw-bold">
                                    <td>Coupon Value</td>
                                    <td>&#8377; {{$coupon->coupon->value}}%</td>
                                  </tr>
                                  <tr>
                                    <td>Coupon Ammount</td>
                                    <td>&#8377; {{$coupons}}</td>
                                  </tr>
                                @else
                                  <tr>
                                    <td>Coupon Ammount</td>
                                    <td>&#8377; {{$coupons}}</td>
                                  </tr>
                                @endif
                                <a href="{{route('coupon.destroy')}}" class="text-danger mb-5">Remove Coupon</a>
                                <tr class="fw-bold">
                                    <td>Grand Total</td>
                                    @if($oi->cake->discount_price)
                                    <td>&#8377; {{$grandTotal = $tax + $discountTotal-$coupons}}</td>
                                    @else
                                    <td>&#8377; {{$grandTotal = $tax + $total-$coupons}}</td>
                                    @endif
                                </tr>
                            </table>
                    @endif
                    @if(!$coupon->coupon_id)
                    <table class="table table-borderless">
                      <tr class="fw-bold">
                          <td>Grand Total</td>
                          @if($oi->cake->discount_price)
                          <td>&#8377; {{$grandTotal = $tax + $discountTotal}}</td>
                          @else
                          <td>&#8377; {{$grandTotal = $tax + $total}}</td>
                          @endif
                      </tr>
                    </table>
                    <div class="col-sm-10">
                    <form action="{{route('cart.coupon')}}" method="post" class="d-flex">
                      @csrf
                      <input type="text" placeholder="Have a promocode ?"name="coupon_code" required class="w-100 text-center p-2"> 
                      <input type="submit" value="Apply"class="btn btn-sm btn-dark">
                    </form>
                    </div>
                    @endif
                    <a href="{{route('checkout')}}"><button class="btn btn-warning fw-bold  w-100 mt-5 p-2 m-1">Checkout Now</button></a>
                  </div>
              </div>
            @else
              <div class="container">
                <div class="row">
                  <div class="col-lg-6 mx-auto">
                  <h2>Your Cart is  Empty</h3>
              <h2><a href="{{route('home')}}" class="btn mb-5 mx-auto"style="background-color: #8ea47e; color: white;"> Continue Shopping</a>
                  </div>
                </div>
              </div>
            @endif
          </div>
        </div>
        </div>  
    @endauth
    @guest
      @if(Session::has('order_items'))
        <div class="container">
          <div class="row">
            <div class="col-sm-8 cart-item float-left">
              @foreach($products as $p)
                <div class="row  mt-3 border border-1">
                  <div class="col-sm-4">
                      <img src="{{ asset('upload/'.$p['item_id']['image']) }}" height="200px" class="img-fluid">
                  </div>
                  <div class="col-sm-8 m-auto">
                    <h5>{{ $p['item_id']['title'] }}</h5>
                    <small>Ratings : <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i></small>
                      <span class="d-block m-0 text-danger h5">₹{{ $p['price'] }}/{{ $p['item_id']['weight_type'] }}</span><small class="text-secondary"> (Inclusive of all taxes)</small>
                    <small class="fw-bold">Qty :</small>
                    <input type="tel" for="quantity"size="2" class="" value="{{ $p['qty'] }}" name="qty"><span class="bg-light  fw-bold"></span> 
                  </div>
                </div>
                <!-- <h1>{{ $p['qty'] }}</h1>{{ $p['price'] }} {{ $p['item_id']['title'] }} -->
              @endforeach
            </div>
            <div class="col-sm-3  mx-auto shadow card h-50 position-relative ">
                <div class="checkout-sec  mt-5 p-1">
                  <div class="row  ">
                    <div class="col-sm-8 m-auto">
                      <h4 class="order   p-1">Order Summary</h4>
                    </div>
                  </div>
                  <div class="cart-value mt-3 ">
                    <table class="table table-borderless">
                      <tr class="fw-bold">
                        <td>Subtotal</td>
                      
                        <td>&#8377; {{$totalPrice}}</td>
                       
                      </tr>
                      <tr class="fw-bold">
                        <td>GST(18%)</td>
                      
                        
                        <td>&#8377; {{$tax = $totalPrice*18/100}}</td>
                      
                      </tr>
                      <tr class="fw-bold">
                        <td>Grandtotal</td>
                      
                        <td>&#8377; {{$tax + $totalPrice}}</td>
                       
                      </tr>
                      
                    </table>
                    <a href="{{route('new_login')}}"><button class="btn btn-warning fw-bold  w-100 mt-5 p-2 m-1">Checkout Now</button></a>
                  </div>
              </div>
          </div>
        </div>
      @endif
    @endguest
  </section>
 

@endsection