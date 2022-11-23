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
    // Invoca la api RouterOS
    $api = new RouterOS();
    //$api->debug = false
    
    //Variables para login en mikrotik
    $iphost = "10.1.56.1";
    $userhost = "mikhmon";
    $passwdhost = "mikhmon";

    if($api->connect($iphost, $userhost, decrypt($passwdhost))){
        $api->comm("ip/hotspot/user/add", array(
            //Datos Voucher a crear
            "server" => "$10.1.56.1",  // Hotspot donde se utilizará el voucher
            "name" => "$Vcodigo", // codigo de voucher (usuario)
            "password" => "$Vcodigo", // contraseña de voucher (mismo valor que código)
            "profile" => "Invitados", // Perfil de voucher
            "disabled" => "no", // Habilitado
            "limit-uptime" => "8h", // Tiempo del voucher
            "comment" => "Invitado registrado" // Comentario
        ));
    }
}
if ( $email != "" ) { // Revisa si el campo email se encuentra vacio, continua con el proceso
    $conectar = conn();
    $sql = "insert into login(email) value ('$email')"; // Consulta SQL para ingresar el $email
    $result = mysqli_query($conectar, $sql)or trigger_error("Fallo la peticion, error sql:".mysqli_error($conectar)); // Ejecuta la consulta, si hay error muestra el mensaje
}

header("Location: $backlink"); // Al final, redirige al mk
exit();
?>
