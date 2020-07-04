<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type= "text/css" href="css/style.css"> -->

    <style>
            .jumbotron {
              background-image: url("carousel/slider1.jpg") ;
              background-size: cover;
              height: 770px;
              text-align: center;
              margin-top: -120px;
            }
            .jumbotron .display-4{
              color:white;
              margin-top: 200px;
            }
           
            .jumbotron p{
              color: white;
              font-size: 25px;
            }
            
            .jumbotron hr{
              border-color: #F05F40;
              width: 70px;
              border-width: 3px;
            }

            .jumbotron .btn{
              background-color: #F05F40;
              border: none;
              border-radius: 25px;
              padding-right: 25px;
              padding-left: 25px;
              margin-top: 40px;
            }

            /* ini style slider */

            .carousel-item{
              height: 670px;
            }

            .carousel-item img {
              margin-top: -120px;          
            }

            .carousel-item .display-4{
              margin-top: -440px;       
              text-shadow: 2px 2px 0 #000;
              border-radius: 25px;
            }

            .carousel-item hr{
              border-color: #F05F40;
              width: 70px;
              border-width: 3px;
            }

            .carousel-item .btn{
              background-color: #F05F40;
              border: none;
              border-radius: 25px;
              padding-right: 25px;
              padding-left: 25px;
              margin-top: 40px;
            }

        </style>
  </head>
  <body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-light bg-transparent fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand font-weight-bold text-white" href="#page-top">My Band</a>
           
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
          @if (Route::has('login'))
          <li class="nav-item active">
              @auth
              <a class="nav-link js-scroll-trigger text-white" href="{{ url('/home') }}">HOME<span class="sr-only">(current)</span></a>
            </li>
            @else
            <li class="nav-item active">
            <a class="btn btn-outline-light btn-sm" href="{{ route('login') }}">LOGIN <span class="sr-only">(current)</span></a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item active">
              <a class="nav-link js-scroll-trigger text-white" href="{{ route('register') }}"><span class="sr-only">(current)</span></a>
            </li>
            @endif
              @endauth
          </ul>
        </div>
        @endif
    </nav>


    <!-- <div class="jumbotron">
      <div class="container">
        <h1 class="display-4">BE YOURSELF <br> AND <br> <span class="font-weight-bold"> NEVER SURRENDER!!! </span></h1>
        <hr class="my-4">
        <p class="lead">Tutorial framework website bahasa indonesia</p>
        <a class="btn btn-primary btn-lg font-weight-bold" href="#" role="button">KUNJUNGI</a>
      </div>
    </div>   -->

    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="/carousel/1.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h1 class="display-4">ONE STEP CLOSER <br> TO <br> <span class="font-weight-bold"> HAVING A DREAM BAND! </span></h1>
            <hr class="my-4">
            <p class="lead">Welcome to My Band! </p>
            <a class="btn btn-primary btn-lg font-weight-bold" href="{{ route('register') }}" role="button">JOIN</a>
          </div>
        </div>
        <div class="carousel-item">
          <img src="/carousel/2.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h1 class="display-4">BE YOURSELF <br> AND <br> <span class="font-weight-bold"> NEVER SURRENDER!!! </span></h1>
            <hr class="my-4">
            <p class="lead">Tutorial framework website bahasa indonesia </p>
            <a class="btn btn-primary btn-lg font-weight-bold" href="#" role="button">KUNJUNGI</a>
          </div>
        </div>
        <div class="carousel-item">
          <img src="/carousel/3.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h1 class="display-4">BE YOURSELF <br> AND <br> <span class="font-weight-bold"> NEVER SURRENDER!!! </span></h1>
            <hr class="my-4">
            <p class="lead">Tutorial framework website bahasa indonesia </p>
            <a class="btn btn-primary btn-lg font-weight-bold" href="#" role="button">KUNJUNGI</a>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>