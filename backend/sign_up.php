<?php
    include("./confiBD.php");
    $db_table_name ="persona";
    //Creamos el registro
    $sub_name = utf8_decode($_POST['icon_prefix']);//nombre completo
    $sub_apPaterno = utf8_decode($_POST['icon_prefix_paterno']); //Cambiar el html
    $sub_apMaterno = utf8_decode($_POST['icon_prefix_materno']); //Cambiar el html 
    $sub_fecha = utf8_decode($_POST['fecha']);
    $sub_contrasena = utf8_decode($_POST['contrasena']);
    $sub_email = utf8_decode($_POST['icon_email']);
    $sub_genero = utf8_decode($_POST['icon_gen']);
    $resul=mysql_query("SELECT * FROM".$db_table_name."WHERE email= '".$subs_email."'",$conexion);
        if(mysql_num_rows($resul)>0)
        {
            echo "error";
        }
        else{
            $insert_value= 'INSERT INTO `'.$nombreBD. '`.`'.$db_table_name.'`(`idPersona`, `correo`,`fechaNacimiento`,`genero`,`contrasena`,`nombre`,`apPaterno`,`apMaterno`) VALUES ("' . $sub_email .'","' .$sub_contrasena. '","' .$sub_name. '","'.$sub_apPaterno.'","'.$sub_apMaterno.'")';
            mysql_select_db($conexion);
            $return_value=mysql_query($insert_value,$conexion);

            if(!$return_value)
                die('ERROR'.mysql_error());
            echo "Se logro bby";
            mysql_close($conexion);
        }
    ?>