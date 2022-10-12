<?php
include_once('db.php');
//Recibe datos del formulario
$email=$_POST['email'];
$fecha=date("y-m-d");

$conectar=conn(); // Ejecuta conexion con la bd

$sql="INSERT INTO emails (email, fecha) values('$email', '$fecha')";
$resul = mysql_query($conectar , $sql)or trigger_error('Query Failed! SQL - Error: '.mysqli_error($conectar));
echo $sql;
?>