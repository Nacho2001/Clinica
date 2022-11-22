<?php
//Recibe los datos del formulario login_trial
$email = $_POST['email'];
$backlink = $_POST['backlink'];

//Conexion con la base
function conn(){ 
    $hostname = "10.1.56.254"; // IP de la db
    $userdb = "login"; // Usuario db
    $passworddb = "login"; // Contraseña db
    $dbname = "loginData"; // Base de datos
    $conectar = mysqli_connect($hostname, $userdb, $passworddb, $dbname); // Conexion con la base
    return $conectar;
}
if ( $email != "" ) { // Revisa si el campo email se encuentra vacio, si es así no se envia a la base
    $conectar = conn();
    $sql = "insert into login(email) value ('$email')"; // Consulta SQL para ingresar el $email
    $result = mysqli_query($conectar, $sql)or trigger_error("Fallo la peticion, error sql:".mysqli_error($conectar)); // Ejecuta la consulta, si hay error muestra el mensaje
}
header("Location: $backlink"); // Al final, redirige al mk
exit();
?>
