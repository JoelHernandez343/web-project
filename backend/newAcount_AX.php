<?php
    include("./configBD.php");
    include("./getPosts.php");

    $contrasena = ($contrasena);//BASE SIN MD5
    $respAX = array();
    $sqlbb3 = "SELECT * FROM persona WHERE correo = '$email' AND contrasena = '$contrasena'";
    $sqlbb3 = mysqli_query($conexion,$sqlbb3);
    $infbb3 = mysqli_fetch_row($resbb3);
    if(mysqli_num_rows($resbb3) == 1){
        $respAX["val"] = 1;
        $respAX["msj"] = "<h5 class='center-align'>Bienvenido $infbb3[1] $infbb3[2] :)</h5>";
    }else{
        $respAX["val"] = 0;
        $respAX["msj"] = "Error";
    }
    echo json_encode($respAX);
?>