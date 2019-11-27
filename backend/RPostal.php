<?php
include './confiBD.php';
$sql="SELECT * FROM administrador WHERE status ='1'";
$result=mysqli_query($conexion, $sql);
if(mysqli_num_rows($result)==0){
    header("Location: loginAdmin.php");
    exit();
}
?><!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Read One Record - PHP CRUD Tutorial</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
 
</head>
<body>
    <div class="container">
  
        <div class="page-header">
            <h1>Informaci&oacuten acerca de la postal</h1>
        </div>
         
        <?php
$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
 

 
try {
    $sql = "SELECT * FROM postal WHERE idPostal =".$id;
    //echo $sql;
    $result=mysqli_query($conexion, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_NUM);
 
    $idPostal = $row[0];
    $nombre = $row[1];
    $cate = $row[2];
    $likes = $row[3];
    $nEnvios = $row[6];
    $ruta = $row[7];
}
 
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>
 
<table class='table table-hover table-responsive table-bordered'>
    <tr>
        <td>Nombre asignado a la postal</td>
        <td><?php echo htmlspecialchars($nombre, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Categor&iacutea a la que pertenece</td>
        <td><?php echo htmlspecialchars($cate, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>N&uacutemero de likes recibidos</td>
        <td><?php echo htmlspecialchars($likes, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>N&uacutemero de veces que ha sido enviada</td>
        <td><?php echo htmlspecialchars($nEnvios, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Postal</td>
        <td><img src="<?php echo htmlspecialchars($ruta, ENT_QUOTES);  ?>" alt=""></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <a href='./perfilAdmin.php' class='btn btn-danger'>Regresar</a>
        </td>
    </tr>
</table>
 
    </div> 
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</body>
</html>