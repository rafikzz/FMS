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
                            <h2> Show Customer</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('customers.index') }}"> Back</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Name:</strong> {{ $customer->name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Email:</strong> {{ $customer->email }}
                        </div>
                    </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                         @if ($latestbooking!=null)
                            <p><strong>Latest Booking:</strong>  {{ Carbon\Carbon::parse($latestbooking->booking_time)->format('Y/m/d G:i ')}}</p>
                            @else
                            <p><strong>Latest Booking:</strong>  No Booking History</p>
                            @endif
                        </div>
                    </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Total Bookings: </strong> {{ $customer->bookings()->withTrashed()->count()}}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Canceled Bookings: </strong> {{ $customer->bookings()->onlyTrashed()->count()}}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
  </div>
@endsection
