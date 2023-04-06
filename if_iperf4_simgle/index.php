<!DOCTYPE html>
<html lang="en">
<?php require_once "funciones.php"?>
<script src="Chart.js"></script>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IF Iperf</title>
</head>
<body>
    <a>Seleccionar switches</a><br>
    <form action="index.php" method="post">
    <div style="margin-top: 5px">
        <select id="switch" name="switch">
            <option value="0">Switch</option>
            <?php host($conn);?>
        </select>
    </div>
    <div style="margin-top: 10px">
        <button>Añadir</button><br>
    </div>
    </form>
    <button onclick="grafico()">Ver gráfico</button>
    <div style="background-color: yellow; ">
        <canvas id="chart" hidden></canvas>
    </div>
</body>
<script>
    function grafico(){
        document.getElementById("chart").innerHTML = 
        `<canvas id="chart" style="width:250px"></canvas>`;
        let xValues = [<?php for($i=0;$i<count($valueX);$i++){echo $valueX[$i].',';} ?>];
        new Chart("chart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    data: [<?php for($i=0;$i<count($valueY);$i++){echo $valueY[$i].',';} ?>],
                    borderColor: "green",
                    fill: false
                }]
            },
            options: {
                legend: {display: false}
            }
        });
    }
</script>
</html>