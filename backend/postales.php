<?php
    //include("./confiBD.php");
    $sqlPostalesPopulares="SELECT * FROM postal ORDER BY likes DESC";
    $resultadoPopulares=mysqli_query($conexion,$sqlPostalesPopulares);

    $infPersona = mysqli_fetch_row($resultadoPopulares);
   // echo "$infPersona[0]";
?>