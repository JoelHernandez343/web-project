<?php
    include("./configBD.php");

    $persona = $_SESSION["email"];

    $sqlInfAlumno = "SELECT * FROM persona WHERE correo = '$em'";
    $resInfAlumno = mysqli_query($conexion,$sqlInfAlumno);
    $infAlumno = mysqli_fetch_row($resInfAlumno);

    if(file_exists("./../fotos/$boleta.jpg")){
        $foto = "./../fotos/$boleta.jpg";
    }else{
        $foto = "./../fotos/$boleta.png";
    }
?>