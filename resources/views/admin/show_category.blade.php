@extends('admin.base')

@section('title', $category->cat_title)
@section('meta_keywords', $category->meta_keywords)
@section('meta_description', $category->meta_description)

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
								<li class="breadcrumb-item active" aria-current="page">Category Details</li>
							</ol>
                            
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							<div class="col-lg-6 mx-auto">
								<div class="card">
									<div class="card-body">
										<div class="d-flex flex-column align-items-center text-center mt-5">
											<img src="{{url('upload/'.$category->image)}}" height="400px" width="400px">
											<div class="mt-3">
												<h4>{{$category->cat_title}}</h4>
											
												@if($category->parent_id)
                                                <p class="text-muted font-size-sm">Parent Cake - {{$category->parent->cat_title}}</p>
                                                @endif
                                                
											</div>
										</div>
										
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
</div>