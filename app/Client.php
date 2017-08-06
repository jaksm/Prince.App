<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = [
        'naziv',
    ];

    public function klijentLetovi()
    {
      return $this->belongsToMany('App\Flight', 'client_flights', 'client_id', 'flight_id');
    }
}
