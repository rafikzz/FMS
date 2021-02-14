<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FMS</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FMS</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        h1{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-weight: 700;
    color: #143774;
    font-size: 2rem;
    margin: 0;
}
.txt{
    text-decoration: none;
    color: #707070;
    font-weight: 7.00;
    padding: .25 0;

}

.subtitle{
    font-weight: 700;
    color: #1792d2;
    font-weight: .75rem;
    margin: 0;
}
.container-nav{
    display: flex;
    justify-content: space-between;
}
header{

    background: #f8f8f8;
    padding: 2em 0;
}
footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 2.5rem;            /* Footer height */
}

@media(max-width:675px){
    .container-nav{
        flex-direction: column;
    }
    header{
        text-align: center;
    }

}
nav{

  top: 0;
  width: 100%;
  background: #f8f8f8;
  padding: 25px;
}
nav ul{
    list-style: none;
    display: flex;
    justify-content: center;
    padding: 0;
}
nav li{
    margin-left: 2em;
}
nav a{
    text-decoration: none;
    color: #707070;
    font-weight: 7.00;
    padding: .25 0;
}
nav a:hover,
nav a:focus{
    color: #1792d2;

}
.home-page{
    border-bottom: 1px solid #707070;
}
.home-page:hover{
    color: #707070;
}
@media(max-width:675px){
    nav ul{
        flex-direction: column;
    }
    nav li{
        margin: .5em 0;
    }
}
.main-heading{
    color: darkslategray;
    line-height: 1;
    text-shadow: 1px qpx 1rem rgba(0,0,0,.5);
    margin-bottom: 2.5rem;
}
.maintitle{
    font-size: 4.8rem;
    text-transform: uppercase;
    letter-spacing:3px;
}
.mainsubtitle{
    font-size:3.6rem;
    font-weight:300;
    font-family: 'Courier New', cursive;
}
.btn{

    text-transform: uppercase;
    text-decoration: none;
    font-weight: 7.00;

}



    </style>

    @section('css')

    @endsection
</head>
<header >
    <nav class="navbar ">
        <div class="container container-nav ">
         <a href="/" style="text-decoration: none;">
            <div class="site-title">
                <h1>FMS</h1>
                <p class="subtitle">Makes Booking Easier....</p>
            </div></a>
                <ul>
                    <li><a href="/" class="home-page">Home</a></li>
                    <li><a href="/futsal">Futsal</a></li>
                    <li> <a href="/contact-us">Contact us</a></li>
                    @if (Route::has('login'))
                            @auth
                            <div class="btn-group mt-n2">
                               <li> <button type="button" class="btn btn-default"><li style="color: gray">{{ auth()->user()->name }}</button>  </li>
                                <button type="button"   class="btn btn-default dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" style="background:#f8f8f8">
                                <a class="dropdown-item" href="/yourbooking">Profile</a>
                                <a class="dropdown-item" href="/logout">Logout</a>
                                </div>
                            </div>
                            @else
                            <li>  <a href="{{ route('login') }}">Login</a></li>

                                @if (Route::has('register'))
                                <li> <a href="{{ route('register') }}">Register</a></li>
                                @endif
                            @endauth
                    @endif
                </ul>
        </div>
    </nav>
</header>
<br><br>
<body>



@yield('content')

<!-- Footer -->



</body>
<div class="absoulte-bottom">
<footer class="bg-light text-center text-lg-start" >
    <!-- Grid container -->
    <div class="container p-4" >
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0" >
          <h5 class="text-uppercase">FMS</h5>

          <p>
          BookFutsal
          </p>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Links</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="/" class="text-dark">Home</a>
            </li>
            <li>
              <a href="/futsal" class="text-dark">Futsal</a>
            </li>
            <li>
                <a href="/contact-us" class="text-dark">Contact us</a>
              </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <a href="/contact-us" style="color: white">
                <h5 class="text-uppercase mb-0" >Contact us</h5>
            </a>
          <ul class="list-unstyled">
            <li>
              <a href="#!" class="text-dark">rafikmaharjan@mail.com</a>
            </li>
            <li>
              <a href="#!" class="text-dark">9803448652</a>
            </li>


          </ul>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
      © 2020 Copyright:
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
</div>
</html>

