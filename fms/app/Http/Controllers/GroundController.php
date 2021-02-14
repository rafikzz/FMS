<?php

namespace App\Http\Controllers;

use App\Ground;
use Illuminate\Http\Request;

class GroundController extends Controller
{  function __construct()
    {
        $this->middleware('permission:futsal-edit', ['only' => ['edit','update']]);

   }
    public function edit(Ground $ground)
    {

        return view('admin.grounds.edit',compact('futsal'));

    }
}
