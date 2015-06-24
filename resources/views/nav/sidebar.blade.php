    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
          @foreach($datos['menu'] as $menu => $link)
          <li><a href="{{ $link }}">{{ $menu }}</a></li>
          @endforeach
          </ul>
        </div>
