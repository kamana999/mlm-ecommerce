@extends('base')
@section('content')

<div id="carouselExampleDark" class="carousel carousel-dark slide mt-5" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
  @foreach($banners as $key => $slider)
    <div class="carousel-item {{$key == 0 ? 'active' : '' }}" data-bs-interval="10000">
      <img src="{{url('upload/'.$slider->image)}}" class="d-block w-100" alt="..." height="550px">
      <div class="carousel-caption d-none d-md-block">
        <h1 style="color:white; margin-top:-30%">{{$slider->title}}</h1>
        <h5 style="color: gray;">{{$slider->description}}</h5>
      </div>
    </div>
  @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<section class="new">
      <div class="container py-5">
      <div class="row ">
        <div class="col-lg-3 mx-auto ">
        <div class="row text-center">
          <h5 class="h2 mb-4">Categories</h5>
          @foreach($categories as $c)
          <div class="col-lg-5 col-4">
          <img src="{{asset('upload/'.$c->image)}}" class="img-fluid" alt="apple">
          <h6 class="mt-2 font-weight-bold">{{$c->cat_title}}</h6>
          </div>
          @endforeach

          </div>
        </div>
        
        </div>
      
      </div>
      </section>


<section class="product">
    <div class="container py-3">
            <div class="row py-3 ">
      <div class="col-lg-5 m-auto text-center">
      <h1 class="font-weight-bold">Trending Products</h1>
        <small class="text-danger">Eat Healthy,Leave Healthy</small>
      </div>
      </div>
      <div class="row">
      @foreach($products as $p)
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
    
</section>


<section class="bottom-banner py-5 my-4">
      <div class="container text-dark py-5 ">
        <div class="row ">
        <div class="col-lg-6 text-center">
          <h1 class="font-weight-bold ">Become Healthy By Organic Fruits And Vegetables</h1>
          <small class="text-danger">Be Healthy , Be Fit</small><br>
         <button class="btn1 mt-3">Shop Now</button>
          </div>
       
        </div>
      
      </div>
</section>

<section class="products">
    <div class="container my-3 mt-5">
      <div class="row">
      <div class="col-lg-12 ">
    
   
      <div class=" pr-card">
      <h3 class="mt-4 mx-3">Vegetables</h3>
        <div class="row">
      @foreach($vegetable as $v)
          <div class="col-lg-3 p-3  my-2 float-left">
            <div class="card border-0 py-2">
          <div class="text-center">
              <img src="{{asset('upload/'.$v->image)}}" height="150px" width="150px" >
              
            </div>
            <div class="text-center fw-bold">
            @if($v->discount_price)
            {{$v->title}}- &#8377; {{$v->discount_price}} /{{$v->weight_type}}
            @else
            {{$v->title}}- &#8377; {{$v->price}} /{{$v->weight_type}}
            @endif
            </div>
            @auth
              <a class="text-center mt-2 mb-2" href="{{route('add_to_cart_details',$v->id)}}">
                <button class="btn btn-warning p-0 w-75" type="submit"><i class="fas fa-shopping-basket"></i> Add To Cart</button>
              </a>
            @else
            <a class="text-center mt-2 mb-2" href="{{route('addToCartSession',['id'=>$v->id])}}">
                <button class="btn btn-warning p-0 w-75" type="submit"><i class="fas fa-shopping-basket"></i> Add To Cart</button>
              </a>
            @endauth
            </div></div>
           
      @endforeach
    
    </div>
    <div class="container my-3">
    <div class="row">
    <div class="col-lg-12  ">
    
   
      <div class="">
      <h3 class="mt-4 mx-3">Fruits</h3>
        <div class="row">
     @foreach($fruit as $v)
     <div class="col-lg-3 p-3  my-2 float-left">
            <div class="card border-0 py-2">
          <div class="text-center">
              <img src="{{asset('upload/'.$v->image)}}" height="150px" width="150px" >
              
            </div>
            <div class="text-center fw-bold">
            @if($v->discount_price)
            {{$v->title}}- &#8377; {{$v->discount_price}} /{{$v->weight_type}}
            @else
            {{$v->title}}- &#8377; {{$v->price}} /{{$v->weight_type}}
            @endif
            </div>
            @auth
              <a class="text-center mt-2 mb-2" href="{{route('add_to_cart_details',$v->id)}}">
                <button class="btn btn-warning p-0 w-75" type="submit"><i class="fas fa-shopping-basket"></i> Add To Cart</button>
              </a>
            @else
            <a class="text-center mt-2 mb-2" href="{{route('addToCartSession',['id'=>$v->id])}}">
                <button class="btn btn-warning p-0 w-75" type="submit"><i class="fas fa-shopping-basket"></i> Add To Cart</button>
              </a>
            @endauth
            </div></div>
      @endforeach
   </div>
      </div>
     </div></div>
    
    </div>
</section>
@endsection