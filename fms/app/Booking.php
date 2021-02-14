<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;
   protected $fillable=[
   'customer_id','futsal_id','ground_name', 'booking_time','status'
   ];
   public $sortable = ['id' ,'customer_id','futsal_id','ground_name', 'booking_time','created_at'];

   public function futsal()
    {
        return $this->belongsTo('App\Futsal','futsal_id' );
    }
    public function customer()
    {
        return $this->belongsTo('App\User','customer_id' );
    }

}
