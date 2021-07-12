@extends('base')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-5 mx-auto">
        <img src="{{asset('images/order.png')}}" alt="">
      
        <a href="{{route('home')}}" class="btn btn-success mb-5"style="color: white;margin-left:150px"> Continue Shopping</a>
        </div>
    </div>
</div>
@endsection