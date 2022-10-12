<?php
// Conexion con la base de datos
$link = mysqli_connect("10.1.1.199","login","cp123456") or die("console.log('No se encuentra el servidor')");
$db = mysql_select_db("loginData",$link) or die ("console.log('Error de conexion con la base')");

//Consigue el email del html
$email = $_POST['email'];

// Consulta a la base de datos
mysql_query("INSERT INTO email (email) values('$email')", $link) or die ("console.log('Error al realizar la consulta')")
?>