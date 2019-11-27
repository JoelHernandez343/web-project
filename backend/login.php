<?php
    session_start(); 
    include("./confiBD.php");

    $resp = array();

    if(isset($_POST['email'])){
        $correo=$_POST['email'];
        $pass=$_POST['password'];
        $sql="SELECT idPersona FROM persona WHERE correo='".$correo."' AND contrasena='".$pass."'";
        $result=mysqli_query($conexion, $sql);
        if(mysqli_num_rows($result)==1){
          $_SESSION["usuario"]=$_POST['email'];

          $resp['status'] = 1;
          $resp['message'] = 'Usuario correcto';
          $resp['site'] = './../../frontend/build/account.php';
          
        } else {
          $resp['status'] = 0;
          $resp['message'] = 'Usuario o contraseña incorrecto';
        }
    }
    else {
      
      $resp['status'] = -1;
      $resp['message'] = 'Email vacío';
    }
    

    echo json_encode($resp);
?>