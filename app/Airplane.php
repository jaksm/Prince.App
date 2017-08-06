<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airplane extends Model
{


  protected $fillable = [
      'reqistracija', 'tip', 'tel',
  ];


    public function avionLetovi()
    {
      return $this->belongsToMany('App\Flight');
    }
}
