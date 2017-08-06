@extends('layouts.app')
@section('mod-links')
  @include('inc.user.mod-links')
@endsection
@section('content')
  <div class="jumbotron col-sm-11 col-xs-12">
    <table class="table table-striped table-hover ">
      <thead>
      <tr>
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


@endsection
