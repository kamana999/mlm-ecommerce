@extends('admin.base')
@section('content')

<div class="page-wrapper">
    <div class="page-content">
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Add New Category</h5>
                <hr/>
                <div class="form-body mt-4">
                    <div class="row">
                    <div class="col-lg-12">
                    <div class="border border-3 p-4 rounded">
                    <form action="{{route('categories.update',$edits->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label class="form-label">Category Title</label>
                            <input type="text" name="cat_title" class="form-control"  value="{{$edits->cat_title}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <input class="form-control"  name="description"rows="3" value="{{$edits->description}}" >
                        </div>
                        <div class="mb-3">
                                    <select class="form-control" name="parent_id" value="{{$edits->parent_id}}">
                                        
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->cat_title }}</option>
                                        @endforeach
                                    </select>
   
                                </div>
                        <div class="mb-3">
                            <label class="form-label">Category Images</label>
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


