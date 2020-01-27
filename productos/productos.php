<!DOCTYPE html>
<?php
require_once("../singUp/users.php");
require_once("../singUp/helpers.php");
if($_GET){
$prod_id= $_GET["prod_id"];
// var_dump($serie_id); exit;

try {
$baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = $baseDeDatos->prepare("SELECT *
    from prods
    INNER JOIN origin ON fk_origin = origin.country_id
    INNER JOIN brand ON fk_brand = brand.brand_id
    INNER JOIN style ON style = style.style_id
    INNER JOIN segment ON segment = segment.segment_id
    INNER JOIN cat ON fk_cat = cat.cat_id
    WHERE :id = prods.prod_id ")
;
$query->bindValue(":id", $prod_id);
$query->execute();
// var_dump($serie_id); exit;

$prods = $query->fetch();
 }   catch (\Exception $e) {
 }
 try {
$baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = $baseDeDatos->prepare("SELECT *
  from origin
        ORDER BY country_id;")
;
$countryes = [];
// var_dump($query); exit;

$query->execute();
$countryes = $query->fetchAll();
// var_dump($productos); exit;

 }   catch (\Exception $e) {
 } //fin buscarpaises//
 try {
$baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = $baseDeDatos->prepare("SELECT *
                       from cat
                       ORDER BY cat_id;");
$categories = [];
// var_dump($query); exit;
$query->execute();
$categories = $query->fetchAll();
// var_dump($productos); exit;
 }   catch (\Exception $e) {
 } //fin buscarcategorias//
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
 try {
$baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = $baseDeDatos->prepare("SELECT *
                       from style
                       ORDER BY style_id;");
$styles = [];
// var_dump($query); exit;
$query->execute();
$styles = $query->fetchAll();
// var_dump($productos); exit;
 }   catch (\Exception $e) {
 } //fin estilos//
 try {
$baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = $baseDeDatos->prepare("SELECT *
                       from segment
                       ORDER BY segment_id;");
$segments = [];
// var_dump($query); exit;
$query->execute();
$segments = $query->fetchAll();
// var_dump($productos); exit;
 }   catch (\Exception $e) {
 } //fin segmetos//
};
try {
$baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = $baseDeDatos->prepare("SELECT *
        from prods
        INNER JOIN origin ON fk_origin = origin.country_id
        INNER JOIN brand ON fk_brand = brand.brand_id
        INNER JOIN style ON style = style.style_id
        INNER JOIN cat ON fk_cat = cat.cat_id
        WHERE ishigh = 1
        ORDER BY prod_id
        Limit 5;");
$productosdestacados1 = [];
// var_dump($query); exit;
$query->execute();
$productosdestacados1 = $query->fetchAll();
// var_dump($productos); exit;
 }   catch (\Exception $e) {
 }
 try {
 $baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $query = $baseDeDatos->prepare("SELECT *
         from prods
         INNER JOIN origin ON fk_origin = origin.country_id
         INNER JOIN brand ON fk_brand = brand.brand_id
         INNER JOIN style ON style = style.style_id
         INNER JOIN cat ON fk_cat = cat.cat_id
         WHERE ishigh = 1
         ORDER BY prod_id
         Limit 5
         offset 5;");
 $productosdestacados2 = [];
 // var_dump($query); exit;
 $query->execute();
 $productosdestacados2 = $query->fetchAll();
 // var_dump($productos); exit;
  }   catch (\Exception $e) {
  }
  try {
  $baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $query = $baseDeDatos->prepare("SELECT *
          from prods
          INNER JOIN origin ON fk_origin = origin.country_id
          INNER JOIN brand ON fk_brand = brand.brand_id
          INNER JOIN style ON style = style.style_id
          INNER JOIN cat ON fk_cat = cat.cat_id
          WHERE ishigh = 1
          ORDER BY prod_id
          Limit 5
          offset 10;");
  $productosdestacados3 = [];
  // var_dump($query); exit;
  $query->execute();
  $productosdestacados3 = $query->fetchAll();
  // var_dump($productos); exit;
   }   catch (\Exception $e) {
   }
   try {
   $baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $query = $baseDeDatos->prepare("SELECT *
           from prods
           INNER JOIN origin ON fk_origin = origin.country_id
           INNER JOIN brand ON fk_brand = brand.brand_id
           INNER JOIN style ON style = style.style_id
           INNER JOIN cat ON fk_cat = cat.cat_id
           WHERE ishigh = 1
           ORDER BY prod_id
           Limit 5
           offset 15;");
   $productosdestacados4 = [];
   // var_dump($query); exit;
   $query->execute();
   $productosdestacados4 = $query->fetchAll();
   // var_dump($productos); exit;
    }   catch (\Exception $e) {
    }
?>
<html lang="en" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../Footer/Footer.css" />
    <link rel="stylesheet" type="text/css" href="../Navloged/navCss.css" />
    <link rel="stylesheet" type="text/css" href="../productos/productos.css" />
    <link rel="icon" type="image/png" href="../fotosComunes/webrewhead.png">
    <title>We Brew</title>
  </head>
  <body>
    <?php require "../Navloged/nav.php" ?>
    <div class="espacionav"id="espacionav"> </div>
    <section id="seccion">
          <div id="rowCuadroProducto" class="row">
            <div class="espacio" style="padding-top:8vw"></div>
              <div class="col-sm-5" id="cuadroproducto">
                <div id="rowCuadroProducto" class="row">
                  <div class="col-sm-9" id="titulosprod">
                    <br>
                    <ul id="listacompraproducto">
                    <li><h3 id="producto"><?=$prods['brand_name']?></h3></li>
                    <li><h1 id="producto"><?=$prods['prods_name']?> </h1></li>
                    </ul>
                  </div>
                  <div class="col-sm-3" id="titulosprod">
                    <br>
                    <ul id="listacompraproducto">
                      <li><h4 id="prodalc">Alc %<?=$prods['alc']?> </h4></li>
                    </ul>
                  </div>
                </div>
                  <div id="variedadcompra" class="row">
                    <br>
                    <div class="col" id="variedad">
                    <h3>Unidad</h3>
                    <h3>$<?=$prods['price']?></h3>
                    </div>
                    <div class="col" id="variedad">
                      <h3>Pack<b style="color:white">X6</b ></h3>
                      <h3>$<?=$prods['price']*6*.98?></h3>
                    </div>
                    <div class="col" id="variedad">
                      <h3>Pack<b style="color:white">X24</b></h3>
                      <h3>$<?=$prods['price']*24*.95?></h3>
                    </div>
                    </div>
                  <div class="form-group">
                    <!-- <label for="cantidad">Cantidad </label>
                      <select name="cantidad" id="cantidad">
                        <option>1</option><option>2</option> <option>3</option><option>4</option><option>5</option><option>6</option><option>7</option>
                        <option>8</option><option>9</option><option>10</option>
                      </select> -->
                    </label>
                  </div>
                  <div class="espacio" style="padding-top:1.5vw"></div>
                  <button type="button" class="btn" id="botonecompra">Agregar al Carrito</button>
                </ul>
                <div class="espacio" style="padding-top:2.5vw"></div>
              </div>
              <div class="col-sm-4" id="fotoproducto">
                <div id="colorfondo">
                  <img id="imagenproducto" class="d-block w-100" src="../AMB/imagenes/ <?=$prods['picture']?> "  alt="foto">
                  <div class="espacio" style="padding-top:5vw"></div>
                </div>
                </div>
              <div class=" col-sm-3" id="textodescripcion">
                <br>
                <h5><?=$prods['detail']?></h5>
                <div class="espacio" style="padding-top:8vw"></div>
              </div>
            </div>
          <div class="espacio" style="padding-top:3vw"></div>
          <div  class="container" id="detalleProducto">
            <ul style="list-style-type: none;" id="detalleproducto">
              <li> <b>Marca:</b> <?=$prods['brand_name']?> </li>
              <li> <b>Capacidad:</b> <?=$prods['capacity_cm3']?> cm3 </li>
              <li> <b>Estilo:</b> <?=$prods['style_name']?> </li>
              <li> <b>Graduación alcohólica:</b> <?=$prods['alc']?> % </li>
              <li><b>IBU:</b> <?=$prods['ibu']?> </li>
              <li><b>Pais de Procedencia:</b> <?=$prods['country_origin']?> </li>
            </ul>
          </div>
          <div class="espacio" style="padding-top:5vw"></div>
          <!-- CAROUSEL DE DESTACADOS -->
          <div  id="fondodestacados">
            <div class="container" id="destacadoscarrouselback">
                      <img id="destacadoscarrousel" alt="Nuestros destacados"  src="../fotosComunes/destacados.jpg">
                    </div>
                      <!-- <h1 class="productosMas text-center">Nuestros destacados</h1> -->
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                          <div class="carousel-item active">
                            <div class="container mt-3 text-center">
                            <div class="row text-center">
                              <?php  foreach ($productosdestacados1 as $proddestacado):?>
                            <div class="card" id="cardDestacados">
                              <div class="card-body">
                                <a href="../productos/productos.php?prod_id=<?= $proddestacado["prod_id"] ?>" id="linkproductos" >
                                  <h5 class="card-title"><?=$proddestacado['prods_name'];?></h5>
                                </a>
                              </div>
                                <a href="../productos/productos.php?prod_id=<?= $proddestacado["prod_id"] ?>" id="linkproductos" >
                                  <img src="../AMB/imagenes/ <?=$proddestacado['picture'];?>" class="card-img-top" alt="..." style="max-width:120px;  align-self: center;">
                                </a>
                              <div class="card-body">
                                <h4 class="card-text">$<?=$proddestacado['price'];?></H4>
                                <a href="#"><button type="button" class="btn" id="botonesdestacados">Agregar al Carrito </button></a>
                              </div>
                            </div>
                          <?php endforeach ?>
                        </div>
                      </div>
                    </div>
                      <div class="carousel-item">
                        <div class="container mt-3 text-center">
                          <div class="row text-center">
                              <?php  foreach ($productosdestacados2 as $proddestacado2):?>
                            <div class="card" id="cardDestacados" style="">
                              <div class="card-body">
                                <a href="../productos/productos.php?prod_id=<?= $proddestacado2["prod_id"] ?>" id="linkproductos" >
                                  <h5 class="card-title"><?=$proddestacado2['prods_name'];?></h5>
                                </a>
                              </div>
                                <a href="../productos/productos.php?prod_id=<?= $proddestacado2["prod_id"] ?>" id="linkproductos" >
                                  <img src="../AMB/imagenes/ <?=$proddestacado2['picture'];?>" class="card-img-top" alt="..." style="max-width:120px;  align-self: center;">
                                </a>
                              <div class="card-body">
                                <h4 class="card-text">$<?=$proddestacado2['price'];?>,00</h4>
                                <a href="#"><button type="button" class="btn" id="botonesdestacados">Agregar al Carrito </button></a>
                              </div>
                            </div>
                              <?php endforeach ?>
                          </div>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="container mt-3 text-center">
                          <div class="row text-center">
                              <?php  foreach ($productosdestacados3 as $proddestacado3):?>
                            <div class="card" id="cardDestacados" style="">
                              <div class="card-body">
                                <a href="../productos/productos.php?prod_id=<?= $proddestacado3["prod_id"] ?>" id="linkproductos" >
                                  <h5 class="card-title"><?=$proddestacado3['prods_name'];?></h5>
                                </a>
                              </div>
                                <a href="../productos/productos.php?prod_id=<?= $proddestacado3["prod_id"] ?>" id="linkproductos" >
                                  <img src="../AMB/imagenes/ <?=$proddestacado3['picture'];?>" class="card-img-top" alt="..." style="max-width:120px;  align-self: center;">
                                </a>
                              <div class="card-body">
                                <h4 class="card-text">$<?=$proddestacado3['price'];?>,00</h4>
                                <a href="#"><button type="button" class="btn" id="botonesdestacados">Agregar al Carrito </button></a>
                              </div>
                            </div>
                              <?php endforeach ?>
                          </div>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="container mt-3 text-center">
                          <div class="row text-center">
                              <?php  foreach ($productosdestacados4 as $proddestacado4):?>
                            <div class="card" id="cardDestacados" style="">
                              <div class="card-body">
                                <a href="../productos/productos.php?prod_id=<?= $proddestacado4["prod_id"] ?>" id="linkproductos" >
                                  <h5 class="card-title"><?=$proddestacado4['prods_name'];?></h5>
                                </a>
                              </div>
                              <a href="../productos/productos.php?prod_id=<?= $proddestacado4["prod_id"] ?>" id="linkproductos" >
                                <img src="../AMB/imagenes/ <?=$proddestacado4['picture'];?>" class="card-img-top" alt="..." style="max-width:120px;  align-self: center;">
                              </a>
                              <div class="card-body">
                                <h4 class="card-text">$<?=$proddestacado4['price'];?>,00</h4>
                                <a href="#"><button type="button" class="btn" id="botonesdestacados">Agregar al Carrito </button></a>
                              </div>
                            </div>
                              <?php endforeach ?>
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
                <div class="espacio" style="padding-top:8vw"></div>
              </div>

          <!-- FIN DE CAROUSEL DE DESTACADOS -->
    </section>
    <div class="" style="border-bottom: solid 0.5px rgba(255,193,0,0.8); width:100%"></div>
    <?php require "../Footer/Footer.php" ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.10.2/js/all.js" data-auto-replace-svg="nest"></script>

  </body>
</html>
