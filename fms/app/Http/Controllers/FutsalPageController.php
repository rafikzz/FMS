<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Futsal;
use Illuminate\Http\Request;

class FutsalPageController extends Controller
{

    public function index()
    {
        $futsals=Futsal::sortable()->latest()->paginate(8);
        return view('futsal',compact('futsals'));
    }
}
