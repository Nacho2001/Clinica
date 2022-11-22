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
if ( $email != "" ) { // Revisa si el campo email se encuentra vacio, continua con el proceso
    $conectar = conn();
    $sql = "insert into login(email) value ('$email')"; // Consulta SQL para ingresar el $email
    $result = mysqli_query($conectar, $sql)or trigger_error("Fallo la peticion, error sql:".mysqli_error($conectar)); // Ejecuta la consulta, si hay error muestra el mensaje
    // Envia email con codigo de voucher
    $destinatario = $email;
    $asunto = "Codigo de voucher";
    $mensaje = "Bienvenido a Clínica Pasteur! Su código de voucher es: ";
    mail($destinatario,$asunto,$mensaje);

}

header("Location: $backlink"); // Al final, redirige al mk
exit();
?>
