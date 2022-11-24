<?php
include_once('./lib/routeros_api.php');
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
    // Invoca la api RouterOS
    $api = new RouterosAPI();
    $api->debug = false;
    
    //Variables para login en mikrotik
    $MKip = "10.1.56.1";
    $MKuser = "autoCreate";
    $MKpasswd = "autoCreate";

    if($api->connect($MKip, $MKuser, $MKpasswd)){
        $api->comm("/ip/hotspot/user/add", array(
            //Datos Voucher a crear
            "server" => "H-cp",  // Hotspot donde se utilizará el voucher
            "name" => "testingAuto", // codigo de voucher (usuario)
            "password" => "testingAuto", // contraseña de voucher (mismo valor que código)
            "profile" => "Invitados", // Perfil de voucher
            "limit-uptime" => "8h", // Tiempo del voucher
            "comment" => "Invitado registrado", // Comentario
        ));
    }
}
if ( $email != "" ) { // Revisa si el campo email se encuentra vacio, continua con el proceso
    $conectar = conn();
    $sql = "insert into login(email) value ('$email')"; // Consulta SQL para ingresar el $email
    $result = mysqli_query($conectar, $sql)or trigger_error("Fallo la peticion, error sql:".mysqli_error($conectar)); // Ejecuta la consulta, si hay error muestra el mensaje
    voucher();
}

header("Location: $backlink"); // Al finalm redirige al mikrotik
exit();
?>
