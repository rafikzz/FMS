<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Futsal;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function __construct()

    {

         $this->middleware('permission:dashboard', ['only' => ['index']]);


    }

    public function index()
    {
        $user=  auth()->user();
        $bookings= null;
        $bookingCount=0;
          if($user->hasRole('Admin')){
              $futsalCount=Futsal::count();
              $bookingCount=Booking::count();
              $date=Carbon::now();
              $bookings=Booking::where('status','approved')->whereDate('booking_time', '=', $date)->paginate();
          }
          else
          {
            $futsalCount = auth()->user()->futsals()->count();
            $futsals = auth()->user()->futsals()->get();
            foreach($futsals as $futsal)
            {
                $date=Carbon::now();
                $bookingCount+=Booking::where('futsal_id','=',$futsal->id)->count();
                $futsalids[]=$futsal->id;

            }
        $bookings=Booking::where('status','approved')->whereOr('futsal_id',$futsalids)->whereDate('booking_time', '=', $date)->paginate(10);

    }
          $customerCount=  User::role('Customer')->count();
          $userCount=User::count();




        return view('admin.index',compact('futsalCount','customerCount','userCount','bookingCount','bookings'));
    }
}
