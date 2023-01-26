<?php
    function conn(){ 
        $hostname = "192.168.1.5"; // IP de la db
        $userdb = "iperf"; // Usuario db
        $passworddb = "iperf"; // Contraseña db
        $dbname = "sistemas"; // Base de datos
        $conectar = mysqli_connect($hostname, $userdb, $passworddb, $dbname); // Conexion con la base
        return $conectar;
    }
    if (conn()){
        echo "Conexion establecida";
    }
?>