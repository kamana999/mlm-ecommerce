@extends('admin.base')
@section('content')

<div class="page-wrapper">
			<div class="page-content">

				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Category</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add New category</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->

              <div class="card">
				  <div class="card-body p-4">
					  
                        <div class="form-body mt-4">
                            <div class="row">
                            <div class="col-lg-12">
                            <div class="border border-3 p-4 rounded">
                            <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h5 class="card-title">Add Meta Tags</h5><hr/>
                                <div class="mb-3">
                                    <label>Keywords</label>
                                    <input name="meta_keywords" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Description</label>
                                    <input name="meta_description" class="form-control">
                                </div>
                                <h5 class="card-title">Add New Category</h5>
					            <hr/>
                                <div class="mb-3">
                                    <label class="form-label">Category Title</label>
                                    <input type="text" name="cat_title" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <select class="form-control" name="parent_id">
                                        <option value="">Select Parent Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->cat_title }}</option>
                                        @endforeach
                                    </select>
   
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Category Images</label>
                                    <input type="file" name="image" class="form-control" required>
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

