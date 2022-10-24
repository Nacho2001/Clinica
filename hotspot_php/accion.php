<?php
//Coleccion de datos
$email = $_POST['mail'];

//Conexion con la base
function conn(){ 
    $hostname = "10.1.1.199";
    $userdb = "login";
    $passworddb = "cp123456";
    $dbname = "loginData";
    $conectar = mysqli_connect($hostname, $userdb, $passworddb, $dbname);
    return $conectar;
}

$conectar = conn();
$sql = "insert into login(email) value ('$email')";
$result = mysqli_query($conectar, $sql)or trigger_error("Fallo la peticion, error sql:".mysqli_error($conectar));
?>
<script>
    console.log("HOla")
</script>