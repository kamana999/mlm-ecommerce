@extends('admin.base')
@section('title', $products->title)
@section('meta_keywords', $products->meta_keywords)
@section('meta_description', $products->meta_description)
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
        
        height:80px; 
        width:80px;
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
<div class="page-wrapper">
	<div class="page-content">
        <div class="card">
            <div class="row g-0">
                <div class="col-md-4 border-end">
                    <img src="{{url('upload/'.$products->image)}}"  alt="..." height="230px" width="400px" id="currentImage">

                    <div class="product-section-images">
                        <div class="product-section-thumbnail selected">
                            <img src="{{url('upload',$products->image)}}"style="height:70px; width:70px;"> 
                        </div>
                        <?php foreach (json_decode($products->images)as $picture) { ?>
                            <div class="product-section-thumbnail">
                                <img src="{{ asset('/upload/'.$picture) }}" style="height:70px; width:70px;">
                            </div>
                        <?php } ?>
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
                <div class="col-md-8">
                    <div class="card-body">
                    <h4 class="card-title">{{$products->title}}</h4>
                    <div class="d-flex gap-3 py-3">
                        <div class="cursor-pointer">
                            <i class='bx bxs-star text-warning'></i>
                            <i class='bx bxs-star text-warning'></i>
                            <i class='bx bxs-star text-warning'></i>
                            <i class='bx bxs-star text-warning'></i>
                            <i class='bx bxs-star text-secondary'></i>
                        </div>	
                    </div>
                    <div class="mb-3"> 
                    @if($products->discount_price)
                    <h6 class="card-title cursor-pointer text-danger">Rs. {{$products->discount_price}} /per {{$products->weight_type}}<span class="text-muted"><del> {{$products->price}}</del></span></h6>
                    @else
                    <h6 class="card-title cursor-pointer text-danger">Rs. {{$products->price}} /per {{$products->weight_type}}</h6>
                    @endif 
                     
                    </div>
                    <p class="card-text fs-6">{{$products->description}}</p>
                    <dl class="row">
                        <dt class="col-sm-3">Meta Tag</dt>
                        <dd class="col-sm-9">{{$products->meta_keywords}}</dd>
                    
                        <dt class="col-sm-3">Meta Descriptions</dt>
                        <dd class="col-sm-9">{{$products->meta_description}}</dd>
                    </dl>
                    
                    </div>
                </div>
            </div>
            <hr/>
                           
        </div>
    </div>
</div>