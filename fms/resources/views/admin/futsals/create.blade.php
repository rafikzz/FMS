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
                        <h2>Register Futsal</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('futsals.index') }}"> Back</a>
                    </div>
                </div>
            </div>
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif

            {!! Form::open(array('route' => 'futsals.store','method'=>'POST','files'=>true)) !!}
            @csrf
                <div class="row">
                    <div class="col-md-12 form-group{{ $errors->has('name') ? ' has-error' : '' }}  ">
                    {!! Form::label('name', 'Futsal Name:') !!}
                    {!! Form::text('name', null, ['placeholder' => 'Enter Futsal Name','class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12  form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        {!! Form::label('email', 'Futsal Email:') !!}
                        {!! Form::text('email', null, ['placeholder' => 'Enter Futsal Emali','class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12  form-group{{ $errors->has('vendor_email') ? ' has-error' : '' }}">
                        {!! Form::label('vendor_email', 'Vendor Email:') !!}
                        {!! Form::text('vendor_email', null, ['placeholder' => 'Enter Vendor Email','class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('vendor_email') }}</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12  form-group{{ $errors->has('pan_no') ? ' has-error' : '' }}">
                        {!! Form::label('pan_no', 'Futsal Pan no:') !!}
                        {!! Form::text('pan_no', null, ['placeholder' => 'Enter Futsal Pan No','class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('pan_no') }}</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        {!! Form::label('address', 'Futsal Address:') !!}
                        {!! Form::text('address', null, ['placeholder' => 'Enter Futsal Address','class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('address') }}</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group{{ $errors->has('contact_no') ? ' has-error' : '' }}">
                        {!! Form::label('contact_no', 'Contact No.') !!}
                        {!! Form::text('contact_no', null, ['placeholder' => 'Enter Futsal Contact No.','class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('contact_no') }}</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        {!! Form::label('price', 'Booking Price per Hour in Rs.') !!}
                        {!! Form::number('price', null, ['placeholder' => 'Booking Price per Hour','class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('price') }}</small>
                    </div>

                </div>
         <div>
        </div>
        <table class="table table-bordered col-md-6" id="dynamicTable">
            <tr>
                <th>Ground Name or Type</th>
                <th>Action</th>
            </tr>
            <tr>
                <td><input type="text" name="groundname[]" placeholder="Enter ground Name or Type" class="form-control" /></td>
                <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
            </tr>
        </table>
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
                    <small class="text-danger">{{ $errors->first('logo') }}</small>
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
@section('js')
<script type="text/javascript">
    var i = 0;
    $("#add").click(function(){
        ++i;
        $("#dynamicTable").append('<tr><td><input type="text" name="groundname[]" placeholder="Enter Ground Name or Type" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
        });

    $(document).on('click', '.remove-tr', function(){
         $(this).parents('tr').remove()
    });
</script>
@endsection
