<?php
    //echo "jajsjas";
    $correo = $_SESSION["usuario"];
    //echo "SELECT * FROM persona WHERE correo = '$correo'";
    $sqlIdPersona = "SELECT idPersona FROM persona WHERE correo = '$correo'";
    $sqlInfPersona = "SELECT * FROM persona WHERE correo = '$correo'";
    $resInfPersona = mysqli_query($conexion,$sqlInfPersona);
    $resIdPersona = mysqli_query($conexion,$sqlIdPersona);
    $infPersona = mysqli_fetch_row($resInfPersona);
    $idPersona = $infPersona[0];

    $foto ="./../../fotosPerfiles/$idPersona.jpg";

    $genero=$infPersona[8];
    if($genero == 0)
    {
        $genero = "Masculino";
    }else {
        $genero = "Femenino";
    }

?>