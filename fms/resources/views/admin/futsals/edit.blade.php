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
                        <h2>Edit Futsal</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('futsals.index') }}"> Back</a>
                    </div>
                </div>
            </div>

            {!! Form::model($futsal, ['method' => 'PATCH','route' => ['futsals.update', $futsal->id],'files'=>true]) !!}
            @csrf
            @method('PATCH')
                <div class="row">
                    <div class="col-md-12 form-group{{ $errors->has('name') ? ' has-error' : '' }}  ">
                    {!! Form::label('name', 'Futsal Name:') !!}
                    {!! Form::text('name', old('title')??$futsal->name, ['placeholder' => 'Enter Your Futsal Name','class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12  form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        {!! Form::label('email', 'Futsal Email:') !!}
                        {!! Form::text('email', old('title')??$futsal->email, ['placeholder' => 'Enter Your Futsal Emali','class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        {!! Form::label('address', 'Futsal Address:') !!}
                        {!! Form::text('address', old('title')??$futsal->address, ['placeholder' => 'Enter Your Futsal Address','class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('address') }}</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group{{ $errors->has('contact_no') ? ' has-error' : '' }}">
                        {!! Form::label('contact_no', 'Contact No.') !!}
                        {!! Form::text('contact_no', old('title')??$futsal->contact_no, ['placeholder' => 'Enter Your Contact No.','class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('contact_no') }}</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        {!! Form::label('price', 'Minimum Booking Price per Hour in Rs.') !!}
                        {!! Form::number('price', old('title')??$futsal->price, ['placeholder' => 'Minimum Booking Price per Hour','class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('price') }}</small>
                    </div>
                </div>
                <div class="row pl-2 pr-2">
                    <div class=" form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                    {!! Form::label('logo', 'Logo:  ') !!}
                    {!! Form::file('logo') !!}
                    <small class="text-danger">{{ $errors->first('logo') }}</small>
                    </div>
                </div>
                <div class="row pl-2 pr-2">
                    <div class=" form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                    {!! Form::label('image', 'Image:  ') !!}
                    {!! Form::file('image') !!}
                    <small class="text-danger">{{ $errors->first('image') }}</small>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            {!! Form::close() !!}
            </div>
        </div>
    </section>
</div>

@endsection

