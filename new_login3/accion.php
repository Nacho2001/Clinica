<?php
//Incluir librerias
include_once('./lib/routeros_api.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require './lib/PHPMailer/src/Exception.php';
require './lib/PHPMailer/src/PHPMailer.php';
require './lib/PHPMailer/src/SMTP.php';
//Recibe los datos del formulario login_trial
$email = $_POST['email']; //email
$backlink = $_POST['backlink']; //link de retorno

//Conexion con la base
function conn(){ 
    $hostname = "10.1.56.254"; // IP de la db
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

function email(){
    $mail = new PHPMailer(true);
    //Ajustes server
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    //$mail->isSMTP(); // Utilizar SMTP
    //$mail->Host = 'smtp.example.com'; //SMTP al que se enviara
    //$mail->SMTPAuth = true;   //Habilita autenticacion SMTP
    //$mail->Username = ''; //SMTP nombre de usuario
    //$mail->Password = '';   //SMTP contraseña
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;    //Habilita encriptacion
    //$mail->Port = 465;    // Puerto
    //Email remitente y destinatario
    $mail->setFrom('no-reply@cpasteur.com.ar'); // Remitente
    $mail->addAddress('nachomigoni@gmail.com'); // Destinatario
    //Contenido de email
    $mail->isHTML(true); // Formato html para el contenido
    $mail->Subject = 'Voucher code'; // Asunto
    $mail->Body = "Código de voucher: $Vcode"; // Cuerpo
    $mail->send(); // Envia

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
            "name" => "$Vcode", // codigo de voucher (usuario)
            "password" => "$Vcode", // contraseña de voucher (mismo valor que código)
            "profile" => "Invitados", // Perfil de voucher
            "limit-uptime" => "8h", // Tiempo del voucher
            "comment" => "Invitado registrado", // Comentario
        ));
    }
}
// Inicio del programa
if ( $email != "" ) { // Revisa si el campo email se encuentra vacio, continua con el proceso
    $conectar = conn();
    $sql = "insert into login(email) value ('$email')"; // Consulta SQL para ingresar el $email
    $result = mysqli_query($conectar, $sql)or trigger_error("Fallo la peticion, error sql:".mysqli_error($conectar)); // Ejecuta la consulta, si hay error muestra el mensaje
    voucher();
    email();
}

header("Location: $backlink"); // Al final, redirige al mikrotik
exit();
?>
