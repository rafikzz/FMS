@extends('layouts.homemaster')
@section('content')
<div class="container" id="page-container">
    @if(isset($details))

    <div class="row">
        <div class="col-md-12">
        <h1><p> The Search results for  {{ $query }}  are :</p></h1>
        </div>

    </div>
    <hr>
    <div class="row">


    </div>

    <div class="row">
    @foreach ($details as $futsal)

        <div class="col-3 pt-3 pb-3">
            <div class="card pt-n1">
                <img src="{{ $futsal->image() }}"
                alt="Image not loaded " class="w-100">
                <div class="card-body">
                  <h6 class="card-title">{{ $futsal->name }}</h6>
                  <p>Price: Rs {{ $futsal->price }} /-</p>

                  <hr>
                  <div class="row">
                      <div class="col p-3">
                  <a href="/futsal/profile/{{ $futsal->id }}" class="btn btn-primary ">Profile</a>
                      </div>
                      <div class="col p-3 pl-3">
                        <a href="/booking/{{ $futsal->id }}" class="btn btn-primary ">Bookme </a>
                      </div>
                  </div>
                </div>
            </div>
        </div>


    @endforeach


    @else

    <div class="content " style="height: calc(100vh - 300px">
        <div class="col-md-12">
        <h2><p> {{ $message }} </b> </p></h2>
        </div>

    </div>

    @endif


</div>


</div>

@endsection

