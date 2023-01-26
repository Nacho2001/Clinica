<!--<!DOCTYPE html>-->
<html>
<script src="Chart.js"></script>
<!-- <body> -->
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>
<?php
    function conn(){ 
        $hostname = "192.168.1.5"; // IP de la db
        $userdb = "iperf"; // Usuario db
        $passworddb = "iperf"; // Contraseña db
        $dbname = "sistemas"; // Base de datos
        $conectar = mysqli_connect($hostname, $userdb, $passworddb, $dbname); // Conexion con la base
        return $conectar;
    }
    $conexion=conn();
    $sql="select fecha,medido from iperf where host = 'admision01'";
    $consulta=mysqli_query($conexion,$sql);
    $valoresX=array(); //fecha
    $valoresY=array(); // mediciones

    while ($ver=mysqli_fetch_row($consulta)){
        $valoresX=$ver[1];
        $valoresY=$ver[0];
    }

    $datosX=json_encode($valoresX);
    $datosY=json_encode($valoresY);
?>
<script>
    var xValues = [100,200,300,400,500,600,700,800,900,1000];
    new Chart("myChart", {
      type: "line",
      data: {
        labels: xValues,
        datasets: [{ // Valores de Y
          data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478],
          borderColor: "red",
          fill: false
        }/*, { 
          data: [1600,1700,1700,1900,2000,2700,4000,5000,6000,7000],
          borderColor: "green",
          fill: false
        }, { 
          data: [300,700,2000,5000,6000,4000,2000,1000,200,100],
          borderColor: "blue",
          fill: false
        }*/] 
      },
      options: {
        legend: {display: false}
      }
    });
    </script>

</body>
</html>