<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="../fotosComunes/webrewhead.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('css/singUp.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/footer.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/navCss.css')}}" />
    <title>- - - - - We Brew- - - - - </title>

  </head>
  <body>
    @include('../nav')
    <div class="espacio" style="padding-top:5vw"></div>
    <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-body">
                      <form class="form-horizontal" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          <div class="titulo" style="text-align-last: center;"><h2>CREA TU CUENTA, ES FÁCIL Y RÁPIDO</h2></label></div>
                          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                              <label for="name" class="col-md-4 control-label">Nombre</label>
                              <div class="col-md-10">
                                  <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                  @if ($errors->has('name'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                              <label for="surname" class="col-md-4 control-label">Apellido</label>

                              <div class="col-md-10">
                                  <input id="surname" type="text" class="form-control" name="surname" value="{{ old('surname') }}" required autofocus>

                                  @if ($errors->has('surname'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('surname') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                              <label for="email" class="col-md-4 control-label">E-Mail</label>

                              <div class="col-md-10">
                                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                  @if ($errors->has('email'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                              <label for="password" class="col-md-4 control-label">Contraseña</label>

                              <div class="col-md-10">
                                  <input id="password" type="password" class="form-control" name="password" required>

                                  @if ($errors->has('password'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="password-confirm" class="col-md-4 control-label">Confirmación Contraseña</label>

                              <div class="col-md-10">
                                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                              </div>
                          </div>

                          <label for="fechadenacimiento" class="col-md control-label">Fecha de nacimiento</label>
                            <div class="col-md-10">
                                <label style="" for="dia" class="control-label">Día
                                  <select style="" name="dia" id="dia">
                                    <?php for ($i=01; $i < 31; $i++) { ?>
                                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                  <?php } ?>
                                  </select>
                                </label>
                                <label style="" for="mes" class="control-label" value="">Mes
                                  <select style="" name="mes" id="mes">
                                    <option value="1">ene</option> <option value="2">feb</option> <option value="3">mar</option> <option value="4">abr</option>
                                    <option value="5">may</option> <option value="6">jun</option> <option value="7">jul</option> <option value="8">ago</option>
                                    <option value="9">sep</option> <option value="10">oct</option> <option value="11">nov</option> <option value="12">dic</option>
                                  </select>
                                </label>
                                <label style="" for="ano" class="control-label"value="">Año
                                  <select style="" name="ano" id="ano">
                                    <?php for ($i=2001; $i > 1905; $i--) { ?>
                                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                  <?php } ?>
                                  </select>
                                </label>
                            </div>

                            <label style=""for="sex" class="col-md-4 control-label">Sexo</label>
                            <div style="" class="col-md-10">
                              <input type="hidden" name="sex" value="personalizado">
                              <input type="radio" name="sex" id="inlineRadio1" value="mujer"> Mujer
                              <input type="radio" name="sex" id="inlineRadio2" value="hombre"> Hombre
                              <input type="radio" name="sex" id="inlineRadio3" value="personalizado"> Personalizado
                            </div>
                            </label>

                            <div style="" class="col-md-10">
                            <label for="file" class="col control-label">Foto de Perfil</label>
                            </div>
                            <div class="col-md-10">
                              <input  name="file" type="file" value= "" class="form-control" id="avatar" >
                            </div>
                            <br>

                          <label>
                            <div class="row">
                              <div class="col">
                                <input type="hidden" name="acepterms" id="acepterms" value="0">
                                <input required type="checkbox" name="acepterms" id="acepterms" value="1"> Acepto <a> términos y condiciones </a>
                              </div>
                              <div class="col">
                                <input type="hidden" name="info" id="info" value="0">
                                <input type="checkbox" name="info" id="info" value="1"> Deseo recibir actualizaciones
                              </div>
                          </div>
                        </label>
                          <br>
                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                  <button type="submit" class="btn" id="botones">
                                      Registrar
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>






<div class="espacio" style="padding-top:8vw"></div>
@include("../Footer")
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/releases/v5.10.2/js/all.js" data-auto-replace-svg="nest"></script>
</body>
</html>
