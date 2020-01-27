<!DOCTYPE html>
<?php
use Illuminate\Support\Str;
$destacados = DB::table('prods')
     ->select('*')
     ->join('origin', 'fk_origin', '=', 'origin.country_id')
     ->join('brand', 'fk_brand', '=', 'brand.brand_id')
     ->join('style', 'fk_style', '=', 'style.style_id')
     ->join('cat', 'fk_cat', '=', 'cat.cat_id')
     ->where('ishigh','1')
     ->limit(5)
     ->get();
     // dd($destacados);
$destacados2 = DB::table('prods')
    ->select('*')
    ->join('origin', 'fk_origin', '=', 'origin.country_id')
    ->join('brand', 'fk_brand', '=', 'brand.brand_id')
    ->join('style', 'fk_style', '=', 'style.style_id')
    ->join('cat', 'fk_cat', '=', 'cat.cat_id')
    ->where('ishigh','1')
    ->limit(5)
    ->offset(5)
    ->get();
    // dd($destacados2);
$destacados3 = DB::table('prods')
    ->select('*')
    ->join('origin', 'fk_origin', '=', 'origin.country_id')
    ->join('brand', 'fk_brand', '=', 'brand.brand_id')
    ->join('style', 'fk_style', '=', 'style.style_id')
    ->join('cat', 'fk_cat', '=', 'cat.cat_id')
    ->where('ishigh','1')
    ->limit(5)
    ->offset(10)
    ->get();
    // dd($destacados3);
$destacados4 = DB::table('prods')
    ->select('*')
    ->join('origin', 'fk_origin', '=', 'origin.country_id')
    ->join('brand', 'fk_brand', '=', 'brand.brand_id')
    ->join('style', 'fk_style', '=', 'style.style_id')
    ->join('cat', 'fk_cat', '=', 'cat.cat_id')
    ->where('ishigh','1')
    ->limit(5)
    ->offset(15)
    ->get();
    // dd($destacados4);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="/fotosComunes/webrewhead.png">
    <link rel="stylesheet" type="text/css" href="{{asset('css/footer.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/navCss.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/incss.css')}}" />
    <title>We Brew</title>
  </head>
  <body class="black"id="body">
  @include('../nav')
  <br>
      <div class="">
        <img src="/fotosComunes/logowebrew.png" class="logoWeBrew" alt="...">
        <img src="/fotosComunes/maderanav.jpg" class="fondonav"alt="...">
      </div>
      <script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
</head>
<p style="display:none" id="result">El usuario tiene tema </p>
      <section id="seccion">
        <div id="promo" class="row">
          <div class="col-md-4 col-sm-4 col-xs-12" id="columna" >
            <a href="#" target="_blank">
              <img id="imgpromo" alt="Financiación" src="/productos/Financiacion.jpg">
            </a>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12" id="columna" >
            <a href="#" target="_blank">
              <img id="imgpromo" alt="Video instructivo" src="/productos/tutorial.jpg">
            </a>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12" id="columna" >
            <a href="#" target="_blank">
              <img id="imgpromo" alt="Retiro en Tienda o Envío a Domicilio"  src="/productos/Retiro.jpg">
            </a>
          </div>
        </div>
        <div class="espacio" style="padding:30px;"></div>
<!-- CAROUSEL DE DESTACADOS -->
<div class="container black" id="destacadoscarrouselback">
  <img id="destacadoscarrousel" alt="Nuestros destacados"  src="../fotosComunes/destacados.jpg">
</div>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="container mt-3 text-center">
        <div class="row text-center">
          @foreach ($destacados as $destacad)
            <div class="card black" id="cardDestacados">
              <div class="card-body">
                <a href="../../producto/{{$destacad->urlSlug}}" class="black" id="linkproductos" >
                  <h5 class="card-title black"> {{@Str::limit($destacad->prods_name,12)}}</h5>
                </a>
              </div>
                <a href="../../producto/{{$destacad->urlSlug}}" class="black" id="linkproductos" >
                  <img src="/storage/{{$destacad->picture}}" class="card-img-top" alt="..." style="max-width:120px;  align-self: center;">
                </a>
              <div class="card-body">
                <h4 class="card-text black">$ {{$destacad->price}}</H4>
                    @if (Auth::guest())
                    <a href="{{ url('/login') }}" >
                      <button type="button submit" value="" class="btn black" id="botonesdestacados" > Agregar al Carrito </button>
                    </a>
                    @else
                  <form class="" action="{{ route('addProductToCart', ['productId' => $destacad->id]) }}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="cant" value="1">
                    <input type="hidden" name="id_producto" value="{{$destacad->id}}">
                      <a href="<?=url("/carrito")?>">
                        <button type="button submit" value="{{$destacad->id}}" class="btn black" id="botonesdestacados" >Agregar al Carrito </button>
                      </a>
                  </form>
                @endif
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  <!-- cierre item carrousel -->
  <div class="carousel-item">
    <div class="container mt-3 text-center">
      <div class="row text-center">
        @foreach ($destacados2 as $destacad)
          <div class="card black" id="cardDestacados">
            <div class="card-body">
              <a href="../../producto/{{$destacad->urlSlug}}" class="black" id="linkproductos" >
                <h5 class="card-title black"> {{@Str::limit($destacad->prods_name,12)}}</h5>
              </a>
            </div>
              <a href="../../producto/{{$destacad->urlSlug}}" class="black" id="linkproductos" >
                <img src="/storage/{{$destacad->picture}}" class="card-img-top" alt="..." style="max-width:120px;  align-self: center;">
              </a>
            <div class="card-body">
              <h4 class="card-text black">$ {{$destacad->price}}</H4>
                @if (Auth::guest())
                  <a href="{{ url('/login') }}">
                    <button type="button submit" value="" class="btn black" id="botonesdestacados" >Agregar al Carrito </button>
                  </a>
                  @else
                  <form class="" action="{{ route('addProductToCart', ['productId' => $destacad->id]) }}" method="post">
                  {{csrf_field()}}
                  <input type="hidden" name="cant" value="1">
                  <input type="hidden" name="id_producto" value="{{$destacad->id}}">
                    <a href="<?=url("/carrito")?>">
                      <button type="button submit" value="{{$destacad->id}}" class="btn black" id="botonesdestacados" >Agregar al Carrito </button>
                    </a>
                </form>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
<!-- cierre item carrousel -->
<div class="carousel-item">
  <div class="container mt-3 text-center">
    <div class="row text-center">
      @foreach ($destacados3 as $destacad)
        <div class="card black" id="cardDestacados">
          <div class="card-body">
            <a href="../../producto/{{$destacad->urlSlug}}" class="black" id="linkproductos" >
              <h5 class="card-title black"> {{@Str::limit($destacad->prods_name,12)}}</h5>
            </a>
          </div>
            <a href="../../producto/{{$destacad->urlSlug}}" class="black" id="linkproductos" >
              <img src="/storage/{{$destacad->picture}}" class="card-img-top" alt="..." style="max-width:120px;  align-self: center;">
            </a>
          <div class="card-body">
            <h4 class="card-text black">$ {{$destacad->price}}</H4>
              @if (Auth::guest())
                <a href="{{ url('/login') }}">
                  <button type="button submit" value="" class="btn black" id="botonesdestacados" >Agregar al Carrito </button>
                </a>
                @else
                <form class="" action="{{ route('addProductToCart', ['productId' => $destacad->id]) }}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="cant" value="1">
                <input type="hidden" name="id_producto" value="{{$destacad->id}}">
                  <a href="<?=url("/carrito")?>">
                    <button type="button submit" value="{{$destacad->id}}" class="btn black" id="botonesdestacados" >Agregar al Carrito </button>
                  </a>
              </form>
            @endif
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
<!-- cierre item carrousel -->
<div class="carousel-item">
  <div class="container mt-3 text-center">
    <div class="row text-center">
      @foreach ($destacados4 as $destacad)
        <div class="card black" id="cardDestacados">
          <div class="card-body">
            <a href="../../producto/{{$destacad->urlSlug}}" class="black" id="linkproductos" >
              <h5 class="card-title black"> {{@Str::limit($destacad->prods_name,12)}}</h5>
            </a>
          </div>
            <a href="../../producto/{{$destacad->urlSlug}}" class="black" id="linkproductos" >
              <img src="/storage/{{$destacad->picture}}" class="card-img-top" alt="..." style="max-width:120px;  align-self: center;">
            </a>
          <div class="card-body">
            <h4 class="card-text black">$ {{$destacad->price}}</H4>
              @if (Auth::guest())
                <a href="{{ url('/login') }}">
                  <button type="button submit" value="" class="btn black" id="botonesdestacados" >Agregar al Carrito </button>
                </a>
                @else
                <form class="" action="{{ route('addProductToCart', ['productId' => $destacad->id]) }}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="cant" value="1">
                <input type="hidden" name="id_producto" value="{{$destacad->id}}">
                  <a href="<?=url("/carrito")?>">
                    <button type="button submit" value="{{$destacad->id}}" class="btn black" id="botonesdestacados" >Agregar al Carrito </button>
                  </a>
              </form>
            @endif
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
<!-- cierre item carrousel -->
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only"></span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only"></span>
  </a>
</div>
</div>
<!-- FIN DE CAROUSEL DE DESTACADOS -->

<!-- OFERTAS -->
        <div class="container" style="padding:40px;border-bottom: solid rgba(255,193,0,0.8)"></div>
        <div class="container" style="padding:40px;"></div>
        <div class="container black" id="destacadoscarrouselback">
          <img id="destacadoscarrousel" alt="ofertas especial"  src="../fotosComunes/ofertasEspeciales.jpg">
        </div>
      <!-- </div> -->
        <br>
        <div class="container">
          <div class="row">
            <div class="container">
              <div class="row">
                <div class=" card border-light card mb-3" id="cardOfertasEspeciales">
                  <div class="row no-gutters black" id="rownog">
                    <div class="col-md-4">
                      <img src="/productos/packCorona.png" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h3 class="card-title black" >Pack Corona (12 unidades)</h3>
                        <div class="card-text black">Corona es una cerveza premium, clásica y auténtica, reconocida mundialmente por su alta calidad,
                          su sabor distintivo e imagen. Es una cerveza que transmite tranquilidad y relajación, invitando a los consumidores
                          a desconectarse de la monotonía diaria a través de experiencias agradables.</div>
                          <br>
                          @if (Auth::guest())
                          <a href="{{ url('/login') }}">
                            <button type="button submit" value="" class="btn black" id="botones" >Agregar al Carrito </button>
                          </a>
                          @else
                          <form class="" action="{{ route('addProductToCart', ['productId' => 4]) }}" method="post">
                          {{csrf_field()}}
                          <input type="hidden" name="cant" value="12">
                          <input type="hidden" name="id_producto" value="4">
                            <a href="<?=url("/carrito")?>">
                              <button type="button submit" class="btn black" id="botones" >Agregar al Carrito </button>
                            </a>
                          </form>
                      @endif
                      </div>
                    </div>
                  </div>
                </div>
                <div class=" card border-light card mb-3" id="cardOfertasEspeciales">
                  <div class="row no-gutters black"id="rownog" >
                    <div class="col-md-4">
                      <img src="/productos/stellaPack.png" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h3 class="card-title black">Pack Stella (12 unidades)</h3>
                        <div class="card-text black">La cerveza belga número 1 en ventas a nivel mundial. Stella Artois tiene una rica herencia que se remonta al año 1366 en Leuven, Bélgica, y es hoy en día el estándar de oro de la calidad en más de 80 países. El arte y la ciencia de disfrutar una Stella Artois abarca desde los más selectos ingredientes hasta el preciso ritual de 9 pasos para servirla en su especialmente fabricado cáliz.</div>
                        <br>
                          @if (Auth::guest())
                          <a href="{{ url('/login') }}">
                            <button type="button submit" value="" class="btn black" id="botones" >Agregar al Carrito </button>
                          </a>
                          @else
                          <form class="" action="{{ route('addProductToCart', ['productId' => 29]) }}" method="post">
                          {{csrf_field()}}
                          <input type="hidden" name="cant" value="12">
                          <input type="hidden" name="id_producto" value="29">
                            <a href="<?=url("/carrito")?>">
                              <button type="button submit" class="btn black" id="botones" >Agregar al Carrito </button>
                            </a>
                          </form>
                      @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<!-- FIN DE OFERTAS -->
      </section>
      <div class="espacio" style="padding-top:8vw"></div>
    @include("../Footer")
    <script type="text/javascript" src="{{ URL::asset('js/mode.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.10.2/js/all.js" data-auto-replace-svg="nest"></script>

  </body>
</html>
