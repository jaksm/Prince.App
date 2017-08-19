<li class="">
  <a href="{{route('home')}}"><i class="material-icons">dashboard</i> Dashboard</a>
</li>
<li class="mod-links">
  <a href="{{route('airplane.index')}}"><i class="material-icons">airplanemode_active</i> Avioni</a>
</li>
<li class="mod-links">
  <a href="{{route('client.index')}}"><i class="material-icons">face</i> Klijenti</a>
</li>
<li class="mod-links">
  <a href="{{route('staff.index')}}"><i class="material-icons">people</i> Posada</a>
</li>
<li class="mod-links">
  <a href="{{route('flight.index')}}"><i class="material-icons">search</i> Letovi</a>
</li>
<li class="mod-links">
  <a href="{{route('flight.create')}}"><i class="material-icons">add_box</i> Novi Let</a>
</li>
<li class="dropdown">
  <a href="#" class="dropdown-toggle mod-links" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="material-icons">file_download</i> Download<span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li class="mod-links" ><a href="/home/export/xlsx">.xlsx</a></li>
    <li class="mod-links" ><a href="/home/export/csv">.csv</a></li>
    <li class="mod-links" ><a href="/home/export/txt">.txt</a></li>
    {{-- <li><a href="home/export/pdf">.pdf</a></li> --}}
  </ul>
</li>

<hr>

<li class="mod-links">
  <a href="mailto:jaksa.malisic@gmail.com?Subject=Prince%20App" target="_top"><i class="material-icons">mail</i> Podrška</a>
</li>
