@extends('base')
@section('content')
<style>
    .product-section{
        display:grid;
        grid-template-columns: 1fr 1fr;
        grid-gap:20px;
        margin-top:20px;
    }
    .product-section-images{
        display:grid;
        grid-template-columns: repeat(6,1fr);
        grid-gap:10px;
        margin-top:20px;
    }
    .product-section-thumbnail{
        display:flex; 
        align-items:center;
        height:80px; 
        width:80px;
        padding:5px;
        ;
        border:1px solid lightgray; 
        cursor:pointer;
    }
    .col>img{
        
        height:70px; 
        width:70x;
        padding:5px;
        border:1px solid gray; 
        cursor:pointer;
    }
    .selected{
            border:2px solid green;
            
    }
    .product-section-thumbnail:hover{
        border:2px solid green; 
    }
    .demo{
        
        width: 400px;
        height: 400px;
        overflow:hidden;
    }
    .demo > img {  
    object-fit: cover;
        width: 100%;
        height: 100%;
    transition: all .4s ease-in-out;
    }
    .demo:hover{
        transform: scale(1.03);
    }
</style>
<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-lg-5 mt-5 p-4 "fixed>
            <div class="demo">
                <a href="" >
                    <img src="{{url('upload',$cakes->image)}}" style="height:350px; width:350px;" id="currentImage">
                </a>
            </div>
            <div class="product-section-images">
                <div class="product-section-thumbnail selected">
                    <img src="{{url('upload',$cakes->image)}}"style="height:75px; width:75px;"> 
                </div>
                <?php foreach (json_decode($cakes->images)as $picture) { ?>
                    <div class="product-section-thumbnail">
                        <img src="{{ asset('/upload/'.$picture) }}" style="height:75px; width:75px;">
                    </div>
                <?php } ?>
                
            </div>
            
        </div>
        <div class="col-lg-7 mt-5 p-4 mx-auto">
                  <h3>{{$cakes->title}}</h3>
                  <small>Ratings : <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i></small>
                  @if($cakes->discount_price)
                        <p><span  class="fw-bold mt-3">Price : &#8377;{{$cakes->discount_price}}/{{$cakes->weight_type}}</span> <small class="text-secondary"> (Inclusive of all taxes)</small><span><del> &#8377;{{$cakes->price}}</del></span></p>
                    @else
                    <p>Price : &#8377;{{$cakes->price}}/{{$cakes->weight_type}}</p>
                    @endif
                    <h6 class="text-muted mt-3">Pick an Upgrade</h6>
                    <div class="container mb-3">
                        <div class="row">
                        <div class="col-2 ">
                            <a href="{{route('product_detail',$cakes->id)}}" >
                            <img src="{{url('upload',$cakes->image)}}"style="height:75px; width:75px;"class="selected" > 
                            </a>
                            <h6>{{$cakes->weight}}{{$cakes->weight_type}}</h6>
                            @if($cakes->discount_price)
                                <h5 class="text-danger h6">₹{{$cakes->discount_price}}</h5>
                            @else
                            <h5 class="text-danger h6">₹{{$cakes->price}}</h5>
                            @endif 
                        </div>
                        @foreach($upgrade as $u)
                        <div class="col-2">
                            <a href="{{route('product_detail',$u->id)}}">
                            <img src="{{ asset('/upload/'.$u->image) }}" alt="" style="height:75px; width:75px;" class="">   
                            </a>
                        
                            <h6>{{$u->weight}}{{$u->weight_type}}</h6>
                            @if($u->discount_price)
                                <h5 class="text-danger h6">₹{{$u->discount_price}}</h5>
                            @else
                            <h5 class="text-danger h6">₹{{$u->price}}</h5>
                            @endif
                        </div>
                        @endforeach
                        </div>
                    </div>
                
                     <div class="container mt-5">
                    <div class="row">
                    <div class="col-lg-6">
                        @if(!$area)
                            <div>
                                <form action="{{route('area',$cakes->id)}}" method="GET">
                                    @csrf
                                    <div class="my-3"><span class="fw-bold">Check Aviablitity :</span>
                                        <div class="form-group mt-3">
                                        <input type="text" value="" class="form-inline p-2" name="area" placeholder="Enter Pincode" style="border: 1px solid #ff9212;" required>
                                        <input type="submit" value="search" class="btn btn-info  btn-sm text-white">
                                        </div>
                                        <p class="text-danger">Please Select Pincode First</p>
                                    </div>
                                </form> 
                            </div>
                            <div class="py-3">
                                <a href=""><button class="btn btn-success fw-bold w-100 m-1" disabled>Add To Cart</button></a>
                            </div>
                            
                        @else
                            <form action="{{route('add_to_cart',['id'=>$cakes->id])}}" method="POST">
                                @csrf
                                    <div class=""><span class="fw-bold">Product Available At:</span>
                                        <input type="text" value="{{$area->pincode}}" class="form-control p-2" name="area" placeholder="Enter Pincode" style="border: 1px solid green;"required>
                                    </div>
                                    <script>
                                        $(document).ready(function(){
                                        $('[data-toggle="popover"]').popover();
                                        });
                                    </script>
                                    @auth
                                    <div class="py-3">
                                        <a href=""><button class="btn btn-success fw-bold w-100 m-1">Add To Cart</button></a>
                                    </div>
                                    @endauth
                                </div>
                            </form>
                            @guest
                            <div class="py-3">
                                <a href="{{ route('addToCartSession',['id'=>$cakes->id])}}"><button class="btn btn-success fw-bold w-50 m-1">Add To Cart</button></a>
                            </div>
                            @endguest  
                        @endif
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
    <h4>Related Products</h4>
    @foreach($related as $p)
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

<div class="container">
    <div class="row">
    
    </div>
</div>

<script type="text/javascript">

    (function(){
        const currentImage = document.querySelector('#currentImage');
        const images = document.querySelectorAll('.product-section-thumbnail');

        images.forEach((element) => element.addEventListener('click',thumbnailClick));

        function thumbnailClick(e){
            currentImage.src = this.querySelector('img').src;

            images.forEach((element) => element.classList.remove('selected'));
            this.classList.add('selected');
        }
        

    })();
    
</script>
@endsection