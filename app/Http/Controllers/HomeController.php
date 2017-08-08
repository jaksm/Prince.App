<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datePicked = request('datePicked');
        $startDate = Carbon::parse($datePicked);
        $startDateFormatted = $startDate->format('l d.');
        $intSelected = 7;

        if ($datePicked !== null) {

          for ($i = 1 ; $i <= $intSelected; $i++) {
              $dates[] = $startDate->copy()->addDays($i)->format('l d.');
          }
        }



        $airplanes = \App\Airplane::all();
        return view('home', compact('airplanes', 'startDateFormatted', 'dates'));
    }
}
