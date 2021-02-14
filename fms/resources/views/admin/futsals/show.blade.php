@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 margin-tb">

                <div class="pull-left">
                    <h2> Show Futsal</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('futsals.index') }}"> Back</a>
                </div>
                </div>
                 </div>
                <table>
                <div class="row">
                <tr>
                <td>
                <strong> Logo:</strong>
                </td>
                <td>
                <div class="">
                <img src="{{ $futsal->logo() }}"
                    alt="Image not loaded " class="w-150">
                </div>
                </td>
                </tr>
                <tr>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                <td><strong>Name:</strong></td>
                <td>{{ $futsal->name }}</td>
                </div>
                </div>
                </tr>
                <tr>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <td> <strong>Address:</strong></td>
                    <td> {{ $futsal->address}}</td>
                </div>
                </div>
                </tr>
                <tr>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <td> <strong>Email:</strong></td>
                <td> {{  $futsal->email }}</td>
                </div>
                </div>
                </tr>
                  <tr>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <td> <strong>Pan No.:</strong></td>
                <td> {{  $futsal->pan_no }}</td>
                </div>
                </div>
                </tr>
                  <tr>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <td> <strong>Vendor Name:</strong></td>
                <td> {{  $futsal->user->name }}</td>
                </div>
                </div>
                </tr>
                <tr>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <td>  <strong>Contact No:</strong></td>
                <td>  {{ $futsal->contact_no}}</td>
                </div>
                </div>
                </tr>
                <tr>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <td> <strong>Price:</strong></td>
                <td>{{ $futsal->price}}  onwards/-</td>
                </div>
                </div>
                </tr>
                <tr>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <td> <strong>No of Grounds:</strong></td>
                <td>{{ $futsal->no_of_grounds}}</td>
                </div>
                </div>
                </tr>
                    <tr>
            </div>
            <table class="table  txt col-md-6" >
                <tr>
                <th>Grounds</th>
                </tr>

                @foreach($grounds as $ground)
                <tr>
                    <td>{{ $ground->name }}</td>

                </tr>
                @endforeach
               </table>
               <tr>
                <td>
                <strong> Image:</strong>
                </td>
                <td>
                <div class="">
                <img src="{{ $futsal->image() }}"
                        alt="Image not loaded " class=>
                    </div>
                    </td>
                    </tr>
        </table>

    </div>
    </section>
</div>

@endsection
