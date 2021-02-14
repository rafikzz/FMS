@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 margin-tb">

                        <div class="pull-left">
                            <h2> Bookings History</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('bookings.index') }}"> Back</a>
                        </div>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                        <p>{{ $message }}</p>
                        </div>
                        @endif
                        <table class="table table-bordered">

                            <tr>
                              <th>No</th>
                              <th>Customer Name</th>
                              <th>Futsal Name</th>
                              <th>Ground Name</th>
                              <th>Book Date</th>
                              <th>Start time</th>
                              <th>End time</th>
                              <th>Status</th>
                            <th>Booked At</th>
                            </tr>
                            @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $booking->customer->name }}</td>
                                <td>{{ $booking->futsal->name }}</td>
                                <td>{{ $booking->ground_name }}</td>
                                <td>{{ Carbon\Carbon::parse($booking->booking_time)->format('m d Y')}}</td>
                                <td>{{ Carbon\Carbon::parse($booking->booking_time)->format('H: i  ')}}</td>
                                <td>{{ Carbon\Carbon::parse($booking->booking_time)->addHour()->format('H: i  ')}}</td>
                                <td>{{ $booking->status }}</td>
                                <td>{{ $booking->created_at->diffForHumans() }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    {!! $bookings->links() !!}
                </div>

            </div>
        </div>
    </section>
  </div>
@endsection
