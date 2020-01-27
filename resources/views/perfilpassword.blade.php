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
        <form class="form-horizontal" id="singup" action="" method="post" enctype="multipart/form-data" >
          {{csrf_field()}}
          <div class="form-group">
            <div class="titulo" style="text-align-last: center;"><h2>TUS DATOS</h2></label>
            </div>
          </div>
          <div class="espacio" style="padding-top: 20px; padding-bottom: 10px"></div>
          <div class="form-group">
            <div class="row">
            <div class="col">
              <label for="email" class="col control-label">Email</label>
            </div>
            <div class="col">
              <input required type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ Auth::user()->email  }}">
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.10.2/js/all.js" data-auto-replace-svg="nest"></script>
    </body>
  </html>
