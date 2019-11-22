
<?php
    include("./confiBD.php");
    $sql="SELECT * FROM administrador WHERE status ='1'";
    $result=mysqli_query($conexion, $sql);
    if(mysqli_num_rows($result)==0){
        header("Location: loginAdmin.php");
        exit();
    }
    try {
        $result = $conexion->query('SELECT cate, sum(likes) FROM postal GROUP by cate');
        $rows = array();
        $table = array();
        $table['cols'] = array(
            array('label' => 'Postal', 'type' => 'string'),
            array('label' => 'Likes', 'type' => 'number')
        );
        foreach($result as $r) {
          $temp = array();
          $temp[] = array('v' => (string) $r['cate']); 
          $temp[] = array('v' => (int) $r['sum(likes)']); 
          $rows[] = array('c' => $temp);
        }

        $table['rows'] = $rows;

        $jsonTable = json_encode($table);
        //echo $jsonTable;
        //Postales
        $result = $conexion->query('SELECT nombre, likes FROM postal ORDER BY likes DESC LIMIT 5');
        $rows = array();
        $table = array();
        $table['cols'] = array(
            array('label' => 'Postal', 'type' => 'string'),
            array('label' => 'Likes', 'type' => 'number')
        );
        foreach($result as $r) {
          $temp = array();
          $temp[] = array('v' => (string) $r['nombre']); 
          $temp[] = array('v' => (int) $r['likes']); 
          $rows[] = array('c' => $temp);
        }

        $table['rows'] = $rows;

        $jsonTable2 = json_encode($table);
        //echo $jsonTable2;
        //Genero y edad de udiarios
        $result = $conexion->query('SELECT edad,
        sum(case when genero = "0" then 1 else 0 end) AS Hombres,
        sum(case when genero = "1" then 1 else 0 end) AS Mujeres
        FROM persona
        GROUP BY edad ORDER by edad');

        $rows = array();
        $table = array();
        $table['cols'] = array(
            array('label' => 'Edad', 'type' => 'string'),
            array('label' => 'Hombres', 'type' => 'number'),
            array('label' => 'Mujeres', 'type' => 'number'),
        );
        foreach($result as $r) {
          $temp = array();
          $temp[] = array('v' => (string) $r['edad']); 
          $temp[] = array('v' => (int) $r['Hombres']);
          $temp[] = array('v' => (int) $r['Mujeres']); 
          $rows[] = array('c' => $temp);
        }

        $table['rows'] = $rows;

        $jsonTable3 = json_encode($table);
        //echo $jsonTable2;
        //Envios
        $result = $conexion->query('SELECT nombre, nEnvios FROM postal ORDER BY nEnvios  DESC LIMIT 10');
        $rows = array();
        $table = array();
        $table['cols'] = array(
            array('label' => 'Postal', 'type' => 'string'),
            array('label' => 'Envios', 'type' => 'number')
        );
        foreach($result as $r) {
          $temp = array();
          $temp[] = array('v' => (string) $r['nombre']); 
          $temp[] = array('v' => (int) $r['nEnvios']); 
          $rows[] = array('c' => $temp);
        }

        $table['rows'] = $rows;

        $jsonTable4 = json_encode($table);
        //echo $jsonTable4;

    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }

    ?>


    <html>
      <head>
        <title>Mis Postales</title>
        <link rel="stylesheet" href="./../frontend/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="./../frontend/css/main.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript">
        google.load('visualization', '1', {'packages':['corechart','bar']});
        google.setOnLoadCallback(drawChartPostales);
        google.setOnLoadCallback(drawChartCate);
        google.setOnLoadCallback(drawChart);
        google.setOnLoadCallback(drawChartEnvios);

        function drawChartPostales() {
          var data = new google.visualization.DataTable(<?=$jsonTable2?>);
          var options = {
               title: 'Postales con mas likes',
              is3D: 'true',
              pieSliceText: 'value', 
              width: 800,
              height: 600
            };
          var chart = new google.visualization.PieChart(document.getElementById('chart_postales'));
          chart.draw(data, options);
        }
        function drawChartCate() {
          var data = new google.visualization.DataTable(<?=$jsonTable?>);
          var options = {
               title: 'Likes por categoria',
              is3D: 'true',
              pieSliceText: 'value',    
              width: 800,
              height: 600
            };
          var chart = new google.visualization.PieChart(document.getElementById('chart_cate'));
          chart.draw(data, options);
        }
        function drawChart() {
        var data = new google.visualization.DataTable(<?=$jsonTable3?>);

        var options = {
          chart: {
            title: 'Datos de usuario',
            subtitle: 'Edades de los usuarios agrupados por su genero',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, options);
      }
      function drawChartEnvios() {
          var data = new google.visualization.DataTable(<?=$jsonTable4?>);
          var options = {
               title: 'Postales mas enviadas',
              is3D: 'true',
              pieSliceText: 'value',    
              width: 800,
              height: 600
            };
          var chart = new google.visualization.PieChart(document.getElementById('chart_envios'));
          chart.draw(data, options);
        }


        </script>
      </head>

      <body>
        <div class="navbar-fixed" id="heading">
          <nav class="center right nav-extended grey darken-4 s8 m8 l8">
            <div class="nav-wrapper "><a class="center brand-logo white-text" href="./../frontend/views/index.html"><img style="max-height: 64px;" src="./../frontend/images/logo1.png" alt=""></a><a class="sidenav-trigger" href="#" data-target="mobile-demo"><i class="material-icons">menu</i></a>
              <ul class="right hide-on-med-and-down" id="nav-mobile">
                <li style="font-size:30px">Estadi&#769sticas&nbsp&nbsp</li>
              </ul>
            </div>
          </nav>
        </div>
        <div id="chart_postales" class="center container"></div>
        <hr size="2" noshade>
        <div id="chart_cate" class="center container"></div>
        <div id="columnchart_material" class="center container" style="width: 800px; height: 500px;"></div>
        <div id="chart_envios" class="center container" ></div>
        <div>
          <a href="./perfilAdmin.php" class="black-text">Cancelar / Regresar</a>
        </div>
      </body>
      <footer>
      <div class="footer-copyright">
      <div class="center container">© 2019 Copyright Tecnologías para la Web, ESCOM IPN</div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./../frontend/js/materialize.min.js"></script>
    <script type="text/javascript" src="./../frontend/js/main.js"></script>
      </footer>
    </html>