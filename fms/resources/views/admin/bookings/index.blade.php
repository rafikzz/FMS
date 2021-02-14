@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Booking Management</h2>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div>
                @endif
                <table class="table table-bordered">

                    <tr>
                      <th>No</th>
                      <th>Futsal Name</th>
                      <th>Total Bookings</th>
                      @can('booking-list')
                      <th width="380px">Action</th>
                      @endcan


                    </tr>
                    @foreach ($futsals as $futsal)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $futsal->name }}</td>
                        <td>{{ $futsal->bookings()->count() }}</td>
                        <td>
                            @can('booking-list')
                                <a class="btn btn-info " href="{{ route('bookings.show',$futsal->id) }}">Today's Bookings</a>
                                <a class="btn btn-info  mr-2 " href="{{ route('bookings.history',$futsal->id) }}">Booking History</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </table>
                {!! $futsals->links() !!}

            </div>
        </section>
    </section>
</div>

@endsection
