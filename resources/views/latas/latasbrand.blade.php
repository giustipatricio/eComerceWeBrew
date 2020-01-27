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
    <link rel="stylesheet" type="text/css" href="{{asset('css/footer.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/navCss.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/estilosproductos.css')}}" />
    <link rel="icon" type="image/png" href="../fotosComunes/webrewhead.png">
    <title>We Brew</title>
    </head>
    <body>

      @include('../nav')
      <div class="espacionav"id="espacionav"> </div>
      <img src="../../fotosComunes/latas.jpg" alt="..." id="fototitulo">
        <div class="row" id="botonesbajofoto">
          <div class="col-sm">
          <a href='../latas'>
              <button type="button" class="btn" id="botones">TODOS</button>
          </a>
          </div>
          <div class="col-sm" >
            <div class="accordion" id="accordionboton" >
              <div class="card"style="border: solid 0px;">
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" id="botones">
                      MARCAS
                    </button>
                  </h2>
                </div>
                <div id="collapseOne" class="collapsing" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body" id="cardbotonesbajoimagen" >
                    <form class="form-horizontal" id="amb" action="../latas/latas" method="get" enctype="multipart/form-data">
                    @foreach ($brands as $marcaproducto)
                        <a href='../latasbrand/{{$marcaproducto->brand_id}}'>  <button type="button" class="btn" id="botonesdesplegables"  > {{$marcaproducto->brand_name}} </button> </a>
                    @endforeach
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm">
          <div class="accordion" id="accordionboton" >
            <div class="card"style="border: solid 0px;">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn" type="button" data-toggle="collapse" data-target="#collapseTWO" aria-expanded="false" aria-controls="collapseTWO" id="botones">
                    ESTILO
                  </button>
                </h2>
              </div>
              <div id="collapseTWO" class="collapsing" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body"id="cardbotonesbajoimagen" >
                  @foreach ($styles as $estiloproducto)
                        <a href='../latasstyle/{{$estiloproducto->style_id}}'>  <button type="button" class="btn" id="botonesdesplegables"  > {{$estiloproducto->style_name}}</button> </a>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm">
        <div class="accordion" id="accordionboton" >
          <div class="card"style="border: solid 0px;">
            <div class="card-header" id="headingOne">
              <h2 class="mb-0">
                <button class="btn" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3" id="botones">
                  PAIS
                </button>
              </h2>
            </div>
            <div id="collapse3" class="collapsing" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body" id="cardbotonesbajoimagen" >
                @foreach ($origins as $paisproducto)
                      <a href='../latascountry/{{$paisproducto->country_id}}'>  <button type="button" class="btn" id="botonesdesplegables"  > {{$paisproducto->country_origin}} </button> </a>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
          <div class="col-sm">
            <a href='../latasrecomendados'> <button type="button" class="btn" id="botones" >RECOMENDADOS</button> </a>
          </div>
        </div>
        <div class="espacionav"id="espacionav"> </div>
        <!-- hack necesario para que funcione el desplegable en productos -->
        <div style="display:none"class="accordion" id="accordionExample">
        <div class="card">
        <div class="card-header" id="headingOne">
          <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="hidden" aria-controls="collapseOne">
            </button>
          </h2>
        </div>
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
          <div class="card-body">
          </div>
        </div>
      </div>
    </div>
    <!-- FIN hack necesario para que funcione el desplegable en productos -->
        <section id="seccion">
          <div class="container">
            <div id="rowPorron"class="row">
               <div class="col-sm-12 ">
                <div id="rowIndex"class="row">
                  @foreach ($brand as $producto)
                  <div class="col-sm-3 div-img"style="margin-bottom:1vw"  >
                    <div id="prodcontext">
                      <div id="stylefoto">
                        <a href="../../producto/{{$producto->urlSlug}}" id="linkproductos" >
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
                            <button type="button submit" value="{{$producto->id}}" class="btn" id="botonesagregar" >Agregar al Carrito </button>
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
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script src="https://use.fontawesome.com/releases/v5.10.2/js/all.js" data-auto-replace-svg="nest"></script>
    </body>
  </html>
