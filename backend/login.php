<?php 
    include("./confiBD.php");
    if(isset($_POST['email'])){
        $correo=$_POST['email'];
        $pass=$_POST['password'];
        $sql="SELECT * FROM persona WHERE correo='".$correo."' AND contrasena='".$pass."'";
        //echo "SELECT * FROM administrador WHERE usuarioAdmin='".$uname."' AND contrasena='".$pass."'" ;
        $result=mysqli_query($conexion, $sql);

        if(mysqli_num_rows($result)==1){
          header("Location: http://localhost/web_project/frontend/build/account.php");
        }
    }
    echo "No estas en esta wea mijito";
?>