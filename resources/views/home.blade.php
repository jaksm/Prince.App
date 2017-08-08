@extends('layouts.app')
  @section('mod-links')
    @include('inc.user.mod-links')
  @endsection
@section('content')
<div class="jumbotron col-md-11">

  {{-- Opcije --}}
  <div class="options">
    <form action="{{route('home')}}" method="get">
      <input type="text" id="datepicker" name="datePicked" onchange='this.form.submit()'>
      <button type="button" name="button" id="myButton" class="btn"><i class="material-icons">date_range</i></button>
    </form>


<form class="" action="index.html" method="post">
  <select class="" name="">
    <option value="">Nedelju dana</option>
    <option value="">Mesec dana</option>
  </select>
</form>


    <select class="" name="">
      @foreach ($airplanes as $airplane)
        <option value="{{$airplane->id}}">{{$airplane->registracija}}</option>
      @endforeach
    </select>
    {{-- <div class="dropdown">
      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        Dropdown
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <li><a href="#">Action</a></li>
        <li><a href="#">Another action</a></li>
        <li><a href="#">Something else here</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="#">Separated link</a></li>
      </ul>
    </div> --}}
  </div>

  <table class="table table-striped table-hover">
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
          <td>Podaci za 1</td>
          <td>Podaci za 2</td>
          <td>Podaci za 3</td>
          <td>Podaci za 4</td>
          <td>Podaci za 5</td>
          <td>Podaci za 6</td>
          <td>Podaci za 7</td>
          <td>Podaci za 7</td>
        </tr>
      @endforeach

    </tbody>
  </table>
</div>
@endsection
