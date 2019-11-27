<?php
  session_start(); 
  include("./confiBD.php");
  //echo "las";
  $ansajax = array();
  $ansajax['status'] = -1;
      $ansajax['message'] = "declaracion previa";

  if(isset($_POST['old-email'])){
    $correo = $_POST['old-email'];
    $pass = $_POST['password'];
    $sql = "SELECT idPersona FROM persona WHERE correo='".$correo."' AND contrasena='".$pass."'";

    $result = mysqli_query($conexion, $sql);

    if(mysqli_num_rows($result) == 1){
      //echo "asdk";
      // $_SESSION["usuario"]=$_POST['email'];
      $ansajax['status'] = 1;
      $ansajax['message'] = "Ok, DATOS ACTULIZADOS CORRECTAMENTE";

      if($correo == $_POST['email']){
      $fecha=$_POST['fecha'];
      $edad =CalculaEdad($fecha);
      function CalculaEdad( $fecha ) {
        list($Y,$m,$d) = explode("-",$fecha);
        return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
        }
      $sql = "UPDATE persona SET fechaNacimiento = ".$_POST['fecha'].",nombre=".$_POST['nombre'].",apPaterno=".$_POST['apPaterno'].",apMaterno=".$_POST['apMaterno'].",edad=$edad,genero=".$_POST['genero']." WHERE correo=$correo";
      }



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