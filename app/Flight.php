<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\FlightRoute;
use \App\Client;
use \App\FlightStaff;
use \App\Staff;
use \App\ClientFlight;
use \App\Airplane;
use \App\Destination;
use \Carbon\Carbon;



class Flight extends Model
{

    protected $fillable = [
        'flight_routes_id', 'poletanje', 'sletanje', 'flight_staffs_id', 'airplanes_id',
    ];

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

    public function polaznaDestLeta($id)
    {
      $let = Flight::find($id);
      $polazna = $let->ruta()->get()->pluck('polazna_dest');
      $polaznaNaziv = Destination::find($polazna)->pluck('naziv')[0];
      return $polaznaNaziv;
    }

    public function dolaznaDestLeta($id)
    {
      $let = Flight::find($id);
      $dolazna = $let->ruta()->get()->pluck('dolazna_dest');
      $dolaznaNaziv = Destination::find($dolazna)->pluck('naziv')[0];

      return $dolaznaNaziv;
    }

    public function klijentLeta($id)
    {
      $klijent_id = ClientFlight::all()->where('flight_id', $id)->pluck('client_id');
      $klijenti = [];
      foreach ($klijent_id as $id) {
        $klijent = Client::find($id);
        $klijenti[] = $klijent;
      }

      return $klijenti;
    }

    public function posadaLeta($id)
    {
      $osoblje_id = FlightStaff::all()->where('flight_id', $id)->pluck('staffs_id');
      $osoblje = [];
      foreach ($osoblje_id as $id) {
        $letac = Staff::find($id);
        $osoblje[] = $letac;
      }
      return $osoblje;
    }

    public function avionLeta($airplanes_id)
    {

      $avion = Airplane::find($airplanes_id)->registracija;

      return $avion;
    }

    public function calData($airplanes_id, $poletanje)
    {

      $data = Flight::where('airplanes_id', $airplanes_id)->whereDate('poletanje', $poletanje)->get();


      return $data;
    }


    public function dateMutator($date)
    {
      $start = Carbon::parse($date);
      $mutated = $start ->format('h:i A');

      return $mutated;
    }


   // Novi let
   static function newFlight($poletanje, $sletanje, $airplanes_id, $polazna_dest, $dolazna_dest, $naziv, $staffs_id)
   {

     //Varijable potrebne za kreiranje leta $poletanje, $sletanje, $airplanes_id, $flight_routes_id, $flight_staffs_id
     // $flight_routes_id
     FlightRoute::create([
       'polazna_dest' => $polazna_dest,
       'dolazna_dest' => $dolazna_dest
     ]);

     $flight_routes_id = FlightRoute::all()->last()->id;

     // Let
     Flight::create([

     ]);

     $flight_id = Flight::all()->last()->id;

     // Varijable potrebne za kreiranje klijenta $naziv
     // Napravi klijente
     foreach ($naziv as $check) {
       if (Client::where('naziv', $check)->exists()) {
         $id = Client::where('naziv', $check)->get()->pluck('id')[0];
         $client = Client::find($id);
       } else {
         if ($check instanceof Collection) {
           foreach ($check as $client) {
           Client::create([
                           'naziv' => $client
                           ]);
           }
         } else {
           Client::create([
                           'naziv' => $check
                           ]);
         }
       }
     }

     // Sastavi posadu
     // $flight_staffs_id
     foreach ($staffs_id as $staff) {
       FlightStaff::create([
         'staffs_id' => Staff::where('ime_prezime', $staff)->pluck('id')[0],
         'flight_id' => $flight_id,
       ]);
     }
     $flight_staffs_id = FlightStaff::all()->last()->id;

     // Nadji poslednju posadu i poslednji let i dodaj mu id posade
     Flight::all()->last()->update([
       'poletanje' => $poletanje,
       'sletanje' => $sletanje,
       'airplanes_id' => $airplanes_id,
       'flight_routes_id' => $flight_routes_id,
       'flight_staffs_id' => $flight_staffs_id
     ]);


     // Nadji pravog klijenta
     foreach ($naziv as $check) {
       $clients[]= Client::where('naziv', $check)->get()[0];
     }

     // Dodaj prave klijente u pivot tabelu
      foreach ($clients as $client) {
        ClientFlight::create([
          'client_id' => $client->id,
          'flight_id' => $flight_id,
        ]);
      }

   }

}
