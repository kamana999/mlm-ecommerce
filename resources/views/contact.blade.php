@extends('base')
@section('content')
<div class="container contact  mt-5 p-5my-5 ">
      <div class="row">
      @if ($message = Session::get('success'))
        <div class="alert alert-success alert-blockmy-5 p-5 mt-5">
            <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
        </div>
    @endif
      
      <div class="col-sm-12 contact-item">
        <div class="row">
          <h1 class="text-center">Support</h1>
          <div class="col-sm-1"></div>
        <div class="col-sm-5">
        <div class="contact-form m-4">
          <h2 class="text-center text-danger"> Contact Form</h2>
          <form action="{{route('feedback')}}" method="POST">
            @csrf
                <div class="form-group my-3">
                  <label for="name">Full Name</label>
                  <input type="name" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Enter Name">
                
                </div>
                <div class="form-group my-3">
                  <label for="email">E-mail</label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="Enter E-mail">
                </div>
                
                <div class="form-group my-3">
                
                <textarea type="text" name="description" class="form-control" placeholder="Enter Your Query" rows="5" cols="53"></textarea>
                
                </div>
                          <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
          </form>
        
        </div>
        
          </div>
        <div class="col-sm-6 contact-item">
          <h2 class="text-danger mt-4 text-center">Get in touch with us</h2>
						
							<ul class="contact-item mt-4 text-center">
								<li class="border-top "><i class="fa fa-phone " aria-hidden="true"> </i> Phone</li>
						   
							<li class="border-bottom">123456789
								</li>
								
							<li class=""><i class="fa fa-envelope " aria-hidden="true"> </i> E-mail</li>
						   
							<li class="border-bottom">xyz@gmail.com
								</li>
						
							
						   
							
								<li class=""><i class="fa fa-map-marker " aria-hidden="true"> </i> Address</li>
						   
							<li class="border-bottom">Full address
								</li>
						</ul>
          </div>
        </div>
        </div>
     
      
      </div>
    
    </div>

@endsection