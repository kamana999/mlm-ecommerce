@extends('base')
@section('content')


<div class="container mt-4">
        <div class="row">
            <div class="col-lg-9">
                <form action="{{route('check_partner')}}" method="GET">
                    @csrf
                    <div class="form-group col">
                        <label for="">Insert Id</label>
                        <input type="text" name="id" required>
                        <input type="submit" value="search" class="btn btn-danger btn-sm" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    </div>
                </form>
               
                <div class="card p-3 mt-5">
                    <div class="card-body text-dark" >
                        <h5>Insert your Address</h5>
                        <form action="{{route('insert_address')}}" method="POST">
                            @csrf
                           <div class="row">
                            <div class="form-group col">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group col">
                                <label for="">Street</label>
                                <input type="text" name="street" class="form-control">
                            </div>
                           </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="">Contact</label>
                                    <input type="text" name="contact" class="form-control">
                                </div>
                                <div class="form-group col">
                                    <label for="">Contact2</label>
                                    <input type="text" name="contact2" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                <label for="">Country<span class="text-danger"> * </span></label>
                                <select name="country_id" id="" class="form-control">
                                    <option value="">Select Country</option>
                                    @foreach ($country as $c)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="form-group col">
                                <label for="">State<span class="text-danger"> * </span></label>
                                <select name="state_id" id="" class="form-control">
                                <option value="">Select State</option>
                                    @foreach ($state as $c)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="form-group col">
                                <label for="">District<span class="text-danger"> * </span></label>
                                <select name="district_id" id="" class="form-control">
                                    <option value="">Select District</option>
                                    @foreach ($district as $c)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="form-group col">
                                <label for="">Area<span class="text-danger"> * </span></label>
                                <select name="area_id" id="" class="form-control">
                                <option value="">Select Area</option>
                                    @foreach ($areas as $c)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <input type="submit" value="Add Address" class="btn btn-success form-control">
                            </div>
                        </form>
                    </div>
                </div>

                @if ($address)
                <div class="card mt-4 mb-3 p-2">
                    <div class="card-body">
                    <h5>Select Details</h5>
                    <form action="{{route('orderDetail')}}" method="POST" >
                            @csrf
                            <div class="mb-3">
                                <select name="address" class="form-control" required>
                                    <option value="">Select default address</option>
                                    @foreach ($address as $a)
                                    <option value="{{$a->id}}">{{$a->name}} {{ $a->contact }} | {{$a->street}},{{$a->area->name }} ({{$a->district->name}}, {{$a->state->name}})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <select name="delivery" class="form-control" required>
                                    <option value="">Select Delivery Type</option>
                                    <option value="Standard Delivery">Standard Delivery (Free)</option>
                                    <option value="Economy Delivery">Economy Delivery charge (Rs.{{$delivery_charge->delivery_charge}}) </option>
                                </select>
                            </div>
                            <button class="btn btn-primary mt-3 form-control" type="submit">Confirm Order</button>
                        </form>
                    </div>
                </div>
                @endif

            </div>
            
                <?php 
                    $total = 0;
                    $discountTotal = 0;
                ?>
                @foreach($orderitem as $oi)
                    <?php 
                        $total += $oi->cake->price * $oi->qty;
                        $discountTotal += $oi->cake->discount_price * $oi->qty;
                    ?>
                @endforeach
                <div class="col-sm-3 mt-5 shadow card h-50 position-relative ">
                <div class="checkout-sec  mt-5 p-1">
                  <div class="row">
                    <div class="col-sm-8 mx-auto">
                      <h4 class="order">Order Summary</h4>
                    </div>
                  </div>
                  <div class="cart-value mt-3 mb-3">
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
                    <hr>
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
                    
                  </div>
              </div>
                
                    </div>
                </div>
            
    </div>

@endsection