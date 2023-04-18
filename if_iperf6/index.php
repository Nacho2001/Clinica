<!DOCTYPE html>
<html lang="en">
<?php require_once "funciones.php"?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post" id="switches">
        <div>
            <h3>Seleccinar switches</h3>
            <select name="switch1" id="switch">
                <option value="0">switch</option>
                <?php host($conn);?>
            </select>
            <select name="switch2" id="switch" style="margin-top: 5px">
                <option value="0">switch</option>
                <?php host($conn);?>
            </select>
            <button style="margin-top: 5px;">Cargar</button>
        </div>
    </form>
    <div style="background-color: orange; ">
        <canvas id="chart" hidden></canvas>
    </div>
</body>
</html>