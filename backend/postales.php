<?php
    include("./confiBD.php");
    $sqlPostalesPopulares="SELECT * FROM postal ORDER BY likes DESC";
    $resultadoPopulares=mysqli_query($conexion,$sqlPostalesPopulares);

    while($infPersona = mysqli_fetch_row($resultadoPopulares)){
        echo "$infPersona[7]\\$infPersona[1].png<br>";
    }
    
?>