<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public function posada()
    {
      return $this->belongsToMany('App\FlightStaff');
    }
}
