@extends('layouts.app')
@section('mod-links')
  @include('inc.admin.mod-links')
@endsection
@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h2>Regularni korisnici (uloga)</h2>
    </div>
    <div class="panel-body" id="user-panel-body">
      <div class="list-group">

        @foreach ($users as $user)
          <div class="list-group-item">
            <div class="row-picture">
              <img class="circle" src="http://lorempixel.com/56/56/people/1" alt="icon">
            </div>
            <div class="row-content">
              <div class="col-xs-8">
                <h4 class="list-group-item-heading"><a href="#"></a>{{$user -> name}}</h4>

                <p class="list-group-item-text"><a href="mailto:{{$user -> email}}">{{$user -> email}}</a></p>
              </div>
              <div class="col-xs-4">
                <a href="{{route('user.store')}}{{'/'}}{{$user->id}}{{'/edit'}}" class="btn btn-primary btn-fab-mini"><i class="material-icons">create</i></a>
                <form style="display:inline;" action="{{'/admin/user/'}}{{$user->id}}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button type="submit" class="btn btn-danger btn-fab-mini"><i class="material-icons">delete_sweep</i></button>
                </form>


              </div>
            </div>
          </div>

          <div class="list-group-separator"></div>
        @endforeach


            <a href="{{route('register')}}" id="add-user" class="btn btn-raised btn-fab btn-success"><i class="material-icons">add</i></a>


      </div>
    </div>
  </div>








  {{-- <div class="col-sm-3">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Panel primary</h3>
      </div>
      <div class="panel-body">
        Panel content
      </div>
    </div>
  </div> --}}

@endsection
