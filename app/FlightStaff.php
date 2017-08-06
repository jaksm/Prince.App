<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlightStaff extends Model
{

      protected $fillable = [
          'flight_id', 'staffs_id',
      ];

    public function osoblje()
    {
      return $this->hasMany('App\Staff', 'id', 'staffs_id');
    }

    public function letoviPosade()
    {
      return $this->belongsToMany('App\Flight', 'flight_id', 'id');
    }
}
