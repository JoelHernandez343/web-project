<?php
  session_start(); 
  include("./confiBD.php");

  $ansajax = array();

  if(isset($_POST['old-email'])){
    $correo = $_POST['old-email'];
    $pass = $_POST['password'];
    $sql = "SELECT idPersona FROM persona WHERE correo='".$correo."' AND contrasena='".$pass."'";

    $result = mysqli_query($conexion, $sql);

    if(mysqli_num_rows($result) == 1){
      // $_SESSION["usuario"]=$_POST['email'];
      $ansajax['status'] = 1;
      $ansajax['message'] = "Ok, contraseña correcta";
    } else {
      $ansajax['status'] = 0;
      $ansajax['message'] = "Contraseña no coincide";
    }
  }

  else {
    $ansajax['status'] = -1;
    $ansajax['message'] = "FATAL ERROR: wrong fetch";
  }

  echo json_encode($ansajax);
?>