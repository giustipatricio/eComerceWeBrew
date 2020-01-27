<?php
// require_once("../singUp/users.php");
// require_once("../singUp/helpers.php");


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Finger+Paint&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/footer.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/navCss.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/estilosSearch.css')}}" />

    <link rel="icon" type="image/png" href="../fotosComunes/webrewhead.png">
    <title>We Brew</title>
    </head>
    <body>
    @include('../nav')
    <div class="espacionav"id="espacionav"> </div>
    <div class="titulobusqueda" id="titulobusqueda">
        <img src="../fotosComunes/tapitascut.jpg" alt="..." id="fototitulo">
        <h2 id="busquedas"> <b >{{$busquedas}}</b></h2>
    </div>


    <!-- FIN hack necesario para que funcione el desplegable en productos -->
        <section id="seccion">
          <div class="container">
            <div id="rowPorron"class="row">
               <div class="col-sm-12 ">
                <div id="rowIndex"class="row">
                  @foreach ($productos as $producto)
                  <div class="col-sm-3 div-img"style="margin-bottom:1vw"  >
                    <div id="prodcontext">
                      <div id="stylefoto">
                        <a href="../producto/{{$producto->urlSlug}}" id="linkproductos" >
                        <img id="productoventa"  class="img"  class="productoBuscado" src="/storage/{{$producto->picture}}" alt="Helaera Corona" style="max-width:120px;">
                        <div id="productotexto"class="text"><b> {{$producto->prods_name}}</b></div>
                        <div id="productotexto"class="text"> ${{substr($producto->price,-10)}},00</div>
                       </a>
                      </div>
                      @if (Auth::guest())
                        <a href="{{ url('/login') }}">
                          <button type="button submit" value="" class="btn" id="botonesagregar" >Agregar al Carrito </button>
                          <a/>
                        @else
                      <form class="" action="{{ route('addProductToCart', ['productId' => $producto->id]) }}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="cant" value="1">
                        <input type="hidden" name="id_producto" value="{{$producto->id}}">
                          <a href="<?=url("/carrito")?>">
                            <button type="button submit"  class="btn" id="botonesagregar" >Agregar al Carrito </button>
                          <a/>
                      </form>
                    @endif
                    </div>
                  </div>
                  @endforeach
                  </div>
                </div>
              </div>
            </div>
          <div class="espacio" style="padding-top:8vw"></div>
      </section>
      @include("../Footer")
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
      <script type="text/javascript" src="{{ URL::asset('js/jquery.fittext.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('js/search.js') }}"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script src="https://use.fontawesome.com/releases/v5.10.2/js/all.js" data-auto-replace-svg="nest"></script>
    </body>
  </html>
