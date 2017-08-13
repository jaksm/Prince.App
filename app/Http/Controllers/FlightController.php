<?php

namespace App\Http\Controllers;

use App\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

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
        $letovi = Flight::all();
        // $k = Flight::posadaLeta(2);
        // dd($k);
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

        // Popuni polja flights.poletanje, sletanje, airplanes_id

        $let = new Flight;
        $let -> poletanje = request('poletanje');
        $let -> sletanje = request('sletanje');
        $let -> airplanes_id = request('airplanes_id');
        $let -> save();

        // Napravi klijente
        $br_klijenata = count(request('client_naziv'));
        foreach (request('client_naziv') as $check) {
          if (\App\Client::where('naziv', $check)->exists()) {
            $id = \App\Client::where('naziv', $check)->get()->pluck('id')[0];
            $client = \App\Client::find($id);
          } else {
            if ($check instanceof Collection) {
              foreach ($check as $client) {
              \App\Client::create([
                              'naziv' => $client
                              ]);
              }
            } else {
              \App\Client::create([
                              'naziv' => $check
                              ]);
            }

          }
        }



        // Napravi rutu
        $ruta = new \App\FlightRoute;
        $ruta -> polazna_dest = request('polazna_dest');
        $ruta -> dolazna_dest = request('dolazna_dest');
        $ruta -> save(); // BUG: ovde mora da postoji pivot tabela let.ruta zato sto ista ruta moze da se pojavi u dva leta

        // Nadji poslednju rutu i dodaj je poslenjem letu
        $ruta = \App\FlightRoute::orderBy('created_at', 'DESC')->first()->id; // BUG: tako da ovde mora da ide where id leta = id rute
        $let = Flight::orderBy('created_at', 'DESC')->first();
        $let -> flight_routes_id = $ruta;
        $let -> save();

        // Sastavi posadu
        foreach (request('staffs_id') as $staff) {
          \App\FlightStaff::create([
            'staffs_id' => \App\Staff::where('ime_prezime', $staff)->pluck('id')[0],
            'flight_id' => $let->id,
          ]);
        }

        // Nadji poslednju posadu i poslednji let i dodaj mu id posade
        $posada = \App\FlightStaff::orderBy('created_at', 'DESC')->first()->id;
        $let = Flight::orderBy('created_at', 'DESC')->first();
        $let -> flight_staffs_id = $posada;
        $let -> save();

        // Nadji pravog klijenta
        foreach (request('client_naziv') as $check) {
          $clients[]= \App\Client::where('naziv', $check)->get()[0];
        }


        // $let = Flight::orderBy('created_at', 'DESC')->first();
        // $let -> client_id = \App\Client::orderBy('created_at', 'DESC')->first()->id;
        // $let -> save();

        // Dodaj prave klijente u pivot tabelu

            foreach ($clients as $client) {
              $clientFlight = new \App\ClientFlight;
              $clientFlight -> client_id = $client->id; // BUG: ovo se uopste ne exe
              $clientFlight -> flight_id = $let->id;
              $clientFlight -> save();
            }



        // Napravi izvestaj
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

        // Redirektuj na tabelu svih letova
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

    public function autocomplete(Request $request)
    {

      $bla = \App\Client::select("naziv as name")->where("naziv","LIKE","%{$request->input('query')}%")->get();
      // $foo = \App\Staff::select("ime_prezime as name")->where("ime_prezime","LIKE","%{$request->input('query')}%")->get();
      $data = $bla;


      // $data2 = \App\Staff::select("ime_prezime as name")->where("ime_prezime","LIKE","%{$request->input('query')}%")->get();

      return response()->json($data);
    }

    public function posada(Request $request)
    {
      $data = \App\Staff::select("ime_prezime as name")->where("ime_prezime","LIKE","%{$request->input('query')}%")->get();

      return response()->json($data);
    }
}
