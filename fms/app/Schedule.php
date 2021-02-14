<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Schedule extends Model
{
    protected $fillable = [
        'futsal_id', 'start_time', 'end_time',
    ];

    // public function getStartTimeAttribute($data)
    // {
    //     return Carbon::parse($data)->format('H: i ');
    // }
    // public function getEndTimeAttribute($data)
    // {
    //     return Carbon::parse($data)->format('H: i ');
    // }

    public function futsal()
    {
        return $this->belongsTo('App\Futsal');
    }


}
