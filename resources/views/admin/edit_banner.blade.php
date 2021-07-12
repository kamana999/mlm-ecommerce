@extends('admin.base')
@section('content')

<div class="page-wrapper">
			<div class="page-content">

				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Banner</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Edit Banner</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->

              <div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Edit Banner</h5>
					  <hr/>
                        <div class="form-body mt-4">
                            <div class="row">
                            <div class="col-lg-12">
                            <div class="border border-3 p-4 rounded">
                            <form action="{{route('banners.update',$edits->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label class="form-label">Banner Title</label>
                                    <input type="text" name="title" class="form-control" value="{{$edits->title}}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <input class="form-control"  name="description"rows="3" value="{{$edits->description}}">
                                </div>
                                <div class="mb-4">
                                    <label for="">Status</label>
                                    <select name="status" id="status" class="form-control" value="{{$edits->status}}">
                                        <option value="{{$edits->status}}">{{$edits->status}}</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                           
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Product Images</label>
                                    <img src="{{url('upload/'.$edits->image)}}" height="80" width="80" alt="">
                                    <input type="file" name="image" class="form-control">
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

@endsection