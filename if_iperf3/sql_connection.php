<?php
    function mybase(){
        // Conexión con db = mysql_connect('ip_de_bd', 'usuario', 'clave', 'nombre_db')
        $base = mysqli_connect('10.1.1.192', 'iperf', 'iperf', 'iperf'); // Conexion con la base
        return $base;
    };

    function chac(){
        // Conexión con db = mysql_connect('ip_de_bd', 'usuario', 'clave', 'nombre_db')
        $base = mysqli_connect('10.1.1.5', 'iperf', 'iperf', 'sistemas'); // Conexion con la base
        return $base;
    };
?>