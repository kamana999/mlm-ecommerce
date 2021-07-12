@extends('partner.base')
@section('content')

<div class="page-wrapper mt-5">
			<div class="page-content">
			
			  <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
			    <div class="col">
						<div class="card radius-10 overflow-hidden bg-danger">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white">Total Orders</p>
										<h5 class="mb-0 text-white">867</h5>
									</div>
									<div class="ms-auto text-white">	<i class='bx bx-cart font-30'></i>
									</div>
								</div>
							</div>
							<div class="" id="chart1"></div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 overflow-hidden bg-primary">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white">Total Income</p>
										<h5 class="mb-0 text-white">$52,945</h5>
									</div>
									<div class="ms-auto text-white">	<i class='bx bx-wallet font-30'></i>
									</div>
								</div>
							</div>
							<div class="" id="chart2"></div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 overflow-hidden bg-warning">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-dark">Total Users</p>
										<h5 class="mb-0 text-dark">24.5K</h5>
									</div>
									<div class="ms-auto text-dark">	<i class='bx bx-group font-30'></i>
									</div>
								</div>
							</div>
							<div class="" id="chart3"></div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 overflow-hidden bg-success">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white">Comments</p>
										<h5 class="mb-0 text-white">869</h5>
									</div>
									<div class="ms-auto text-white">	<i class='bx bx-chat font-30'></i>
									</div>
								</div>
							</div>
							<div class="" id="chart4"></div>
						</div>
					</div>
			  </div><!--end row-->
              
			   <div class="row">
				 <div class="col-12 col-xl-4 d-flex">
					<div class="card radius-10 w-100">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<h5 class="mb-0">New Customers</h5>
								</div>
								<div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
								</div>
							</div>
						</div>
						<div class="customers-list p-3 mb-3">
							<div class="customers-list-item d-flex align-items-center border-top border-bottom p-2 cursor-pointer">
								<div class="">
									<img src="assets/images/avatars/avatar-1.webp" class="rounded-circle" width="46" height="46" alt="" />
								</div>
								<div class="ms-2">
									<h6 class="mb-1 font-14">Emy Jackson</h6>
									<p class="mb-0 font-13 text-secondary">emy_jac@xyz.com</p>
								</div>
								<div class="list-inline d-flex customers-contacts ms-auto">	<a href="javascript:;" class="list-inline-item"><i class='bx bxs-envelope'></i></a>
									<a href="javascript:;" class="list-inline-item"><i class='bx bxs-phone' ></i></a>
									<a href="javascript:;" class="list-inline-item"><i class='bx bx-dots-vertical-rounded'></i></a>
								</div>
							</div>
							<div class="customers-list-item d-flex align-items-center border-bottom p-2 cursor-pointer">
								<div class="">
									<img src="assets/images/avatars/avatar-2.webp" class="rounded-circle" width="46" height="46" alt="" />
								</div>
								<div class="ms-2">
									<h6 class="mb-1 font-14">Martin Hughes</h6>
									<p class="mb-0 font-13 text-secondary">martin.hug@xyz.com</p>
								</div>
								<div class="list-inline d-flex customers-contacts ms-auto">	<a href="javascript:;" class="list-inline-item"><i class='bx bxs-envelope'></i></a>
									<a href="javascript:;" class="list-inline-item"><i class='bx bxs-phone' ></i></a>
									<a href="javascript:;" class="list-inline-item"><i class='bx bx-dots-vertical-rounded'></i></a>
								</div>
							</div>
							<div class="customers-list-item d-flex align-items-center border-bottom p-2 cursor-pointer">
								<div class="">
									<img src="assets/images/avatars/avatar-3.webp" class="rounded-circle" width="46" height="46" alt="" />
								</div>
								<div class="ms-2">
									<h6 class="mb-1 font-14">Laura Madison</h6>
									<p class="mb-0 font-13 text-secondary">laura_01@xyz.com</p>
								</div>
								<div class="list-inline d-flex customers-contacts ms-auto">	<a href="javascript:;" class="list-inline-item"><i class='bx bxs-envelope'></i></a>
									<a href="javascript:;" class="list-inline-item"><i class='bx bxs-phone' ></i></a>
									<a href="javascript:;" class="list-inline-item"><i class='bx bx-dots-vertical-rounded'></i></a>
								</div>
							</div>
							<div class="customers-list-item d-flex align-items-center border-bottom p-2 cursor-pointer">
								<div class="">
									<img src="assets/images/avatars/avatar-4.webp" class="rounded-circle" width="46" height="46" alt="" />
								</div>
								<div class="ms-2">
									<h6 class="mb-1 font-14">Shoan Stephen</h6>
									<p class="mb-0 font-13 text-secondary">s.stephen@xyz.com</p>
								</div>
								<div class="list-inline d-flex customers-contacts ms-auto">	<a href="javascript:;" class="list-inline-item"><i class='bx bxs-envelope'></i></a>
									<a href="javascript:;" class="list-inline-item"><i class='bx bxs-phone' ></i></a>
									<a href="javascript:;" class="list-inline-item"><i class='bx bx-dots-vertical-rounded'></i></a>
								</div>
							</div>
							<div class="customers-list-item d-flex align-items-center border-bottom p-2 cursor-pointer">
								<div class="">
									<img src="assets/images/avatars/avatar-5.webp" class="rounded-circle" width="46" height="46" alt="" />
								</div>
								<div class="ms-2">
									<h6 class="mb-1 font-14">Keate Medona</h6>
									<p class="mb-0 font-13 text-secondary">Keate@xyz.com</p>
								</div>
								<div class="list-inline d-flex customers-contacts ms-auto">	<a href="javascript:;" class="list-inline-item"><i class='bx bxs-envelope'></i></a>
									<a href="javascript:;" class="list-inline-item"><i class='bx bxs-phone' ></i></a>
									<a href="javascript:;" class="list-inline-item"><i class='bx bx-dots-vertical-rounded'></i></a>
								</div>
							</div>
							<div class="customers-list-item d-flex align-items-center border-bottom p-2 cursor-pointer">
								<div class="">
									<img src="assets/images/avatars/avatar-6.webp" class="rounded-circle" width="46" height="46" alt="" />
								</div>
								<div class="ms-2">
									<h6 class="mb-1 font-14">Paul Benn</h6>
									<p class="mb-0 font-13 text-secondary">pauly.b@xyz.com</p>
								</div>
								<div class="list-inline d-flex customers-contacts ms-auto">	<a href="javascript:;" class="list-inline-item"><i class='bx bxs-envelope'></i></a>
									<a href="javascript:;" class="list-inline-item"><i class='bx bxs-phone' ></i></a>
									<a href="javascript:;" class="list-inline-item"><i class='bx bx-dots-vertical-rounded'></i></a>
								</div>
							</div>
							<div class="customers-list-item d-flex align-items-center border-bottom p-2 cursor-pointer">
								<div class="">
									<img src="assets/images/avatars/avatar-7.webp" class="rounded-circle" width="46" height="46" alt="" />
								</div>
								<div class="ms-2">
									<h6 class="mb-1 font-14">Winslet Maya</h6>
									<p class="mb-0 font-13 text-secondary">winslet_02@xyz.com</p>
								</div>
								<div class="list-inline d-flex customers-contacts ms-auto">	<a href="javascript:;" class="list-inline-item"><i class='bx bxs-envelope'></i></a>
									<a href="javascript:;" class="list-inline-item"><i class='bx bxs-phone' ></i></a>
									<a href="javascript:;" class="list-inline-item"><i class='bx bx-dots-vertical-rounded'></i></a>
								</div>
							</div>
							<div class="customers-list-item d-flex align-items-center border-bottom p-2 cursor-pointer">
								<div class="">
									<img src="assets/images/avatars/avatar-8.webp" class="rounded-circle" width="46" height="46" alt="" />
								</div>
								<div class="ms-2">
									<h6 class="mb-1 font-14">Bruno Bernard</h6>
									<p class="mb-0 font-13 text-secondary">bruno.b@xyz.com</p>
								</div>
								<div class="list-inline d-flex customers-contacts ms-auto">	<a href="javascript:;" class="list-inline-item"><i class='bx bxs-envelope'></i></a>
									<a href="javascript:;" class="list-inline-item"><i class='bx bxs-phone' ></i></a>
									<a href="javascript:;" class="list-inline-item"><i class='bx bx-dots-vertical-rounded'></i></a>
								</div>
							</div>
							<div class="customers-list-item d-flex align-items-center border-bottom p-2 cursor-pointer">
								<div class="">
									<img src="assets/images/avatars/avatar-9.webp" class="rounded-circle" width="46" height="46" alt="" />
								</div>
								<div class="ms-2">
									<h6 class="mb-1 font-14">Merlyn Dona</h6>
									<p class="mb-0 font-13 text-secondary">merlyn.d@xyz.com</p>
								</div>
								<div class="list-inline d-flex customers-contacts ms-auto">	<a href="javascript:;" class="list-inline-item"><i class='bx bxs-envelope'></i></a>
									<a href="javascript:;" class="list-inline-item"><i class='bx bxs-phone' ></i></a>
									<a href="javascript:;" class="list-inline-item"><i class='bx bx-dots-vertical-rounded'></i></a>
								</div>
							</div>
							<div class="customers-list-item d-flex align-items-center border-bottom p-2 cursor-pointer">
								<div class="">
									<img src="assets/images/avatars/avatar-10.webp" class="rounded-circle" width="46" height="46" alt="" />
								</div>
								<div class="ms-2">
									<h6 class="mb-1 font-14">Alister Campel</h6>
									<p class="mb-0 font-13 text-secondary">alister_42@xyz.com</p>
								</div>
								<div class="list-inline d-flex customers-contacts ms-auto">	<a href="javascript:;" class="list-inline-item"><i class='bx bxs-envelope'></i></a>
									<a href="javascript:;" class="list-inline-item"><i class='bx bxs-phone' ></i></a>
									<a href="javascript:;" class="list-inline-item"><i class='bx bx-dots-vertical-rounded'></i></a>
								</div>
							</div>
						</div>
					</div>
				 </div>
				 <div class="col-12 col-xl-4 d-flex">
					<div class="card radius-10 w-100 overflow-hidden">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<h5 class="mb-0">Store Metrics</h5>
								</div>
								<div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
								</div>
							</div>
						</div>

						<div class="store-metrics p-3 mb-3">
							
                            <div class="card mt-3 radius-10 border shadow-none">
								<div class="card-body">
                                    <div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-secondary">Total Products</p>
											<h4 class="mb-0">856</h4>
										</div>
										<div class="widgets-icons bg-light-primary text-primary ms-auto"><i class='bx bxs-shopping-bag' ></i>
										</div>
									</div>
								</div>
							</div>
							<div class="card radius-10 border shadow-none">
								<div class="card-body">
                                    <div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-secondary">Total Customers</p>
											<h4 class="mb-0">45,241</h4>
										</div>
										<div class="widgets-icons bg-light-danger text-danger ms-auto"><i class='bx bxs-group' ></i>
										</div>
									</div>
								</div>
							</div>
							<div class="card radius-10 border shadow-none">
								<div class="card-body">
                                    <div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-secondary">Total Categories</p>
											<h4 class="mb-0">98</h4>
										</div>
										<div class="widgets-icons bg-light-success text-success ms-auto"><i class='bx bxs-category' ></i>
										</div>
									</div>
								</div>
							</div>
							<div class="card radius-10 border shadow-none">
								<div class="card-body">
                                    <div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-secondary">Total Orders</p>
											<h4 class="mb-0">124</h4>
										</div>
										<div class="widgets-icons bg-light-info text-info ms-auto"><i class='bx bxs-cart-add' ></i>
										</div>
									</div>
								</div>
							</div>
							<div class="card radius-10 border shadow-none mb-0">
								<div class="card-body">
                                    <div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-secondary">Total Vendors</p>
											<h4 class="mb-0">55</h4>
										</div>
										<div class="widgets-icons bg-light-warning text-warning ms-auto"><i class='bx bxs-user-account' ></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				 </div>

				 <div class="col-12 col-xl-4 d-flex">
					<div class="card radius-10 w-100 ">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<h5 class="mb-1">Top Products</h5>
								</div>
								<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
								</div>
							</div>
						</div>

						<div class="product-list p-3 mb-3">

							 <div class="d-flex align-items-center py-3 border-bottom cursor-pointer">
								<div class="product-img me-2">
									 <img src="assets/images/products/01.webp" alt="product img">
								  </div>
								<div class="">
									<h6 class="mb-0 font-14">Black Boost Chair</h6>
									<p class="mb-0">148 Sales</p>
								</div>
								<div class="ms-auto">
									<h6 class="mb-0">$246.24</h6>
								</div>
							  </div>
							 
							  <div class="d-flex align-items-center py-3 border-bottom cursor-pointer">
								<div class="product-img me-2">
									 <img src="assets/images/products/03.webp" alt="product img">
								  </div>
								<div class="">
									<h6 class="mb-0 font-14">Red Single Sofa</h6>
									<p class="mb-0">122 Sales</p>
								</div>
								<div class="ms-auto">
									<h6 class="mb-0">$328.14</h6>
								</div>
							  </div>
							
							  <div class="d-flex align-items-center py-3 border-bottom cursor-pointer">
								<div class="product-img me-2">
									 <img src="assets/images/products/04.webp" alt="product img">
								  </div>
								<div class="">
									<h6 class="mb-0 font-14">Pink Rounded Sofa</h6>
									<p class="mb-0">105 Sales</p>
								</div>
								<div class="ms-auto">
									<h6 class="mb-0">$124.35</h6>
								</div>
							  </div>
							 
							  <div class="d-flex align-items-center py-3 border-bottom cursor-pointer">
								<div class="product-img me-2">
									 <img src="assets/images/products/05.webp" alt="product img">
								  </div>
								<div class="">
									<h6 class="mb-0 font-14">Brown Single Table</h6>
									<p class="mb-0">201 Sales</p>
								</div>
								<div class="ms-auto">
									<h6 class="mb-0">$158.34</h6>
								</div>
							  </div>
							  
							  <div class="d-flex align-items-center py-3 border-bottom cursor-pointer">
								<div class="product-img me-2">
									 <img src="assets/images/products/06.webp" alt="product img">
								  </div>
								<div class="">
									<h6 class="mb-0 font-14">Grey Long Chair</h6>
									<p class="mb-0">146 Sales</p>
								</div>
								<div class="ms-auto">
									<h6 class="mb-0">158.24</h6>
								</div>
							  </div>
							  
							  <div class="d-flex align-items-center py-3 border-bottom cursor-pointer">
								<div class="product-img me-2">
									 <img src="assets/images/products/07.webp" alt="product img">
								  </div>
								<div class="">
									<h6 class="mb-0 font-14">Beautiful Sofa</h6>
									<p class="mb-0">210 Sales</p>
								</div>
								<div class="ms-auto">
									<h6 class="mb-0">$520.24</h6>
								</div>
							  </div>
							 
							  <div class="d-flex align-items-center py-3 border-bottom cursor-pointer">
								<div class="product-img me-2">
									 <img src="assets/images/products/08.webp" alt="product img">
								  </div>
								<div class="">
									<h6 class="mb-0 font-14">Grey Stand Table</h6>
									<p class="mb-0">115 Sales</p>
								</div>
								<div class="ms-auto">
									<h6 class="mb-0">$345.24</h6>
								</div>
							  </div>
							 
							  <div class="d-flex align-items-center py-3 border-bottom cursor-pointer">
								<div class="product-img me-2">
									 <img src="assets/images/products/09.webp" alt="product img">
								  </div>
								<div class="">
									<h6 class="mb-0 font-14">Brown Single Table</h6>
									<p class="mb-0">116 Sales</p>
								</div>
								<div class="ms-auto">
									<h6 class="mb-0">$126.24</h6>
								</div>
							  </div>
							 
							  <div class="d-flex align-items-center py-3 border-bottom cursor-pointer">
								<div class="product-img me-2">
									 <img src="assets/images/products/10.webp" alt="product img">
								  </div>
								<div class="">
									<h6 class="mb-0 font-14">Four Leg Chair</h6>
									<p class="mb-0">154 Sales</p>
								</div>
								<div class="ms-auto">
									<h6 class="mb-0">$425.24</h6>
								</div>
							  </div>
							 
							  <div class="d-flex align-items-center py-3 border-bottom cursor-pointer">
								<div class="product-img me-2">
									 <img src="assets/images/products/11.webp" alt="product img">
								  </div>
								<div class="">
									<h6 class="mb-0 font-14">Blue Light T-Shirt</h6>
									<p class="mb-0">186 Sales</p>
								</div>
								<div class="ms-auto">
									<h6 class="mb-0">$149.34</h6>
								</div>
							  </div>
							 
						</div>
					</div>
				 </div>
				</div><!--end row-->


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
											   <th>Date</th>
											   <th>Status</th>
											   <th>Price</th>
											   <th>Actions</th>
										   </tr>
									   </thead>
									   <tbody>
										   <tr>
											   <td>#55879</td>
											   <td>
												<div class="d-flex align-items-center">
													<div class="recent-product-img">
														<img src="assets/images/products/15.webp" alt="">
													</div>
													<div class="ms-2">
														<h6 class="mb-1 font-14">Light Red T-Shirt</h6>
													</div>
												</div>
											   </td>
											   <td>22 Jun, 2020</td>
											   <td class=""><span class="badge bg-light-success text-success w-100">Completed</span></td>
											   <td>#149.25</td>
											   <td>
												<div class="d-flex order-actions">	<a href="javascript:;" class="text-danger bg-light-danger border-0"><i class='bx bxs-trash'></i></a>
													<a href="javascript:;" class="ms-4 text-primary bg-light-primary border-0"><i class='bx bxs-edit' ></i></a>
												</div>
											   </td>
										   </tr>
										   <tr>
											<td>#88379</td>
											<td>
											 <div class="d-flex align-items-center">
												 <div class="recent-product-img">
													 <img src="assets/images/products/16.webp" alt="">
												 </div>
												 <div class="ms-2">
													 <h6 class="mb-1 font-14">Grey Headphone</h6>
												 </div>
											 </div>
											</td>
											<td>22 Jun, 2020</td>
											<td class=""><span class="badge bg-light-danger text-danger w-100">Cancelled</span></td>
											<td>#149.25</td>
											<td>
												<div class="d-flex order-actions">	<a href="javascript:;" class="text-danger bg-light-danger border-0"><i class='bx bxs-trash'></i></a>
													<a href="javascript:;" class="ms-4 text-primary bg-light-primary border-0"><i class='bx bxs-edit' ></i></a>
												</div>
											</td>
										</tr>
										<tr>
											<td>#68823</td>
											<td>
											 <div class="d-flex align-items-center">
												 <div class="recent-product-img">
													 <img src="assets/images/products/19.webp" alt="">
												 </div>
												 <div class="ms-2">
													 <h6 class="mb-1 font-14">Grey Hand Watch</h6>
												 </div>
											 </div>
											</td>
											<td>22 Jun, 2020</td>
											<td class=""><span class="badge bg-light-warning text-warning w-100">Pending</span></td>
											<td>#149.25</td>
											<td>
												<div class="d-flex order-actions">	<a href="javascript:;" class="text-danger bg-light-danger border-0"><i class='bx bxs-trash'></i></a>
													<a href="javascript:;" class="ms-4 text-primary bg-light-primary border-0"><i class='bx bxs-edit' ></i></a>
												</div>
											</td>
										</tr>
										<tr>
											<td>#54869</td>
											<td>
											 <div class="d-flex align-items-center">
												 <div class="recent-product-img">
													 <img src="assets/images/products/07.webp" alt="">
												 </div>
												 <div class="ms-2">
													 <h6 class="mb-1 font-14">Brown Sofa</h6>
												 </div>
											 </div>
											</td>
											<td>22 Jun, 2020</td>
											<td class=""><span class="badge bg-light-success text-success w-100">Completed</span></td>
											<td>#149.25</td>
											<td>
												<div class="d-flex order-actions">	<a href="javascript:;" class="text-danger bg-light-danger border-0"><i class='bx bxs-trash'></i></a>
													<a href="javascript:;" class="ms-4 text-primary bg-light-primary border-0"><i class='bx bxs-edit' ></i></a>
												</div>
											</td>
										</tr>
										<tr>
											<td>#22536</td>
											<td>
											 <div class="d-flex align-items-center">
												 <div class="recent-product-img">
													 <img src="assets/images/products/17.webp" alt="">
												 </div>
												 <div class="ms-2">
													 <h6 class="mb-1 font-14">Black iPhone 11</h6>
												 </div>
											 </div>
											</td>
											<td>22 Jun, 2020</td>
											<td class=""><span class="badge bg-light-success text-success w-100">Completed</span></td>
											<td>#149.25</td>
											<td>
												<div class="d-flex order-actions">	<a href="javascript:;" class="text-danger bg-light-danger border-0"><i class='bx bxs-trash'></i></a>
													<a href="javascript:;" class="ms-4 text-primary bg-light-primary border-0"><i class='bx bxs-edit' ></i></a>
												</div>
											</td>
										</tr>
										<tr>
											<td>#25796</td>
											<td>
											 <div class="d-flex align-items-center">
												 <div class="recent-product-img">
													 <img src="assets/images/products/14.webp" alt="">
												 </div>
												 <div class="ms-2">
													 <h6 class="mb-1 font-14">Men Yellow T-Shirt</h6>
												 </div>
											 </div>
											</td>
											<td>22 Jun, 2020</td>
											<td class=""><span class="badge bg-light-warning text-warning w-100">Pending</span></td>
											<td>#149.25</td>
											<td>
												<div class="d-flex order-actions">	<a href="javascript:;" class="text-danger bg-light-danger border-0"><i class='bx bxs-trash'></i></a>
													<a href="javascript:;" class="ms-4 text-primary bg-light-primary border-0"><i class='bx bxs-edit' ></i></a>
												</div>
											</td>
										</tr>
										<tr>
											<td>#98754</td>
											<td>
											 <div class="d-flex align-items-center">
												 <div class="recent-product-img">
													 <img src="assets/images/products/08.webp" alt="">
												 </div>
												 <div class="ms-2">
													 <h6 class="mb-1 font-14">Grey Stand Table</h6>
												 </div>
											 </div>
											</td>
											<td>22 Jun, 2020</td>
											<td class=""><span class="badge bg-light-danger text-danger w-100">Cancelled</span></td>
											<td>#149.25</td>
											<td>
												<div class="d-flex order-actions">	<a href="javascript:;" class="text-danger bg-light-danger border-0"><i class='bx bxs-trash'></i></a>
													<a href="javascript:;" class="ms-4 text-primary bg-light-primary border-0"><i class='bx bxs-edit' ></i></a>
												</div>
											</td>
										</tr>
									   </tbody>
								   </table>
							   </div>
								
							</div>
						</div>
					</div>
				</div><!--end row-->
			
			</div>
		</div>