@extends('admin.base')
@section('content')

        <div class="page-wrapper">
			<div class="page-content">
            <div class="row">
					<div class="col">
						<div class="card radius-10 mb-0">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<h5 class="mb-1">Recent Orders</h5>
									</div>
									<div class="ms-auto">
										<a href="javscript:;" class="btn btn-primary btn-sm radius-30">View All Products</a>
									</div>
								</div>

                               <div class="table-responsive mt-3">
								   <table class="table align-middle mb-0">
									   <thead class="table-light">
										   <tr>
											   <th>Tracking ID</th>
											   <th>Products Name</th>
											   <th>Area</th>
											   <th>Delivery Address</th>
											   <th>Status</th>
											   <th>Actions</th>
										   </tr>
									   </thead>
									   <tbody>
									   @foreach($orderitem as $o)
										   <tr>
                                           
											   <td>00000A{{$o->id}}</td>
											   <td>
												<div class="d-flex align-items-center">
													@if($o->orderitem)
													@foreach($o->orderitem as $oi)
													<div class="ms-2">
														<h6 class="mb-1 font-14">{{$oi->cake->title}},</h6>
														
													</div>
													@endforeach
													@endif
												</div>
												
												
											   <!-- </td>
											   @if($o->orderitem)
													@foreach($o->orderitem as $oi)
													<td>{{$oi->delivery_date}}</td>
													<td>{{$oi->delivery_time}}</td>
													@endforeach
													@endif</td> -->
													<td>{{$o->area}}</td>
											   <td>{{$o->address->name}}({{$o->address->contact}}){{$o->address->street}},{{$o->address->area->name}}{{$o->address->district->name}},({{$o->address->state->name}})</td>
											   <td class=""><a href="{{route('assign_delivery',$o->id)}}"><span class="btn btn-sm bg-warning text-light-warning w-100">Pending</span></a></td>
								
											   <td>
												<div class="d-flex order-actions">	
													<a href="{{route('cancle_order',$o->id)}}" class=" btn btn-sm text-danger bg-light-danger border-0"><i class='bx bxs-trash'></i></a>
													<a href="{{route('show_orders',$o->id)}}" class=" btn btn-sm text-info bg-light-info border-0"><i class='bx bxs-show'></i></a>
				
												</div>
											   </td>
                                            
										   </tr>
										   @endforeach
										
									   </tbody>
								   </table>
							   </div>
								
							</div>
						</div>
					</div>
				</div>				
			</div>
		</div>