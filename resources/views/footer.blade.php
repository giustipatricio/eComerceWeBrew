    <footer>
      <div class="" style="border-bottom: solid 0.5px rgba(255,193,0,0.8); width:100%"></div>
            <div class="row black"  id="rowfooter">
        <div class="col">
          <h5 id="titulofooter">Acerca de</h5>
          <ul id="ulfooter">
            <li><a href="/">We Brew</a></li>
            <li><a href="#">Investors</a></li>
            <li><a href="#">Trending</a></li>
            <ul>
        </div>
        <div class="col">
          <h5 id="titulofooter">Ayuda</h5>
          <ul id="ulfooter">
            <li><a href="/faq">Preguntas frecuentes</a></li>
            <li><a href="/faq">Terminos y condiciones</a></li>
            <li><a href="/faq">Métodos de costo y envío</a></li>
            <li><a href="/faq">Política de devolución y cambios</a></li>
          <ul>
        </div>
        <div class="col">
          <h5 id="titulofooter">Redes Sociales</h5>
          <ul id="ulfooter">
            <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
            <li><a href="#"><i class="fab fa-twitter-square"></i> Twitter</a></li>
            <li><a href="#"><i class="fab fa-facebook-square"></i> Facebook</a> </li>
            <li><a href="#"><i class="fab fa-youtube"></i> Youtube</a></li>
          <ul>
        </div>
        <div class="col">
          @if(Auth::guest())
          <h5 id="titulofooter">Mi cuenta</h5>
            <ul id="ulfooter">
              <li><a href="{{ url('/login') }}">Login</a></li>
              <li><a href="{{ url('/register') }}">Registro</a></li>
            <ul>
          @else
            <h5 id="titulofooter">{{ Auth::user()->name }}</h5>
            <ul id="ulfooter">
              <li><a href="#">Compras</a></li>
              <li><a href="#">Favoritos</a></li>
              <li><a href="#">Mis datos</a></li>
              <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Salir</a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
              </form></li>
            </ul>
          @endif
        </div>
      </div>
    </footer>
