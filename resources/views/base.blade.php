<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@auth   
        {{Auth::User()->name}}
            
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item">
                <form action="{{route('logout')}}" method="POST">
                    <a href="" class="dropdown-item"><input type="submit" value="Logout" class="btn">Log</a>
                    @csrf
                </form>
                </a></li>
            </ul>
        </div>   
       
        
        @endauth
        
        @guest
        <a href="{{route('login')}}">Login</a>
        <a href="{{route('register')}}">register</a>
    
            
        
        @endguest

        @yield('content')
</body>
</html>