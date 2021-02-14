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
                    <div class="pull-left pb-3">
                        <h2>Schedule Management</h2>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
            <p>{{ $message }}</p>
            </div>
            @endif
            <table class="table table-bordered" id="table">
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Start time</th>
                  <th>End time</th>
                  @can('futsal-edit')
                  <th width="280px">Action</th>
                  @endcan
                </tr>
                @foreach ($futsals as $futsal)
                <tr>

                    <td>{{ ++$i }}</td>
                    <td>{{ $futsal->name }}</td>
                    <td>{{ Carbon\Carbon::parse($futsal->schedule->start_time)->format('g: i A') }}</td>
                    <td>{{ Carbon\Carbon::parse($futsal->schedule->end_time)->format('g: i A') }}</td>
                    @can('futsal-edit')
                    <td>
                        <a class="btn btn-primary" href="{{ route('schedules.edit',$futsal->schedule->id) }}">Edit</a>
                    </td>
                    @endcan
                </tr>
                @endforeach
            </table>
            {!! $futsals->links() !!}

        </div>
    </section>
</div>

@endsection


