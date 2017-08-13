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
      $polaznaNaziv = \App\Destination::find($polazna)->pluck('naziv')[0];
      return $polaznaNaziv;
    }

    static function dolaznaDestLeta($id)
    {
      $let = Flight::find($id);
      $dolazna = $let->ruta()->get()->pluck('dolazna_dest');
      $dolaznaNaziv = \App\Destination::find($dolazna)->pluck('naziv')[0];

      return $dolaznaNaziv;
    }

    static function klijentLeta($id)
    {
      $klijent_id = \App\ClientFlight::all()->where('flight_id', $id)->pluck('client_id');
      $klijenti = [];
      foreach ($klijent_id as $id) {
        $klijent = \App\Client::find($id);
        $klijenti[] = $klijent;
      }

      return $klijenti;
    }

    static function posadaLeta($id)
    {
      $osoblje_id = \App\FlightStaff::all()->where('flight_id', $id)->pluck('staffs_id');
      $osoblje = [];
      foreach ($osoblje_id as $id) {
        $letac = \App\Staff::find($id);
        $osoblje[] = $letac;
      }
      return $osoblje;
    }

    static function avionLeta($airplanes_id)
    {

      $avion = \App\Airplane::find($airplanes_id)->registracija;

      return $avion;
    }

    static function calData($airplanes_id, $poletanje)
    {

      $data = Flight::where('airplanes_id', $airplanes_id)->whereDate('poletanje', $poletanje)->get();


      return $data;
    }


    static function dateMutator($date)
    {
      $start = \Carbon\Carbon::parse($date);
      $mutated = $start ->format('h:i A');

      return $mutated;
    }

}
