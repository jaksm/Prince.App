@extends('layouts.app')
  @section('mod-links')
    @include('inc.user.mod-links')
  @endsection
@section('content')
<div class="panel panel-default">
    <div class="panel-heading"><strong>User </strong>Dashboard</div>

    <div class="panel-body">
      You are logged in as <strong>User</strong>!
    </div>
</div>
@endsection
