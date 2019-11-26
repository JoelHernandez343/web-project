<?php
    session_start(); 
    include("./confiBD.php");
    if(isset($_POST['email'])){
        $correo=$_POST['email'];
        $pass=$_POST['password'];
        $sql="SELECT idPersona FROM persona WHERE correo='".$correo."' AND contrasena='".$pass."'";
        //echo "SELECT * FROM administrador WHERE correo='".$correo."' AND contrasena='".$pass."'" ;
        $result=mysqli_query($conexion, $sql);
        while($row = mysqli_fetch_array($result))
        {
          $id=$row["idPersona"];
        }
        if(mysqli_num_rows($result)==1){
          $_SESSION["usuario"]=$_POST['email'];
          header("Location: http://localhost/web_project/frontend/build/account.php");
        }
    }
    echo "No estas en esta wea mijito";
?>