<?php
//Incluir librerias
include_once('./lib/routeros_api.php');
//Recibe los datos del formulario login_trial
$email = $_POST['email']; //email
$backlink = $_POST['backlink']; //link de retorno
$ip = $_POST['ip_send']; // IP del usuario
$preIP = substr($ip, 0,10); // Toma el prefijo de la IP que tomo el cliente
$hotspot = "default"; // Red en la que será válido el voucher creado

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

function voucher_mail($preIP, $hotspot, $email, $Vcode){
    if ($preIP == "172.16.62." || $preIP == "172.16.63.") { // Segun el prefijo que tenga, seleccionara el hotspot correspondiente al sector donde se encuentra
        $hotspot = "H_wifi_a_inv";
    } elseif ($preIP == "172.16.68." || $preIP == "172.16.69.") {
        $hotspot = "H_wifi_b_inv";
    } elseif ($preIP == "172.16.74." || $preIP == "172.16.75.") {
        $hotspot = "H_wifi_c_inv";
    } elseif ($preIP == "172.16.80." || $preIP == "172.16.81.") {
        $hotspot = "H_wifi_d_inv";
    } elseif ($preIP == "172.16.86." || $preIP == "172.16.87.") {
        $hotspot = "H_wifi_e_inv";
    } elseif ($preIP == "172.16.92." || $preIP == "172.16.93.") {
        $hotspot = "H_wifi_f_inv";
    } elseif ($preIP == "172.16.98." || $preIP == "172.16.99.") {
        $hotspot = "H_wifi_g_inv";
    } elseif ($preIP == "172.16.104" || $preIP == "172.16.105") {
        $hotspot = "H_wifi_h_inv";
    };

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
            "server" => $hotspot,  // Hotspot donde se utilizará el voucher
            "name" => $Vcode, // codigo de voucher (usuario)
            "password" => $Vcode, // contraseña de voucher (mismo valor que código)
            "profile" => "Invitados", // Perfil de voucher
            "limit-uptime" => "8h", // Tiempo del voucher
            "comment" => "Invitado registrado", // Comentario
        ));
        $api->comm("/tool/e-mail/send", array(
            "to" => $email, // Destinatario
            "subject" => "Código de voucher Wi-Fi Clinica Pasteur", // Asunto del mail
            "body" => "Su código de voucher es: $Vcode", // Cuerpo del mensaje
        ));
    }
}
// Inicio del programa
if ( $email != "" ) { // Revisa si el campo email se encuentra vacio, continua con el proceso
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $fecha = date("Y-m-d h:i");
    $conectar = conn();
    $sql = "insert into email(fecha,email) values ('$fecha','$email')"; // Consulta SQL para ingresar el $email
    $result = mysqli_query($conectar, $sql)or trigger_error("Fallo la peticion, error sql:".mysqli_error($conectar)); // Ejecuta la consulta, si hay error muestra el mensaje
    voucher_mail($preIP, $hotspot, $email, $Vcode);
}

header("Location: $backlink"); // Al final, redirige al mikrotik
exit();
?>
