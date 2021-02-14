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
                        <h2>Futsal Management</h2>
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
                  <th>No.</th>
                  <th>logo</th>
                  <th>@sortablelink('name')</th>
                  <th>@sortablelink('address')</th>
                  <th>@sortablelink('email')</th>
                  <th>Contact No</th>
                  <th>@sortablelink('pan_no')</th>
                  <th>@sortablelink('no_of_grounds')</th>
                  <th>@sortablelink('price')</th>
                  <th width="280px">Action</th>
                </tr>
                @foreach ($futsals as $futsal)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td> <div class="">
                    <img src="{{ $futsal->logo() }}"
                        alt="Image not loaded " class="w-100">
                        </div>
                    </td>
                    <td>{{ $futsal->name }}</td>
                    <td>{{ $futsal->address }}</td>
                    <td>{{ $futsal->email }}</td>
                    <td>{{ $futsal->contact_no }}</td>
                    <td>{{ $futsal->pan_no }}</td>
                    <td>{{ $futsal->no_of_grounds }}</td>
                    <td>{{ $futsal->price }}</td>
                    <td>
                        <form action="{{ route('futsals.destroy',$futsal->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('futsals.show',$futsal->id) }}">Show</a>
                            @can('futsal-edit')
                            <a class="btn btn-primary" href="{{ route('futsals.edit',$futsal->id) }}">Edit</a>
                            @endcan
                            @can('futsal-delete')
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            {!! $futsals->links() !!}

        </div>
    </section>
</div>

@endsection
@section('js')
    <script>


    </script>
@endsection
