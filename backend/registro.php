<?php 
    include("./confiBD.php");


    $respAX = array();
    $password = $_POST['password'];
    $correo = $_POST['email'];
    $fnac = $_POST['fecha'];
    $nombre = $_POST['nombre'];
    $apMaterno = $_POST['apellidoMaterno'];
    $apPaterno = $_POST['apellidoPaterno'];
    $genero = $_POST['genero'];
    $edad = CalculaEdad($fnac);
    //Funcion para calcular la edad como un crack
    function CalculaEdad( $fecha ) {
        list($Y,$m,$d) = explode("-",$fecha);
        return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
    }
    //echo "$edad";
    $sqlCheck = "SELECT correo FROM persona WHERE correo = '$correo'";
    $resCheck = mysqli_query($conexion,$sqlCheck);
    $filasCheck = mysqli_affected_rows($conexion);
    if  ($filasCheck !== 1)
    {
        $sqlRegistro = "INSERT INTO persona(correo, fechaNacimiento, contrasena, nombre, apPaterno, apMaterno, edad, genero) VALUES('$correo', '$fnac','$password','$nombre','$apPaterno','$apMaterno','$edad','$genero')";

        $resRegistro = mysqli_query($conexion,$sqlRegistro);
        $filasAfectadasRegistro = mysqli_affected_rows($conexion);

        if ($filasAfectadasRegistro == 1){

            $sql = "SELECT idPersona FROM persona WHERE correo = '$correo'";
            $res = mysqli_query($conexion, $sql);
            $row = mysqli_fetch_row($res);
            $id = $row[0];

            $respAX["val"] = 1;
            $respAX["msj"] = "Se registraron correctamente sus datos\n";
            $dirFoto = "./../fotosPerfiles/";
            $archFoto = $dirFoto.basename($_FILES["image"]["name"]);
            $extFoto = pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION);
            $destFoto = $dirFoto.$id.".".$extFoto;

        //echo $destFoto;
        //echo "\n";
            if(move_uploaded_file($_FILES["image"]["tmp_name"], $destFoto)){
                $respAX["msj"] .= "La foto se guardo; correctamente";
            }else{
                $respAX["msj"] .= "No se pudo guardar la foto.";
            }
            echo json_encode($respAX);
        } else {
            echo "No se pudo";
            }
    }else {
        echo "ya existe el usuario";
    }
    // echo $_POST['nombre'];
    // echo "\n";
    // echo $_POST['password'];
    // echo "\n";
    // echo $_POST['apellidoMaterno'];
    // echo "\n";
    // echo $_POST['apellidoPaterno'];
    // echo "\n";
    // echo $_POST['fecha'];
    // echo "\n";
    // echo $_POST['email'];
    // echo "\n";
    // echo $_POST['genero'];
    // echo "\n";
    // echo $_FILES['image']['name'];
    // echo "\n";


?>