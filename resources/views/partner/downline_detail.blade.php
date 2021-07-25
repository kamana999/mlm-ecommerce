@extends('partner.base')
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
                                <form  action="{{ route('partner_details') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="input-field mb-3">
                                                   <label for="" class="mb-2">User Id</label>
                                                    <input type="text" placeholder="User ID" name="user_id" readonly value=" {{$user->id}}"  class="form-control text-muted">
                                                    </div>
                                                    <div class="input-field mb-3">
                                                    <label for="" class="mb-2">Sponsar Name</label>
                                                    <input type="text" name="parent_id" id=""  readonly value="{{$partner->id}}"class="form-control">
                                                    
                                                    <!-- <select name="parent_id" id="" class="text-muted">
                                                        <option value="">Select Sponsar</option>
                                                        @foreach ($sponsars as $s)
                                                        <option value="{{ $s->id }}">{{ $s->first_name }} {{ $s->last_name }}</option>
                                                        @endforeach
                                                        </select> -->
                                                    </div>
                                                    <div class="input- mb-3">
                                                    <label for="" class="mb-2">First Name</label>
                                                        <input type="text" placeholder="First name" class="form-control" name="first_name" required autofocus autocomplete="name">
                                                    </div>
                                                    <div class="input-field mb-3">
                                                    <label for=""class="mb-2">Contact</label>
                                                        <input placeholder="Contact" class="form-control" type="integer" name="contact" required >
                                                    </div>
                                                    <div class="input-field mb-3">
                                                    <label for="" class="mb-2">DOB</label>
                                                    <i class="fas fa-calendar-check"></i>
                                                    <input type="text" class="form-control" id="txtDate"minDate="0" placeholder="Date of Birth" name="dob" onfocus="(this.type='date')" onblur="(this.type='text')" class="datepicker p-3 "  require>
                                                    </div>

                                                    <script>
                                                        $('#txtDate').attr('min', maxDate);
                                                    </script>
                                                    <div class="input-field mb-3">
                                                    <label for="" class="mb-2">Country</label>
                                                        <select name="country_id" id="" required class="text-muted form-control">
                                                        <option value="">Select Country</option>
                                                        @foreach ($country as $c)
                                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="input-field mb-3">
                                                    <label for="" class="mb-2">State</label>
                                                        <select name="district_id" id="" required class="text-muted form-control">
                                                        <option value="">Select District</option>
                                                        @foreach ($district as $c)
                                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="input-feild mb-3">
                                                    <label for="" class="mb-2">Select Image</label>
                                                    <input type="file" name="image" class="form-control" required>
                                                    </div>
                                                    <div class="input-field mb-3">
                                                        <label for="" class="mb-2">Select Position</label>
                                                        <select name="position" id="" class="form-control" required class="text-muted">
                                                        <option value="">Select Postion</option>
                                                        <option value="left">Left</option>
                                                        <option value="middle">Middle</option>
                                                        <option value="right">Right</option>
                                                        </select>
                                                    </div>
                                                    <div class="input-field mb-3">
                                                        <label for=""class="mb-2">Last Name</label>
                                                        <input type="text" placeholder="Last name" class="form-control" name="last_name" required autofocus autocomplete="name">
                                                    </div>
                                                    <div class="input-field mb-3">
                                                    <label for="" class="mb-2">Optional Contact</label>
                                                        <input type="integer" placeholder="Optional Contact" class="form-control" name="optional_contact">
                                                    </div>
                                                    <div class="input-field mb-3">
                                                        <label for="" class="mb-2">Address</label>
                                                        <input type="text" class="form-control" placeholder="Enter Address" name="street" required autofocus>
                                                    </div>
                                                    <div class="input-field mb-3">
                                                        <label for="" class="mb-2">State</label>
                                                        <select name="state_id" id="" class="form-control" required class="text-muted">
                                                        <option value="">Select State</option>
                                                        @foreach ($state as $c)
                                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="input-field mb-3">
                                                        <label for="" class="mb-2">Area</label>
                                                        <select name="area_id" id="" required class="text-muted form-control">
                                                        <option value="">Select Area / Pincode</option>
                                                        @foreach ($area as $c)
                                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                            <input type="submit" class="btn btn-primary" value="Sign Up" >
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