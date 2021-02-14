@extends('layouts.homemaster')
@section('content')
<div class="container" >
    <div class="row  card" >
        <div class="card-header">
            <div class='col-md-8 '>
                    <h5>
                        <strong>{{ $futsal->name }} Booking</strong>
                    </h5>

                        @if ($message = Session::get('fail'))
                        <div class="alert alert-danger">
                        <ul>
                        <li>{{ $message }}</li>
                        </ul>
                        </div>
                        @endif


                </div>
                <hr/>
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

                        <div class="col-md-8">
                            <form method="POST" action="/postbooking">
                                @csrf
                                <div class="form-group">
                                    <div>
                                        <label  class="form-group pt-3" >Boooking Time between {{ Carbon\Carbon::parse($futsal->schedule->start_time)->format('g: i A') }} to {{ Carbon\Carbon::parse($futsal->schedule->end_time)->format('g: i A') }}</label>
                                    </div >

                                <label for="ground">Ground</label>
                                <input type="hidden" name="futsal_id" value="{{ $futsal->id }}" />
                                <input type="hidden" id="min" value="{{ $futsal->schedule->start_time }}" />
                                <input type="hidden" id="max" value="{{ $futsal->schedule->end_time }}"/>
                                <div>
                                    <select name="ground_name" id="ground" class="col-6" >
                                        @foreach ($grounds as $ground)
                                        <option value="{{ $ground->name }}">{{ $ground->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="ground" class="form-group pt-3" >Booking Date and Time</label>
                                </div >
                                <div>
                                    <input type="text" id="datetimepicker" name="booking_time">
                                </div>
                                <div>
                                    <label class="form-group pt-3" >Price: Rs {{ $futsal->price }}/-</label>
                                </div>
                                <div>
                                    <label class="form-group " >Duration: 1 hour</label>
                                </div>

                                <div class="py-4 text-center">
                                    <button class="btn btn-primary " >Submit</button>
                                </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
</div>








<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/base/jquery-ui.css" type="text/css" media="all">


<script>
  var min =document.getElementById('min').value;
        var max =document.getElementById('max').value;

    $(document).ready(function(){


        $('#datetimepicker').datetimepicker({
            formatDate:'Y/m/d',
            minDate:'-0',
            minTime:min,
            maxTime:max,
    });
});

    </script>
</div>
@endsection
@section('js')


@endsection

