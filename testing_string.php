<?php 
// Recortar cadena de caracteres en php
$ip="172.16.68.0";
$ip2= substr($ip,0,9);
//echo $ip;
//echo $ip2;
if($ip == "172.16.68.0" || $ip2 == "172.16.67"){
    echo "True";
};
?>