<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
        <div class="container mt-3 p-3">  
            <div class="row">
            <h3 class="mb-3 mx-auto">Mama Mart</h3>
					<div class="col">
						<div class="card mt-3 radius-10 mb-0">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<h5 class="mb-1">Recent Orders</h5>
									</div>
                                    <div class="ms-auto">
										<a href="" onclick = "printme()" class="btn btn-primary ">Print</a>

                                        <script type = "text/javascript">
                                                function printme() {
                                                window.print();
                                                }
                                        </script>  
									</div>
								</div>
                                <div class="table-responsive mt-3">
								   <table class="table align-middle mb-0">
									   <thead class="table-light">
										   <tr>
											   <th>Tracking ID</th>
											   <th>Products Name</th>
											   <th>Area</th>
											   <th>Contact</th>
											   <th>Delivery Address</th>
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
												<td>{{$o->address->contact}}</td>
													<td>{{$o->address->area->name}}</td>
											   <td>{{$o->address->name}} ({{$o->address->street}},{{$o->address->area->name}}{{$o->address->district->name}},{{$o->address->state->name}})</td>
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
</body>
</html>