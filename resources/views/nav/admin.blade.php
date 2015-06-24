<!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/home">
          <img src="/img/logo_white.png" style="width: 30px">
          </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            @foreach($datos['menu'] as $menu => $link)
                <li><a href="{{ $link }}">{{ $menu }}</a></li>
            @endforeach
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
