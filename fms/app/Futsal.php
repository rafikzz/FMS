<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Futsal extends Model
{
    use Sortable;

    protected $fillable = [
        'name','address','email','contact_no','no_of_grounds', 'price','logo','image','pan_no'
    ];

    public $sortable = ['id','name','address','email','no_of_grounds','price'];

    public function logo(){
        $logoPath =($this->logo);
        return '/storage/'. $logoPath;
    }
    public function image(){
        $imagePath =($this->image);
        return '/storage/'. $imagePath;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function schedule()
    {
        return $this->hasOne('App\Schedule');
    }

    public function grounds()
     {
      return $this->hasMany('App\Ground');
    }
    public function bookings()
    {
     return $this->hasMany('App\Booking');
   }
    protected static function boot()
    {
        parent::boot();

        static::created(function ($futsal) {
            $futsal->schedule()->create([]);
        }


        );
    }
}
