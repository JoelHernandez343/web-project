<?php
    //$dbname = 'prueba';
    //$username = 'root';
    //$password = "root";
    include("./confiBD.php");
    try {
        //Categorías
        
        //$conexion = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
        //$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
        <div id="chart_postales"></div>
        <div id="chart_cate"></div>
        <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
        <div id="chart_envios"></div>
        <div>
          <a href="./perfilAdmin.php" class="orange-text">Cancelar / Regresar</a>
        </div>
      </body>
    </html>