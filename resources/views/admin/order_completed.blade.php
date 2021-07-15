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
											   <th>ID</th>
											   <th>Products </th>
											   <th>Delivery Date</th>
											   <th>Delivery Time</th>
											   <th>Delivery Address</th>
											   <th>Vendor Name</th>
											   <th>Delivery Person Name</th>
											   <th>Status</th>
											   <th>Action</th>
											  
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
											   </td>
											   <td>
												<div class="d-flex align-items-center">
													@if($o->orderitem)
													@foreach($o->orderitem as $oi)
													<div class="ms-2">
														<h6 class="mb-1 font-14">{{$oi->delivery_date}},</h6>
														
													</div>
													@endforeach
													@endif
												</div>
												</td>
												<td>
												<div class="d-flex align-items-center">
													@if($o->orderitem)
													@foreach($o->orderitem as $oi)
													<div class="ms-2">
														<h6 class="mb-1 font-14">{{$oi->delivery_time}},</h6>
														
													</div>
													@endforeach
													@endif
												</div>
												</td>
											   <td>{{$o->address->name}}({{$o->address->contact}}){{$o->address->street}},{{$o->address->area->name}}{{$o->address->district->name}},({{$o->address->state->name}})</td>
											  <td>{{$o->vendor->user->name}} ({{$o->vendor->contact}})</td>
											  <td>{{$o->delivery_person->name}} ({{$o->delivery_person->contact}})</td>
											   <td class=""><a href=""><span class="btn btn-sm bg-light-primary text-success w-100">Order Completed</span></a></td>
											   <td>
											   <a href="{{route('show_orders',$o->id)}}" class=" btn btn-sm text-info bg-light-info border-0"><i class='bx bxs-show'></i></a>
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