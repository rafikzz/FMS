<?php

namespace App\Http\Controllers;

use App\Futsal;

use DB;
use DataTables;
use App\Ground;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Auth\Middleware\Authorize;

class FutsalController extends Controller
{
    function __construct()

    {
         $this->middleware('permission:futsal-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:futsal-create', ['only' => ['create','store']]);
         $this->middleware('permission:futsal-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:futsal-delete', ['only' => ['destroy']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user=  auth()->user();


      $futsals = Futsal::sortable()->where('user_id',$user->id)->paginate(5);


        if($user->hasRole('Admin')){
            $futsals=Futsal::sortable()->paginate(5);
        }




        return view('admin.futsals.index',compact('futsals'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.futsals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate([
            'name' => 'required|unique:futsals,name',
            'address' => 'required',
            'email'=>'required|email|unique:futsals,email',
            'vendor_email'=>'required',
            'pan_no'=>'required|unique:futsals,pan_no',
            'contact_no' => 'required',
            'price' => 'required',
            'logo'=>'required|mimes:jpeg,jpg,png,bmp,gif,svg',
            'image'=>'required|mimes:jpeg,jpg,png,bmp,gif,svg',
            'groundname' => 'required',
        ]);
        $gn=$request->groundname;
        $vendoremail=$request->vendor_email;
        $vendor=User::where('email',$vendoremail)->firstOrFail();
        unset($request->groundname);
        unset($request->vendor_email);



        $logoPath=request('logo')->store('uploads','public');
        $logo =Image::make(public_path("storage/{$logoPath}"))->fit(200,200);
        $logo->save();

        $imagePath=request('image')->store('uploads','public');
        $image =Image::make(public_path("storage/{$imagePath}"))->fit(500,470);
        $image->save();

     $vendor->futsals()->create(
            [
            'name' => $request['name'],
            'address' => $request['address'],
            'email' => $request['email'],
            'pan_no'=>$request['pan_no'],
            'contact_no' => $request['contact_no'],
            'no_of_grounds' =>count($gn),
            'price' =>$request['price'],
            'image'=>$imagePath,
            'logo'=>$logoPath,


        ]);

              $futsal=  Futsal::orderby('id','desc')->get()->first();
        $i=$request->groundname;

        for($j=0;$j<count($i);$j++){
            $futsal->grounds()->create(
                [

                'name' => $gn[$j],


            ]);

        }

        return redirect()->route('futsals.index')->with('success','Futsal created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Futsal $futsal)
    {
        $grounds=$futsal->grounds()->get();
        return view('admin.futsals.show',compact('futsal','grounds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Futsal $futsal)
    {


        $this->authorize('update',$futsal);

        return view('admin.futsals.edit',compact('futsal'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Futsal $futsal)
    {

       $data= request()->validate([
            'name' => 'required',
            'address' => 'required',
            'email'=>'required|email|unique:futsals,email',
            'contact_no' => 'required',
            'no_of_grounds' => 'required',
            'price' => 'required',
            'logo'=>'mimes:jpeg,jpg,png,bmp,gif,svg',
            'image'=>'mimes:jpeg,jpg,png,bmp,gif,svg',


        ]);
         if(request('logo')){
            $logoPath=request('logo')->store('uploads','public');
            $logo =Image::make(public_path("storage/{$logoPath}"))->fit(200,200);
            $logo->save();
            $logoArray= ['logo'=>$logoPath];
        }
        if(request('image')){
            $imagePath=request('image')->store('uploads','public');
            $image =Image::make(public_path("storage/{$imagePath}"))->fit(500,470);
            $image->save();
            $imageArray= ['image'=>$imagePath];
        }

       auth()->user()->futsals()->update(
        array_merge($data,$logoArray??[],$imageArray??[])
        );

        return redirect()->route('futsals.index')->with('success','Futsal updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Futsal $futsal)
    {
        $this->authorize('update',$futsal);
        $logoPath=public_path("storage/{$futsal->logo}");
        if(file_exists($logoPath)){
       unlink($logoPath);
        }
        $imagePath=public_path("storage/{$futsal->image}");

        if(file_exists($imagePath)){
            unlink($imagePath);
        }
     $futsal->delete();

        return redirect()->route('futsals.index')->with('success','Futsal deleted successfully');
    }
}
