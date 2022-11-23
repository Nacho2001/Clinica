<?php
include_once('./routeros_api.class.php');
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
function voucher(){
    //Datos miktrotik
    $MKserver = "10.1.56.1"; // Ip del mikrotik
    $MKname = "mikhmon"; // Usuario para login
    $MKpasswordmk = "mikhmon"; // Contraseña para login
    $Vprofile = "Invitados"; // Perfil de voucher
    $Vcomment = "Invitado registrado"; // Comentario

    $api = new RouterOS();
    //$api->debug = false
    $api->comm("ip/hotspot/user/add", array(
        "server" => "$MKserver",
        "name" => "$MKname",
        "password" => "$MKpassword",
        "profile" => "$Vprofile",
        "disabled" => "no",
        "limit-uptime" => "8h",
        "comment" => "$Vcomment",
    ));
}
if ( $email != "" ) { // Revisa si el campo email se encuentra vacio, continua con el proceso
    $conectar = conn();
    $sql = "insert into login(email) value ('$email')"; // Consulta SQL para ingresar el $email
    $result = mysqli_query($conectar, $sql)or trigger_error("Fallo la peticion, error sql:".mysqli_error($conectar)); // Ejecuta la consulta, si hay error muestra el mensaje

}


?>
