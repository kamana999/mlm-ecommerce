@extends('base')
@section('content')

<div class="page-wrapper mt-5 p-5 mb-5">
			<div class="container">
            
            <div class="row">
					<div class="col">
						<div class="card radius-10 mb-0">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<h5 class="mb-1">My Orders</h5>
									</div>
									
								</div>

                               <div class="table-responsive mt-3">
								   <table class="table align-middle mb-0">
									   <thead class="table-light">
										   <tr>
											   <th>Tracking ID</th>
                                               <th>Order Date</th>
											   <th>Products Name</th>
											   <th>Action</th>
										   </tr>
									   </thead>
									   <tbody>
									   @foreach($order as $o)
										   <tr>
                                           
											   <td>00000A{{$o->id}}</td>
											   <td>{{$o->order_date}}</td>
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
                                                    <a href="{{route('show_my_orders',$o->id)}}" class=" btn btn-sm text-light bg-info border-0"><i class='bx bxs-show'></i>show detail</a>
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

@endsection