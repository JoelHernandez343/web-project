<?php
    include("./phpMailer5226/PHPMailerAutoload.php");
    include("./passGmail.php");
    include("./confiBD.php");
    //$idEnvio lo recibirá
    //$idEnvio=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
    $idEnvio = 1;
    $sql="SELECT postal.idPostal, postal.ruta, envios.remitente, envios.destinatario, envios.mensaje ,envios.fechaTiempo, persona.nombre
    FROM postal, envios, persona
    WHERE postal.idPostal = envios.idPostal 
    AND envios.idEnvio = '".$idEnvio."'";
    $result=mysqli_query($conexion, $sql);
    $row = $result->fetch_array(MYSQLI_NUM);


    //$sql = "SELECT * FROM alumno WHERE boleta = '2019630200'";
    //$res = mysqli_query($conexion,$sql);
   // $inf = mysqli_fetch_row($res);


    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                   // Enable verbose debug output
        $mail->isSMTP();                                                // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                     // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = $correo;                          // SMTP username
        $mail->Password = $contrasena;                    // SMTP password
        $mail->SMTPSecure = 'tls';                              // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                          // TCP port to connect to
    
        //Recipients
        $mail->setFrom("pipostales@gmail.com", "PiPostales");
        $mail->addAddress("$row[3] "," $row[6]");     // Add a recipient
        //$mail->addAddress("jaortizr@gmail.com","JAOR");     // Add a recipient
            
        //Attachments
        //$mail->addAttachment("./../loginV3v/fotos/$inf[0].jpg", "Foto Estudiante");    // Optional name
    
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'PiPostales';
        $mail->Body    = "<p>Tienes una postal de parte de <strong>".$row[2]."</strong> la cual puedes ver entrando al siguiente link: <span style='color:#069;'>ESCOM</span>";
        $mail->AltBody = 'Texto alternativo del correo en caso de no soporte para HTML';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
?>