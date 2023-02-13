<!DOCTYPE html>
<?php require_once "functions.php"?>
<html lang="en">
<script src="Chart.js"></script>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iperf_I</title>
</head>
<body>
    <div class="row">
        <label>Seleccionar switch</label>
        <select id="switch" name="switch" method=post>
            <option value="0">Elegir</option>
            <?php select(); ?>
        </select>
        <button onclick="graf()">Buscar</button>
        <div class="container">
            <div class="row">
                <div id="gr_campo"></div>
            </div>
        </div>
    </div>
    <script>
    function graf(){
        /*<?php c_grafico(); ?>
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
        });*/ 
    }
    </script>
</body>
</html>