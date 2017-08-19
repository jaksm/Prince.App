@extends('layouts.app')

@section('mod-links')
  @include('inc.user.mod-links')
@endsection

@section('content')

<div class="">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h2>Posada</h2>
    </div>
    <div class="panel-body" id="user-panel-body">
      <div class="list-group">

        @foreach ($posada as $radnik)
          <div class="list-group-item">
            <div class="row-picture">
              <img class="circle" src="{{ asset('img/avatar.jpg') }}" alt="{{$radnik -> ime_prezime}}">
            </div>
            <div class="row-content">
              <div class="col-xs-9">
                <h4 class="list-group-item-heading"><a href="#"></a>{{$radnik -> ime_prezime}}</h4>

                <span class="label label-default">{{$radnik -> pozicija}}</span>

              </div>
              <div class="col-xs-3">
                <a href="{{'staff/'.$radnik->id.'/edit'}}" class="btn btn-primary btn-fab-mini"><i class="material-icons">create</i></a>
                <form style="display:inline;" action="{{'staff/'.$radnik->id}}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button type="submit" class="btn btn-danger btn-fab-mini"><i class="material-icons">delete_sweep</i></button>
                </form>


              </div>
            </div>
          </div>

          <div class="list-group-separator"></div>
        @endforeach


            <a href="{{route('staff.create')}}" id="add-user" class="btn btn-raised btn-fab btn-success"><i class="material-icons">add</i></a>


      </div>
    </div>
  </div>
</div>


@endsection
