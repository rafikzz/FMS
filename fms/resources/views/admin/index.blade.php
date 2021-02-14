@extends('layouts.master')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $futsalCount }}</h3>

                <p>Futsals</p>
              </div>

              <a href="{{ route('futsals.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $customerCount }}</h3>

                <p>Customers</p>
              </div>
              <a href="{{ route('customers.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          @can('role-list')
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $userCount }}</h3>

                <p>User Registrations</p>
              </div>
              <a href="{{ route('users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          @endcan
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $bookingCount }}</h3>

                <p>Bookings</p>
              </div>
              <a href="{{ route('bookings.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div>
      <div class="row">
          <div>
          <h3>Today's Bookings</h3>
      <table class="table table-bordered">

        <tr>
            <th>Customer Name</th>
          <th>Futsal Name</th>
          <th>Ground Name</th>
          <th>Book Date</th>
          <th>Start time</th>
          <th>End time</th>
        <th>Booked At</th>
        </tr>
        @if ($bookings->isNotEmpty())
        @foreach ($bookings as $booking)
        <tr>
            <td>{{ $booking->customer->name }}</td>
            <td>{{ $booking->futsal->name }}</td>
            <td>{{ $booking->ground_name }}</td>
            <td>{{ Carbon\Carbon::parse($booking->booking_time)->format('m d Y')}}</td>
            <td>{{ Carbon\Carbon::parse($booking->booking_time)->format('H: i  ')}}</td>
            <td>{{ Carbon\Carbon::parse($booking->booking_time)->addHour()->format('H: i  ')}}</td>
            <td>{{ $booking->created_at->diffForHumans() }}</td>
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
    </div>
  </div>


@endsection
