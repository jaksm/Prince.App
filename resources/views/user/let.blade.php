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
        <th>Ruta</th>
        <th>Avion</th>
        <th>Vreme</th>
        <th>Klient</th>
        <th>Kapetan</th>
        <th>Kopilot</th>
        <th>Stjuardesa</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($letovi as $let)
          <tr>
            <td>{{$let->id}}</td>
            <td>{{\App\Flight::polaznaDestLeta($let->id)}} - {{\App\Flight::dolaznaDestLeta($let->id)}}</td>
            <td>{{\App\Flight::avionLeta($let->airplanes_id)}}</td>
            <td>{{\App\Flight::dateMutator($let->poletanje)}} - {{\App\Flight::dateMutator($let->sletanje)}}</td>
            <td>
            @foreach (\App\Flight::klijentLeta($let->id) as $klijent)
              {{$klijent->naziv}} <br>
            @endforeach
            </td>
            <td>
            @foreach (\App\Flight::posadaLeta($let->id) as $letac)
              @if ($letac->pozicija == 'Kapetan')
                {{$letac->ime_prezime}} <br>
                @else
              @endif
            @endforeach
            </td>
            <td>
            @foreach (\App\Flight::posadaLeta($let->id) as $letac)
              @if ($letac->pozicija == 'Kopilot')
                {{$letac->ime_prezime}} <br>
                @else
              @endif
            @endforeach
            </td>
            <td>
            @foreach (\App\Flight::posadaLeta($let->id) as $letac)
              @if ($letac->pozicija == 'Stjuardesa')
                {{$letac->ime_prezime}} <br>
                @else
              @endif
            @endforeach
            </td>
            {{-- <td>
              @if (\App\Flight::posadaLeta($let->id)->pozicija == 'Kapetan')
                {{\App\Flight::posadaLeta($let->id)->ime_prezime}}
                @else
              @endif
            </td>
            <td>
              @if (\App\Flight::posadaLeta($let->id)->pozicija == 'Kopilot')
                {{\App\Flight::posadaLeta($let->id)->ime_prezime}}
                @else
              @endif
            </td>
            <td>
              @if (\App\Flight::posadaLeta($let->id)->pozicija == 'Stjuardesa')
                {{\App\Flight::posadaLeta($let->id)->ime_prezime}}
                @else
              @endif
            </td> --}}
          </tr>
        @endforeach
      </tbody>
</div>

</div>
@endsection
