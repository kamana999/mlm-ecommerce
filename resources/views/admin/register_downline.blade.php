@extends('admin.base')
@section('content')
<div class="page-wrapper">
	<div class="page-content">

        <!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Register New Member</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add New Member</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->

              <div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Register New Member</h5>
					  <hr/>
                        <div class="form-body mt-4">
                            <div class="row">
                            <div class="col-lg-12">
                            <div class="border border-3 p-4 rounded">
                                <form class="sign-in-form sign" action="{{ route('submit_downline_admin') }}" method="POST">
                                        @csrf
                                        <div class="input-field mb-3">
                                           <label for="" class="mb-2">Username</label>
                                            <input type="text" placeholder="Username" class="form-control" name="name" :value="old('name')" required autofocus autocomplete="name">
                                            </div>
                                            <div class="input-field mb-3">
                                            <label for="" class="mb-2">Email</label>
                                            <input placeholder="Email"  class="form-control"type="email" name="email" :value="old('email')" required  >
                                            </div>
                                            <div class="input-field mb-3">
                                            <label for="" class="mb-2">Password</label>
                                            <input type="password" placeholder="Password" name="password" required autocomplete="new-password" class="form-control">
                                            </div>
                                            
                                            <input type="submit" value="Sign Up" class="btn btn-primary form-control solid">

                                            
                                            
                                    </div>
                                </form>
                            </div>
    
                            </div>
                            </div>
                        </div>
					</div>
				  </div>
			  </div>

    </div>
</div>
    
@endsection