<?php
    include("./confiBD.php");
    $sql="SELECT * FROM administrador WHERE status ='1'";
    $result=mysqli_query($conexion, $sql);
    if(mysqli_num_rows($result)==0){
        header("Location: loginAdmin.php");
        exit();
    }
    if(isset($_POST['submit'])){
        $sql="UPDATE administrador
        SET status = '0'
        WHERE usuarioAdmin = 'Admin'";
        $result=mysqli_query($conexion, $sql);
        header("Location: loginAdmin.php");
        exit();
    }
 

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Administrador</title>
<link rel="stylesheet" href="./../frontend/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="./../frontend/css/main.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name='viewport' content='width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no'/>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="./../materializeV1/css/materialize.min.css" rel="stylesheet">
<link hrefc="./../js/validetta/dist/validetta.min.css" rel="stylesheet">
<link href="./../js/confirm/dist/jquery-confirm.min.css" rel="stylesheet">
<link href="./../css/misEstilos.css" rel="stylesheet">
<script src="./../jquery/jquery-3.4.1.min.js"></script>
<script  src="./../materializeV1/js/materialize.min.js"></script>
<script src="./../js/validetta/dist/validetta.min.js"></script>
<script src="./../js/validetta/localization/validettaLang-es-ES.js"></script>
<script src="./../js/confirm/dist/jquery-confirm.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<div class="navbar-fixed" id="heading">
          <nav class="center right nav-extended grey darken-4 s8 m8 l8">
            <div class="nav-wrapper "><a class="center brand-logo white-text" href="./../frontend/views/index.html"><img style="max-height: 64px;" src="./../frontend/images/logo1.png" alt=""></a><a class="sidenav-trigger" href="#" data-target="mobile-demo"><i class="material-icons">menu</i></a>
              <ul class="right hide-on-med-and-down" id="nav-mobile">
                <li style="font-size:30px">Perfil de Administrador &nbsp &nbsp</li>
              </ul>
            </div>
          </nav>
        </div>
    <main>
    <div class="container">
  
        <div class="page-header">
            <h1>Postales  existentes</h1>
        </div>
     
        <?php 
        $action = isset($_GET['action']) ? $_GET['action'] : "";
 
        // if it was redirected from delete.php
        if($action=='deleted'){
            echo "<div class='alert alert-success'>La postal fue eliminada.</div>";
        }
 
// select all data
$query = "SELECT nombre, cate, likes, nEnvios, idPostal, ruta FROM postal";
$resulta=mysqli_query($conexion, $query);
// this is how to get number of rows returned
$num = mysqli_num_rows($resulta);
 
// link to create record form
echo "<a href='./CPostal.php' class='btn btn-primary m-b-1em'>Subir una nueva postal</a><br>";
 
//check if more than 0 record found
if($num>0){
 
  echo "<table class='table table-hover table-responsive table-bordered'>";//start table
 
  //creating our table heading
  echo "<br><tr>";
      echo "<th>Nombre</th>";
      echo "<th>Categor&iacutea</th>";
      echo "<th>N&uacutemero de likes</th>";
      echo "<th>N&uacutemero env&iacuteos</th>";
      echo "<th>Opciones</th>";
  echo "</tr>";

while ($row = mysqli_fetch_row($resulta)){
  echo "<tr>";
      echo "<td>{$row[0]}</td>";
      echo "<td>{$row[1]}</td>";
      echo "<td>{$row[2]}</td>";
      echo "<td>{$row[3]}</td>";
      echo "<td>";
          echo "<a href='./RPostal.php?id={$row[4]}' class='btn btn-info m-r-1em'>Visualizar</a> &nbsp &nbsp";
          echo "<a href='update.php?id={$row[4]}' class='btn btn-primary m-r-1em'>Modificar</a> &nbsp &nbsp";
          echo "<a href='#' onclick='delete_user({$row[4]});'  class='btn btn-danger'>Eliminar</a>";
      echo "</td>";
  echo "</tr>";
}

echo "</table>";
     
}
 
else{
    echo "<div class='alert alert-danger'>No existen postales</div>";
}
        ?>
         
    </div>
    <script type='text/javascript'>
    // confirm record deletion
    function delete_user( id ){
        
        var answer = confirm('¿Estas seguro que quieres eliminar permanentemente esta postal?');
        if (answer){
            // if user clicked ok, 
            // pass the id to delete.php and execute the delete query
            window.location = './DPostal.php?id=' + id;
        } 
    }
    </script>
        <div class="container">
            <div class="row">
                <div class="col s12 input-field">
                <a href="./estadisticas.php" class="orange-text">Ver estadísticas</a>
                </div>
            </div>
            <form action="" method="POST">
            <div class="row right">
                <button class="orange-text" name="submit">Cerrar session</button>
            </div>
            </form>
        </div>
    </main>
    
</body>
<footer>
      <div class="footer-copyright">
      <div class="center container">© 2019 Copyright Tecnologías para la Web, ESCOM IPN</div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./../frontend/js/materialize.min.js"></script>
    <script type="text/javascript" src="./../frontend/js/main.js"></script>
      </footer>
</html>