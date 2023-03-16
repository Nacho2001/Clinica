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
    <div id="select" style="margin-top: 5px">
        <select id="switch0">
            <option value="0">Switch</option>
            <?php host($conexion,$lista_s);?>
        </select>
    </div>
    <div style="margin-top: 10px">
        <button onclick="array()">Añadir</button>
    </div>
</body>
<script>
    let array_switch = [];
    let select = document.getElementById("select");
    let cont = 0;

    function array(){
        let host = document.getElementById("switch"+cont);
        array_switch.push(host.value);
        let clon = host.cloneNode(true);
        cont=cont+1;
        clon.setAttribute("id", "switch"+cont);
        clon.setAttribute("style", "margin-left: 10px;");
        select.appendChild(clon);
        host.setAttribute("disabled", "true");
    }

</script>
</html>