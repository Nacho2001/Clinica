<?php
    function mybase(){
        // Conexión con db = mysql_connect('ip_de_bd', 'usuario', 'clave', 'nombre_db')
        $base = mysqli_connect('localhost', 'iperf', 'iperf', 'iperf'); // Conexion con la base
        return $base;
    };

    function chac(){
        // Conexión con db = mysql_connect('ip_de_bd', 'usuario', 'clave', 'nombre_db')
        $base2 = mysqli_connect('192.168.1.5', 'iperf', 'iperf', 'sistemas'); // Conexion con la base
        return $base2;
    };

    function select(){
        $mysqli = mybase();
        $query = $mysqli -> query ("SELECT switch FROM switches");
        while ($lista = mysqli_fetch_array($query)) {
          echo '<option value="'.$lista['switch'].'">'.$lista['switch'].'</option>';
        }
    };

?>