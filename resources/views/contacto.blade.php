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
    <link rel="stylesheet" type="text/css" href="{{asset('css/estilosfaq.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/estilocontacto.css')}}"/>
    <LINK REL="SHORTCUT ICON" href="../fotosComunes/logoTitulo.ico">
    <title>  We Brew</title>
  </head>
  <body>
    @include('../nav')
    <div class="espacio" style="padding:3vw"></div>
      <section id="seccion">
        <div class="container" id="containerprincipal">
        <div id="rowContacto" class="row">
          <div class="col" id="colprincipal">
              <form class="form-horizontal" method="post">
                <fieldset id="formulario">
                  <legend class="text-center header">CONTACTENOS</legend>
                  <div class="espacio" style="padding:10px"></div>
                  <div class="form-group">
                      <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                      <div class="col">
                          <input id="fname" name="name" type="text" placeholder="Nombre completo" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                      <div class="col">
                          <input id="lname" name="name" type="text" placeholder="Apellido" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-envelope-open-text bigicon"></i></span>
                      <div class="col">
                          <input id="email" name="email" type="text" placeholder="Correo Electronico" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                      <div class="col">
                          <input id="phone" name="phone" type="text" placeholder="Telefono" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-pencil-alt bigicon"></i></span>
                      <div class="col">
                          <textarea class="form-control" id="message" name="message" placeholder="Escriba su mensaje aqui" rows="7"></textarea>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-md-12 text-center">
                          <div class="espacio" style="padding:20px"></div>
                          <button type="submit" class="btn" id="botones" >Enviar</button>
                      </div>
                  </div>
              </fieldset>
            </form>
          </div>
      </div>
    </div>
  </section>
  <div class="espacio" style="padding-bottom:90px;"></div>
  @include("../Footer")

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://use.fontawesome.com/releases/v5.10.2/js/all.js" data-auto-replace-svg="nest"></script>
  </body>
</html>
