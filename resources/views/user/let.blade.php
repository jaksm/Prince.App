@extends('layouts.app')
@section('mod-links')
  @include('inc.user.mod-links')
@endsection
@section('content')
<div class="jumbotron col-sm-11 col-xs-12">
    <table class="table tablesorter table-striped table-hover ">
      <thead>
      <tr>
        <th>#</th>
        <th>Ruta</th>
        <th class="filter-select filter-exact">Avion</th>
        <th>Vreme</th>
        <th>Klient</th>
        <th>Kapetan</th>
        <th>Kopilot</th>
        <th>Stjuardesa</th>
      </tr>
      <button type="button" class="btn btn-default prev reset"><span>Reset</span></button>
      </thead>
      <tfoot>
        <tr>
          <th colspan="8" class="ts-pager form-inline">
            <div class="btn-group btn-group-sm" role="group">
              <button type="button" class="btn btn-default first"><span class="glyphicon glyphicon-step-backward"></span></button>
              <button type="button" class="btn btn-default prev"><span class="glyphicon glyphicon-backward"></span></button>
            </div>
            <span class="pagedisplay"></span>
            <div class="btn-group btn-group-sm" role="group">
              <button type="button" class="btn btn-default next"><span class="glyphicon glyphicon-forward"></span></button>
              <button type="button" class="btn btn-default last"><span class="glyphicon glyphicon-step-forward"></span></button>
            </div>
            <select class="form-control input-sm pagesize" title="Select page size">
              <option selected="selected" value="10">10</option>
              <option value="20">20</option>
              <option value="30">30</option>
              <option value="all">All Rows</option>
            </select>
            <select class="form-control input-sm pagenum" title="Select page number"></select>
          </th>
        </tr>
      </tfoot>
      <tbody>
        @foreach ($letovi as $let)
          <tr>
            <td>{{$let->id}}</td>
            <td>{{$let->polaznaDestLeta($let->id)}} - {{$let->dolaznaDestLeta($let->id)}}</td>
            <td>{{$let->avionLeta($let->airplanes_id)}}</td>
            <td>{{$let->dateMutator($let->poletanje)}} - {{$let->dateMutator($let->sletanje)}}</td>
            <td>
            @foreach ($let->klijentLeta($let->id) as $klijent)
              {{$klijent->naziv}} <br>
            @endforeach
            </td>
            <td>
            @foreach ($let->posadaLeta($let->id) as $letac)
              @if ($letac->pozicija == 'Kapetan')
                {{$letac->ime_prezime}} <br>
                @else
              @endif
            @endforeach
            </td>
            <td>
            @foreach ($let->posadaLeta($let->id) as $letac)
              @if ($letac->pozicija == 'Kopilot')
                {{$letac->ime_prezime}} <br>
                @else
              @endif
            @endforeach
            </td>
            <td>
            @foreach ($let->posadaLeta($let->id) as $letac)
              @if ($letac->pozicija == 'Stjuardesa')
                {{$letac->ime_prezime}} <br>
                @else
              @endif
            @endforeach
            </td>
          </tr>
        @endforeach
      </tbody>
</div>
</div>
@endsection
