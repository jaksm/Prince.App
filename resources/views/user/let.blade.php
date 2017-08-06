@extends('layouts.app')
@section('mod-links')
  @include('inc.user.mod-links')
@endsection
@section('content')
<div class="jumbotron col-sm-11 col-xs-12">
  @foreach ($letovi as $datum => $letovi)
    <table class="table table-striped table-hover ">
      <thead>
      <tr>
        <th>#</th>
        <th>Ruta</th>
        <th>Vreme</th>
        <th>Klient</th>
        <th>Kapetan</th>
        <th>Kopilot</th>
        <th>Stjuardesa</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($letovi as $let)

          <h4><strong>Datum:</strong> {{$let->poletanje}} <strong>Avion:</strong> <span class="label label-primary">
         {{\App\Airplane::find($let -> airplanes_id)['registracija']}}
       </span></h4>
          <tr>
            <td>{{$let -> id}}</td>
            <td>
              {{\App\Destination::find(\App\Flight::polaznaDestLeta($let->id))[0]['naziv']}}
              -
              {{\App\Destination::find(\App\Flight::dolaznaDestLeta($let->id))[0]['naziv']}}
            </td>
            <td>{{$let->poletanje}}
               -
               {{$let->sletanje}}
             </td>
            <td>{{\App\Flight::klijentLeta($let->id)->first()}}</td>

            <td>
            @foreach (\App\Staff::find(\App\Flight::posadaLeta($let->id)) as $posada)
              @if ($posada -> pozicija == 'Kapetan')
                {{$posada->ime_prezime}}
              @endif
            @endforeach
            </td>

            <td>
            @foreach (\App\Staff::find(\App\Flight::posadaLeta($let->id)) as $posada)
              @if ($posada -> pozicija == 'Kopilot')
                {{$posada->ime_prezime}}
              @endif
            @endforeach
            </td>

            <td>
            @foreach (\App\Staff::find(\App\Flight::posadaLeta($let->id)) as $posada)
              @if ($posada -> pozicija == 'Stjuardesa')
                {{$posada->ime_prezime}}
              @endif
            @endforeach
            </td>

          </tr>
        @endforeach
  @endforeach
</div>

</div>
@endsection
