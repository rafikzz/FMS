<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Futsal;
use App\Ground;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Futsal $futsal)
    {

        $grounds=$futsal->grounds()->get();
        $date=Carbon::now();
        $bookings=Booking::where('futsal_id','=',$futsal->id)->whereDate('booking_time', '=', $date)->orderBy('booking_time')->paginate();
        return view('profile',compact('futsal','grounds','bookings'));

    }
}
