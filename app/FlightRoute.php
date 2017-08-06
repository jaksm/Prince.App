<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlightRoute extends Model
{
    public function polaznaDest()
    {
      return $this->hasMany('App\Destination', 'id', 'polazna_dest');
    }

    public function dolaznaDest()
    {
      return $this->hasMany('App\Destination', 'id', 'dolazna_dest');
    }

    public function uLetovima()
    {
      return $this->belongsToMany('App\Flight');
    }
}
