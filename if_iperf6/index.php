<!DOCTYPE html>
<html lang="en">
<?php require_once "main.php"?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <div>
            <h3>Seleccinar switches</h3>
            <select name="switch1">
                <option value="0">switch</option>
                <?php host($conn);?>
            </select>
            <select name="switch2" style="margin-top: 5px">
                <option value="0">switch</option>
                <?php host($conn);?>
            </select>
            <button style="margin-top: 5px;">Cargar</button>
        </div>
    </form>
    <button style="margin-top: 5px" onclick="grafico()">Ver grafico</button>
    <div style="background-color: orange; ">
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
                labels: [<?php for($i=0;$i<count($array_X);$i++){echo $array_X[$i].',';} ?>],
                datasets: [{
                    data: [<?php for($i=0;$i<count($array_Y1);$i++){echo $array_Y1[$i].',';} ?>],
                    borderColor: "green",
                    fill: false
                },{
                    data: [<?php for($i=0;$i<count($array_Y2);$i++){echo $array_Y2[$i].',';} ?>],
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