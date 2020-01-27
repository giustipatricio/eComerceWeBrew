<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Required              meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="/fotosComunes/webrewhead.png">
    <link rel="stylesheet" type="text/css" href="{{asset('css/footer.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/navCss.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/incss.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/amb.css')}}" />
    <title>We Brew</title>
  </head>
  <body>
    @include('../nav')
    <br>
  <div class="cuadro">
      <div class="titulo" style="text-align-last: center;"><h2>TABLAS</h2></div>
    <div class="row" id="tablas" style="padding-left:2%; padding-right:2%;">
      <div class="col-sm">
        <a href= "/adm/admmarcas"><button class="btn" id="botones" onclick="/adm/admmarcas">MARCAS</button></a>

      </div>
      <div class="col-sm">
        <a href="/adm/admproductos"><button class="btn" id="botones"onclick="">PRODUCTOS</button>
      </div></a>

      <div class="col-sm">
        <a href="/adm/admpaises"><button class="btn" id="botones" onclick="">PAISES</button></a>
      </div>
      <div class="col-sm">
        <a href="/adm/admestilo"><button class="btn" id="botones" onclick""=>ESTILOS</button></a>
      </div>
      <div class="col-sm">
        <a href="/adm/admsegmentos"><button class="btn" id="botones" onclick="">SEGMENTOS</button></a>

      </div>
    </div>
  </div>
  <div class="espacio" style="padding-top: 20px; padding-bottom: 20px"></div>
  <div class="container">
    <form class="form-horizontal" id="amb" action="/adm/admproductos" method="post" enctype="multipart/form-data">
        {{ csrf_field () }}
  <table class="table-dark table-hover table-bordered" style="text-align-last: center">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">SEGMENTO</th>
      <th scope="col">MODIFY</th>
      <th scope="col">BORRAR</th>
    </tr>
  </thead>
  <tbody>
    <?php  foreach ($segments as $segmentoproducto):?>
      <tr>
        <th scope="row"><?=substr($segmentoproducto['segment_id'],-10);?></th>
        <td><?=substr($segmentoproducto["segment_name"],-10);?></td>
        <td><a href="/adm/admsegmentos=<?= $segmentoproducto["segment_id"] ?>"> <i class="fas fa-file-alt"></i></a></td>
        <td><a href="<?= url("/eliminar_segmento/{$segmentoproducto->segment_id}")?>"> <i class="fas fa-trash"></i></a></td>
    </form>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
</form>
</div>
  <div class="espacio" style="padding-top:3vw"></div>
  <div class="" id="singin" style="text-align: -webkit-center; padding:0px; margin:0 auto"> </div>
    <div class="espacio" style="padding-top: 20px; padding-bottom: 10px"></div>
    <form class="form-horizontal" id="amb" action="/adm/admsegmentos" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
      <div class="cuadro">

    <div class="titulo" style="text-align-last: center;"><h2>NUEVO SEGMENTO</h2></label>
      <div class="row" id="rowcarga" >
      <div class="col-sm" id="colcarga">
        NOMBRE
      </div>
      <div class="col-sm" id="colcarga">
        <input type="text" name="segment_name" >
      </div>
    </div>
    <br>
    <button type="submit" class="btn" id="botones" name="Submit" value="Enviar" style="width:50%">Agregar Segmento</button>
    </form>
  </div>
  </div>

  <div class="espacio" style="padding-top:3vw"> </div>
  <div class="" id="singin" style="text-align: -webkit-center; padding:0px; margin:0 auto"> </div>
<!-- FIN DE OFERTAS -->

      <div class="espacio" style="padding-top:8vw"></div>
    @include("../Footer")
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.10.2/js/all.js" data-auto-replace-svg="nest"></script>
