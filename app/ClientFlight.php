<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientFlight extends Model
{
  protected $fillable = [
      'client_id', 'flight_id',
  ];
}
