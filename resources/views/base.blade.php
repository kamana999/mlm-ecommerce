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
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light p-1">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}">
            <img src="images/logo.jpeg" height="50" width="120" alt="">
        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class=""><i class="fas fa-bars bg-light"></i></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="navbar-nav m-auto  " >
                                <li class="nav-item">
                                    <a class="nav-link active " aria-current="page" href="{{route('home')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('products')}}">Products</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('about')}}" tabindex="-1" aria-disabled="true">About Us</a>
                                </li>
                                
                            </ul>
                            <form class="d-flex " action="{{route('search')}}" method="GET">
                                @csrf
                                <input class="px-2 search" type="search" name="searching" placeholder="Search" aria-label="Search">
                                <button class="btn0 px-3" type="submit">Search</button>
                            </form>
                            <ul class="navbar-nav ml-auto my-2 my-lg-0 " >
                                @auth
                                <li class="nav-itme me-3">
                                    <a href="{{route('carts')}}">
                                        <button type="button" class="btn bt position-relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                            </svg>
                                            <span class="position-absolute top-0 translate-middle badge rounded-pill bg-danger">{{$cart}}</span>
                                        </button>
                                    </a>
                                </li>
                                @endauth
                                @guest
                                    <li class="nav-itme">
                                    <a href="{{route('carts')}}">
                                        <button type="button" class="btn bt position-relative">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                                </svg>
                                                <span class="position-absolute top-0 translate-middle badge rounded-pill bg-danger">{{Session::has('order_items') ? Session::get('order_items')->totalQty : ''}}</span>
                                            </button>
                                        </a>
                                    </li>
                                    <li class="nav-itme ">
                                        <a href="{{route('partner_login')}}">
                                        <button class="btn btn-danger btn-sm  text-light mt-2  fw-bold">Become our patner</button></a>
                                    </li>
                                    <li class="nav-itme ms-2">
                                        <a href="{{route('new_login')}}">
                                        <button class="btn btn-primary mt-2 btn-sm fw-bold">Sign In / Register</button></a>
                                    </li>
                                    
                                @endguest
                                @auth
                                <li class="nav-itme me-5">
                                    <div class="dropdown">
                                        <a class="mt-4 fw-bold dropdown-toggle" style="font-size:20px; margin-top:20px" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{Auth::User()->name}}
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{route('my_orders')}}">My Orders</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <form action="{{route('logout')}}" method="POST">
                                                <a href="" class="dropdown-item"><button class="dropdown-item" type="submit">Logout</button></a>
                                                @csrf
                                            </form>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                
                                <li class="nav-itme ">
                                    <a href="{{route('partner_login')}}">
                                    <button class="btn btn-danger btn-sm btn-smtext-light mt-2  fw-bold">Become our patner</button></a>
                                </li>
                                
                                @endauth
                            </ul>
                        </div>
                    </div>
    </nav>
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