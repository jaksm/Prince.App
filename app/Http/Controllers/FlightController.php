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

        $poletanje = request('poletanje');
        $sletanje = request('sletanje');
        $airplanes_id = request('airplanes_id');
        $polazna_dest = request('polazna_dest');
        $dolazna_dest = request('dolazna_dest');
        $naziv = request('client_naziv');
        $staffs_id = request('staffs_id');


        Flight::newFlight($poletanje, $sletanje, $airplanes_id, $polazna_dest, $dolazna_dest, $naziv, $staffs_id);



        // Napravi izvestaj
        // \App\LetExport::create([
        //   'id_leta' => $let->id,
        //   'polazna_dest_icao' => 'U procesu',
        //   'dolazna_dest_icao' => 'u Procesu',
        //   'vreme_poletanja' => $let->poletanje,
        //   'vreme_sletanja' => $let->sletanje,
        //   'kapetan' => 'U procesu',
        //   'kopilot' => 'U procesu',
        //   'stjuardesa' => 'U procesu',
        //   'registracija_aviona' => 'U procesu',
        // ]);

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
