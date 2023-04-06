<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="selfPost.php" method="post">
    <select name="menu" id="menu">
        <option value="0">0</option>
        <option value="1">1</option>
    </select>
    <button>Enviar</button>
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $opcion = $_POST['menu'];
        echo $opcion;
    }
    ?>
</body>
</html>