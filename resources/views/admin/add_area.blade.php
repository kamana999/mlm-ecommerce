@extends('admin.base')
@section('content')

<div class="page-wrapper">
			<div class="page-content">

				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Area</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add New Area</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->

              <div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Add New Area</h5>
					  <hr/>
                        <div class="form-body mt-4">
                            <div class="row">
                            <div class="col-lg-12">
                            <div class="border border-3 p-4 rounded">
                            <form action="{{route('areas.store')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input class="form-control"  name="name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pincode</label>
                                    <input class="form-control"  name="pincode">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Delivery Charge</label>
                                    <input class="form-control"  name="delivery_charge">
                                </div>
                                <div class="mb-3">
                                    <label for="">District</label>
                                    <select name="district_id" id="" class="form-control">
                                        <option value="">Select a District</option>
                                        @foreach ($districts as $c)
                                            <option value="{{$c->id}}"{{ $c->id === old('country_id') ? 'selected' : '' }}>{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Set Delivery Time</label>
                                    <select multiple="multiple" name="delivery_time[]" id="delivery_time" class="form-control">
                                        <option value="">Select Delivery Time</option>
                                        <option value="6AM-9AM">6AM-9AM</option>
                                        <option value="9AM-12AM">9AM-12AM</option>
                                        <option value="12PM-3PM">12PM-3PM</option>
                                        <option value="3PM-6PM">3PM-6PM</option>
                                        <option value="6PM-9PM">6PM-9PM</option>
                                        <option value="9PM-12AM">9PM-12AM</option>
                                    </select>
                                </div>
                                
                                <div class="col-12 mt-2">
                                <div class="d-grid">
                                    <input type="submit" class="btn btn-primary w-100">    
                                </div>
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
 
