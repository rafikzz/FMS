@extends('layouts.homemaster')
@section('content')

<div class="container bg-light " id="page-container" >
        <div class="row txt ">
            <div class="col-12 " >
                <img src="{{ asset('slider/banner.jpg') }}"
                class="w-10" alt="">
            </div>
        </div>

        <div class="row  txt">
            <div class="col-8 mt-n5 d-flex  ">
                <img class="pr-2 pl-3"
                src="{{ $futsal->logo() }}"
                >
                <div class="d-flex flex-column bd-highlight mb-2 ">
                    <div class="p-1 bd-highlight"> <h1 style="color: white">{{ $futsal->name }}</h1></div>
                    <div class="p-1 bd-highlight"><h5>{{ $futsal->address }}</h5></div>
                </div>
            </div>

                <div class="d-flex align-items-start col-4 pt-1  justify-content-end">
                    <a href="/booking/{{ $futsal->id }}" class="btn btn-primary ">Book Now </a>
                </div>
            </div>
    <div class="row pt-3 pb-3">
    <div class="col-sm-6">
        <div class="card">
        <div class="card-body">
            <h5 class="card-head">About us
                <hr>
            </h5>
            <p class="card-text"><h5>Contact</h5> </p>
                        <p class="card-text">Email: {{ $futsal->email }}</p>
                        <p class="card-text">Contact No: {{ $futsal->contact_no }}</p>
        </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
        <div class="card-body">
            <h5 class="card-head">Booking
                <hr>
            </h5>
            <p class="card-text">Price: Rs{{ $futsal->price }}/-</p>
            <p class="card-text">Opening Time: {{ Carbon\Carbon::parse($futsal->schedule->start_time)->format('g: i A') }} to {{ Carbon\Carbon::parse($futsal->schedule->end_time)->format('g: i A') }}</p>
            <p class="card-text">Price: Rs {{ $futsal->price }}/-</p>
        </div>
        </div>
    </div>
    </div>

    <div class="row" style="background: white">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
                <h2> Already Booked</h2>
            </div>

            <table class="table table-bordered">

                <tr>
                  <th>Ground Name</th>
                  <th>Book Date</th>
                  <th>Start time</th>
                  <th>End time</th>
                </tr>
                @if ($bookings->isNotEmpty())
                @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->ground_name }}</td>
                    <td>{{ Carbon\Carbon::parse($booking->booking_time)->format('m d Y')}}</td>
                    <td>{{ Carbon\Carbon::parse($booking->booking_time)->format('H: i  ')}}</td>
                    <td>{{ Carbon\Carbon::parse($booking->booking_time)->addHour()->format('H: i  ')}}</td>
                </tr>
                @endforeach
                @else
                <tr><td colspan="6" class="text-center" >Currently no Bookings Today</td></tr>
                @endif
            </table>
        </div>
        {!! $bookings->links() !!}
    </div>


</div>



@endsection
