@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Edit Schedule</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('schedules.index') }}"> Back</a>
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
                <div>
            </div>
            <div>
            {!! Form::model($schedule, ['method' => 'PATCH','route' => ['schedules.update', $schedule->id]]) !!}
                <div class="row">
                    <div class="form-group">
                        {!! Form::label('start_time', 'Start Time') !!}
                        <div>
                            <input type="time" name="start_time" value="{{ $schedule->start_time }}">
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        {!! Form::label('end_time', 'End Time') !!}
                        <div>
                            <input type="time" name="end_time" value="{{ $schedule->end_time }}">

                        </div>

                    </div>
                </div>



            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            {!! Form::close() !!}
            </div>









            </div>
        </div>

    </section>
</div>



<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>


@endsection

@section('sytle')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
@endsection
@section('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"> </script>
    <script>



$(document).ready(function(){


$('input.timepicker').timepicker({
    timeFormat: 'h:mm p',
    interval: 60,
    startTime: '10:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});


});


    </script>

@endsection
