@extends('base')
@section('content')
<div class="container-fluid login">
      <div class="forms-container">
      <div class="signin-signup">
        <form class="sign-in-form sign" action="{{ route('partner_details') }}" method="POST" enctype="multipart/form-data">
              @csrf
            <h2 class="title">Details of Partner</h2>
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="User ID" name="user_id" readonly value=" {{$user->id}}"  class="text-muted">
                    </div>
                    <div class="input-field">
                    <i class="fas fa-user"></i>
                    <select name="parent_id" id="" class="text-muted">
                        <option value="">Select Sponsar</option>
                        @foreach ($sponsars as $s)
                        <option value="{{ $s->id }}">{{ $s->first_name }} {{ $s->last_name }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="input-field">
                    <i class="fas fa-user"></i>
                        <input type="text" placeholder="First name" name="first_name" required autofocus autocomplete="name">
                    </div>
                    <div class="input-field">
                    <i class="fas fa-phone"></i>
                        <input placeholder="Contact" type="integer" name="contact" required >
                    </div>
                    <div class="input-field">
                    <i class="fas fa-calendar-check"></i>
                    <input type="text" id="txtDate"minDate="0" placeholder="Date of Birth" name="dob" onfocus="(this.type='date')" onblur="(this.type='text')" class="datepicker p-3 "  require>
                    </div>

                    <script>
                        $('#txtDate').attr('min', maxDate);
                    </script>
                    <div class="input-field">
                    <i class="fas fa-globe-africa"></i>
                        <select name="country_id" id="" required class="text-muted">
                        <option value="">Select Country</option>
                        @foreach ($country as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="input-field">
                    <i class="fas fa-chart-area"></i>
                        <select name="district_id" id="" required class="text-muted">
                        <option value="">Select District</option>
                        @foreach ($district as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                        </select>
                    </div>

                </div>

                <div class="col-lg-6">
                    <div class="form-group mt-2">
                    <label for="">Select Image</label>
                    <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-globe-africa"></i>
                          <select name="position" id="" required class="text-muted">
                          <option value="">Select Postion</option>
                          <option value="left">Left</option>
                          <option value="middle">Middle</option>
                          <option value="right">Right</option>
                          </select>
                    </div>
                    <div class="input-field">
                    <i class="fas fa-user"></i>
                        <input type="text" placeholder="Last name" name="last_name" required autofocus autocomplete="name">
                    </div>
                    <div class="input-field">
                    <i class="fas fa-phone"></i>
                        <input type="integer" placeholder="Optional Contact" name="optional_contact">
                    </div>
                    <div class="input-field">
                    <i class="fas fa-map"></i>
                        <input type="text" placeholder="Enter Address" name="street" required autofocus>
                    </div>
                    <div class="input-field">
                    <i class="fas fa-flag-usa"></i>
                        <select name="state_id" id="" required class="text-muted">
                        <option value="">Select State</option>
                        @foreach ($state as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="input-field">
                    <i class="fas fa-map-marker-alt"></i>
                        <select name="area_id" id="" required class="text-muted">
                        <option value="">Select Area / Pincode</option>
                        @foreach ($area as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                        </select>
                    </div>

                </div>
            </div>
            <input type="submit" class="btn btn-danger w-50 mt-3 rounded-pill" value="Sign Up" >
     
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
            <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
            </a>
        </form>
                  
          </div>

        </div>
      </div>
      
      
      <div class="panels-container">
        <div class="panel left-panel">
           <div class="content">
            <h3>New Here ?</h3>
             <p>
            New on mamamarts Sign Up now !
             </p>
             <button class="btn2 transparent" id="sign-up-btn">Sign Up</button>
          </div>
        <img src="{{asset('images/apple-removebg-preview.png')}}" height="400px" width="300px" class="image" alt="">
        </div>
         <div class="panel right-panel">
           <div class="content">
            <h3>Already A member ?</h3>
             <p>
            Already A member of mamamarts login now !
             </p>
             <button class="btn2 transparent" id="sign-in-btn">Sign In</button>
          </div>
        <img src="{{asset('images/ban-removebg-preview.png')}}" class="image" alt="">
        </div>
      </div>
    </div>
    
    <script>
      const sign_in_btn = document.querySelector("#sign-in-btn");
      const sign_up_btn = document.querySelector("#sign-up-btn");
      const login = document.querySelector(".login");
      
      sign_up_btn.addEventListener('click',()=>{
        login.classList.add("sign-up-mode");
      });
      sign_in_btn.addEventListener('click',()=>{
        login.classList.remove("sign-up-mode");
      });
    </script>
    @endsection