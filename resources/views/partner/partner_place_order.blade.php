@extends('base')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-4 mt-4 mx-auto shadow card h-50 position-relative">
       
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
            <div class="table-responsive p-5">
            <h3 class=""><strong>Order Details</strong></h3>
              <table class="table  table-borderless mb-0 p-3">
                <tbody>
              
                  <tr>
                    <th class="text-capitalize"style="font-size: 15px;font-weight: bolder" scope="row"><strong>Order ID</strong></th>
                    <td class="text-capitalize">{{$order->id}}</td>
                  </tr>
                  <tr>
                    <th class="pl-0 w-25"style="font-size: 15px" scope="row"><strong>Delivery Type</strong></th>
                    <td class="text-capitalize h6">{{$order->delivery_type}}</td>
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
                            <div class="totals-value" id="cart-tax">Rs{{$tax = $discountTotal*18/100}}</div>
                            @else
                            <div class="totals-value" id="cart-tax">Rs{{$tax = $total*18/100}}</div>
                            @endif</td>
                  </tr>
                  <tr>
                    <th class="pl-0 w-25"style="font-size: 15px" scope="row"><strong>Delivery Charge</strong></th>
                    <td class="text-capitalize">Rs. {{$order->delivery_charge}}</td>
                  </tr> 
                  @if($order->coupon_id) 
                        @if($order->coupon->type == 'percentage')
                        <?php 
                            if($oi->cake->discount_price)
                            $coupons = $discountTotal*$order->coupon->value/100;
                            else
                            $coupons = $total*$order->coupon->value/100;
                        ?>
                        @else
                        <?php $coupons = $order->coupon->value;?>
                        @endif

                  <tr>
                    <th>Coupon</th>
                    <td>
                    @if($order->coupon->type == 'percentage')
                        <tr>
                            <th><strong>Coupon Value-</strong></th>
                            <td class="totals-value" id="cart-shipping">{{$order->coupon->value}}%</td></tr>
                        <tr>
                            <th><strong>Coupon Ammount-</strong></th>
                            <td class="totals-value" id="cart-shipping">Rs{{$coupons}}</td>
                        </tr>
                    @else
                        <tr>
                            <th><strong>Coupon Value-</strong></th>
                            <td class="totals-value" id="cart-shipping">Rs {{$coupons}}</td>
                        </tr>
                    @endif
                    </td>
                 </tr> 
                  <tr>
                    <th>Grand Total</th>
                    <td>
                    @if($oi->cake->discount_price)
                    <div class="totals-value text-danger" id="cart-total"><strong>Rs. {{$grandTotal = $tax + $discountTotal-$coupons+$order->delivery_charge}}</strong></div>
                    @else
                    <div class="totals-value text-danger" id="cart-total"><strong>Rs. {{$grandTotal = $tax + $total-$coupons + $order->delivery_charge}}</strong></div>
                    @endif
                    </td>
                  </tr>
                  @endif
                  @if(!$order->coupon_id)

                        <tr>
                            <th>Grand Total</th>
                            <td>
                            @if($oi->cake->discount_price)
                                <div class="totals-value" id="cart-total">Rs. {{$grandTotal = $tax + $discountTotal+$order->delivery_charge}}</div>
                                @else
                                <div class="totals-value" id="cart-total">Rs. {{$grandTotal = $tax + $total+$order->delivery_charge}}</div>
                                @endif
                            </td>
                        </tr>
                  @endif
                 
                  </tbody>
                 
              </table>
              <a href="{{route('confirm_partner_order',$partner->id)}}">
              <button type = "submit" class="btn btn-success mb-4">Place Order</button>
              </a>
            </div>
        </div>
    </div>
</div>

@endsection