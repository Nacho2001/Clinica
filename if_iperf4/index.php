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
        <select id="switch">
            <option value="0">Switch</option>
            <?php host($conn);?>
        </select>
    </div>
    <div style="margin-top: 10px">
        <button>Añadir</button><br>
    </div>
    </form>
    <button>Ver gráfico</button>
    <canvas id="grafico" style="width:100%;max-width:600px" hidden></canvas>
</body>
<script>
    function grafico(){
        document.getElementbyId("grafico").removeAtrribute("hidden");
        let Xvalues = [<?php for($i=0;$i<count($valoresX);$i++){echo $valoresX[$i].',';} ?>];
        new Chart("grafico", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    data: [<?php for($i=0;$i<count($valoresX);$i++){echo $valoresX[$i].',';} ?>],
                    borderColor: "green",
                    fill: false
                }]
            },
            options: {
                legends: {display: false}
            }
        });
    }
</script>
</html>