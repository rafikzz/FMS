<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Futsal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:booking-list', ['only' => ['index']]);
         $this->middleware('permission:booking-edit', ['only' => ['edit','update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=  auth()->user();
        $futsals = auth()->user()->futsals()->latest()->paginate(5);
          if($user->hasRole('Admin')){
              $futsals=Futsal::latest()->paginate(5);
          }
        return view('admin.bookings.index',compact('futsals'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $date=Carbon::now();

        $bookings=Booking::where('futsal_id','=',$id)->whereDate('booking_time', '=', $date)->paginate();
        return view('admin.bookings.show',compact('bookings'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function history($id){
        $bookings=Booking::where('futsal_id','=',$id)->paginate();
        return view('admin.bookings.history',compact('bookings'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $booking=Booking::findORFail($id);
        $this->authorize('update',$booking);
        $data= request()->validate([
            'status'=>'required',

            ]);


        $reciever=$booking->customer->name;

        $email=$booking->futsal->email;

        $name=$booking->futsal->name;

        $booking->update($data);

        if($request->status=='approved')
      {
        $subject='Booking was accepted';
        $content= 'Booking request for booking futsal at date '.Carbon::parse($booking->booking_time)->format('m d Y').'at time'.Carbon::parse($booking->booking_time)->format('H: i  ').'to'.Carbon::parse($booking->booking_time)->addHour()->format('H: i  ').'was sucessful' ;
        Mail::send('bookmail', compact('content','email','name','reciever'), function ($message) use($booking,$subject) {
            $message->from($booking->futsal->email);
            $message->to($booking->customer->email);
            $message->subject($subject);


        });
        return redirect()->back()->with('success','Booking time was accepted');
        }
        elseif($request->status=='rejected')
        {
            $subject='Booking was rejected';
            $content= 'Booking request for booking futsal at date '.Carbon::parse($booking->booking_time)->format('m d Y').'at time'.Carbon::parse($booking->booking_time)->format('H: i  ').'to'.Carbon::parse($booking->booking_time)->addHour()->format('H: i  ').'was rejected due to some problems' ;
            Mail::send('bookmail', compact('content','email','name','reciever'), function ($message) use($booking,$subject) {
                $message->from($booking->futsal->email);
                $message->to($booking->customer->email);
                $message->subject($subject);


            });
            return redirect()->back()->with('success','Booking time was rejected');
          }else{
            return redirect()->back();
          }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
