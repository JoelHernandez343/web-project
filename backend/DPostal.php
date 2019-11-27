<?php
include './confiBD.php';
$sql="SELECT * FROM administrador WHERE status ='1'";
    $result=mysqli_query($conexion, $sql);
    if(mysqli_num_rows($result)==0){
        header("Location: loginAdmin.php");
        exit();
    }
try {
    $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
    $sql = "DELETE FROM postal WHERE idPostal = ".$id;
    
     
    if($result=mysqli_query($conexion, $sql)){
        header('Location: ./perfilAdmin.php?action=deleted');
    }else{
        die('Unable to delete record.');
    }
}
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>