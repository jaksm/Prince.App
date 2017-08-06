<?php

namespace App\Http\Controllers;

use App\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
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
        $posada = Staff::all();

        return view('user.posada', compact('posada'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('inc.user.posada.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $posada = new Staff;
      $posada -> ime_prezime = request('ime');
      $posada -> pozicija = request('uloga');
      $posada -> save();

      return redirect('home/staff');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posada = Staff::find($id);

        return view('inc.user.posada.edit', compact('posada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $posada = Staff::find($id);

        $posada -> ime_prezime = request('ime');

        if (request('uloga') == null) {
          $posada -> pozicija = $posada -> pozicija;
        } else {
          $posada -> pozicija = request('uloga');
        }

        $posada -> save();

        return redirect('home/staff');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posada = Staff::find($id);
        $posada -> destroy($id);
        return redirect('home/staff');
    }
}
