@extends('layouts.app')
@section('mod-links')
  @include('inc.user.mod-links')
@endsection
@section('css-links')
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection
@section('content')

  {!! $calendar->calendar() !!}
  {!! $calendar->script() !!}

@endsection
@section('scripts')
  <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
  <script type="text/javascript">
    $('#my-tabs').tabs({
    activate: function(event, ui) {
        $('#calendar').fullCalendar('render');
    }
    });
  </script>
@endsection
