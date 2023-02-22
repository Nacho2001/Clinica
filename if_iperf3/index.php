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
        <label>Seleccionar switch</label><br>
        <form action="grafico1.php" method="post">
        <select id="switch" name="switch">
            <option value="0">Elegir</option>
            <?php select(); ?>
        </select>
        <button>Buscar</button>
        </form>
        <div class="container">
            <div class="row">
                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
            </div>
        </div>
    </div>
</body>
</html>