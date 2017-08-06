<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;

class Flight extends Model
{

    // Relacije

    public function ruta()
    {
      return $this->hasMany('App\FlightRoute', 'id', 'flight_routes_id');
    }

    public function avion()
    {
      return $this->hasMany('App\Airplane', 'id', 'airplanes_id');
    }

    public function klijent()
    {
      return $this->belongsToMany('App\Client', 'client_flights', 'flight_id', 'client_id');
    }

    public function posada()
    {
      return $this->hasMany('App\FlightStaff', 'id', 'flight_staffs_id');
    }

    // Upiti

    static function polaznaDestLeta($id)
    {
      $let = Flight::find($id);
      $polazna = $let->ruta()->get()->pluck('polazna_dest');

      return $polazna;
    }

    static function dolaznaDestLeta($id)
    {
      $let = Flight::find($id);
      $dolazna = $let->ruta()->get()->pluck('dolazna_dest');

      return $dolazna;
    }

    static function klijentLeta($id)
    {
      $let = Flight::find($id);
      $klijent = $let->klijent()->get()->pluck('naziv');

      return $klijent;
    }

    static function posadaLeta($id)
    {
      $let = Flight::find($id);
      $posada = $let->posada()->pluck('staffs_id');
      $osoblje_id = \App\FlightStaff::all()->where('flight_id', $let->id)->pluck('staffs_id');

      return $osoblje_id;
    }

    static function avionLeta($airplanes_id)
    {

      $avion = \App\Airplane::find($airplanes_id)->registracija;

      return $avion;
    }




}
