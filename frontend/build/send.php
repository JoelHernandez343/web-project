<?php
    session_start();
    $ruta = './../../';
    if(isset($_SESSION["usuario"])){
      include("./../../backend/confiBD.php");
      include("./../../backend/login_image.php");
      $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
      $sql = "SELECT * FROM postal WHERE idPostal =".$id;
      //echo $sql;
      $result=mysqli_query($conexion, $sql);
      $row = mysqli_fetch_array($result, MYSQLI_NUM);
      $ruta = $ruta.$row[7].'/'.$row[1];
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
      <li><a href="./send.php">Enviar<i class="right material-icons">send</i></a></li>
      <li><a href="./login.html">Account <i class="right material-icons">account_circle</i></a></li>
    </ul>
    <div class="navbar-fixed" id="heading">
      <nav class="center right nav-extended grey darken-4 s8 m8 l8">
        <div class="nav-wrapper "><a class="center brand-logo white-text" href="./index.php"><img style="max-height: 64px;" src="./../images/logo1.png" alt=""></a><a class="sidenav-trigger" href="#" data-target="mobile-demo"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down" id="nav-mobile">
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Categorias<i class="small right material-icons">keyboard_arrow_down</i></a></li>
            <li><a href="./send.php">Enviar<i class="right material-icons">send</i></a></li>
            <li><a href="./login.html">Account<i class="right material-icons">account_circle</i></a></li>
          </ul>
        </div>
      </nav>
    </div>
    <ul class="row center s12 m12 l12">
      <h2 id="titleSignPostal">Enviar Postal</h2>
      <p>Envía una postal a quien tu quieras (con e-mail).</p>
    </ul>
    <ul class="row center" id="bodying">
      <div class="right col s12 m6 l6"><img src="
      <?php echo $ruta;?>
      " style="width:100%;" id="anouncement"></div>
      <div class="left col s12 m6 l6 blue-text accent-4">
        <div class="center input-field s12"><i class="amber-text material-icons prefix">email</i>
          <input class="validate" disabled id="my_email" type="email">
          <label for="my_email">From</label><span class="helper-text">Tu correo</span>
        </div>
        <div class="center input-field s12"><i class="green-text material-icons prefix">email</i>
          <input class="validate" id="to_email" type="email">
          <label for="to_email">To</label><span class="helper-text center" data-error="Ingresa un correo válido" data-success="Correcto">Ingresa el correo destino</span>
        </div>
        <div class="center input-field col s12 m12 l12">
          <textarea class="materialize-textarea" id="message"></textarea>
          <label for="message">Escribe una dedicatoria</label><span class="helper-text">(opcional)</span>
        </div>
      </div>
      <div class="center btn amber accent-4"><a class="white-text" href="./send.php">Enviar<i class="right material-icons">send</i></a></div>
    </ul>
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
  </footer>
</html><?php
    }else{
        header("location: ./index.php");
    }