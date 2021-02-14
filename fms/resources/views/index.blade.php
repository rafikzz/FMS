@extends('layouts.homemaster')

@section('content')
<br>
<br>
<div class="container-fluid p-3">
    <div class="row featurette">
        <div class="col-md-12">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('slider/ball.jpg') }}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('slider/ball2.jpg') }}">
                </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

</div>

<div class="container ">
    <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">FMS <span class="text-muted">Stay Healthy and Fit</span></h2>
          <p class="lead">Motivation is what gets you started. Habit is what keeps you going</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-fluid mx-auto" src="{{ asset('slider/ball3.jpg') }}" alt="500x500">
        </div>
      </div>
</div>

@endsection
