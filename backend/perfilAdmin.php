<?php
    include("./confiBD.php");
    $sql="SELECT * FROM administrador WHERE status ='1'";
    $result=mysqli_query($conexion, $sql);
    if(mysqli_num_rows($result)==0){
        header("Location: loginAdmin.php");
        exit();
    }
    if(isset($_POST['submit'])){
        $sql="UPDATE administrador
        SET status = '0'
        WHERE usuarioAdmin = 'Admin'";
        $result=mysqli_query($conexion, $sql);
        header("Location: loginAdmin.php");
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Examples</title>
<meta name='viewport' content='width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no'/>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="./../materializeV1/css/materialize.min.css" rel="stylesheet">
<link href="./../js/validetta/dist/validetta.min.css" rel="stylesheet">
<link href="./../js/confirm/dist/jquery-confirm.min.css" rel="stylesheet">
<link href="./../css/misEstilos.css" rel="stylesheet">
<script src="./../jquery/jquery-3.4.1.min.js"></script>
<script  src="./../materializeV1/js/materialize.min.js"></script>
<script src="./../js/validetta/dist/validetta.min.js"></script>
<script src="./../js/validetta/localization/validettaLang-es-ES.js"></script>
<script src="./../js/confirm/dist/jquery-confirm.min.js"></script>

</head>
<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="col s12 input-field">
                <a href="./estadisticas.php" class="orange-text">Ver estadísticas</a>
                </div>
            </div>
            <form action="" method="POST">
            <div class="row right">
                <button class="orange-text" name="submit">Cerrar session</button>
            </div>
            </form>
        </div>
    </main>
</body>
</html>