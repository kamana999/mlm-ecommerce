@extends('admin.base')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mt-1">
            <h5 class="text-center">Order ID - {{$orders->id}}</h5>
            <h6 class="text-center">OrderDate - {{$orders->order_date}}</h5>
            <h6 class="text-center">Customer Details - {{$orders->address->name}}({{$orders->address->contact}}){{$orders->address->street}},{{$orders->address->area->name}}  {{$orders->address->district->name}},({{$orders->address->state->name}})</h6>
            @if($orders->orderitem)
                @foreach($orders->orderitem as $oi)
                    <div class="card mt-3">
                        <div class="card-header">
                            <h6>{{$oi->cake->title}}</h6>
                            
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <img src="{{url('upload/'.$oi->cake->image)}}" alt="" width="100px" height="100px">
                                </div>
                                <div class="col-lg-6">
                                <h6 class="text-muted">Qty- {{$oi->qty}}</h6>
                                    @if($oi->cake->discount_price)
                                    <h6 class="text-muted">Price per unit = Rs.{{$oi->cake->discount_price}} <del>{{$oi->cake->price}}</del></h6>
                                    @else
                                    <h6>Price per unit = Rs. {{$oi->cake->price}} </h6>
                                    @endif
                                
                                @if($oi->cake->discount_price)
                                <h5>Ammount = Rs.  {{$oi->qty * $oi->cake->discount_price}} </h5>
                                @else
                                <h5>Ammount =Rs. {{$oi->qty * $oi->cake->price}} </h5>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            @endif
            </div>
            <div class="col-lg-4 mt-5">
                <?php 
                    $total = 0;
                    $discountTotal = 0;
                ?>
                @foreach($orders->orderitem as $oi)
                    <?php 
                        $total += $oi->cake->price * $oi->qty;
                        $discountTotal += $oi->cake->discount_price * $oi->qty;
                    ?>
                @endforeach
                <div class="card p-3">
                <div class="table-responsive">
                        <table class="table  table-borderless mb-0">
                        
                            <tbody>
                            
                            <tr>
                                <th class="pl-0 w-25"style="font-size: 15px" scope="row"><strong>Delivery Type</strong></th>
                                <td class="text-capitalize h6">{{$orders->delivery_type}}</td>
                            </tr>
                            
                            <tr>
                                <th>Subtotal</th>
                                <td>@if($oi->cake->discount_price)
                                        <div class="totals-value" id="cart-subtotal">{{$discountTotal}}</div>
                                        @else
                                        <div class="totals-value" id="cart-subtotal">{{$total}}</div>
                                        @endif</td>
                            </tr>
                            <tr>
                                <th>GST (18)%</th>
                                <td>@if($oi->cake->discount_price)
                                        <div class="totals-value" id="cart-tax">{{$tax = $discountTotal*18/100}}</div>
                                        @else
                                        <div class="totals-value" id="cart-tax">{{$tax = $total*18/100}}</div>
                                        @endif</td>
                            </tr>
                            <tr>
                                <th class="pl-0 w-25"style="font-size: 15px" scope="row"><strong>Delivery Charge</strong></th>
                                <td class="text-capitalize">Rs. {{$orders->delivery_charge}}</td>
                            </tr> 
                            @if($orders->coupon_id) 
                                    @if($orders->coupon->type == 'percentage')
                                    <?php 
                                        if($oi->cake->discount_price)
                                        $coupons = $discountTotal*$orders->coupon->value/100;
                                        else
                                        $coupons = $total*$orders->coupon->value/100;
                                    ?>
                                    @else
                                    <?php $coupons = $orders->coupon->value;?>
                                    @endif

                            <tr>
                                <th>Coupon</th>
                                <td>
                                @if($orders->coupon->type == 'percentage')
                                    <tr>
                                        <th><strong>Coupon Value-</strong></th>
                                        <td class="totals-value" id="cart-shipping">{{$orders->coupon->value}}%</td></tr>
                                    <tr>
                                        <th><strong>Coupon Ammount-</strong></th>
                                        <td class="totals-value" id="cart-shipping">{{$coupons}}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <th><strong>Coupon Value-</strong></th>
                                        <td class="totals-value" id="cart-shipping">Rs. {{$coupons}}</td>
                                    </tr>
                                @endif
                                </td>
                            </tr> 
                           
                            <tr>
                                <th>Grand Total</th>
                                <td>
                                @if($oi->cake->discount_price)
                                <div class="totals-value text-danger" id="cart-total"><strong>Rs {{$grandTotal = $tax + $discountTotal-$coupons+$orders->delivery_charge}} /-</strong></div>
                                @else
                                <div class="totals-value text-danger" id="cart-total"><strong>Rs {{$grandTotal = $tax + $total-$coupons + $orders->delivery_charge}} /-</strong></div>
                                @endif
                                </td>
                            </tr>
                            @endif
                            @if(!$orders->coupon_id)

                                    <tr>
                                        <th>Grand Total</th>
                                        <td>
                                        @if($oi->cake->discount_price)
                                            <div class="totals-value text-danger" id="cart-total"><strong>Rs {{$grandTotal = $tax + $discountTotal+$orders->delivery_charge}} /-</strong></div>
                                            @else
                                            <div class="totals-value text-danger" id="cart-total"><strong>Rs {{$grandTotal = $tax + $total+$orders->delivery_charge}} /-</strong></div>
                                            @endif
                                        </td>
                                    </tr>
                            @endif
                            
                            </tbody>
                            
                        </table>
              
                </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection