<?php
require("../singUp/pdo.php");
require_once("users.php");
require_once("helpers.php");




if($_POST){
 $errores = validar($_POST,$_FILES);
 if(count($errores)==0){
  $usuario = buscarPorEmail($_POST["email"]);
  if($usuario !== null){
    $errores["email"]="Usuario ya registrado";
  }else{
    $avatar = armarAvatar($_FILES);
    $registro = armarRegistro($_POST,$avatar);
    guardarRegistro($registro);
   //De no excistir errores en la información tipeada por el usuario entonces lo redirecciono a donde yo desee.
    header("location:../singIn/singIn.php");
    exit;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="../fotosComunes/webrewhead.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="singUp.css" />
    <link rel="stylesheet" type="text/css" href="../Footer/Footer.css" />
    <link rel="stylesheet" type="text/css" href="../Nav/navCss.css" />
    <title>- - - - - We Brew- - - - - </title>

  </head>
  <body>
          <?php require "../Navloged/nav.php" ?>
            <div class="espacio" style="padding-top:3vw"></div>
            <!-- <img src="../fotosComunes/woodsfondo.jpg" alt="..." id="fotofondosingin"> -->
            <div class="container" id="singin" style="text-align: -webkit-center; padding:0px; margin:0 auto">
              <?php if(isset($errores)):?>
                <ul class="alert alert-danger">
                  <br>
                  <br>
                  <?php foreach ($errores as $value) :?>
                      <li><?=$value;?></li>
                  <?php endforeach;?>
                </ul>
              <?php endif;?>
                <br>
              <div class="espacio" style="padding-top: 20px; padding-bottom: 10px"></div>
              <form class="form-horizontal" id="singup" action="singUp.php" method="post" enctype="multipart/form-data" >
                <div class="form-group">
                  <div class="titulo" style="text-align-last: center;"><h2>CREA TU CUENTA, ES FÁCIL Y RÁPIDO</h2></label>
                  </div>
                </div>
                <div class="espacio" style="padding-top: 20px; padding-bottom: 10px"></div>
                <div class="form-group">
                  <div class="row">
                  <div class="col">
                    <label for="email" class="col control-label">Email</label>
                  </div>
                  <div class="col">
                    <input required type="email" name="email" class="form-control" id="email" placeholder="Email" value="">
                  </div>
                  </div>
                </div>
                <div class="form-group">
                <div class="row">
                  <div class="col">
                    <label for="password" class="col control-label">Contraseña</label>
                  </div>
                  <div class="col">
                      <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" value="" >
                  </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col">
                      <label for="passwordRepeat" class="col control-label">Repetí tú contraseña</label>
                    </div>
                    <div class="col">
                      <input type="password" name="passwordRepeat" class="form-control" id="passwordRepeat" placeholder="Repetí tú contraseña" value="" >
                    </div>
                  </div>
                </div>
                <div class="espacio" style="padding-top: 20px; padding-bottom: 10px"></div>
                <div style="" class="titulo" style="text-align-last: left;"><h4>Fecha de nacimiento</h4></label>
                </div>
                <div class="form-group">
                  <label style="" for="dia" class="col-sm-4 control-label">Día
                    <select style="" name="dia" id="dia">
                      <?php for ($i=01; $i < 31; $i++) { ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                    </select>
                  </label>
                  <label style="" for="mes" class="col-sm-4 control-label" value="">Mes
                    <select style="" name="mes" id="mes">
                      <option value="1">ene</option> <option value="2">feb</option> <option value="3">mar</option> <option value="4">abr</option>
                      <option value="5">may</option> <option value="6">jun</option> <option value="7">jul</option> <option value="8">ago</option>
                      <option value="9">sep</option> <option value="10">oct</option> <option value="11">nov</option> <option value="12">dic</option>
                    </select>
                  </label>
                  <label style="" for="ano" class="col-sm-4 control-label"value="">Año
                    <select style="" name="ano" id="ano">
                      <?php for ($i=2001; $i > 1905; $i--) { ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                    </select>
                  </label>
                </div>
                <div class="espacio" style="padding-top: 20px; padding-bottom: 10px"></div>
                <div class="titulo" style="text-align-last: left;"><h4>Datos Personales</h4></label></div>
                <div class="espacio" style="padding-top: 20px; padding-bottom: 10px"></div>
                <div class="form-group">
                  <div class="row">
                    <div class="col">
                      <label for="nombre" class="col control-label">Nombre</label>
                    </div>
                    <div class="col">
                      <input type="text" name="nombre" class="form-control" id="nombre" placeholder="nombre" value="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col">
                      <label for="Apellido" class="col control-label">Apellido</label>
                    </div>
                    <div class="col">
                      <input type="text" name="apellido" class="form-control" id="Apellido" placeholder="Apellido" value="">
                    </div>
                  </div>
                </div>
                <div class="espacio" style="padding-top: 20px; padding-bottom: 10px"></div>
                <label style=""for="sexo" class="col-sm-2 control-label">Sexo</label>
                <label style="" class="radio-inline">
                  <input type="hidden" name="sexo" value="personalizado">
                  <input type="radio" name="sexo" id="inlineRadio1" value="mujer"> Mujer
                  <input type="radio" name="sexo" id="inlineRadio2" value="hombre"> Hombre
                  <input type="radio" name="sexo" id="inlineRadio3" value="personalizado"> Personalizado
                </label>
                <div class="espacio" style="display:none" style="padding-top: 20px; padding-bottom: 10px"></div>
                <div class="titulo"  style="display:none; text-align-last: left;"><h4>Dirección</h4></label></div>
                <div class="form-group">
                  <label for="direccion" style="display:none" class="col-sm-2 control-label">Calle</label>
                  <div class="col-sm-10">
                    <input type="text" name="calle" style="display:none" class="form-control" id="Calle" placeholder="Calle" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label style="display:none" for="numdireccion" class="col-sm-2 control-label">Número</label>
                  <div class="col-sm-10">
                    <input style="display:none" type="text" name="numdireccion"class="form-control" id="Numero" placeholder="Número"value="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="pisodireccion" style="display:none" class="col-sm-2 control-label">Piso</label>
                  <div class="col-sm-10">
                    <input style="display:none"type="text" name="pisodireccion"class="form-control" id="Piso" placeholder="Piso"value="0">
                  </div>
                </div>
                <div class="form-group">
                  <label for="dia" style="display:none" class="col-sm-offset-2 col-sm-2 control-label">País
                    <select style="display:none" name="pais" id="pais">
                      <option>Argentina</option>
                    </select>
                  </label>
                  <label style="display:none" for="provincia" class="col-sm-offset-2 col-sm-2 control-label">provincia
                    <select style="display:none" name="provincia" id="provincia" value="">
                      <option value="1">Buenos Aires</option>
                      <option>CABA</option>
                      <option>Catamarca</option>
                      <option>Chaco</option>
                      <option>Chubut</option>
                      <option>Córdoba</option>
                      <option>Corrientes</option>
                      <option>Entre Ríos</option>
                      <option>Formosa</option>
                      <option>Jujuy</option>
                      <option>La Pampa</option>
                      <option>La Rioja</option>
                      <option>Mendoza</option>
                      <option>Misiones</option>
                      <option>Neuquén</option>
                      <option>Río Negro</option>
                      <option>Salta</option>
                      <option>San Juan</option>
                      <option>San Luis</option>
                      <option>Santa Cruz</option>
                      <option>Santa Fe</option>
                      <option>Santiago del Estero</option>
                      <option>Tierra del Fuego</option>
                      <option>Tucumán</option>
                    </select>
                  </label>
                </div>
                <div class="form-group">
                  <label style="display:none" for="ciudad" class="col-sm-2 control-label">ciudad</label>
                  <div class="col-sm-10">
                    <input style="display:none" type="text" name="ciudad"class="form-control" id="ciudad" placeholder="ciudad" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label style="display:none" for="Codigo Postal" class="col-sm-2 control-label">Código Postal</label>
                  <div class="col-sm-10">
                    <input style="display:none" type="text" name="codigopostal" class="form-control" id="Codigo Postal" placeholder="Código Postal" value="">
                  </div>
                </div>
                <div class="espacio" style="padding-top: 20px; padding-bottom: 10px"></div>
                <div class="form-group">
                  <div class="row">
                    <div class="col">
                      <label for="avatar" class="col control-label">Foto de Perfil</label>
                    </div>
                    <div class="col">
                      <input required name="avatar" type="file" value= "" class="form-control" id="avatar" >
                    </div>
                  </div>
                </div>
                <div class="espacio" style="padding-top:3vw"></div>
                <div class="form-group">
                  <div class="col-sm-offset-0 col-sm-12">
                    <div class="checkbox">
                      <label>
                        <div class="row">
                          <div class="col">
                            <input type="hidden" name="acepterms" id="acepterms" value="0">
                            <input required type="checkbox" name="acepterms" id="acepterms" value="1"> Acepto <a> términos y condiciones </a>
                          </div>
                        </label>
                        <label>
                          <div class="col">
                            <input  type="hidden" name="actualizaciones" id="actualizaciones" value="0">
                            <input type="checkbox" name="actualizaciones" id="actualizaciones" value="1"> Deseo recibir actualizaciones
                          </div>
                        </label>

                      </div>
                    </div>
                  </div>
                </div>
                <div class="espacio" style="padding-top:3vw"></div>
                <div class="form-group">
                  <div class="col">
                  <button type="submit" class="btn" id="botones" name="Submit" value="Enviar" style="width:50%">Crear Cuenta</button>
                </div>
              </form>
            </div>
            </div>
            <div class="espacio" style="padding-top:3vw">
            </div>
            <?php require "../Footer/Footer.php" ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.10.2/js/all.js" data-auto-replace-svg="nest"></script>
    </body>
  </html>
