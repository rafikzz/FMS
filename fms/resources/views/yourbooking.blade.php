@extends('layouts.homemaster')
@section('content')
<div class="container" >
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
    <p>{{ $message }}</p>
    </div>
    @endif
    <div class="row">
        <div class="col-6 mt-3 mb-2">
            <h2>{{$user->name }}</h2>
            <p>Email:{{$user->email}}</p>
            @if ($latestbooking!=null)
            <p>Latest Booking: {{ Carbon\Carbon::parse($latestbooking->booking_time)->format('Y/m/d G:i ')}}</p>
            @else
            <p>Latest Booking: No Booking History</p>
            @endif
            <p>Total Booking: {{ $bookings->count() }}</p>
            <p>Canceled Bookings: {{  $previousBookingCanceled  }}</p>
            <p>Note*: If you cancel more than 5 booking you are temporarily banned from booking</p>
            </div>

    </div>
    <div class="row">
        <div class="col-12 mb-3">
            <h4>Your Bookings</h4>
            <table class="table table-bordered">

                <tr>
                  <th>Futsal Name</th>
                  <th>Ground Name</th>
                  <th>Book Date</th>
                  <th>Start time</th>
                  <th>End time</th>
                <th>Booked At</th>
                <th>Action</th>
                </tr>
                @if ($bookings->isNotEmpty())
                @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->futsal->name }}</td>
                    <td>{{ $booking->ground_name }}</td>
                    <td>{{ Carbon\Carbon::parse($booking->booking_time)->format('d M Y')}}</td>
                    <td>{{ Carbon\Carbon::parse($booking->booking_time)->format('H: i  ')}}</td>
                    <td>{{ Carbon\Carbon::parse($booking->booking_time)->addHour()->format('H: i  ')}}</td>
                    <td>{{ $booking->created_at->diffForHumans() }}</td>
                    @if($booking->status!='rejected'&& (Carbon\Carbon::parse($booking->booking_time) > Carbon\Carbon::now()))
                    <td><a class="btn btn-danger " href="{{ route('book.destroy',$booking->id) }}">Cancel Booking</a></td>
                    @endif
                </tr>
                @endforeach
                @else
                <tr><td colspan="6" class="text-center" >You have No Booking History</td></tr>

                @endif


            </table>
            {!! $bookings->links() !!}
        </div>
    </div>
</div>


@endsection
