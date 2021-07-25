@extends('base')
@section('content')
<div class="container mt-5">
    <div class="row">
    
      <div class="col-lg-12 mt-5 m-auto text-center">
      <h1 class="font-weight-bold">Our Products</h1>
        <small class="text-danger">Eat Healthy,Live Healthy</small>
      
      </div>
        <div class="col-lg-3 mt-5">
        <ol class="list-group list-group-numbered ">
          <a href="{{route('products')}}">
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                <div class="fw-bold">All</div>
                </div>
                <span class="badge bg-primary rounded-pill">{{count($products)}}</span>
            </li>
            </a>
            @foreach($category as $c)
            <a href="{{route('category',$c->id)}}">
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                <div class="fw-bold">{{$c->cat_title}}</div>
                </div>
                <span class="badge bg-primary rounded-pill">{{count($c->items)}}</span>
            </li>
            </a>
            @endforeach
        </ol>
        </div>
        <div class="col-lg-9 mt-3 p-5">
            <div class="row">
                @foreach($product as $p)
                <div class="col-lg-3 text-center">
            <a href="{{route('product_detail',$p->id)}}">
              <div class="card border-0 bg-light mb-2">
                <div class="card-body">
                  <img src="{{url('upload/'.$p->image)}}" class="img-fluid">
                </div>
              </div>
              <h6>{{$p->title}}</h6>
              @if($p->discount_price)
                <p>&#8377;{{$p->discount_price}}/{{$p->weight_type}}<span><del> &#8377;{{$p->price}}</del></span></p>
              @else
              <p>&#8377;{{$p->price}}/{{$p->weight_type}}</p>
              @endif
            </a>
          </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection