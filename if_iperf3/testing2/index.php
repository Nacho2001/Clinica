<!DOCTYPE html>
<html lang="en">
<?php require_once "functions.php"?>
<script src="../Chart.js"></script>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IF Iperf</title>
</head>
<body>
    <a>Seleccionar switches</a><br>
    <form method="post" action="functions.php" style="margin-top: 5px">
        <select name="switch">
            <option value="none">Switch</option>
            <?php host($conexion);?>
        </select>
        <input type="submit" style="margin-top: 10px" value="Pulsar">
    </form>
    <div>
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $switch = $_POST["switch"];
        data();
    }
    ?>
    <canvas id="grafico" style="width: 100%; max-width: 600px;"></canvas>
    </div>
</body>
<script>
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