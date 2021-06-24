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
								<li class="breadcrumb-item active" aria-current="page">Edit Area</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->

              <div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Edit Area</h5>
					  <hr/>
                        <div class="form-body mt-4">
                            <div class="row">
                            <div class="col-lg-12">
                            <div class="border border-3 p-4 rounded">
                            <form action="{{route('areas.update',$edits->id)}}" method="POST">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input class="form-control"  name="name" value="{{$edits->name}}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pincode</label>
                                    <input class="form-control"  name="pincode" value="{{$edits->pincode}}">
                                </div>
                                <div class="mb-3">
                                    <label for="">Country</label>
                                    <select name="district_id" id="" class="form-control" value="{{$edits->district_id}}">
                                        <option value="">Select a District</option>
                                        @foreach ($districts as $c)
                                            <option value="{{$c->id}}"{{ $c->id === $edits->district_id ? 'selected' : '' }}>{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Delivery Charge</label>
                                    <input class="form-control"  name="delivery_charge" value="{{$edits->delivery_charge}}">
                                </div>
                                <div class="mb-3">
                                    <label for="">Set Delivery Time</label>
                                    <select multiple="multiple" name="delivery_time[]" id="delivery_time" class="form-control" value="" >
                                        <option value="{{$edits->delivery_time}}" selected>{{$edits->delivery_time}}</option>
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
 
