<?php
    include("./confiBD.php");
    $idEnvio = 1;
    //$idEnvio lo recibirá 
    //$idEnnvio=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
    $sql="SELECT postal.idPostal, postal.ruta, envios.remitente, envios.destinatario, envios.mensaje ,envios.fechaTiempo 
    FROM postal, envios 
    WHERE postal.idPostal = envios.idPostal 
    AND envios.idEnvio = '".$idEnvio."'";
    echo $sql;
    $result=mysqli_query($conexion, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_NUM);
        require_once __DIR__ . './../vendor/autoload.php';
        $mpdf = new \Mpdf\Mpdf(['mode' => 'c']);
        $header = "";
        $header .= "<p align='center'><strong>JAOR</strong></p>";
        $estilos = "";
        $estilos .= "<style>
            p{color: #F00;}
            .header {
                text-align: center;
                background: black;
                color: white;
                font-size: 30px;
              }
            </style>
        ";
        $html = "";
        //$html .= $sql;
        $html .= $estilos;
        $html .=' <div class="header">
        <img src="./../frontend/images/logo1.png" style="max-height: 64px;">
      </div> 
      <br>
      <div><img src="';
      
      $html .=$row[1];
      $html .='" alt=""></div><br>
      <div> <h2>De: ';
      $html .=$row[2];
      $html .='</h2></div>
      <div> <h2>Para: ';
      $html .=$row[3];
      $html .="</h2></div><br>";
      if(is_null($row[4])){
        $html .="<br>";
      }else{
        $html .="<br><h3> Mensaje: ";
        $html .=$row[4];
        $html .="</h3>";
        }
        $html .="<br><br><br><br><h4>Fecha de envio: ";
        $html .=$row[5];
        $html .="</h4>";
$mpdf->WriteHTML($html);
$mpdf->Output();