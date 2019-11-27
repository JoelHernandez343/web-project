<?php
    //include("./confiBD.php");
    $postalesPopulares="";
    $sqlPostalesPopulares="SELECT * FROM postal ORDER BY likes DESC";
    $resultadoPopulares=mysqli_query($conexion,$sqlPostalesPopulares);

    
    /*while($infPersona = mysqli_fetch_row($resultadoPopulares)){
        $src = "$infPersona[7]\\$infPersona[1].JPG";
        
        $postalesPopulares = $postalesPopulares.'<br><img src="http://localhost/web_project/'.$src.'"/>';
        //echo "$infPersona[7]\\$infPersona[1].png<br>";
        //echo "$postalesPopulares[$i]";
    }
    //echo $postalesPopulares;

*/
    
    
?>