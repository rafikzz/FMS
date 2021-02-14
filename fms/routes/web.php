<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Futsal;
use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

Route::view('/welcome','welcome');

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::view('/header','header');
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('admin/roles','RoleController');
    Route::resource('admin/users','UserController');
    Route::resource('admin/futsals','FutsalController');
    Route::resource('admin/customers','CustomerController');
    Route::resource('admin/bookings','BookingController');
    Route::get('admin/bookings/history/{id}','BookingController@history')->name('bookings.history');
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('admin/schedules','ScheduleController@index')->name('schedules.index');
    Route::get('admin/schedules/{id}','ScheduleController@edit')->name('schedules.edit');

    Route::patch('admin/schedules/{id}','ScheduleController@update')->name('schedules.update');

    Route::get('booking/{futsal}', 'BookController@create')->name('book.create');
    Route::get('bookings/{booking}', 'BookController@destroy')->name('book.destroy');
    Route::post('postbooking', 'BookController@store');
    Route::get('/yourbooking', 'BookController@show')->name('book.show');

});
    Route::get('/futsal/profile/{futsal}','ProfileController@index')->name('profile.show');
    Route::get('/logout', 'Auth\LoginController@logout');
    Route::get('/futsal','FutsalPageController@index')->name('futsal.index');
    Route::get('contact-us', 'ContactController@getContact');
    Route::post('contact-us', 'ContactController@saveContact');
    Route::any('/search',function(Request $request){
        $q = Input::get ( 'q' );
        $futsal = Futsal::where('name','like','%'.$q.'%')->orWhere('address','=','%'.$q.'%')->orWhere('no_of_grounds','LIKE','%'.$q.'%')->orWhere('price','LIKE','%'.$q.'%')->get();
        if(count($futsal) > 0)
            return view('search')->withDetails($futsal)->withQuery ( $q );
        else return view ('/search')->withMessage('No Futsal found. Try to search again !');
    });

