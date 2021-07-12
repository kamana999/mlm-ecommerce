@extends('base')
@section('content')

<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
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
            <div class="col-lg-7 m-auto ">
                  <div class="row text-center">
                    @foreach($categories as $c)
                      <div class="col-lg-4 col-4">
                      
                        <img src="{{url('upload/'.$c->image)}}" class="img-fluid" alt="apple">
                      
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
      <div class="row my-4">
      <div class="col-lg-6 text-center m-auto">
        <button class="btn1 m-auto">Click For More</button>
        </div>
      </div>
      </div>
    
    </section>
    <section class="shop">
      <div class="container">
        <div class="row py-5">
        <div class="col-lg-8 m-auto text-center">
           <h1>More From Us</h1>
           <small class="text-danger">From Moma's Hands</small>
          </div>
        </div>
         <div class="row">
       <div class="col-lg-3 text-center">
          <div class="card border-0 bg-light mb-2">
         <div class="card-body">
          <img src="images/pome-removebg-preview.png" class="img-fluid">
          </div>
         </div>
         <h6>Pomegranate</h6>
         <p>&#8377;100/kg</p>
        </div>
       <div class="col-lg-3 text-center">
          <div class="card border-0 bg-light mb-2">
         <div class="card-body">
          <img src="images/pome-removebg-preview.png" class="img-fluid">
          </div>
         </div>
         <h6>Pomegranate</h6>
         <p>&#8377;100/kg</p>
        </div>
       <div class="col-lg-3 text-center">
          <div class="card border-0 bg-light mb-2">
         <div class="card-body">
          <img src="images/pome-removebg-preview.png" class="img-fluid">
          </div>
         </div>
         <h6>Pomegranate</h6>
         <p>&#8377;100/kg</p>
        </div>
        <div class="col-lg-3 text-center">
          <div class="card border-0 bg-light mb-2">
         <div class="card-body">
          <img src="images/pome-removebg-preview.png" class="img-fluid">
          </div>
         </div>
         <h6>Pomegranate</h6>
         <p>&#8377;100/kg</p>
        </div>
      
      </div>
         <div class="row">
       <div class="col-lg-3 text-center">
          <div class="card border-0 bg-light mb-2">
         <div class="card-body">
          <img src="images/pome-removebg-preview.png" class="img-fluid">
          </div>
         </div>
         <h6>Pomegranate</h6>
         <p>&#8377;100/kg</p>
        </div>
       <div class="col-lg-3 text-center">
          <div class="card border-0 bg-light mb-2">
         <div class="card-body">
          <img src="images/pome-removebg-preview.png" class="img-fluid">
          </div>
         </div>
         <h6>Pomegranate</h6>
         <p>&#8377;100/kg</p>
        </div>
       <div class="col-lg-3 text-center">
          <div class="card border-0 bg-light mb-2">
         <div class="card-body">
          <img src="images/pome-removebg-preview.png" class="img-fluid">
          </div>
         </div>
         <h6>Pomegranate</h6>
         <p>&#8377;100/kg</p>
        </div>
        <div class="col-lg-3 text-center">
          <div class="card border-0 bg-light mb-2">
         <div class="card-body">
          <img src="images/pome-removebg-preview.png" class="img-fluid">
          </div>
         </div>
         <h6>Pomegranate</h6>
         <p>&#8377;100/kg</p>
        </div>
      
      </div>
         <div class="row">
       <div class="col-lg-3 text-center">
          <div class="card border-0 bg-light mb-2">
         <div class="card-body">
          <img src="images/pome-removebg-preview.png" class="img-fluid">
          </div>
         </div>
         <h6>Pomegranate</h6>
         <p>&#8377;100/kg</p>
        </div>
       <div class="col-lg-3 text-center">
          <div class="card border-0 bg-light mb-2">
         <div class="card-body">
          <img src="images/pome-removebg-preview.png" class="img-fluid">
          </div>
         </div>
         <h6>Pomegranate</h6>
         <p>&#8377;100/kg</p>
        </div>
       <div class="col-lg-3 text-center">
          <div class="card border-0 bg-light mb-2">
         <div class="card-body">
          <img src="images/pome-removebg-preview.png" class="img-fluid">
          </div>
         </div>
         <h6>Pomegranate</h6>
         <p>&#8377;100/kg</p>
        </div>
        <div class="col-lg-3 text-center">
          <div class="card border-0 bg-light mb-2">
         <div class="card-body">
          <img src="images/pome-removebg-preview.png" class="img-fluid">
          </div>
         </div>
         <h6>Pomegranate</h6>
         <p>&#8377;100/kg</p>
        </div>
      
      </div>
         <div class="row">
       <div class="col-lg-3 text-center">
          <div class="card border-0 bg-light mb-2">
         <div class="card-body">
          <img src="images/pome-removebg-preview.png" class="img-fluid">
          </div>
         </div>
         <h6>Pomegranate</h6>
         <p>&#8377;100/kg</p>
        </div>
       <div class="col-lg-3 text-center">
          <div class="card border-0 bg-light mb-2">
         <div class="card-body">
          <img src="images/pome-removebg-preview.png" class="img-fluid">
          </div>
         </div>
         <h6>Pomegranate</h6>
         <p>&#8377;100/kg</p>
        </div>
       <div class="col-lg-3 text-center">
          <div class="card border-0 bg-light mb-2">
         <div class="card-body">
          <img src="images/pome-removebg-preview.png" class="img-fluid">
          </div>
         </div>
         <h6>Pomegranate</h6>
         <p>&#8377;100/kg</p>
        </div>
        <div class="col-lg-3 text-center">
          <div class="card border-0 bg-light mb-2">
         <div class="card-body">
          <img src="images/pome-removebg-preview.png" class="img-fluid">
          </div>
         </div>
         <h6>Pomegranate</h6>
         <p>&#8377;100/kg</p>
        </div>
      
      </div>
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
      <div class="col-lg-3 p-3  my-2 float-left">
            <div class="card border-0 py-2">
       <div class="text-center">
           <img src="images/potato.jpg" height="150px" width="150px" >
          
        </div>
      <div class="text-center fw-bold">
      Potato - &#8377; 20 /kg
        </div>
    
      <div class="text-center">
      
        <small class="fw-bold">Qty :</small>
        <input type="tel" for="quantity" size="1"><span class="bg-light  fw-bold"> Kg</span>
        <i class="fas fa-plus shadow border border-1 p-1" style="cursor: pointer;margin-right: -10px"></i>&nbsp;
        <i class="fas fa-minus shadow border border-1 p-1" style="cursor: pointer;"></i>&nbsp;
        
      
      </div><br>
      <div class="text-center">
      <button class="btn btn-warning p-0 w-75" type="submit"><i class="fas fa-shopping-basket"></i> Add To Cart</button>
      </div>
    </div>
         </div>
       <div class="col-lg-3 p-3  my-2 float-left">
         <div class="card border-0 py-2">
       <div class="text-center">
           <img src="images/onion.jpg" height="150px" width="150px" >
          
        </div>
        <div class="text-center fw-bold">
    Onion- &#8377; 20 /kg
        </div>
    
             <div class="text-center">
      
        <small class="fw-bold">Qty :</small>
        <input type="tel" for="quantity" size="1"><span class="bg-light  fw-bold"> Kg</span>
        <i class="fas fa-plus shadow border border-1 p-1" style="cursor: pointer;margin-right: -10px"></i>&nbsp;
        <i class="fas fa-minus shadow border border-1 p-1" style="cursor: pointer;"></i>&nbsp;
        
      
      
      
      </div><br>
      <div class="text-center">
      <button class="btn btn-warning p-0 w-75" type="submit"><i class="fas fa-shopping-basket"></i> Add To Cart</button>
      </div>
        </div></div>
           <div class="col-lg-3 p-3  my-2 float-left">
             <div class="card border-0 py-2">
       <div class="text-center">
           <img src="images/pumpkin.jpg" height="150px" width="150px" >
          
        </div>
       <div class="text-center fw-bold">
     Pumpkin- &#8377; 20 /kg
        </div>
    
       <div class="text-center">
      
        <small class="fw-bold">Qty :</small>
        <input type="tel" for="quantity" size="1"><span class="bg-light  fw-bold"> Kg</span>
        <i class="fas fa-plus shadow border border-1 p-1" style="cursor: pointer;margin-right: -10px"></i>&nbsp;
        <i class="fas fa-minus shadow border border-1 p-1" style="cursor: pointer;"></i>&nbsp;
        
      
      </div><br>
      <div class="text-center">
      <button class="btn btn-warning p-0 w-75" type="submit"><i class="fas fa-shopping-basket"></i> Add To Cart</button>
      </div>
    </div>
         </div>
           <div class="col-lg-3 p-3  my-2 float-left">
             <div class="card border-0 py-2">
       <div class="text-center">
           <img src="images/garlic.jpg" height="150px" width="150px" >
          
        </div>
        <div class="text-center fw-bold">
      Garlic - &#8377; 20 /kg
        </div>
    
      <div class="text-center">
      
        <small class="fw-bold">Qty :</small>
        <input type="tel" for="quantity" size="1"><span class="bg-light  fw-bold"> Kg</span>
        <i class="fas fa-plus shadow border border-1 p-1" style="cursor: pointer;margin-right: -10px"></i>&nbsp;
        <i class="fas fa-minus shadow border border-1 p-1" style="cursor: pointer;"></i>&nbsp;
        
      
      </div><br>
      <div class="text-center">
      <button class="btn btn-warning p-0 w-75" type="submit"><i class="fas fa-shopping-basket"></i> Add To Cart</button>
      </div>
    </div>
         </div>
         
           
      </div>
      </div>
     </div></div>
    
    </div>
    <div class="container my-3">
    <div class="row">
    <div class="col-lg-12  ">
    
   
      <div class="">
      <h3 class="mt-4 mx-3">Fruits</h3>
        <div class="row">
     <div class="col-lg-3 p-3  my-2 float-left">
            <div class="card border-0 py-2">
       <div class="text-center">
           <img src="images/apple-removebg-preview.png" height="150px" width="150px" >
          
        </div>
        <div class="text-center fw-bold">
      Apples - &#8377; 100 /kg
        </div>
     <div class="text-center">
      
        <small class="fw-bold">Qty :</small>
        <input type="tel" for="quantity" size="1"><span class="bg-light  fw-bold"> Kg</span>
        <i class="fas fa-plus shadow border border-1 p-1" style="cursor: pointer;margin-right: -10px"></i>&nbsp;
        <i class="fas fa-minus shadow border border-1 p-1" style="cursor: pointer;"></i>&nbsp;
        
      
      </div><br>
      <div class="text-center">
      <button class="btn btn-warning p-0 w-75" type="submit"><i class="fas fa-shopping-basket"></i> Add To Cart</button>
      </div>
    </div>
         </div>
      <div class="col-lg-3 p-3  my-2 float-left">
            <div class="card border-0 py-2">
       <div class="text-center">
           <img src="images/pears-removebg-preview.png" height="150px" width="150px" >
          
        </div>
       <div class="text-center fw-bold">
      Pears - &#8377; 100 /kg
        </div>
    
       <div class="text-center">
      
        <small class="fw-bold">Qty :</small>
        <input type="tel" for="quantity" size="1"><span class="bg-light  fw-bold"> Kg</span>
        <i class="fas fa-plus shadow border border-1 p-1" style="cursor: pointer;margin-right: -10px"></i>&nbsp;
        <i class="fas fa-minus shadow border border-1 p-1" style="cursor: pointer;"></i>&nbsp;
        
      
      </div><br>
      <div class="text-center">
      <button class="btn btn-warning p-0 w-75" type="submit"><i class="fas fa-shopping-basket"></i> Add To Cart</button>
      </div>
    </div>
         </div>
            <div class="col-lg-3 p-3  my-2 float-left">
            <div class="card border-0 py-2">
       <div class="text-center">
           <img src="images/guava-removebg-preview.png" height="150px" width="150px" >
          
        </div>
      <div class="text-center fw-bold">
     Guava- &#8377; 100 /kg
        </div>
    
       <div class="text-center">
      
        <small class="fw-bold">Qty :</small>
        <input type="tel" for="quantity" size="1"><span class="bg-light  fw-bold"> Kg</span>
        <i class="fas fa-plus shadow border border-1 p-1" style="cursor: pointer;margin-right: -10px"></i>&nbsp;
        <i class="fas fa-minus shadow border border-1 p-1" style="cursor: pointer;"></i>&nbsp;
        
      
      </div><br>
      <div class="text-center">
      <button class="btn btn-warning p-0 w-75" type="submit"><i class="fas fa-shopping-basket"></i> Add To Cart</button>
      </div>
    </div>
         </div>
           <div class="col-lg-3 p-3  my-2 float-left">
            <div class="card border-0 py-2">
       <div class="text-center">
           <img src="images/ban-removebg-preview.png" height="150px" width="150px" >
          
        </div>
       <div class="text-center fw-bold">
     Bananas - &#8377; 50 /Dozen
        </div>
    
      <div class="text-center">
      
        <small class="fw-bold">Qty :</small>
        <input type="tel" for="quantity"size="1"><span class="bg-light  fw-bold"> Kg</span>
        <i class="fas fa-plus shadow border border-1 p-1" style="cursor: pointer;margin-right: -10px"></i>&nbsp;
        <i class="fas fa-minus shadow border border-1 p-1" style="cursor: pointer;"></i>&nbsp;
        
      
      </div><br>
      <div class="text-center">
      <button class="btn btn-warning p-0 w-75" type="submit"><i class="fas fa-shopping-basket"></i> Add To Cart</button>
      </div>
    </div>
         </div>
           
         
   </div>
      </div>
     </div></div>
    
    </div>
</section>
@endsection