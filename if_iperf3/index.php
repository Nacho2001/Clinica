<?php require_once "sql_connection.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iperf_I</title>
</head>
<body>
    <div class="row">
        <label>Seleccionar switch</label>
        <select id="switch">
            <option value="0">Elegir</option>
            <?php
                $conn = mybase();
                $query_sw = mysqli_query($conn,'select * from switches');
                while ($switches = mysqli_query_array($query_sw)){
                    echo '<option value= "'.$switches["id"].'">'.$switches["switch"].'</option>';
                }
            ?>
        </select>
        <button>Buscar</button>
    </div>
</body>
</html>