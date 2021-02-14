<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Futsal;
use App\Ground;
use App\Schedule;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class BookController extends Controller
{


    public function create(Futsal $futsal)
    {

        $grounds=Ground::where('futsal_id',$futsal->id)->get();
        return view('booking',compact('futsal','grounds'));
    }
    public function store(Request $request)
    {

        $customer =auth()->user()->id;
        $customerdata=auth()->user();
        $futsal=Futsal::findOrFail($request->futsal_id);
        $status="pending";
        $date = Carbon::parse($request->booking_time);
        $now = Carbon::now();
        $diffhours = $date->diffInHours($now)-1;
        $diffdays= $date->diffInDays($now);
        if($diffhours<0 && $diffdays==0)
        {
            return redirect()->back()->with('fail','Booking time is invalid');
        }

       $data= $this->validate($request, [

            'futsal_id'=>'required',
            'ground_name' => 'required',
            'booking_time' => 'required',


        ]);
        $previousBookingAtSametime=Booking::where('customer_id', '=',$customer)->where('booking_time', '=', $request->booking_time)->count();
        $previousBookingCanceled=Booking::onlyTrashed()->where('customer_id', '=',$customer)->count();
        if($previousBookingCanceled>=5)
        {
            return redirect()->back()->with('fail','You have canceled to many bookings you are banned from bookings for a period of time');
        }
      $book= Booking::where('futsal_id', '=', $request->futsal_id)->where('ground_name', '=', $request->ground_name)->where('booking_time', '=', $request->booking_time)->count();

      if($book!=0)
         {
               return redirect()->back()->with('fail','This time is already booked');
         }
      if($previousBookingAtSametime!=0)
      {
         return redirect()->back()->with('fail','You have already booked another futsal at this time');
      }
       Booking::create([
           'customer_id'=>$customer,
           'futsal_id'=>$data['futsal_id'],
           'ground_name'=>$data['ground_name'],
           'booking_time'=>$data['booking_time'],
           'status'=>$status
        ]);
        $reciever=$futsal->user->name;
        $email=$customerdata->email;
        $name=$customerdata->name;
        $subject='Booking request';
        $content= 'Booking request for booking futsal at date '.Carbon::parse($request->booking_time)->format('M D Y').'at time'.Carbon::parse($request->booking_time)->format('G :i A').' for an hour' ;
        Mail::send('bookmail', compact('content','email','name','reciever'), function ($message) use($customerdata,$subject,$futsal) {
            $message->from($customerdata->email);
            $message->to($futsal->email);
            $message->subject($subject);

        });


       return redirect('/yourbooking')->with('success','Your Booking has been sent');
    }
    public function show()
    {

        $user=auth()->user();
        $latestbooking=Booking::where('customer_id','=',$user->id)->orderBy('id','desc')->first();
        $previousBookingCanceled=Booking::onlyTrashed()->where('customer_id', '=',$user->id)->count();
        $bookings=Booking::where('customer_id','=',$user->id)->orderBy('id','desc')->paginate();
        return view('yourbooking',compact('user','latestbooking','bookings','previousBookingCanceled'));
    }
    public function destroy($id)
    {

       $booking= Booking::findOrFail($id);
        $status=['status'=>'canceled'];
        $booking->update($status);
        $booking->delete();
        return redirect('/yourbooking')->with('success','Your Booking has been sucessfully canceled. ');

    }

}
