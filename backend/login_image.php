<?php
    include("./configBD.php");

    $persona = $_SESSION["email"];
    //echo "SELECT * FROM persona WHERE correo = '$correo'";
    $sqlInfPersona = "SELECT * FROM persona WHERE correo = '$correo'";
    //echo "$sqlInfPersona";
    $resInfPersona = mysqli_query($conexion,$sqlInfPersona);
    $infPersona = mysqli_fetch_row($resInfPersona);
?>