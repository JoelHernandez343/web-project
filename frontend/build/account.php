<?php
  session_start();
  //echo $_SESSION["usuario"];
  if(isset($_SESSION["usuario"])){
    include("./../../backend/confiBD.php");
    include("./../../backend/login_image.php");
?> 

<!DOCTYPE html>
<html>
  <head>
    <title>Mis Postales</title>
    <link rel="stylesheet" href="./../css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./../css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body> 
    <ul class="dropdown-content" id="dropdown1">
      <li><a href="./amistad.html">Amistad / Amor</a><a href="./ambiente.html">Consciencia ambiental</a><a href="./invitaciones.html">Invitaciones</a><a href="./animales.html">Animales</a><a href="./festividades.html">Festividades</a><a href="./felicitacion.html">Felicitación</a></li>
    </ul>
    <ul class="sidenav" id="mobile-demo">
      <li><a href="./categorias.html">Categorías<i class="right material-icons">keyboard_arrow_down</i></a></li>
      <li><a href="./send.html">Enviar<i class="right material-icons">send</i></a></li>
      <li><a href="./login.html">Account <i class="right material-icons">account_circle</i></a></li>
    </ul>
    <div class="navbar-fixed" id="heading">
      <nav class="center right nav-extended grey darken-4 s8 m8 l8">
        <div class="nav-wrapper "><a class="center brand-logo white-text" href="./index.html"><img style="max-height: 64px;" src="./../images/logo1.png" alt=""></a><a class="sidenav-trigger" href="#" data-target="mobile-demo"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down" id="nav-mobile">
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Categorias<i class="small right material-icons">keyboard_arrow_down</i></a></li>
            <li><a href="./send.html">Enviar<i class="right material-icons">send</i></a></li>
            <li><a href="./login.html">Account<i class="right material-icons">account_circle</i></a></li>
          </ul>
        </div>
      </nav>
    </div>
    
    <div class="container">

      <div class="row" id="bodying_user">
        <div class="row">
          <div class="col 20 s12 l4 center"><img style="max-height: 200px;" src="<?php echo $foto;  ?>" class="responsive-img" alt="" id="profile"/></div>
          <div class="col s12 l8 names">
            <h2 class="left-align">Bienvenido</h3> 
            <h3 class="left-align"><?php echo "$infPersona[4] $infPersona[5] $infPersona[6]"; ?> </h2>
          </div>
          
          <div class="col 20 s12">
            <form id="datos" class="row">
              <div class="col s12">
                <h4 class="left" id="titlerow">Mis datos</h4>
              </div>
              <div class="col s12 center">
                <div class="row">
                  <div class="col input-field s4">
                    <i class="material-icons prefix">account_circle</i>
                    <input name="nombre" class="validate" disabled id="nombre" type="text" value="<?php echo "$infPersona[4]"; ?>"/>
                    <label for="nombre">Nombre</label>
                  </div>
                  <div class="col input-field s4">
                    <input name="apPaterno" class="validate" disabled id="apPaterno" type="text" value="<?php echo "$infPersona[5]"; ?>"/>
                    <label for="apPaterno">Apellido Paterno</label>
                  </div>
                  <div class="col input-field s4">
                    <input name="apMaterno" class="validate" disabled id="apMaterno" type="text" value="<?php echo "$infPersona[6]"; ?>"/>
                    <label for="apMaterno">Apellido Materno</label>
                  </div>
                </div>
              </div>
              <div class="col center input-field col s12 m12 l6">
                <i class="material-icons prefix">perm_contact_calendar</i>
                <input name="fecha" class="datepicker" disabled id="fecha" type="text" value="<?php echo $infPersona[2]; ?>"/>
                <label for="fecha">Fecha de nacimiento</label>
              </div>
              <div class="col center input-field col s12 m12 l6">
                <i class="material-icons prefix">email</i>
                <input name="email" disabled class="validate" id="email" type="email" value="<?php echo $infPersona[1]; ?>"/>
                <label for="email">Correo</label>
              </div>
              <div class="input-field col s12 m12 l6">
                <i class="material-icons prefix center">perm_identity</i>
                <select name="genero" id="genero" disabled>
                  <option value="" disabled selected="selected"><?php echo $genero; ?></option>
                  <option value="F">Femenino</option>
                  <option value="M">Masculino</option>
                </select>
                <label for="genero">Género</label>
              </div>
              <div class="input-field col s12 m12 l6">
                <i class="material-icons prefix center">perm_identity</i>
                <select name="genero" id="genero" disabled>
                  <option value="" disabled selected="selected"><?php echo $genero; ?></option>
                  <option value="F">Femenino</option>
                  <option value="M">Masculino</option>
                </select>
                <label for="genero">Género</label>
              </div>
              <div class="col s12 input-field center">
                <i class="material-icons prefix">vpn_key</i>
                <input id="password" type="password" name="password" disabled/>
                <label for="password">Contraseña</label>
              </div>
              <div class="col s12">
                <button id="guardarDatos" class="btn waves-effect right disabled" type="submit"><i class="material-icons left">create</i>Guardar datos</button>
              </div>
            </form>
          </div>
          <div class="row">
            <div class="col s12">
              <a id="editarDatos" class="btn btn-flat waves-effect right"><i class="material-icons left">create</i>Editar datos</a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="left col s12 m6 l6">
            <ul class="collapsible">
              <li>
                <div class="collapsible-header"><i class="material-icons">card_membership </i><a class="black-text">Enviadas</a><span class="new badge amber">4</span></div>
                <div class="collapsible-body">
                  <ul class="row center" id="titlerow">
                    <div class="center col s6 m8 l8">Historial</div>
                    <div class="center col s6 m4 l4">Fecha</div>
                  </ul>
                  <ul class="row center">
                    <div class="center col s6 m8 l8">Hola, mai friend<i class="tiny material-icons"><a class="grey-text" href="index.html/hola">&nbspnear_me</a></i></div>
                    <div class="center col s6 m4 l4">18/03/19</div>
                  </ul>
                  <ul class="row center">
                    <div class="center col s6 m8 l8">Querida Trixie<i class="tiny material-icons"><a class="grey-text" href="index.html/hola">&nbspnear_me</a></i></div>
                    <div class="center col s6 m4 l4">01/12/18</div>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
          <div class="col s12 m6 l6">
            <ul class="collapsible">
              <li>
                <div class="collapsible-header"><i class="material-icons">card_giftcard </i><a class="black-text">Recibidas</a><span class="new badge green">4</span></div>
                <div class="collapsible-body">
                  <ul class="row center" id="titlerow">
                    <div class="center col s6 m8 l8">Historial</div>
                    <div class="center col s6 m4 l4">Fecha</div>
                  </ul>
                  <ul class="row center">
                    <div class="center col s6 m8 l8">Hola, soy yo de nuevo<i class="tiny material-icons"><a class="grey-text" href="index.html/hola">&nbspnear_me</a></i></div>
                    <div class="center col s6 m4 l4">18/03/19</div>
                  </ul>
                  <ul class="row center">
                    <div class="center col s6 m8 l8">Que ondii<i class="tiny material-icons"><a class="grey-text" href="index.html/hola">&nbspnear_me</a></i></div>
                    <div class="center col s6 m4 l4">01/12/18</div>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>

    </div>

  </body>

  <footer class="page-footer fixed-container grey darken-4 s12 m12 l12">
    <div class="container">
      <div class="row">
        <div class="col 16 s12">
          <h5 class="white-text">Contenido</h5>
          <p class="grey-text text-lighten-4">Descubre el contenido de toda nuestra página.</p>
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="white-text">Links</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="./categorias.html">Categorías</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Contáctanos</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="center container">© 2019 Copyright Tecnologías para la Web, ESCOM IPN</div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./../js/materialize.min.js"></script>
    <script type="text/javascript" src="./../js/main.js"></script>
    <script type="text/javascript" src="./../js/account.js"></script>
  </footer>
</html>
<?php
    }else{
        header("location: ./index.php");
    }