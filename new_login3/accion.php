<?php
use \RouterOS\Client;
use \RouterOS\Query;
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

    
    $client = new Client([
        'host' => '10.1.56.1',
        'user' => 'autoCreate',
        'pass' => 'login&mikrotik'
    ]);
    /*
    function crearVoucher(){
        $key = '';
        $pattern = '1234567890abcdefghijlkmnopqrstuvwxyz';
        $max = strlen($pattern)-1;
        for($i=0;$i < 5;$i++) $key .=$pattern{mt_rand(0,$max)};
        return $key;
    }*/
    
    //$voucher = crearVoucher();
    
    $query = (new Query('ip/hotspot/users/add'))
        ->equal('user','user_test')
        ->equal('server', 'H-cp')
        ->equal('profile','hotspot-trial')
        ->equal('limit-uptime','');
    
    $crear = $client->query($query);
    var_dump($crear);
}

header("Location: $backlink"); // Al final, redirige al mk
exit();
?>
