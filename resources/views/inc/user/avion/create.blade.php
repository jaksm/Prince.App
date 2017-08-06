@extends('layouts.app')
@section('content')
  <div class="jumbotron col-xs-11">
    <form class="form-horizontal" method="POST" action="{{ route('airplane.store') }}">
      {{ csrf_field() }}

    <fieldset>
      <legend>Registracija novog aviona</legend>
      <hr>
      <div class="form-group">
        <label for="registracija" class="col-md-2 control-label">Registarki broj</label>
        <div class="col-md-10">
          <input type="text" class="form-control" id="registracija" name="registracija" placeholder="YU-FS" required>
        </div>
      </div>


      <div class="form-group">
        <label class="col-md-2 control-label">Tip</label>

        <div class="col-md-10">
          <div class="radio radio-primary">
            <label>
              <input type="radio" name="tip" id="tip1" value="tip_aviona_1" required>
              Prvi tip aviona
            </label>
          </div>

          <div class="radio radio-primary">
            <label>
              <input type="radio" name="tip" id="tip2" value="tip_aviona_2">
              Drugi tip aviona
            </label>
          </div>

          <div class="radio radio-primary">
            <label>
              <input type="radio" name="tip" id="tip3" value="tip_aviona_3">
              Treći tip aviona
            </label>
          </div>

          <div class="radio radio-primary">
            <label>
              <input type="radio" name="tip" id="tip4" value="tip_aviona_4">
              Četvrti tip aviona
            </label>
          </div>

        </div>
      </div>

      <div class="form-group">
        <label for="tel" class="col-md-2 control-label">Telefon</label>
        <div class="col-md-10">
          <input type="tel" name="tel" class="form-control" id="tel" placeholder="555-333" required>
        </div>
      </div>
      <hr>
      <div class="form-group">
        <div class="col-md-10 col-md-offset-2">
          <a  href="{{route('airplane.index')}}" class="btn btn-default">Nazad</a>
          <button type="submit" class="btn btn-primary">Registruj</button>
        </div>
      </div>
    </fieldset>
  </form>
  </div>

@endsection
