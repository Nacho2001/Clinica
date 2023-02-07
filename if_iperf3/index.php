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
                $sql = "select * from iperf";
                $query_sw = mysqli_query($conn, $sql);
                while ($valores = mysqli_fetch_array($query_sw)):
                    echo '<option value="'.$valores["id"].'">'.$valores["switch"].'</option>';
                endwhile;
            ?>
        </select>
        <button>Buscar</button>
    </div>
</body>
</html>