<!DOCTYPE html>
<?php require_once "funciones.php"?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="index.php" method="post" id="switches">
            <div id="switches">
            <h3>Seleccinar switch</h3>
                <select name="switch" id="switch">
                    <option value="0">switch</option>
                    <?php host($conn);?>
                </select>
                <button style="margin-top: 5px;">Cargar</button>
            </div>
        </form>
        <form action="index.php" method="get">
            <button style="margin-top: 5px;">Graficar</button>
        </form>
        <div style="margin-top: 5px;">
            Seleccinados: <?php for($i=0;$i<count($lista_switches);$i++){echo $lista_switches[$i].',';} ?>
        </div>
    </div>
</body>
</html>