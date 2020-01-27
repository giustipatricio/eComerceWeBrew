<?php
require_once("../singUp/users.php");
require_once("../singUp/helpers.php");

try {
$baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = $baseDeDatos->prepare("SELECT *
        from prods
        INNER JOIN origin ON fk_origin = origin.country_id
        INNER JOIN brand ON fk_brand = brand.brand_id
        INNER JOIN style ON style = style.style_id
        INNER JOIN cat ON fk_cat = cat.cat_id
        WHERE fk_cat = 1
        ORDER BY prod_id;");
$productos = [];
// var_dump($query); exit;
$query->execute();
$productos = $query->fetchAll();
// var_dump($productos); exit;
 }   catch (\Exception $e) {
 }

 try {
 $baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $query = $baseDeDatos->prepare("SELECT *
          FROM prods
          INNER JOIN cat ON fk_cat = cat.cat_id
          INNER JOIN brand ON fk_brand = brand.brand_id
          WHERE fk_cat = 1
          group by brand_id;");
 $marcasproductos = [];
 // var_dump($query); exit;
 $query->execute();
 $marcasproductos = $query->fetchAll();
 // var_dump($productos); exit;
  }   catch (\Exception $e) {
  }

  try {
  $baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $query = $baseDeDatos->prepare("SELECT *
              FROM prods
              INNER JOIN cat ON fk_cat = cat.cat_id
              INNER JOIN style ON style = style.style_id
              WHERE fk_cat = 1
              group by style_id;");
  $estilosproductos = [];
  // var_dump($query); exit;
  $query->execute();
  $estilosproductos = $query->fetchAll();
  // var_dump($productos); exit;
   }   catch (\Exception $e) {
   }
   try {
   $baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $query = $baseDeDatos->prepare("SELECT *
               FROM prods
               INNER JOIN cat ON fk_cat = cat.cat_id
               INNER JOIN origin ON fk_origin = origin.country_id
               WHERE fk_cat = 1
               group by country_id;");
   $paisesproductos = [];
   // var_dump($query); exit;
   $query->execute();
   $paisesproductos = $query->fetchAll();
   // var_dump($paisesproductos); exit;
    }   catch (\Exception $e) {
    }
   if($_GET){
   $brand_id= $_GET["style_id"];

   // var_dump($_GET); exit;


   try {
   $baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $query = $baseDeDatos->prepare("SELECT *
                   FROM prods
                   INNER JOIN origin ON fk_origin = origin.country_id
                   INNER JOIN brand ON fk_brand = brand.brand_id
                   INNER JOIN style ON style = style.style_id
                   INNER JOIN cat ON fk_cat = cat.cat_id
                   WHERE fk_cat = 1 AND :id = style.style_id; ")
   ;
   $prods = [];
   $query->bindValue(":id", $brand_id);
   $query->execute();
   $prods = $query->fetchAll();
   // var_dump($prods); exit;

    }   catch (\Exception $e) {
    }
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../Footer/Footer.css" />
    <link rel="stylesheet" type="text/css" href="../Navloged/navCss.css" />
    <link rel="stylesheet" type="text/css" href="estilosproductos.css" />
    <link rel="icon" type="image/png" href="../fotosComunes/webrewhead.png">
    <title>We Brew</title>
    </head>
    <body>
      <?php require "../Navloged/nav.php" ?>
      <div class="espacionav"id="espacionav"> </div>
      <img src="../fotosComunes/porronescut.jpg" alt="..." id="fototitulo">
        <div class="row" id="botonesbajofoto">
          <div class="col-sm">
          <a href='../productos/porrones.php'>
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
                    <form class="form-horizontal" id="amb" action="../productos/porrones.php" method="ger" enctype="multipart/form-data">
                    <?php foreach ($marcasproductos as $marcaproducto): ?>
                        <a href='../productos/porronesbrand.php?brand_id=<?= $marcaproducto["brand_id"];?>'>  <button type="button" class="btn" id="botonesdesplegables"  ><?=$marcaproducto['brand_name']?></button> </a>
                    <?php endforeach; ?>
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
                  <?php foreach ($estilosproductos as $estiloproducto): ?>
                        <a href='../productos/porronesstyle.php?style_id=<?= $estiloproducto["style_id"];?>'>  <button type="button" class="btn" id="botonesdesplegables"  ><?=$estiloproducto['style_name']?></button> </a>
                  <?php endforeach; ?>
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
                <?php foreach ($paisesproductos as $paisproducto): ?>
                      <a href='../productos/porronescountry.php?country_id=<?= $paisproducto['country_id'];?>'>  <button type="button" class="btn" id="botonesdesplegables"  ><?=$paisproducto['country_origin']?></button> </a>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
          <div class="col-sm">
            <a href='../productos/porronesrecomendados.php'> <button type="button" class="btn" id="botones" >RECOMENDADOS</button> </a>
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
            <!-- <h1>
              <?= $prods["brand_name"]  ?>
            </h1> -->
            <div id="rowPorron"class="row">
               <div class="col-sm-12 ">
                <div id="rowIndex"class="row">
                  <?php  foreach ($prods as $product):?>
                 <div class="col-sm-3 div-img"style="margin-bottom:1vw"  >
                   <div id="prodcontext">
                    <div id="stylefoto">
                     <a href="../productos/productos.php?prod_id=<?=$product['prod_id'];?>" id="linkproductos" >
                     <img id="productoventa"  class="img"  class="productoBuscado" src="../AMB/imagenes/ <?=$product['picture'];?>" alt="Helaera Corona" style="max-width:120px;">
                    <div id="productotexto"class="text"><b> <?=$product['prods_name'];?></b></div>
                    <div id="productotexto"class="text"> $ <?=substr($product['price'],-10);?>,00</div>
                    </a>
                  </div>
                    <button type="button" class="btn" id="botonesagregar" >Agregar al Carrito </button>
                  </div>
                  </div>
                <?php endforeach ?>
                  </div>
                </div>
              </div>
            </div>
          <div class="espacio" style="padding-top:8vw"></div>
      </section>
      <?php require "../Footer/Footer.php" ?>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script src="https://use.fontawesome.com/releases/v5.10.2/js/all.js" data-auto-replace-svg="nest"></script>
    </body>
  </html>
