<!DOCTYPE html>
<?php require_once "sql_connection.php"?>
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
        <select>
            <option value="0">Elegir</option>
            <?php
                $mysqli = mybase();
                $query = $mysqli -> query ("SELECT id,switch FROM switches");
                while ($lista = mysqli_fetch_array($query)) {
                  echo '<option value="'.$lista['id'].'">'.$lista['switch'].'</option>';
                }
            ?>
        </select>
        <button>Buscar</button>
    </div>
</body>
</html>