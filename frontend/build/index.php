<?php
  include("./../../backend/confiBD.php");
  include("./../../backend/postales.php");
?>
<!DOCTYPE html>
<html lang="es">
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
        <div class="nav-wrapper "><a class="center brand-logo white-text" href="#"><img style="max-height: 64px;" src="./../images/logo1.png" alt=""></a><a class="sidenav-trigger" href="#" data-target="mobile-demo"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down" id="nav-mobile">
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Categorias<i class="small right material-icons">keyboard_arrow_down</i></a></li>
            <li><a href="./send.php">Enviar<i class="right material-icons">send</i></a></li>
            <li><a href="./login.html">Account<i class="right material-icons">account_circle</i></a></li>
          </ul>
        </div>
      </nav>
    </div>
    <ul class="row s12" id="bodying">
      <div class="carousel carousel-slider center">
        <div class="carousel-item" href="#"><img src="./../images/header1.jpg"/>
          <h2>Welcome</h2>
          <p class="black-text">Encontrarás postales de todo tipo, para toda ocasión</p>
          <div class="carousel-fixed-item center"><a class="btn waves-effect white grey-text darken-text-2" href="./categorias.html">Ver todo</a></div>
        </div>
        <div class="carousel-item" href="#"><img src="./../images/header2.jpg"/>
          <h2>Amor/amistad</h2>
          <p class="black-text">Postales acerca de amor, amistad, sinceridad, afecto, amor, que puedas demostrar hacia una persona cercana a ti.</p>
          <div class="carousel-fixed-item center"><a class="btn waves-effect white grey-text darken-text-2" href="./amistad.html">Mirar</a></div>
        </div>
        <div class="carousel-item" href="#"><img src="./../images/header3.jpg"/>
          <h2>Conciencia Ambiental</h2>
          <p class="black-text">Postales para promover el amor por lo que nos rodea, cuidar las vaquitas marinas y los bosques.</p>
          <div class="carousel-fixed-item center"><a class="btn waves-effect white grey-text darken-text-2" href="./ambiente.html">Mirar</a></div>
        </div>
        <div class="carousel-item" href="#"><img src="./../images/header4.jpg"/>
          <h2>Invitaciones</h2>
          <p class="black-text">De cumpleaños, graduación, Boda, Día de las madres o solo por festejar</p>
          <div class="carousel-fixed-item center"><a class="btn waves-effect white grey-text darken-text-2" href="./invitaciones.html">Mirar</a></div>
        </div>
        <div class="carousel-item" href="#"><img src="./../images/header5.jpg"/>
          <h2>Animales</h2>
          <p class="black-text">Cerditos, pájaros, cobayas, ratones, ranas, perros, gatos, caballos, leones, llamas, alpacas, serpientes, mariposas.</p>
          <div class="carousel-fixed-item center"><a class="btn waves-effect white grey-text darken-text-2" href="./animales.html">Mirar</a></div>
        </div>
        <div class="carousel-item" href="#"><img src="./../images/header6.jpg"/>
          <h2>Festividades</h2>
          <p class="black-text">Navidad, Año Nuevo, Día de muertos, 10 de mayo, Primavera, Verano, Otoño, Invierno, Día del amor.</p>
          <div class="carousel-fixed-item center"><a class="btn waves-effect white grey-text darken-text-2" href="./festividades.html">Mirar</a></div>
        </div>
        <div class="carousel-item" href="#"><img src="./../images/header7.jpg"/>
          <h2>Felicitación</h2>
          <p class="black-text">Feliz cumpleaños, Feliz aniversario, Feliz graduación, Feliz Día del Ingeniero.</p>
          <div class="carousel-fixed-item center"><a class="btn waves-effect white grey-text darken-text-2" href="./felicitacion.html">Mirar</a></div>
        </div>
      </div>
      <li class="center black-text s12 m12 l12">
        <h4 class="brand-logo" href="#!">Más populares<i class="small material-icons">&nbspgrade</i></h4>
      </li>
      <div class="row">

        <?php
        $i=0;
          while ($infPersona = mysqli_fetch_row($resultadoPopulares)){
            if($i == 4) break;
            $src = "http://localhost/web_project/"."$infPersona[7]\\$infPersona[1].JPG";
             echo "$infPersona[0]";
        ?>
            
            <div class="col s12 m4 l3">
          <div class="card" href="#">
            <div class="card-image"><img src="<?php echo $src ?>"/><a class="card-title">undefined</a></div>
            <div class="card-content">
              <p>undefined</p>
            </div>
            <div class="card-action"> <a class="right btn waves-effect white red-text red lighten-4-text-2" href="undefined"><i class="tiny material-icons" href="#actionfav">favorite</i></a><a class="right btn modal-trigger waves-effect white grey-text red lighten-4-text-2" href="#modal<?php echo $i?>"><i class="tiny material-icons" href="#">remove_red_eye</i></a></div>
          </div>
        </div>
        <div class="modal modal-fixed-footer" id="modal<?php echo $i?>">
          <div class="modal-content">
            <div class="col s12 m12 l12">
              <div class="card" href="#">
                <div class="card-image"><img src="<?php echo $src?>"/><a class="card-title">undefined</a></div>
                <div class="card-content">
                  <p>undefined</p>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
          <?php
            echo "<a class='modal-close waves-effect waves-green btn-flat' href='./send.php?id={$infPersona[0]}'>Send</a>";
            ?>
          </div>
        </div>
            
            <?php 
          $i+=1;}
          ?>
      </div>
      <p></p>
      <ul class="center black-text s12 m12 l12">
        <h4 class="brand-logo" href="#!">Más enviadas<i class="small material-icons">&nbspsend</i></h4>
      </ul>
      <div class="row">
        <div class="col s12 m4 l3">
          <div class="card" href="#">
            <div class="card-image"><img src="./../images/example.jpg"/><a class="card-title">undefined</a></div>
            <div class="card-content">
              <p>undefined</p>
            </div>
            <div class="card-action"> <a class="right btn waves-effect white red-text red lighten-4-text-2" href="undefined"><i class="tiny material-icons" href="#actionfav">favorite</i></a><a class="right btn modal-trigger waves-effect white grey-text red lighten-4-text-2" href="#modal1"><i class="tiny material-icons" href="#">remove_red_eye</i></a></div>
          </div>
        </div>
        <div class="modal modal-fixed-footer" id="modal1">
          <div class="modal-content">
            <div class="col s12 m12 l12">
              <div class="card" href="#">
                <div class="card-image"><img src="./../images/example.jpg"/><a class="card-title">undefined</a></div>
                <div class="card-content">
                  <p>undefined</p>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer"><a class="modal-close waves-effect waves-green btn-flat" href="./send.php">Send</a></div>
        </div>
        <div class="col s12 m4 l3">
          <div class="card" href="#">
            <div class="card-image"><img src="./../images/example.jpg"/><a class="card-title">undefined</a></div>
            <div class="card-content">
              <p>undefined</p>
            </div>
            <div class="card-action"> <a class="right btn waves-effect white red-text red lighten-4-text-2" href="undefined"><i class="tiny material-icons" href="#actionfav">favorite</i></a><a class="right btn modal-trigger waves-effect white grey-text red lighten-4-text-2" href="#modal1"><i class="tiny material-icons" href="#">remove_red_eye</i></a></div>
          </div>
        </div>
        <div class="modal modal-fixed-footer" id="modal1">
          <div class="modal-content">
            <div class="col s12 m12 l12">
              <div class="card" href="#">
                <div class="card-image"><img src="./../images/example.jpg"/><a class="card-title">undefined</a></div>
                <div class="card-content">
                  <p>undefined</p>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer"><a class="modal-close waves-effect waves-green btn-flat" href="./send.php">Send</a></div>
        </div>
        <div class="col s12 m4 l3">
          <div class="card" href="#">
            <div class="card-image"><img src="./../images/example.jpg"/><a class="card-title">undefined</a></div>
            <div class="card-content">
              <p>undefined</p>
            </div>
            <div class="card-action"> <a class="right btn waves-effect white red-text red lighten-4-text-2" href="undefined"><i class="tiny material-icons" href="#actionfav">favorite</i></a><a class="right btn modal-trigger waves-effect white grey-text red lighten-4-text-2" href="#modal1"><i class="tiny material-icons" href="#">remove_red_eye</i></a></div>
          </div>
        </div>
        <div class="modal modal-fixed-footer" id="modal1">
          <div class="modal-content">
            <div class="col s12 m12 l12">
              <div class="card" href="#">
                <div class="card-image"><img src="./../images/example.jpg"/><a class="card-title">undefined</a></div>
                <div class="card-content">
                  <p>undefined</p>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer"><a class="modal-close waves-effect waves-green btn-flat" href="./send.php">Send</a></div>
        </div>
        <div class="col s12 m4 l3">
          <div class="card" href="#">
            <div class="card-image"><img src="./../images/example.jpg"/><a class="card-title">undefined</a></div>
            <div class="card-content">
              <p>undefined</p>
            </div>
            <div class="card-action"> <a class="right btn waves-effect white red-text red lighten-4-text-2" href="undefined"><i class="tiny material-icons" href="#actionfav">favorite</i></a><a class="right btn modal-trigger waves-effect white grey-text red lighten-4-text-2" href="#modal1"><i class="tiny material-icons" href="#">remove_red_eye</i></a></div>
          </div>
        </div>
        <div class="modal modal-fixed-footer" id="modal1">
          <div class="modal-content">
            <div class="col s12 m12 l12">
              <div class="card" href="#">
                <div class="card-image"><img src="./../images/example.jpg"/><a class="card-title">undefined</a></div>
                <div class="card-content">
                  <p>undefined</p>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer"><a class="modal-close waves-effect waves-green btn-flat" href="./send.php">Send</a></div>
        </div>
      </div>


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
</html>