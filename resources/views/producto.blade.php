<!DOCTYPE html>
<?php
// require_once("../singUp/users.php");
// require_once("../singUp/helpers.php");
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
<html lang="en" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('css/footer.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/navCss.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/producto.css')}}" />
    <link rel="icon" type="image/png" href="../fotosComunes/webrewhead.png">
    <title>We Brew</title>
  </head>
  <body>
    @include('../nav')
    <div class="espacionav"id="espacionav"> </div>
    <section id="seccion">
          <div id="rowCuadroProducto" class="row">
            <div class="espacio" style="padding-top:8vw"></div>
              <div class="col-sm-5" id="cuadroproducto">
                <div class="container">
                <div id="cuadros" class="row">
                  <div class="col-sm-9" id="titulosprod">
                    <br>
                    <ul id="listacompraproducto">
                      @foreach ($productos as $producto)
                    <li><h3 id="producto"> {{$producto->brand->brand_name}} </h3></li>
                    <li><h1 id="producto"> {{$producto->prods_name}} </h1></li>
                      @endforeach
                    </ul>
                  </div>
                  <div class="col-sm-3" id="titulosprod">
                    <br>
                    <ul id="listacompraproducto">
                      <li><h4 id="prodalc">Alc % {{$producto->alc}} </h4></li>
                    </ul>
                  </div>
                </div>
                  <div id="variedadcompra" class="row">
                    <br>
                    <div class="col" id="variedad">
                    <h3>Unidad</h3>
                    <h3>${{$producto->price}}</h3>
                    </div>
                    <div class="col" id="variedad">
                      <h3>Pack<b style="color:white">X12</b ></h3>
                        <div class="discount-ribbon" style="opacity: 1;background-color:red;border-radius: 7px;">
                          <div class="parpadea text">5% off</div>
                        </div>
                        <h3>${{$producto->price*12*.95}}</h3>
                    </div>
                    <div class="col" id="variedad">
                      <h3>Pack<b style="color:white">X24</b></h3>
                      <div class="discount-ribbon" style="opacity: 1;background-color:red;border-radius: 7px;">
                        <div class="parpadea text">10% off</div>
                      </div>
                      <h3>${{$producto->price*24*.90}}</h3>
                    </div>
                    </div>
                  <div class="espacio" style="padding-top:1.5vw"></div>
                  <div id="CantidadProducto" class="row">
                    @if (Auth::guest())
                      <div class="col-sm-2" id="CantidadProducto">
                        <input id="CantidadProducto" type="number" name="cant" value="1" min="1" max="{{$producto->stock}}" style="text-align:center;">
                      </div>
                      <div class="col-sm-10" id="CantidadProducto">
                        <a href="{{ url('/login') }}"> <button type="button" class="btn" id="botonecompra" value=""  > Agregar al Carrito</button></a>
                      </div>
                    @else
                      <div class="col-sm-2" id="CantidadProducto">
                        <form class="" action="{{ route('addProductToCart', ['productId' => $producto->id]) }}" method="post">
                          {{csrf_field()}}
                        <input id="CantidadProducto" type="number" name="cant" value="1" min="1" max="{{$producto->stock}}" style="text-align:center;">
                        <input type="hidden" name="id_producto" value="{{$producto->id}}">
                      </div>
                      <div class="col-sm-10" id="CantidadProducto">
                        <a href="<?=url("/carrito")?>">
                           <button type="button submit" class="btn" id="botonecompra"> Agregar al Carrito</button>
                        </a>
                        </form>
                      </div>
                    @endif
                  </div>
                <div class="espacio" style="padding-top:2.5vw"></div>
              </div>
            </div>

              <div class="col-sm-4" id="fotoproducto">
                <div id="colorfondo">
                  <img id="imagenproducto" class="d-block w-100" src="/storage/{{$producto->picture}}"  alt="foto">
                  <div class="espacio" style="padding-top:5vw"></div>
                </div>
                </div>
              <div class=" col-sm-3" id="textodescripcion">
                <br>
                <h5> {{$producto->detail}}</h5>
                <div class="espacio" style="padding-top:8vw"></div>
              </div>
            </div>
          <div class="espacio" style="padding-top:3vw"></div>
          <div  class="container" id="detalleProducto">
            <ul style="list-style-type: none;" id="detalleproducto">
              <li> <b>Marca:</b> {{$producto->brand->brand_name}} </li>
              <li> <b>Capacidad:</b> {{$producto->capacity_cm3}} cm3 </li>
              <li> <b>Estilo:</b> {{$producto->style->style_name}} </li>
              <li> <b>Graduación alcohólica:</b> {{$producto->alc}} % </li>
              <li><b>IBU:</b> {{$producto->ibu}} </li>
              <li><b>Pais de Procedencia:</b> {{$producto->origin->country_origin}} </li>
            </ul>
          </div>

          <div class="espacio" style="padding:30px;"></div>
          <div id="fondodestacados">

          <!-- CAROUSEL DE DESTACADOS -->
          <div class="container" id="destacadoscarrouselback">
            <img id="destacadoscarrousel" alt="Nuestros destacados"  src="../fotosComunes/destacados.jpg">
          </div>
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="container mt-3 text-center">
                  <div class="row text-center">
                    @foreach ($destacados as $destacad)
                      <div class="card" id="cardDestacados">
                        <div class="card-body">
                          <a href="../../producto/{{$destacad->urlSlug}}" id="linkproductos" >
                            <h5 class="card-title"> {{$destacad->prods_name}}</h5>
                          </a>
                        </div>
                          <a href="../../producto/{{$destacad->urlSlug}}" id="linkproductos" >
                            <img src="/storage/{{$destacad->picture}}" class="card-img-top" alt="..." style="max-width:120px;  align-self: center;">
                          </a>
                        <div class="card-body">
                          <h4 class="card-text">$ {{$destacad->price}}</H4>
                          <a href="#"><button type="button" class="btn" id="botonesdestacados">Agregar al Carrito </button></a>
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
                    <div class="card" id="cardDestacados">
                      <div class="card-body">
                        <a href="../../producto/{{$destacad->urlSlug}}" id="linkproductos" >
                          <h5 class="card-title"> {{$destacad->prods_name}}</h5>
                        </a>
                      </div>
                        <a href="../../producto/{{$destacad->urlSlug}}" id="linkproductos" >
                          <img src="/storage/{{$destacad->picture}}" class="card-img-top" alt="..." style="max-width:120px;  align-self: center;">
                        </a>
                      <div class="card-body">
                        <h4 class="card-text">$ {{$destacad->price}}</H4>
                        <a href="#"><button type="button" class="btn" id="botonesdestacados">Agregar al Carrito </button></a>
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
                  <div class="card" id="cardDestacados">
                    <div class="card-body">
                      <a href="../../producto/{{$destacad->urlSlug}}" id="linkproductos" >
                        <h5 class="card-title"> {{$destacad->prods_name}}</h5>
                      </a>
                    </div>
                      <a href="../../producto/{{$destacad->urlSlug}}" id="linkproductos" >
                        <img src="/storage/{{$destacad->picture}}" class="card-img-top" alt="..." style="max-width:120px;  align-self: center;">
                      </a>
                    <div class="card-body">
                      <h4 class="card-text">$ {{$destacad->price}}</H4>
                      <a href="#"><button type="button" class="btn" id="botonesdestacados">Agregar al Carrito </button></a>
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
                  <div class="card" id="cardDestacados">
                    <div class="card-body">
                      <a href="../../producto/{{$destacad->urlSlug}}" id="linkproductos" >
                        <h5 class="card-title"> {{$destacad->prods_name}}</h5>
                      </a>
                    </div>
                      <a href="../../producto/{{$destacad->urlSlug}}" id="linkproductos" >
                        <img src="/storage/{{$destacad->picture}}" class="card-img-top" alt="..." style="max-width:120px;  align-self: center;">
                      </a>
                    <div class="card-body">
                      <h4 class="card-text">$ {{$destacad->price}}</H4>
                      <a href="#"><button type="button" class="btn" id="botonesdestacados">Agregar al Carrito </button></a>
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
          <div class="espacio" style="padding-top:5vw"></div>
        </div>

          <!-- CAROUSEL DE DESTACADOS -->


          <!-- FIN DE CAROUSEL DE DESTACADOS -->
    </section>
    <div class="" style="border-bottom: solid 0.5px rgba(255,193,0,0.8); width:100%"></div>
    @include("../Footer")
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.10.2/js/all.js" data-auto-replace-svg="nest"></script>

  </body>
</html>
