<?php
    include("./confiBD.php");
    if(isset($_POST['usuario'])){
        $uname=$_POST['usuario'];
        $pass=$_POST['contrasena'];
        $sql="SELECT * FROM administrador WHERE usuarioAdmin='".$uname."' AND contrasena='".$pass."'";
        //echo "SELECT * FROM administrador WHERE usuarioAdmin='".$uname."' AND contrasena='".$pass."'" ;
        $result=mysqli_query($conexion, $sql);

        if(mysqli_num_rows($result)==1){
            $sql="UPDATE administrador
            SET status = '1'
            WHERE usuarioAdmin = '".$uname."'";
            mysqli_query($conexion, $sql);
            header("Location: perfilAdmin.php");
            exit();
        }
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Mis Postales</title>
    <link rel="stylesheet" href="./../frontend/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./../frontend/css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body> 
    <ul class="dropdown-content" id="dropdown1">
      <li><a href="./../frontend/views/amistad.html">Amistad / Amor</a><a href="./../frontend/views/ambiente.html">Consciencia ambiental</a><a href="./../frontend/views/invitaciones.html">Invitaciones</a><a href="./../frontend/views/animales.html">Animales</a><a href="./../frontend/views/festividades.html">Festividades</a><a href="./../frontend/views/felicitacion.html">Felicitación</a></li>
    </ul>
    <ul class="sidenav" id="mobile-demo">
      <li><a href="./../frontend/views/categorias.html">Categorías<i class="right material-icons">keyboard_arrow_down</i></a></li>
      <li><a href="./../frontend/views/send.html">Enviar<i class="right material-icons">send</i></a></li>
      <li><a href="./../frontend/views/login.html">Account <i class="right material-icons">account_circle</i></a></li>
    </ul>
    <div class="navbar-fixed" id="heading">
      <nav class="center right nav-extended grey darken-4 s8 m8 l8">
        <div class="nav-wrapper "><a class="center brand-logo white-text" href="./../frontend/views/index.html"><img style="max-height: 64px;" src="./../frontend/images/logo1.png" alt=""></a><a class="sidenav-trigger" href="#" data-target="mobile-demo"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down" id="nav-mobile">
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Categorias<i class="small right material-icons">keyboard_arrow_down</i></a></li>
            <li><a href="./../frontend/views/send.html">Enviar<i class="right material-icons">send</i></a></li>
            <li><a href="./../frontend/views/index.html">Account<i class="right material-icons">account_circle</i></a></li>
          </ul>
        </div>
      </nav>
    </div>
    <div>
      <ul class="row center s12 m12 l12">
        <h2 id="titleLog">Ingresar a perfil de administrador</h2>
        <p>Entra a tu cuenta de administrador.</p>
        <form action="#" method="POST">
        <div class="left col s12 m3 l4 blue-text accent-4"></div>
        <div class="center col s12 m6 l4 blue-text accent-4">
          <div class="center input-field col s12 m12 l12"><i class="material-icons prefix grey-text">email</i>
            <input class="validate" id="icon_email" type="text" name="usuario"/>
            <label for="icon_email">Usuario</label><span class="helper-text" data-error="Incorrecto, corrige tus datos" data-success="">Usuario de administrador</span>
            </div>
            <div class="center input-field col s12 m12 l12"><i class="material-icons prefix amber-text">vpn_key</i>
            <input class="validate" id="contra" type="password" name="contrasena"/>
            <label for="contra">Contraseña</label><span class="helper-text" data-error="Incorrecto, corrige tus datos" data-success="">Ingresa tu contraseña</span>
          </div>
          <input type="submit" class="center btn red accent-4"><a  class="white-text" >Entrar<i class="right material-icons">account_balance_wallet</i></a></input>
        </div>
        </form>
        <div class="right col s12 m3 l4 blue-text accent-4"></div>
      </ul>
    </div>
    <div class="modal-footer"></div>
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
            <li><a class="grey-text text-lighten-3" href="./../frontend/views/categorias.html">Categorías</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Contáctanos</a></li>
            <li><a class="grey-text text-lighten-3" href="./loginAdmin.php">Administradores</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="center container">© 2019 Copyright Tecnologías para la Web, ESCOM IPN</div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./../frontend/js/materialize.min.js"></script>
    <script type="text/javascript" src="./../frontend/js/main.js"></script>
  </footer>
</html>