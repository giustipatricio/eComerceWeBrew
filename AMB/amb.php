<br>
<br>
<?php
require_once('../singUp/pdo.php');
if($_POST){
  $cat = $_POST['cat'];
  $name = $_POST['name'];
  $segment = $_POST['segment'];
  $style = $_POST['style'];
  $stock = $_POST['stock'];
  $ibu = $_POST['ibu'];
  $alc = $_POST['alc'];
  $capacity = $_POST['capacity'];
  $brand = $_POST['brand'];
  $origin = $_POST['origin'];
  $detail = $_POST['detail'];
  $ishigh = $_POST['ishigh'];
  $price = $_POST['price'];
  if (isset($_FILES)){
      if ($_FILES['picture']['error'] != 0){
      }else{
        $ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
        if ($ext =! "jpg" && $ext =! "png") {
        Echo "imagen erronea";
        }
        else { // sin error//
          $nombre = $_FILES['picture']['name'];
          $ext = pathinfo($nombre,PATHINFO_EXTENSION);
          $archivoOrigen = $_FILES['picture']['tmp_name'];
          $archivoDestino = dirname(__DIR__);
          $archivoDestino = $archivoDestino."\AMB\imagenes\ ";
          $imgprod = uniqid();
          $archivoDestino = $archivoDestino.$imgprod.".".$ext;
          //Aquí estoy copiando al servidor nuestro archivo destino creado
          move_uploaded_file($archivoOrigen,$archivoDestino);
          //Aquí estoy retornando al usuario sólo la imagen, la cual será guardada en el archivo json
          $imgprod = $imgprod.".".$ext;
        }
      }
    }
    try {
      $query = $baseDeDatos->prepare ("INSERT INTO prods
        VALUES (default,'$cat','$style','$segment','$name','$stock','$ibu','$alc','$capacity',
          '$brand','$origin','$detail','$imgprod', '$ishigh', '$price' )");
        // var_dump($query); exit;
         $query-> execute();
         } catch (\Exception $e) {echo "no se pudo subir tu peli"; };
    }//cierre ifpost//
     ;
  try {
  $baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $query = $baseDeDatos->prepare("SELECT *
          from prods
          INNER JOIN origin ON fk_origin = origin.country_id
          INNER JOIN brand ON fk_brand = brand.brand_id
          INNER JOIN style ON style = style.style_id
          INNER JOIN segment ON segment = segment.segment_id
          INNER JOIN cat ON fk_cat = cat.cat_id
          ORDER BY prod_id;");
  $productos = [];
  // var_dump($query); exit;
  $query->execute();
  $productos = $query->fetchAll();
  // var_dump($productos); exit;
   }   catch (\Exception $e) {
   }; //fin buscarproductos//
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
          <div class="espacio" style="padding-top: 20px; padding-bottom: 20px"></div>
          <div class="cuadro">
          <form class="" id="amb" action="amb.php" method="get" enctype="multipart/form-data">
            <div class="titulo" style="text-align-last: center;"><h2>PRODUCTOS CARGADOS</h2></div>
              <br>
                <table class="table-dark table-hover table-bordered" style="text-align-last: center">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">CAT</th>
                    <th scope="col">SEGMENTO</th>
                    <th scope="col">ESTILO</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">STOCK</th>
                    <th scope="col">IBU</th>
                    <th scope="col">%ALC</th>
                    <th scope="col">CM3</th>
                    <th scope="col">MARCA</th>
                    <th scope="col">ORIGEN</th>
                    <th scope="col">DETALLE</th>
                    <th scope="col">FOTO</th>
                    <th scope="col">OFERTA</th>
                    <th scope="col">$</th>
                    <th scope="col">MODIFY</th>
                    <th scope="col">BORRAR</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  foreach ($productos as $producto):?>
                    <tr>
                      <th scope="row"><?=substr($producto['prod_id'],-10);?></th>
                      <td><?=substr($producto["cat_name"],-10);?></td>
                      <td><?=substr($producto["segment_name"],-10);?></td>
                      <td><?=substr($producto["style_name"],-10);?></td>
                      <td><?=substr($producto['prods_name'],-10);?></td>
                      <td><?=substr($producto['stock'],-10);?></td>
                      <td><?=substr($producto['ibu'],-10);?></td>
                      <td><?=substr($producto['alc'],-10);?></td>
                      <td><?=substr($producto['capacity_cm3'],-10);?></td>
                      <td><?=substr($producto['brand_name'],-10);?></td>
                      <td><?=substr($producto['country_origin'],-10);?></td>
                      <td><?=substr($producto['detail'],-10);?></td>
                      <td><?=substr($producto['picture'],-10);?></td>
                      <td><?=substr($producto['ishigh'],-10);?></td>
                      <td><?=substr($producto['price'],-10);?></td>
                      <td><a href="../AMB/modify.php?prod_id=<?= $producto["prod_id"] ?>"> <i class="fas fa-file-alt"></i></a></td>
                      <td><a href="../AMB/delete.php?prod_id=<?= $producto["prod_id"] ?>"> <i class="fas fa-trash"></i></a></td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </form>
          </div>
          </div>
            <div class="espacio" style="padding-top:3vw"></div>
            <div class="" id="singin" style="text-align: -webkit-center; padding:0px; margin:0 auto"> </div>
              <div class="espacio" style="padding-top: 20px; padding-bottom: 10px"></div>
              <div class="cuadro">
              <form class="form-horizontal" id="amb" action="amb.php" method="post" enctype="multipart/form-data">
              <div class="titulo" style="text-align-last: center;"><h2>CARGA DE PRODUCTOS</h2></div>
              <br>
              <div class="container">
                <div class="row" id="rowcarga" >
                  <div class="col-sm" id="colcarga">
                    NOMBRE
                  </div>
                  <div class="col-sm" id="colcarga">
                    <input type="text" name="name" >
                  </div>
                  <div class="col-sm" id="colcarga">
                    CATEGORIA
                  </div>
                  <div class="col-sm" id="colcarga">
                    <select name="cat" id="origin" value="">
                      <?php foreach ($categories as $category): ?>
                      <option value="<?=$category["cat_id"]?>"><?=$category["cat_name"]?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <br>
                <div class="row" id="rowcarga" >
                  <div class="col-sm" id="colcarga">
                    SEGMENTO
                  </div>
                  <div class="col-sm" id="colcarga">
                    <select name="segment" id="segment" value="">
                      <?php foreach ($segments as $segment): ?>
                      <option value="<?=$segment["segment_id"]?>"><?=$segment["segment_name"]?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-sm" id="colcarga">
                    ESTILO
                  </div>
                  <div class="col-sm" id="colcarga">
                    <select name="style" id="style" value="">
                      <?php foreach ($styles as $style): ?>
                      <option value="<?=$style["style_id"]?>"><?=$style["style_name"]?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <br>
                <div class="row" id="rowcarga" >
                  <div class="col-sm" id="colcarga">
                    STOCK
                  </div>
                  <div class="col-sm" id="colcarga">
                  <select name="stock" id="stock" value="">
                        <?php for ($i=01; $i < 50; $i++) { ?>
          					       <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
              				  <?php } ?></select>
                  </div>
                  <div class="col-sm" id="colcarga">
                    IBU
                  </div>
                  <div class="col-sm" id="colcarga">
                    <select name="ibu" id="ibu" value="">
                      <?php for ($i=01; $i < 100; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                      <?php } ?></select>
                  </div>
                  <div class="col-sm" id="colcarga">
                    ALCOHOL
                  </div>
                  <div class="col-sm" id="colcarga">
                    <select name="alc" id="alc" value="">
                      <?php for ($i=1; $i < 19; $i=$i+0.1) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                      <?php } ?></select>
                  </div>
                </div>
                <br>
                <div class="row" id="rowcarga" >
                  <div class="col-sm" id="colcarga">
                    CAPACIDAD
                  </div>
                  <div class="col-sm" id="colcarga">
                    <input type="text" name="capacity">
                  </div>
                  <div class="col-sm" id="colcarga">
                    MARCA
                  </div>
                  <div class="col-sm" id="colcarga">
                    <select name="brand" id="brand" value="">
                      <?php foreach ($brandes as $brande): ?>
                        <option value="<?=$brande["brand_id"]?>"><?=$brande["brand_name"]?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <br>
                <div class="row" id="rowcarga" >
                  <div class="col-sm" id="colcarga">
                    ORIGEN
                  </div>
                  <div class="col-sm" id="colcarga">
                    <select name="origin" id="origin" value="">
                      <?php foreach ($countryes as $country): ?>
                        <option value="<?=$country["country_id"]?>"><?=$country["country_origin"]?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-sm" id="colcarga">
                    DETALLE
                  </div>
                  <div class="col-sm" id="colcarga">
                    <input type="text" name="detail">
                  </div>
                </div>
                <br>
                <div class="row" id="rowcarga">
                    <div class="col-sm" id="colcarga">
                      FOTO
                    </div>
                    <div class="col-sm" id="colcarga">
                        <input type="file" name="picture" id="picture" class="inputfile" >
                    </div>
                    <div class="col-sm" id="colcarga">
                      DESTACADO
                    </div>
                    <div class="col-sm" id="colcarga">
                      <select name="ishigh" id="ishigh" value="">
                        <option value="0">NO</option>
                        <option value="1">SI</option>
                    </select>
                </div>
                <div class="col-sm" id="colcarga">
                  PRECIO
                </div>
                <div class="col-sm" id="colcarga">
                  <input type="text" name="price">
                </div>
              </div>
              <br>
              <br>
                <button type="submit" class="btn" id="botones" name="Submit" value="Enviar" style="width:50%">Agregar Producto</button>
              </form>
            </div>
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
