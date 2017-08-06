<?php

namespace App\Http\Controllers;

use App\Airplane;
use Illuminate\Http\Request;

class AirplaneController extends Controller
{


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
        $avioni = Airplane::all();

        return view('user.avion', compact('avioni'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inc.user.avion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $avion = new Airplane;
        $avion -> registracija = request('registracija');
        $avion -> tip = request('tip');
        $avion -> telefon = request('tel');
        $avion -> save();

        return redirect('home/airplane');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Airplane  $airplane
     * @return \Illuminate\Http\Response
     */
    public function show(Airplane $airplane)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Airplane  $airplane
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $avion = Airplane::find($id);

        return view('inc.user.avion.edit', compact('avion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Airplane  $airplane
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $avion = Airplane::find($id);

      $avion -> registracija = request('registracija');
      $avion -> tip = request('tip');
      $avion -> telefon = request('tel');

      $avion -> save();

      return redirect('home/airplane');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Airplane  $airplane
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $avion = Airplane::find($id);
        $avion -> delete();

        return redirect('home/airplane');
    }
}
