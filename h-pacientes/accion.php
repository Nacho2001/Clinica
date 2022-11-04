<?php
//Coleccion de datos
$email = $_POST['email'];

//Conexion con la base
function conn(){ 
    $hostname = "10.1.1.192";
    $userdb = "login";
    $passworddb = "login";
    $dbname = "loginData";
    $conectar = mysqli_connect($hostname, $userdb, $passworddb, $dbname);
    return $conectar;
}

$conectar = conn();
$sql = "insert into login(email) value ('$email')";
$result = mysqli_query($conectar, $sql)or trigger_error("Fallo la peticion, error sql:".mysqli_error($conectar));
?>
