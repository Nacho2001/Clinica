<?php
$email = "nachomigoni@g.com";

$mail = array_pop(explode("@",$email));
if(checkdnsrr($mail,"MX")){
    echo "Dominio ".$mail." valido";
}else{
    echo "No existe el dominio ".$mail;
}
?>