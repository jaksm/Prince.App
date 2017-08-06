<?php

namespace App\Http\Controllers;

use App\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{

    protected $dates = ['poletanje', 'sletanje'];


    public function __construct()
    {
      $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $letovi = Flight::all()->groupBy('poletanje');
        return view('user.let', compact('letovi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $avioni = \App\Airplane::all();
        $destinacije = \App\Destination::all();
        $clanovi = \App\Staff::all();
        return view('inc.user.let.create', compact('avioni', 'destinacije', 'clanovi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $let = new Flight;
        $let -> poletanje = request('poletanje');
        $let -> sletanje = request('sletanje');
        $let -> airplanes_id = request('airplanes_id');
        $let -> save();


          \App\Client::create([
            'naziv' => request('client_naziv'),
          ]);


        $ruta = new \App\FlightRoute;
        $ruta -> polazna_dest = request('polazna_dest');
        $ruta -> dolazna_dest = request('dolazna_dest');
        $ruta -> save();


        $ruta = \App\FlightRoute::orderBy('created_at', 'DESC')->first()->id;
        $let = Flight::orderBy('created_at', 'DESC')->first();
        $let -> flight_routes_id = $ruta;
        $let -> save();


        // foreach (request('staffs_id[]') as $update){
          \App\FlightStaff::create(['flight_id' => $let->id, 'staffs_id' => request('staffs_id')]);
        // }

        $posada = \App\FlightStaff::orderBy('created_at', 'DESC')->first()->id;
        $let = Flight::orderBy('created_at', 'DESC')->first();
        $let -> flight_staffs_id = $posada;
        $let -> save();

          $client = \App\Client::orderBy('created_at', 'DESC')->first();
          $client -> flight_id = $let->id;
          $client -> save();

        $let = Flight::orderBy('created_at', 'DESC')->first();
        $let -> client_id = \App\Client::orderBy('created_at', 'DESC')->first()->id;
        $let -> save();

        $clientFlight = new \App\ClientFlight;
        $clientFlight -> client_id = $client->id;
        $clientFlight -> flight_id = $let->id;
        $clientFlight -> save();

        \App\LetExport::create([
          'id_leta' => $let->id,
          'polazna_dest_icao' => 'U procesu',
          'dolazna_dest_icao' => 'u Procesu',
          'vreme_poletanja' => $let->poletanje,
          'vreme_sletanja' => $let->sletanje,
          'kapetan' => 'U procesu',
          'kopilot' => 'U procesu',
          'stjuardesa' => 'U procesu',
          'registracija_aviona' => 'U procesu',
        ]);

        return redirect('home/flight');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function show(Flight $flight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function edit(Flight $flight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flight $flight)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flight $flight)
    {
        //
    }
}
