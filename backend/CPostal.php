<?php
    include './confiBD.php';
    $sql="SELECT * FROM administrador WHERE status ='1'";
    $result=mysqli_query($conexion, $sql);
    if(mysqli_num_rows($result)==0){
        header("Location: loginAdmin.php");
        exit();
    }
if($_POST){

    if(isset($_POST['name'])){
        $name=$_POST['name'];
        $cate=$_POST['categoria'];
        $postal=$_POST['postal'];
        
        $sql ="INSERT INTO `postal` (`nombre`, `cate`, `likes`, `estado`, `idEnvio`, `nEnvios`, `ruta`)
        VALUES ('".$name."', '".$cate."', '0', '0', '0', '0',
        'http://localhost/git/web_project/web_project/Postales/".$cate."/".$name.".jpg')";
        echo $sql;
        $result=mysqli_query($conexion, $sql);
        if (mysqli_query($conexion, $sql)) {
            echo "New record created successfully";
        } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }
        
        }
        mysqli_close($conexion);
    }
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Subir una postal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1>Nueva postal</h1>
        </div>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">>
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Nombre</td>
            <td><input type='text' name='name' class='form-control' /></td>
        </tr>
        <tr>
            <td>Categor&iacutea</td>
            <td><select name="categoria" class='form-control'>
            <option value="Animales">Animales</option>
            <option value="Conciencia_Ambiental">Conciencia Ambiental</option>
            <option value="amor_amistad">Amor o Amistad</option>
            <option value="Felicitacion">Felicitaciones</option>
            <option value="Festividades">Festividades</option>
            <option value="Invitacion">Invitaciones</option>
            </select>
            </td>
        </tr>
        <tr>
            <td>Subir Postal</td>
            <td><input type='file' name='postal' class='form-control'/></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='./perfilAdmin.php' class='btn btn-danger'>Back to read products</a>
            </td>
        </tr>
    </table>
</form>
          
    </div> 
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</body>
</html>