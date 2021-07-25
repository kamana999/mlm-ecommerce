@extends('base')
@section('content')
<div class="container-fluid login">
      <div class="forms-container">
      <div class="signin-signup">
        <form class="sign-in-form sign" action="{{ route('login') }}" method="POST">
              @csrf
              <h2 class="title">Sign In</h2>
                <div class="input-field">
                <i class="fas fa-user"></i>
                  <input type="text" placeholder="Username" type="email" name="email" :value="old('email')" required autofocus>
                  
                </div>
                <div class="input-field">
                <i class="fas fa-lock"></i>
                  <input type="password" placeholder="Password" type="password" name="password" required autocomplete="current-password">
                  
                </div>
                @if ($errors->any())
                 
                      <div class="alert alert-danger">
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </div>
                  @endif
                <input type="submit" value="login" class="btn2 solid">
                
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
                  
                </div>
        </form>
          <form  action="{{ route('register') }}" method="POST" class="sign-up-form sign" >
          @csrf
        <h2 class="title">Sign Up</h2>
          <div class="input-field">
          <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="name" :value="old('name')" required autofocus autocomplete="name">
          </div>
            <div class="input-field">
          <i class="fas fa-envelope"></i>
            <input placeholder="Email" type="email" name="email" :value="old('email')" required >
          </div>
          <div class="input-field">
          <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" required autocomplete="new-password">
          </div>
          <div class="input-field">
          <i class="fas fa-lock"></i>
            <input type="password" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
          </div>
          <input type="submit" value="Sign Up" class="btn2 solid">
          
          <p class="social-text">Or Sign Up with social platforms</p>
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
             
          </div>
        </form>
        
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
        <img src="images/apple-removebg-preview.png" height="400px" width="300px" class="image" alt="">
        </div>
         <div class="panel right-panel">
           <div class="content">
            <h3>Already A member ?</h3>
             <p>
            Already A member of mamamarts login now !
             </p>
             <button class="btn2 transparent" id="sign-in-btn">Sign In</button>
          </div>
        <img src="images/ban-removebg-preview.png" class="image" alt="">
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