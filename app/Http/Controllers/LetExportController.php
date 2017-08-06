<?php

namespace App\Http\Controllers;

use App\LetExport;
use Illuminate\Http\Request;
use Excel;
use Carbon;

class LetExportController extends Controller
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
        return view('user.export');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

     //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LetExport  $letExport
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $data = LetExport::all()->toArray();
      return Excel::create('export_letova', function($excel) use ($data) {
        $excel->sheet('mySheet', function($sheet) use ($data) {

          $sheet->fromArray($data);

          });
      })->download($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LetExport  $letExport
     * @return \Illuminate\Http\Response
     */
    public function edit(LetExport $letExport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LetExport  $letExport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LetExport $letExport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LetExport  $letExport
     * @return \Illuminate\Http\Response
     */
    public function destroy(LetExport $letExport)
    {
        //
    }
}
