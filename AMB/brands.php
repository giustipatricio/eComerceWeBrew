<br>
<br>
<?php
require_once('../singUp/pdo.php');
if($_POST){
  $name = $_POST['name'];
    try {
      $query = $baseDeDatos->prepare ("INSERT INTO brand
        VALUES (default,'$name')");
        // var_dump($query); exit;
         $query-> execute();
       } catch (\Exception $e) {echo "no se pudo subir marca"; };
    }//cierre ifpost//
     ;

    try {
    $baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = $baseDeDatos->prepare("SELECT *
                          from brand
                          ORDER BY brand_id;");
    $brandes = [];
    // var_dump($query); exit;
    $query->execute();
    $brandes = $query->fetchAll();
    // var_dump($productos); exit;
    }   catch (\Exception $e) {
    } //fin buscarmarcas//
;

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="../fotosComunes/webrewhead.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="amb.css" />
    <link rel="stylesheet" type="text/css" href="../Footer/Footer.css" />
    <link rel="stylesheet" type="text/css" href="../Nav/navCss.css" />
    <title>- - - - - We Brew- - - - - </title>

  </head>
  <body>
          <?php require "../NavlAdmin/nav.php" ?>
          <br>
          <div class="cuadro">
              <div class="titulo" style="text-align-last: center;"><h2>TABLAS</h2></div>
            <div class="row" id="tablas" style="padding-left:2%; padding-right:2%;">
              <div class="col-sm">
                <button class="btn" id="botones" onclick="window.location.href='../AMB/brands.php'">MARCAS</button>
              </div>
              <div class="col-sm">
                <button class="btn" id="botones"onclick="window.location.href='../AMB/amb.php'">PRODUCTOS</button>
              </div>
              <div class="col-sm">
                <button class="btn" id="botones" onclick="window.location.href='../AMB/countryes.php'">PAISES</button>
              </div>
              <div class="col-sm">
                <button class="btn" id="botones" onclick="window.location.href='../AMB/styles.php'">ESTILOS</button>
              </div>
              <div class="col-sm">
                <button class="btn" id="botones" onclick="window.location.href='../AMB/segments.php'">SEGMENTOS</button>
              </div>
            </div>
          </div>
          <div class="espacio" style="padding-top: 20px; padding-bottom: 50px"></div>
          <form class="form-horizontal" id="marcas" >
            <div class="cuadro">
            <div class="titulo" style="text-align-last: center;"><h2>MARCAS CARGADAS</h2></label>
              <table class="table table-sm table-dark conteiner-fluid" >
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">MODIFICAR</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  foreach ($brandes as $brande):?>
                    <tr>
                      <th scope="row"><?=$brande['brand_id'];?></th>
                      <td><?=$brande['brand_name'];?></td>
                      <td><a href="../AMB/brandsmod.php?brand_id=<?= $brande["brand_id"] ?>"> <i class="fas fa-file-alt"></i></a></td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
            </form>
          </div>
          <div class="espacio" style="padding-top:3vw"></div>
          <div class="" id="singin" style="text-align: -webkit-center; padding:0px; margin:0 auto"> </div>
          <div class="espacio" style="padding-top: 20px; padding-bottom: 10px"></div>
          <form class="form-horizontal" id="amb" action="../AMB/brands.php" method="post" enctype="multipart/form-data">
            <div class="cuadro">
              <div class="titulo" style="text-align-last: center;"><h2>CARGA DE MARCAS</h2></label>
                <div class="row" id="rowcarga" >
                <div class="col-sm" id="colcarga">
                  NOMBRE
                </div>
                <div class="col-sm" id="colcarga">
                  <input type="text" name="name" >
                </div>
              </div>
              <br>
              <button type="submit" class="btn" id="botones" name="Submit" value="Enviar" style="width:50%">Agregar Marca</button>
              </form>
            </div>
          </div>

          <div class="espacio" style="padding-top:3vw"> </div>
          <div class="" id="singin" style="text-align: -webkit-center; padding:0px; margin:0 auto"> </div>
          <?php require "../Footer/Footer.php" ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.10.2/js/all.js" data-auto-replace-svg="nest"></script>
    </body>
  </html>
