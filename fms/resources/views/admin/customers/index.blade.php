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
                        <h2>Customer Management</h2>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
            <p>{{ $message }}</p>
            </div>
            @endif

            <table class="table table-bordered " id="table">
                <tr>
                    <th>No</th>
                    <th>@sortablelink('name')</th>
                    <th>@sortablelink('email')</th>
                    <th>@sortablelink('created_at','Registered')</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($data as $key => $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('customers.show',$user->id) }}">Show</a>


                            </td>
                    </tr>
                @endforeach
            </table>
            {!! $data->links() !!}
        </div>
    </div>
    </section>
  </div>

@endsection
@section('js')
  <script type="text/javascript">

<script>
@endsection

