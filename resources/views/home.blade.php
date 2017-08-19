@extends('layouts.app')
  @section('mod-links')
    @include('inc.user.mod-links')
  @endsection

  @section('tools')

  @endsection

@section('content')

<div class="panel">

<div class="panel-heading">
  <form action="{{route('home')}}" method="get" class="navbar-form" id="home-form">
  <div class="form-group">
    <label for="datePicked"><i class="material-icons">date_range</i></label>
    <input type="date" id="datepicker" class="form-control" name="datePicked" onchange='this.form.submit()'>
  </div>
  <div class="form-group">
   <h4 id="date-picked"><strong>Datum: </strong>{{$startDateRaw}}</h4>
  </div>
  </form>
</div>

<div class="panel-body">

  <table class="table table-bordered table-hover calendar">
    <thead>
      {{-- Datumi u nedelji --}}
      <tr class="table-heading">
        <th class="avion-reg">Aircraft</th>
        <th>{{$startDateFormatted}}</th>
        @foreach ($dates as $date)
          <th>{{$date}}</th>
        @endforeach
      </tr>
    </thead>
    <tbody>
      {{-- Svaki red treba da sadrzi REGISTRACIJU aviona i ostala polja --}}
      {{-- YU - FSS FOREACH--}}
      @foreach ($airplanes as $airplane)
        <tr>
          <th class="avion-reg">{{$airplane->registracija}}</th>
          <td class="curent-column text-center col-sm-1">
            @foreach (\App\Flight::calData($airplane -> id, $startDateRaw) as $data)
              <a type="button" data-toggle="tooltip" data-placement="right" 
              {{-- Modal content --}}
              title="
              <h4>Broj leta <strong>{{$data->id}}</strong></h4>
              <hr>
              <h5>{{$data->dateMutator($data->poletanje)
                .' ('. \App\Flight::destinacije($data->flight_routes_id)[0]->ICAO .')
                 <br> - <br>'. $data->dateMutator($data->sletanje) .' ('. \App\Flight::destinacije($data->flight_routes_id)[1]->ICAO .')'}}</h5>
              <h5><strong>Posada:</strong>
              @foreach ($data->posadaLeta($data->id) as $letac)
                  {{$letac->ime_prezime}} <br>
              @endforeach
              </h5>

              "
              data-html="true">
              {{-- Cell content --}}
              <h4><span class="label label-primary">
                            {{\App\Flight::destinacije($data->flight_routes_id)[0]->naziv}}
                            - {{\App\Flight::destinacije($data->flight_routes_id)[1]->naziv}}
                            </span></h4>
              </a>
            @endforeach
          </td>
          <td class="text-center col-sm-1">
            @foreach (\App\Flight::calData($airplane -> id, $datesRaw[0]) as $data)
            <a type="button" data-toggle="tooltip" data-placement="right" 
            {{-- Modal content --}}
            title="<h4>Broj leta <strong>{{$data->id}}</strong></h4><hr><p>{{$data->poletanje}} - {{$data->sletanje}}</p><p>{{$data->client_id}}</p>" data-html="true">
            {{-- Cell content --}}
            <h4><span class="label label-primary">
                          {{\App\Flight::destinacije($data->flight_routes_id)[0]->naziv}}
                          - {{\App\Flight::destinacije($data->flight_routes_id)[1]->naziv}}
                          </span></h4>
            </a>
            @endforeach
          </td>
          <td class="text-center">
            @foreach (\App\Flight::calData($airplane -> id, $datesRaw[1]) as $data)
              <a type="button" data-toggle="tooltip" data-placement="right" 
              {{-- Modal content --}}
              title="<h4>Broj leta <strong>{{$data->id}}</strong></h4><hr><p>{{$data->poletanje}} - {{$data->sletanje}}</p><p>{{$data->client_id}}</p>" data-html="true">
              {{-- Cell content --}}
              <h4><span class="label label-primary">
                            {{\App\Flight::destinacije($data->flight_routes_id)[0]->naziv}}
                            - {{\App\Flight::destinacije($data->flight_routes_id)[1]->naziv}}
                            </span></h4>
              </a>
            @endforeach
          </td>
          <td class="text-center">
            @foreach (\App\Flight::calData($airplane -> id, $datesRaw[2]) as $data)
              <a type="button" data-toggle="tooltip" data-placement="right" 
              {{-- Modal content --}}
              title="<h4>Broj leta <strong>{{$data->id}}</strong></h4><hr><p>{{$data->poletanje}} - {{$data->sletanje}}</p><p>{{$data->client_id}}</p>" data-html="true">
              {{-- Cell content --}}
              <h4><span class="label label-primary">
                            {{\App\Flight::destinacije($data->flight_routes_id)[0]->naziv}}
                            - {{\App\Flight::destinacije($data->flight_routes_id)[1]->naziv}}
                            </span></h4>
              </a>
            @endforeach
          </td>
          <td class="text-center">
            @foreach (\App\Flight::calData($airplane -> id, $datesRaw[3]) as $data)
              <a type="button" data-toggle="tooltip" data-placement="right" 
              {{-- Modal content --}}
              title="<h4>Broj leta <strong>{{$data->id}}</strong></h4><hr><p>{{$data->poletanje}} - {{$data->sletanje}}</p><p>{{$data->client_id}}</p>" data-html="true">
              {{-- Cell content --}}
              <p><span class="label label-primary">
                            {{\App\Flight::destinacije($data->flight_routes_id)[0]->naziv}}
                            - {{\App\Flight::destinacije($data->flight_routes_id)[1]->naziv}}
                            </span></p>
              </a>
            @endforeach
          </td>
          <td class="text-center">
            @foreach (\App\Flight::calData($airplane -> id, $datesRaw[4]) as $data)
              <a type="button" data-toggle="tooltip" data-placement="right" 
              {{-- Modal content --}}
              title="<h4>Broj leta <strong>{{$data->id}}</strong></h4><hr><p>{{$data->poletanje}} - {{$data->sletanje}}</p><p>{{$data->client_id}}</p>" data-html="true">
              {{-- Cell content --}}
              <p><span class="label label-primary">
                            {{\App\Flight::destinacije($data->flight_routes_id)[0]->naziv}}
                            - {{\App\Flight::destinacije($data->flight_routes_id)[1]->naziv}}
                            </span></p>
              </a>
            @endforeach
          </td>
          <td class="text-center">
            @foreach (\App\Flight::calData($airplane -> id, $datesRaw[5]) as $data)
              <a type="button" data-toggle="tooltip" data-placement="right" 
              {{-- Modal content --}}
              title="<h4>Broj leta <strong>{{$data->id}}</strong></h4><hr><p>{{$data->poletanje}} - {{$data->sletanje}}</p><p>{{$data->client_id}}</p>" data-html="true">
              {{-- Cell content --}}
              <p><span class="label label-primary">
                            {{\App\Flight::destinacije($data->flight_routes_id)[0]->naziv}}
                            - {{\App\Flight::destinacije($data->flight_routes_id)[1]->naziv}}
                            </span></p>
              </a>
            @endforeach
          </td>
          <td class="text-center">
            @foreach (\App\Flight::calData($airplane -> id, $datesRaw[6]) as $data)
              <a type="button" data-toggle="tooltip" data-placement="right" 
              {{-- Modal content --}}
              title="<h4>Broj leta <strong>{{$data->id}}</strong></h4><hr><p>{{$data->poletanje}} - {{$data->sletanje}}</p><p>{{$data->client_id}}</p>" data-html="true">
              {{-- Cell content --}}
              <p><span class="label label-primary">
                            {{\App\Flight::destinacije($data->flight_routes_id)[0]->naziv}}
                            - {{\App\Flight::destinacije($data->flight_routes_id)[1]->naziv}}
                            </span></p>
              </a>
            @endforeach
          </td>
        </tr>
      @endforeach
    </tbody>
  </table></div>
</div>
@endsection
