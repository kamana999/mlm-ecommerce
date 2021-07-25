@extends('base')
@section('content')
    <div class="container mt-5 p-5">    
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
@endsection