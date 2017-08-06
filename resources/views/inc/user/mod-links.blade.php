<li class="">
  <a href="{{route('home')}}"><i class="material-icons">dashboard</i> Dashboard</a>
</li>
<li class="">
  <a href="{{route('airplane.index')}}"><i class="material-icons">airplanemode_active</i> Avioni</a>
</li>
<li class="">
  <a href="{{route('client.index')}}"><i class="material-icons">face</i> Klijenti</a>
</li>
<li class="">
  <a href="{{route('staff.index')}}"><i class="material-icons">people</i> Posada</a>
</li>
<li class="">
  <a href="{{route('flight.index')}}"><i class="material-icons">add_box</i> Let</a>
</li>
<li class="">
  <a href="{{route('flight.create')}}"><i class="material-icons">add_box</i> Novi</a>
</li>
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="material-icons">file_download</i> Download<span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a href="/home/export/xlsx">.xlsx</a></li>
    <li><a href="/export/xml">.xml</a></li>
    <li><a href="/export/csv">.csv</a></li>
    <li><a href="/export/txt">.txt</a></li>
    {{-- <li><a href="home/export/pdf">.pdf</a></li> --}}
  </ul>
</li>
