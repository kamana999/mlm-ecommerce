<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <title>@yield('title','Momo Mart')</title>
        <meta name="keywords" content="@yield('meta_keywords','Momo Mart')">
        <meta name="description" content="@yield('meta_description','A complete online website')">
        <link rel="canonical" href="{{url()->current()}}"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="{{url('https://fonts.gstatic.com')}}">
        <link href="{{url('https://fonts.googleapis.com/css2?family=Lobster&display=swap')}}" rel="stylesheet">
        <link rel="preconnect" href="{{url('https://fonts.gstatic.com')}}">
        <link href="{{url('https://fonts.googleapis.com/css2?family=Lobster&display=swap')}}" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link href="{{url('https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('style.css')}}">
    </head>
    <body>
        <div class="container-fluid sticky-top">
            <div class="row">
                <div class="col-sm-12">
                    <nav class="navbar navbar-expand-lg sticky-top bg-light">
                        <a class="navbar-brand" href="{{route('home')}}">Moma's Mart</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class=""><i class="fas fa-bars bg-light"></i></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="navbar-nav m-auto my-2 my-lg-0 " >
                                <li class="nav-item">
                                    <a class="nav-link active " aria-current="page" href="{{route('home')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="products.html">Products</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Contact Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="about.html" tabindex="-1" aria-disabled="true">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="wishlist.html" tabindex="-1" aria-disabled="true">Wishlist</a>
                                </li>
                            </ul>
                            <form class="d-flex ">
                                <input class="px-2 search" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn0 px-3" type="submit">Search</button>
                            </form>
                            <ul class="navbar-nav ml-auto my-2 my-lg-0 " >
                                @auth
                                <li class="nav-itme">
                                    <a href="{{route('carts')}}">
                                        <img src="images/shopping_cart.svg" width="50px" class="img-fluid mx-3">
                                    </a>
                                </li>
                                @endauth
                                @guest
                                <li class="nav-itme">
                                    <a href="{{route('carts')}}">
                                    <span class="badge bg-danger">{{Session::has('order_items') ? Session::get('order_items')->totalQty : ''}}</span>
                                        <img src="images/shopping_cart.svg" width="30px" class="mx-2 ">
                                   </a>
                                </li>
                                <li class="nav-itme ">
                                    <a href="{{route('partner_login')}}">
                                    <button class="btn btn-danger text-light mt-2  fw-bold">Become our patner</button></a>
                                </li>
                                <li class="nav-itme ms-2">
                                    <a href="{{route('new_login')}}">
                                    <button class="btn btn-primary mt-2  fw-bold">Sign In / Register</button></a>
                                </li>
                                
                                @endguest
                                @auth
                                <li class="nav-itme">
                                <li class="nav-itme ">
                                    <a href="{{route('partner_login')}}">
                                    <button class="btn btn-danger text-light mt-2  fw-bold">Become our patner</button></a>
                                </li>

                                    <div class="dropdown">
                                        <a class="btn btn-primary mt-2  fw-bold dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{Auth::User()->name}}
                                        </a>

                                        <ul class="dropdown-menu me-5" aria-labelledby="dropdownMenuLink">
                                            <li><a class="dropdown-item" href="#">
                                            <form action="{{route('logout')}}" method="POST">
                                                <a href="" class="dropdown-item"><input type="submit" value="Logout" class="btn"></a>
                                                @csrf
                                            </form>
                                            </a></li>
                                        </ul>
                                    </div>
                                </li>
                                @endauth
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        @yield('content')

        <!------footer-------->

        <section class="footer">
            <footer>
                <div class="container">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-sm-3 py-4">
                    
                        <ul>
                            
                            <li> <h5  class="text-secondary">Quik Links</h5></li>
                            <li><a href="index.html" class="text-white">Home</a></li>
                            <li><a href="products.html" class="text-white">Products</a></li>
                            <li><a href="contact.html" class="text-white">Contact Us</a></li>
                            <li><a href="about.html" class="text-white">About Us</a></li>
                            <li><a href="cart.html" class="text-white">Your Cart</a></li>
                            <li><a href="wishlist.html" class="text-white">Wishlist</a></li>
                        
                        </ul>
                        </div>
                    <div class="col-sm-3 py-4">
                    
                        <ul>
                        
                        <li> <h5  class="text-secondary">Policies</h5></li>
                        <li><a href="privacypolicy.html" class="text-white">Privacy & Policies</a></li>
                        <li><a href="shipingpolicy.html" class="text-white">Shipment Policy</a></li>
                        <li><a href="returnpolicy.html" class="text-white">Return Policy</a></li>
                        <li><a href="faq.html" class="text-white">FAQs</a></li>
                        </ul>
                    </div>
                
                        <div class="col-sm-3 py-4">
                    
                    <ul class="reach ">
                            <h5 class=" text-secondary">To Reach Us</h5>
                                            <li class=""><i class="fa fa-phone" aria-hidden="true"> </i> Phone</li>
                                    <li class=""> 123456789
                                            </li>
                                            <li class=" "><i class="fa fa-envelope " aria-hidden="true"> </i> E-mail</li>
                                    <li class=""> xyz@gmail.com
                                            </li>
                                    <li class=""><i class="fa fa-map-marker " aria-hidden="true"> </i> Address</li>
                                    
                                        <li class=""> Full address
                                            </li>
                                    </ul>
                    </div>
                    <div class="col-sm-3 py-4 text-center">
                        <h4>Download Our Mobile App</h4>
                        <img src="images/googleplay-removebg-preview.png" class="img-fluid w-75 ">
                        <div>
                        <ul class="list-inline mt-2 ">
                        
                            <li class="list-inline-item mx-2"><a href="#" class="text-primary"><i class="fa fa-facebook fa-2x"></i></a></li>
                            
                        <li class="list-inline-item mx-2"><a href="#" class="text-danger"><i class="fa fa-instagram fa-2x"></i></a></li>
                        <li class="list-inline-item mx-2"><a href="#" class="text-primary"><i class="fa fa-twitter fa-2x"></i></a></li>
                            <li class="list-inline-item mx-2"><a href="#" class="text-danger"><i class="fa fa-envelope fa-2x"></i></a></li>
                        <li class="list-inline-item mx-2"><a href="#" class="text-danger"><i class="fa fa-pinterest fa-2x"></i></a></li>
                        <li class="list-inline-item mx-2"><a href="#" class="text-primary"><i class="fa fa-linkedin fa-2x"></i></a></li>
            </ul>
                        </div>
                    </div>
                </div>
                
                </div>
                <div class="row ">
                <hr>
                <div class="col-sm-12 text-center pb-3">
                &copy;2021 MamaMarts
                </div>
                </div>
                </div>
                
                </footer>
        </section>

        <script src="{{url('https://kit.fontawesome.com/760403cf19.js')}}" crossorigin="anonymous"></script>
        <script src="{{url('https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js')}}" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>
</html>