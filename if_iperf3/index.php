<!DOCTYPE html>
<?php require_once "conexion.php" ?>
<html>
<script src="Chart.js"></script>
<body>
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>
<script>
    var xValues = [<?php for($i=0;$i<count($valoresX);$i++){echo $valoresX[$i].',';} ?>];
    new Chart("myChart", {
      type: "line",
      data: {
        labels: xValues,
        datasets: [{ // Valores de Y
          data: [<?php for($i=0;$i<count($valoresY);$i++){echo $valoresY[$i].',';} ?>],
          borderColor: "green",
          fill: false
        }] 
      },
      options: {
        legend: {display: false}
      }
    }); 
    </script>

</body>
</html>
