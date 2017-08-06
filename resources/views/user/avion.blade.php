@extends('layouts.app')
@section('mod-links')
  @include('inc.user.mod-links')
@endsection
@section('content')
  <div class="jumbotron col-xs-10">
    @foreach ($avioni as $avion)

      <div class="col-sm-4 col-xs-6">
        <div class="panel panel-success">

          <div class="panel-heading text-center">
              <h3 class="panel-title"><strong>{{$avion->registracija}}</strong></h3>
          </div>

          <div class="panel-body">
            <div class="row text-center">
              <a href="{{"airplane/$avion->id/edit"}}" class="btn btn-primary btn-fab-mini"><i class="material-icons">create</i></a>
              <form style="display:inline;" action="{{"airplane/$avion->id"}}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger btn-fab-mini"><i class="material-icons">delete_sweep</i></button>
              </form>
              <hr>
            </div>
            <div class="row text-center">
              <h5><strong>Tel: </strong><a href="tel:{{$avion->telefon}}">{{$avion->telefon}}</a></h5>
              <hr>
              <h4><span class="label label-primary">{{$avion->tip}}</span></h4>
            </div>
          </div>

       </div>
      </div>

    @endforeach
  </div>

  <div class="col-xs-2">
    <a href="{{route('airplane.create')}}" class="btn btn-raised btn-fab btn-success"><i class="material-icons">add</i></a>

  </div>

@endsection
