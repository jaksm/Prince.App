@extends('layouts.app')
@section('mod-links')
  @include('inc.user.mod-links')
@endsection
@section('content')
  <div class="panel panel-default">
      <div class="panel-heading">Register</div>
      <div class="panel-body">
          <form class="form-horizontal" method="POST" action="{{ route('flight.store') }}">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('poletanje') ? ' has-error' : '' }}">
                  <label for="poletanje" class="col-md-4 control-label">Poletanje</label>

                  <div class="col-md-6">

                    <div class='input-group date' id='datetimepicker1'>
                        <input type='datetime-local' class="form-control" id="poletanje" name="poletanje" value="{{ old('poletanje') }}" required autofocus>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>

                      @if ($errors->has('poletanje'))
                          <span class="help-block">
                              <strong>{{ $errors->first('poletanje') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group{{ $errors->has('sletanje') ? ' has-error' : '' }}">
                  <label for="sletanje" class="col-md-4 control-label">Sletanje</label>

                  <div class="col-md-6">
                      <input id="sletanje" type="datetime-local" class="form-control" name="sletanje" value="{{ old('sletanje') }}" required autofocus>

                      @if ($errors->has('sletanje'))
                          <span class="help-block">
                              <strong>{{ $errors->first('sletanje') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group{{ $errors->has('airplanes_id') ? ' has-error' : '' }}">
                  <label for="airplanes_id" class="col-md-4 control-label">Avion</label>

                  <div class="col-md-6">
                      <select id="airplanes_id" class="form-control" name="airplanes_id"
                       required autofocus>
                       @foreach ($avioni as $avion)
                         <option value="{{$avion->id}}">{{$avion->registracija}}</option>
                       @endforeach
                      </select>
                      @if ($errors->has('airplanes_id'))
                          <span class="help-block">
                              <strong>{{ $errors->first('airplanes_id') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group{{ $errors->has('client_naziv') ? ' has-error' : '' }}">
                  <label for="client_naziv" class="col-md-4 control-label">Klijent</label>

                  <div class="col-md-6">

                    <select class="typeahead" multiple data-role="tagsinput" id="clientNaziv" name="client_naziv[]" placeholder="Search or Create"></select>

                      @if ($errors->has('client_naziv'))
                          <span class="help-block">
                              <strong>{{ $errors->first('client_naziv') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>


              <div class="form-group{{ $errors->has('polazna_dest') ? ' has-error' : '' }}">
                  <label for="polazna_dest" class="col-md-4 control-label">Polazna Destinacija</label>

                  <div class="col-md-6">
                      <select id="polazna_dest" class="form-control" name="polazna_dest" required autofocus>
                       @foreach ($destinacije as $destinacija)
                         <option value="{{$destinacija->id}}">{{$destinacija->naziv}} - {{$destinacija->ICAO}}</option>
                       @endforeach
                      </select>

                      @if ($errors->has('polazna_dest'))
                          <span class="help-block">
                              <strong>{{ $errors->first('polazna_dest') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group{{ $errors->has('dolazna_dest') ? ' has-error' : '' }}">
                  <label for="dolazna_dest" class="col-md-4 control-label">Dolazna Destinacija</label>

                  <div class="col-md-6">
                      <select id="dolazna_dest" class="form-control" name="dolazna_dest" required autofocus>
                       @foreach ($destinacije as $destinacija)
                         <option value="{{$destinacija->id}}">{{$destinacija->naziv}} - {{$destinacija->ICAO}}</option>
                       @endforeach
                      </select>
                      @if ($errors->has('dolazna_dest'))
                          <span class="help-block">
                              <strong>{{ $errors->first('dolazna_dest') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group{{ $errors->has('staffs_id') ? ' has-error' : '' }}">
                  <label for="staffs_id" class="col-md-4 control-label">Član posade</label>

                  <div class="col-md-6">

                    <select multiple data-role="tagsinput" id="staffsID" name="staffs_id[]"></select>

                      @if ($errors->has('staffs_id'))
                          <span class="help-block">
                              <strong>{{ $errors->first('staffs_id') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                      <button type="submit" class="btn btn-primary">Register</button>
                      <a href="{{route('flight.index')}}" class="btn btn-primary">Back</a>
                  </div>
              </div>
          </form>
      </div>
  </div>
@endsection
