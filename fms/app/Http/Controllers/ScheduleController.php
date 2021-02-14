<?php

namespace App\Http\Controllers;

use App\Futsal;
use App\Schedule;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authorize;

class ScheduleController extends Controller
{
    function __construct()

    {
         $this->middleware('permission:futsal-list|role-create|role-edit|role-delete', ['only' => ['index']]);
         $this->middleware('permission:futsal-edit', ['only' => ['edit','update']]);

    }
    public function index()
    {
      $user=  auth()->user();
      $futsals = auth()->user()->futsals()->latest()->paginate(5);
        if($user->hasRole('Admin')){
            $futsals=Futsal::latest()->paginate(5);
        }
        return view('admin.schedules.index',compact('futsals'))->with('i', (request()->input('page', 1) - 1) * 5);;
    }

    public function edit($id)
    {

       $schedule=Schedule::findOrFail($id);
       $futsal=$schedule->futsal()->first();
       $this->authorize('update',$futsal);
        return view('admin.schedules.edit',compact('schedule'));

    }
    public function update(Request $request, $id)
    {
       $schedule =Schedule::findOrFail($id);

       $data= request()->validate([
        'start_time'=>'required',
        'end_time'=>'required|after:start_time'
        ]);
        $schedule->update($data);


        return redirect()->route('schedules.index')->with('success','Schedule updated successfully');
    }


}
