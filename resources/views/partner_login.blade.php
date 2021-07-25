@extends('base')
@section('content')
<div class="container-fluid login">
      <div class="forms-container">
      <div class="signin-signup">
        <form class="sign-in-form sign" action="{{ route('partner_register') }}" method="POST">
              @csrf
              <h2 class="title">Sign Up As Partner</h2>
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
                
                <input type="submit" value="Sign Up" class="btn2 solid">

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
        </div>
      </div>
      <div class="panels-container">
        <div class="panel left-panel">
           <div class="content">
            <h3>New Here ?</h3>
             <p>
            New on mamamarts Sign Up now !
             </p>
             
          </div>
        <img src="images/apple-removebg-preview.png" height="400px" width="300px" class="image" alt="">
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