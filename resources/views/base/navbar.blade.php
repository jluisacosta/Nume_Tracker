<style>
  .navbar-brand { position: relative; z-index: 2; }
  .navbar-nav.navbar-right .btn { position: relative; z-index: 2; padding: 4px 20px; margin: 10px auto; }
  .navbar .navbar-collapse { position: relative; }
  .navbar .nav-collapse { position: absolute; z-index: 1; top: 0; left: 0; right: 0; bottom: 0; margin: 0; width: 100%; }
  .navbar.navbar-inverse .nav-collapse { background-color: #222; }
  .nav-collapse>li { float: right; }
  .btn.btn-circle { border-radius: 50px; }
  .btn.btn-outline { background-color: transparent; }
  #home{ opacity:0.6; margin-top:-5px;}
  #home:hover{ opacity:1; }
  #nav-collapse-h{ background-color: #303030; }
  #larr{ margin-left: 10px; }
  #user{ background-color: #303030; }

  @media screen and (max-width: 767px) {
      .navbar .nav-collapse { margin: 7.5px auto; padding: 0; }
      .nav-collapse>li { float: none; }
      #navbar-collapse-x{ border:0px; height: 300px; }
      #nav-collapse-h{ margin:0px; height: 300px; }
      #user{ text-align: left; }
  }
</style>
<div class="container-fluid" style="font-family:raleway; padding:0px;">
    <!-- Second navbar for profile settings -->
    <nav class="navbar navbar-inverse" style="border-radius:0px; background-color:#303030 !important;">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-x" id="boton-movil">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/') }}" style="font-weight:bolder;">Nume Tracker</a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="navbar-collapse collapsed collapse" id="navbar-collapse-x">
          @if(Auth::guest())
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ url('/') }}"><img src="{{ asset('assets/images/base/home-icon.png') }}" alt="home" width="20" id="home"/></a></li>
            <li><a href="{{ url('iniciar-sesion') }}" style="font-weight:bolder;">Iniciar sesión</a></li>
            <li><a href="{{ url('registro') }}">Registrarte</a></li>
          </ul>
          @else
          <ul class="nav navbar-nav nav-collapse" role="search" id="nav-collapse-h" aria-expanded="false">
            <li class="dropdown" id="user">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="background-color: #303030;padding-bottom:9px; padding-top:11px;">
                @if(Auth::user()->photo=='')
                <img class="img-circle" src="{{ asset('assets/images/base/no-photo.png') }}" alt="" width="30" height="30" style="margin-right:10px;"/>{{ Auth::user()->first_name }}<span id="larr" class="caret"></span>
                @else
                <img class="img-circle" src="{{ asset('storage/'.Auth::user()->photo) }}" alt="" width="30" height="30" style="margin-right:10px;"/>{{ Auth::user()->first_name }}<span id="larr" class="caret"></span>
                @endif
              </a>
              @if(Auth::user()->role == 'patient')
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('perfil') }}">Perfil</a></li>
                <li><a href="{{ url('historia-clinica') }}">Historia Clínica</a></li>
                <li><a href="{{ url('agendar-cita') }}">Agendar cita</a></li>
                <li><a href="{{ url('/') }}">Seguimiento</a></li>
                <li><a href="{{ url('historial') }}">Historial</a></li>
                <li class="divider"></li>
                <li><a href="{{ url('cerrar-sesion') }}">Cerrar sesión</a></li>
              </ul>
              @elseif(Auth::user()->role == 'nutritionist')
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('perfil') }}">Perfil</a></li>
                <li><a href="{{ url('citas') }}">Citas</a></li>
                <li class="divider"></li>
                <li><a href="{{ url('cerrar-sesion') }}">Cerrar sesión</a></li>
              </ul>
              @elseif(Auth::user()->role == 'admin')
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('admon-usuarios') }}">Admón. de usuarios</a></li>
                <li class="divider"></li>
                <li><a href="{{ url('cerrar-sesion') }}">Cerrar sesión</a></li>
              </ul>
              @endif
            </li>
            <li><a href="{{ url('/') }}"><img src="{{ asset('assets/images/base/home-icon.png') }}" alt="home" width="20" id="home"/></a></li>
          </ul>
          @endif
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
</div><!-- /.container-fluid -->