@extends('admin.base')
@section('content')
    <div class="page-wrapper">
		<div class="page-content">
            <div class="row">
					<div class="col">
						<div class="card mt-3 radius-10 mb-0">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<h5 class="mb-1">Recent Orders</h5>
									</div>
								</div>

								<div class="table-responsive mt-3">
								   	<table class="table align-middle mb-3">
									   	@foreach($area as $a)
											
											<thead class="table-light">
											
											<th>		
												<a href="{{route('print_area_order', $a->id)}}" class="btn btn-primary btn-sm radius-30">Print Preview</a>
											</th>
											<th class="text-uppercase">Area Name-  {{$a->name}}</th>
											<tr class="mt-3">
												<th>Tracking ID</th>
												<th>Products Name</th>
												<th>Delivery Address</th>
												<th>Contact</th>
												<th>Status</th>
												<th>Actions</th>
											</tr>
											</thead>
											<tbody>
											@foreach($orderitem as $o)
												@if($a->pincode == $o->area)
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
													<td>{{$o->address->name}} ({{$o->address->street}},{{$o->address->area->name}}{{$o->address->district->name}},{{$o->address->state->name}})</td>
													<td>{{$o->address->contact}}</td>
													<td class=""><a href=""><span class="btn btn-sm bg-warning text-light-warning w-100">Pending</span></a></td>
													<td>
														<div class="d-flex order-actions">	
															<a href="" class=" btn btn-sm text-danger bg-light-danger border-0"><i class='bx bxs-trash'></i></a>
															<a href="" class=" btn btn-sm text-info bg-light-info border-0"><i class='bx bxs-show'></i></a>
														</div>
													</td>
												</tr>
												@endif
											@endforeach
											</tbody>
										@endforeach
								   	</table>
							   	</div>
							</div>
							<!-- @foreach($area as $a)
							<h6>{{$a->name}}</h6>
								@foreach($orderitem as $o)
									@if($a->pincode == $o->area)
										<h6>{{$o->id}}</h6>
									@endif
								@endforeach

							@endforeach -->
						</div>

					</div>
			</div>				
		</div>
	</div>