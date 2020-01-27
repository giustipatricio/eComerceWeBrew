<div class="card" id="card">
  <div class="imagen">
    <img src="/storage/{{ Auth::user()->avatar}}" alt="..." style="width:100%">
  </div>
  <div class="texto">
    @if (Auth::user()->is_admin == 1)
      <h1>Hola, Señor {{ Auth::user()->name }}</h1>
      <br><button id="avatarboton"  onclick="window.location.href='{{ url('/adm/admproductos') }}'"> PRODUCTOS</button>
      <br><button id="avatarboton"  onclick="window.location.href='{{ url('/adm/admmarcas') }}'"> MARCAS</button>
      <br><button id="avatarboton"  onclick="window.location.href='{{ url('/adm/admpaises') }}'"> PAISES</button>
      <br><button id="avatarboton"  onclick="window.location.href='{{ url('/adm/admestilos') }}'"> ESTILOS</button>
      <br><button id="avatarboton"  onclick="window.location.href='{{ url('/adm/admsegmentos') }}'"> SEGMENTOS</button>
      <br><button id="avatarboton" href="{{ route('logout') }}" onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">SALIR <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}</button>
                </form>
    @else
    <h1>Hola, {{ Auth::user()->name }}</h1>
    <br><button id="avatarboton" onclick="window.location.href='{{ url('/carrito') }}'">CARRITO</button>
    {{-- <br><button id="avatarboton">Favoritos</button> --}}
    <br><button id="avatarboton"  onclick="window.location.href='{{ url('/perfil') }}'"> MODIFICAR DATOS PERSONALES</button>
    {{-- <br><button id="avatarboton"  onclick="window.location.href='{{ url('/perfilpassword') }}'"> Modificar tu cuenta</button> --}}
    <br><button id="avatarboton" href="{{ route('logout') }}" onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">SALIR <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}</button>
    </form>
  @endif
  </div>
</div>
