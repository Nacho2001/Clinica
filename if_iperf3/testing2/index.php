<!DOCTYPE html>
<html lang="en">
<?php require_once "functions.php"?>
<script src="Chart.js"></script>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IF Iperf</title>
</head>
<body>
    <a>Seleccionar switches</a><br>
    <form id="switch" action="index.php" method="post" style="margin-top: 5px">
        <select>
            <option value="0">Switch</option>
            <?php host($conexion);?>
        </select>
        <button style="margin-top: 10px" onclick="take_var()">Añadir</button>
    </form>
    <div>
    <?php if ($_POST){
        $switch = $_POST["switch"];
        data();
    }
    ?>
    <canvas id="grafico" style="width: 100%; max-width: 600px;"></canvas>
    </div>
</body>
<script>
    let select = document.getElementById("select");
    function take_var(){
        let xValues = [<?php for($i=0; $i<$cont($value_X); $i++){echo $value_X[$i].'.';} ?>];
        new Chart("grafico", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    data: [<?php for($i=0; $i<$cont($value_Y);$i++){echo $value_Y[$i].',';} ?>];
                    borderColor: 'red';
                    fill: false;
                }]
            },
            options: {display:false}
        })
    }
</script>
</html>