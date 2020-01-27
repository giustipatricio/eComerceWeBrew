<html lang="en" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="../fotosComunes/webrewhead.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('css/misDatos.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/footer.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/navCss.css')}}" />
    <title>- - - - - We Brew- - - - - </title>
  </head>
  <body>
    @include('../nav')
    <div class="espacio" style="padding-top:3vw"></div>
    <br>
      <div class="container" id="singin" style="text-align: -webkit-center; padding:0px; margin:0 auto">
        <?php if(isset($errores)):?>
          <ul class="alert alert-danger">
            <?php foreach ($errores as $value) :?>
              <li><?=$value;?></li>
            <?php endforeach;?>
          </ul>
            <?php endif;?>
          <br>
        <div class="espacio" style="padding-top: 20px; padding-bottom: 10px"></div>
        {{-- //datos personales// --}}
        <form class="form-horizontal" id="singup" action="<?=url("/perfil")?>" method="post" enctype="multipart/form-data" >
            {{csrf_field()}}
          <div class="form-group">
            <div class="titulo" style="text-align-last: center;"><h2>TUS DATOS PERSONALES</h2></label>
            </div>
          </div>
          <div style="" class= "espacio" style="padding-top: 20px; padding-bottom: 10px"></div>
          <div class="espacio" style="padding-top: 20px; padding-bottom: 10px"></div>
          <div class="titulo" style="text-align-last: left;"><h4>Datos Personales</h4></label></div>
          <div class="espacio" style="padding-top: 20px; padding-bottom: 10px"></div>
          <div class="form-group">
            <div class="row">
              <div class="col">
                <label for="name" class="col control-label">Nombre</label>
              </div>
              <div class="col">
                <input type="text" name="name" class="form-control" id="name" placeholder="name" value="{{ Auth::user()->name }}">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col">
                <label for="surname" class="col control-label">Apellido</label>
              </div>
              <div class="col">
                <input type="text" name="surname" class="form-control" id="Apellido" placeholder="Apellido" value="{{ Auth::user()->surname }}">
              </div>
            </div>
          </div>
          <div class="espacio" style="" style="padding-top: 20px; padding-bottom: 10px"></div>
          <div class="titulo"  style="text-align-last: left;"><h4>Dirección</h4></label></div>
          <div class="form-group">
            <label for="calle" style="" class="col-sm-2 control-label">Calle</label>
            <div class="col-sm-10">
              <input type="text" name="calle" style="" class="form-control" id="Calle" placeholder="Calle" value="{{ Auth::user()->calle }}">
            </div>
          </div>
          <div class="form-group">
            <label style="" for="calleNum" class="col-sm-2 control-label">Número</label>
            <div class="col-sm-10">
              <input style="" type="text" name="calleNum"class="form-control" id="Numero" placeholder="Número"value="{{ Auth::user()->calleNum }}">
            </div>
          </div>
          <div class="form-group">
            <label for="piso" style="" class="col-sm-2 control-label">Piso</label>
            <div class="col-sm-10">
              <input style=""type="text" name="piso"class="form-control" id="Piso" placeholder="Piso"value="{{ Auth::user()->piso }}">
            </div>
          </div>
          <br>
            <select name="country">
              <option value="-1">Seleccionar país</option>
            </select>
            <br>
            <label for="province" id="province"></label>


          <div class="form-group">
            <label style="" for="ciudad" class="col-sm-2 control-label">Ciudad</label>
            <div class="col-sm-10">
              <input style="" type="text" name="ciudad"class="form-control" id="ciudad" placeholder="Ciudad" value="{{ Auth::user()->ciudad }}">
            </div>
          </div>
          <div class="form-group">
            <label style="" for="codigoPostal" class="col-sm-2 control-label">Código Postal</label>
            <div class="col-sm-10">
              <input style="" type="text" name="codigoPostal" class="form-control" id="Codigo Postal" placeholder="Código Postal" value="{{ Auth::user()->codigoPostal }}">
            </div>
          </div>
          <div class="espacio" style="padding-top:3vw"></div>
          <div class="form-group">
            <div class="col">
            <button type="submit" class="btn" id="botones" name="Submit" value="Enviar" style="width:50%">Modificar Datos</button>
          </div>
        </form>
          <br>
          <div class="col">
           <a type="" class="btn"  id="botones" style="width:50%" href="<?=url("/home")?>"> Volver </a>
          </div>
      </div>
      </div>
      <div class="espacio" style="padding-top:3vw">
      </div>
      @include("../Footer")
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="{{ URL::asset('js/index.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.10.2/js/all.js" data-auto-replace-svg="nest"></script>
    </body>
  </html>
