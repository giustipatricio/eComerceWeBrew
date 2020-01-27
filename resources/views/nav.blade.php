
<nav class="navbar fixed-top navbar-expand-lg navbar-dark black" id="navbar">
  <a class="navbar-brand" href="/">
    <img src="{{URL::asset('fotosComunes/weBrewnav.png')}}" class="miniLogoWeBrew" alt="...">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="nav navbar-nav mr-auto">
      <li class="">
        <a href="<?=url("/porrones/porrones")?>">PORRONES<span class="caret"></span></a>
      </li>
      <li class="">
        <a href="<?=url("/latas/latas")?>">LATAS<span class="caret"></span></a>
      </li>
      <li class="dropdown">
        <a href="<?=url("/barriles/barriles")?>">BARRILES<span class="caret"></span></a>
      </li>
      <li class="dropdown">
        <a href="<?=url("/growlers/growlers")?>">GROWLERS<span class="caret"></span></a>
      </li>
      <li>
        <a href="../contacto">CONTACTO</a>
      </li>
    </ul>
    <form class=" form-inline my-2 my-lg-0" action="{{url('/search') }}" method="POST">
      {{ csrf_field() }}
      <input class="form-control mr-sm-2" name="search" type="search" placeholder="¿Qué estás buscando?"  value="">
      <button class="btn  my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
    </form>
    <ul class="nav navbar-nav navbar-right" id="Loginreg">
      <li class="dropdown">
      @if (Auth::guest())
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">LOGIN <span class="caret"></span></a>
        <ul class="dropdown-menu black">
          <li><a href="{{ url('/login') }}">LOGIN</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="{{ url('/register') }}">REGISTRO</a></li>
        </ul>
      @elseif (Auth::user()->is_admin == 1)
        {{-- usuario  ADMIN --}}
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"style="text-transform: uppercase">
          {{ Auth::user()->name }} <span class="caret"></span> </a>
          <ul class="dropdown-menu black">
            <li><a href="{{ url('/home') }}">PERFIL</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{url('/adm/admproductos')}}">PRODUCTOS</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{url('/adm/admmarcas')}}">MARCAS</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{url('/adm/admpaises')}}">PAISES</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{url('/adm/admestilos')}}">ESTILOS</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{url('/adm/admsegmentos')}}">SEGMENTOS</a></li>
            <li role="separator" class="divider"></li>
            <li id="result"><a href="#" id="tema">TEMA</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">SALIR</a>
           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
               {{ csrf_field() }}
           </form>
           </li>
          </ul>
          @else
            {{-- usuario NO ADMIN --}}
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"style="text-transform: uppercase">
              {{ Auth::user()->name }} <span class="caret"></span> </a>
              <ul class="dropdown-menu black">
                <li><a href="{{ url('/home') }}">PERFIL</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{ url('/perfil') }}">MIS DATOS</a></li>
                <li role="separator" class="divider"></li>
                <li id="result"><a href="#" id="tema">TEMA</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{ url('/carrito') }}">CARRITO</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">SALIR</a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                   {{ csrf_field() }}
               </form>
               </li>
              </ul>
        @endif
      </li>
      @if (Auth::guest())
        <li id="market"><a href="{{ url('/login') }}"> <i class="fas fa-shopping-cart"></i></a></li>
      @else
      <li id="market"><a href="../carrito" > <i class="fas fa-shopping-cart"></i></a></li>
      @endif

    </ul>
  </div>
</nav>
