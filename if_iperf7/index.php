<!DOCTYPE html>
<html lang="en">
<?php require_once "main.php"?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="Chart.js"></script>
    <title>Document</title>
</head>
<body>
    <div style="background-color: white; margin-top: 10px; width: 50%; height: 100%">
        <canvas id="chart" hidden></canvas>
    </div>
</body>
<script>
    function grafico(){
        document.getElementById("chart").innerHTML = 
        `<canvas id="chart" style="width:250px"></canvas>`;
        new Chart("chart", {
            type: "line",
            data: {
                labels: [<?php for($i=0;$i<count($arrayX);$i++){echo $arrayX[$i].',';} ?>],
                datasets: [{
                    data: [<?php for($i=0;$i<count($arrayY1);$i++){echo $arrayY1[$i].',';} ?>],
                    borderColor: "green",
                    fill: false
                },{
                    data: [<?php for($i=0;$i<count($arrayY2);$i++){echo $arrayY2[$i].',';} ?>],
                    borderColor: "red",
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