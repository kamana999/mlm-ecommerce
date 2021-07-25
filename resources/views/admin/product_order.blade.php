@extends('admin.base')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="container">
                
                
                <div class="row">
                    @foreach($product as $p)
                        <?php 
                        $totalQty = 0;
                        ?>
                        <div class="col-lg-3">
                            <div class="card mt-3 radius-10 mb-0">
                                <div class="card-body">
                                    <h4>{{$p->title}} ({{$p->weight}}/{{$p->weight_type}})</h4>
                                    @foreach($orderitem as $o)
                                    
                                        @if($o->orderitem)
                                            @foreach($o->orderitem as $oi)
                                            
                                                @if($oi->cake->id == $p->id)
                                                    <h6>Order Id - {{$o->id}}</h6>
                                                    <p>qty - {{$oi->qty}}</p>
                                                    <?php
                                                        $totalQty += $oi->qty;
                                                    ?>
                                                @endif
                                            @endforeach
                                        @endif

                                    @endforeach
                                    <h5>Total Quantity - {{$totalQty}} /{{$p->weight_type}}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                                <!-- @foreach($product as $p)
                                <th>{{$p->id}} {{$p->title}}</th>

                                <tbody>
                                @foreach($orderitem as $o)
                                        @if($o->orderitem)
										    @foreach($o->orderitem as $oi)
                                                @if($oi->cake->id == $p->id)
                                                    <td>{{$oi->id}}{{$oi->cake->title}}</td>
                                                    <td>{{$oi->qty}}</td>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </tbody>
                                
                                @endforeach -->
                            
                            
                            
                </div>  
            </div>
        </div>
    </div>
@endsection