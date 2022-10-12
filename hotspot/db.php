<?php
//Configuracion para acceder a la base
function conn(){
$hostname="10.1.56.3";
$userdb="root";
$passworddb="";
$dbname="loginData";


//Conexion con el servidor
$conectar= mysqli_connect($hostname,$userdb,$passworddb,$dbname);
return $conectar;

}
?>