@extends('layouts.app')
@section('mod-links')
  @include('inc.user.mod-links')
@endsection
@section('content')
  <div class="panel panel-default">
      <div class="panel-heading">Register</div>
      <div class="panel-body">
          <form class="form-horizontal" method="POST" action="{{ '/home/staff/'.$posada->id }}">
              {{ csrf_field() }}
              {{ method_field('PATCH') }}


              <div class="form-group{{ $errors->has('ime') ? ' has-error' : '' }}">
                  <label for="ime" class="col-md-4 control-label">Ime I Prezime</label>

                  <div class="col-md-6">
                      <input id="ime" type="text" class="form-control" name="ime" value="{{ $posada -> ime_prezime }}" autofocus>

                      @if ($errors->has('ime'))
                          <span class="help-block">
                              <strong>{{ $errors->first('ime') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label">Pozicija</label>

                <div class="col-md-10">
                  <div class="radio radio-primary">
                    <label>
                      <input type="radio" name="uloga" id="kapetan" value="Kapetan">
                      Kapetan
                    </label>
                  </div>

                  <div class="radio radio-primary">
                    <label>
                      <input type="radio" name="uloga" id="kopilot" value="Kopilot">
                      Kopilot
                    </label>
                  </div>

                  <div class="radio radio-primary">
                    <label>
                      <input type="radio" name="uloga" id="stjuardesa" value="Stjuardesa">
                      Stjuardesa
                    </label>
                  </div>

                </div>
              </div>


              <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                      <button type="submit" class="btn btn-primary">Done</button>
                      <a href="{{route('staff.index')}}" class="btn btn-primary">Back</a>
                  </div>
              </div>
          </form>
      </div>
  </div>
@endsection
