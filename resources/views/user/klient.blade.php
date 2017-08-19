@extends('layouts.app')
@section('mod-links')
  @include('inc.user.mod-links')
@endsection
@section('content')
  <div class="panel">
    <div class="panel-heading">
      <h1>Klijenti</h1>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered table-hover ">
          <thead>
          <tr class="table-heading">
            <th>#</th>
            <th>Naziv</th>
            <th>Let</th>
            <th>Datum</th>
          </tr>
          </thead>
          <tbody>

            @foreach ($klijenti as $klijent)

              <tr>
                <td>{{$klijent->id}}</td>
                <td>{{$klijent->naziv}}</td>
                <td>{{$klijent -> flight_id}}</td>
                <td>{{\App\Client::find($klijent->id)->klijentLetovi()->get()->pluck('poletanje')[0] }}</td>
              </tr>

            @endforeach

          </tbody>
        </table>
    </div>
  </div>



@endsection
