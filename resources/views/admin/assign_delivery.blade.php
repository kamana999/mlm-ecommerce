@extends('admin.base')
@section('content')
<div class="page-wrapper">
			<div class="page-content">
                <div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Assign Delivery Boy</h5>
					  <hr/>
                        <div class="form-body mt-4">
                            <div class="row">
                            <div class="col-lg-12">
                            <div class="border border-3 p-4 rounded">
                            <form action="{{route('submit_delivery_boy', $order->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <select name="delivery" class="form-control">
                                <option value="">Select Delivery Boy</option>
                                @foreach ($delivery as $a)
                                <option value="{{$a->id}}">{{$a->name}} {{ $a->contact }}</option>
                                @endforeach
                            </select>

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