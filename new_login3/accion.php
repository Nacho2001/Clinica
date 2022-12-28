<?php
//Incluir librerias
include_once('./lib/routeros_api.php');
//Recibe los datos del formulario login_trial
$email = $_POST['email']; //email
$backlink = $_POST['backlink']; //link de retorno

//Conexion con la base
function conn(){ 
    $hostname = "172.16.50.3"; // IP de la db
    $userdb = "login"; // Usuario db
    $passworddb = "login"; // Contraseña db
    $dbname = "loginData"; // Base de datos
    $conectar = mysqli_connect($hostname, $userdb, $passworddb, $dbname); // Conexion con la base
    return $conectar;
}
function crearVoucher(){ // Genera código de voucher (aleatorio)
    $caracteres = "0123456789abcdefghijklmnopqrstuvwxyz";
    return substr(str_shuffle($caracteres),0,6);
}
$Vcode = crearVoucher(); // Codigo guardado en variable

function voucher_mail($email, $Vcode){
    // Invoca la api RouterOS
    $api = new RouterosAPI();
    $api->debug = false;
    
    //Variables para login en mikrotik
    $MKip = "172.16.50.2";
    $MKuser = "autoCreate";
    $MKpasswd = "autoCreate";

    if($api->connect($MKip, $MKuser, $MKpasswd)){
        //Primero crea el voucher del usuario
        $api->comm("/ip/hotspot/user/add", array(
            //Datos Voucher a crear
            "server" => "H-cp",  // Hotspot donde se utilizará el voucher
            "name" => $Vcode, // codigo de voucher (usuario)
            "password" => $Vcode, // contraseña de voucher (mismo valor que código)
            "profile" => "Invitados", // Perfil de voucher
            "limit-uptime" => "8h", // Tiempo del voucher
            "comment" => "Invitado registrado", // Comentario
        ));
        $api->comm("/tool/e-mail/send", array(
            "to" => $email, // Destinatario
            "subject" => "Código de voucher Wi-Fi", // Asunto del mail
            "body" => "Su código de voucher es: $Vcode", // Cuerpo del mensaje
        ));
    }
}
// Inicio del programa
if ( $email != "" ) { // Revisa si el campo email se encuentra vacio, continua con el proceso
    $conectar = conn();
    $sql = "insert into login(email) value ('$email')"; // Consulta SQL para ingresar el $email
    $result = mysqli_query($conectar, $sql)or trigger_error("Fallo la peticion, error sql:".mysqli_error($conectar)); // Ejecuta la consulta, si hay error muestra el mensaje
    voucher_mail($email,$Vcode);
}

header("Location: $backlink"); // Al final, redirige al mikrotik
exit();
?>
