@extends('layouts.app')
  @section('mod-links')
    @include('inc.user.mod-links')
  @endsection
@section('content')
<div class="jumbotron col-md-11">

  {{-- Opcije --}}
  <div class="options">
    <form action="{{route('home')}}" method="get">
      <i class="material-icons">date_range</i>
      <input type="date" id="datepicker" name="datePicked" onchange='this.form.submit()'>
  </div>
  <table class="table table-bordered table-hover">
    <thead>
      {{-- Datumi u nedelji --}}
      <tr>
        <th>Aircraft</th>
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
          <th>{{$airplane->registracija}}</th>
          <td>
            @foreach (\App\Flight::calData($airplane -> id, $startDateRaw) as $data)
              <a type="button" data-toggle="tooltip" data-placement="right" title="<h4>Broj leta <strong>{{$data->id}}</strong></h4><hr><p>{{$data->poletanje}} - {{$data->sletanje}}</p><p>{{$data->client_id}}</p>" data-html="true">{{$data->sletanje}}</a>
            @endforeach
          </td>
          <td>
            @foreach (\App\Flight::calData($airplane -> id, $datesRaw[0]) as $data)
              <a type="button" data-toggle="tooltip" data-placement="right" title="<h4>Broj leta <strong>{{$data->id}}</strong></h4><hr><p>{{$data->poletanje}} - {{$data->sletanje}}</p><p>{{$data->client_id}}</p>" data-html="true">{{$data->sletanje}}</a>
            @endforeach
          </td>
          <td>
            @foreach (\App\Flight::calData($airplane -> id, $datesRaw[1]) as $data)
              <a type="button" data-toggle="tooltip" data-placement="right" title="<h4>Broj leta <strong>{{$data->id}}</strong></h4><hr><p>{{$data->poletanje}} - {{$data->sletanje}}</p><p>{{$data->client_id}}</p>" data-html="true">{{$data->sletanje}}</a>
            @endforeach
          </td>
          <td>
            @foreach (\App\Flight::calData($airplane -> id, $datesRaw[2]) as $data)
              <a type="button" data-toggle="tooltip" data-placement="right" title="<h4>Broj leta <strong>{{$data->id}}</strong></h4><hr><p>{{$data->poletanje}} - {{$data->sletanje}}</p><p>{{$data->client_id}}</p>" data-html="true">{{$data->sletanje}}</a>
            @endforeach
          </td>
          <td>
            @foreach (\App\Flight::calData($airplane -> id, $datesRaw[3]) as $data)
              <a type="button" data-toggle="tooltip" data-placement="right" title="<h4>Broj leta <strong>{{$data->id}}</strong></h4><hr><p>{{$data->poletanje}} - {{$data->sletanje}}</p><p>{{$data->client_id}}</p>" data-html="true">{{$data->sletanje}}</a>
            @endforeach
          </td>
          <td>
            @foreach (\App\Flight::calData($airplane -> id, $datesRaw[4]) as $data)
              <a type="button" data-toggle="tooltip" data-placement="right" title="<h4>Broj leta <strong>{{$data->id}}</strong></h4><hr><p>{{$data->poletanje}} - {{$data->sletanje}}</p><p>{{$data->client_id}}</p>" data-html="true">{{$data->sletanje}}</a>
            @endforeach
          </td>
          <td>
            @foreach (\App\Flight::calData($airplane -> id, $datesRaw[5]) as $data)
              <a type="button" data-toggle="tooltip" data-placement="right" title="<h4>Broj leta <strong>{{$data->id}}</strong></h4><hr><p>{{$data->poletanje}} - {{$data->sletanje}}</p><p>{{$data->client_id}}</p>" data-html="true">{{$data->sletanje}}</a>
            @endforeach
          </td>
          <td>
            @foreach (\App\Flight::calData($airplane -> id, $datesRaw[6]) as $data)
              <a type="button" data-toggle="tooltip" data-placement="right" title="<h4>Broj leta <strong>{{$data->id}}</strong></h4><hr><p>{{$data->poletanje}} - {{$data->sletanje}}</p><p>{{$data->client_id}}</p>" data-html="true">{{$data->sletanje}}</a>
            @endforeach
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
