<?php
    $value_X = array();
    $value_Y = array();
    function mybase(){
        // Conexión con db = mysql_connect('ip_de_bd', 'usuario', 'clave', 'nombre_db')
        $base = mysqli_connect('localhost', 'iperf', 'iperf', 'iperf'); // Conexion con la base
        return $base;
    };

    $conexion = mybase();
    
    function host($conexion){
        $sql = 'select switch from switches';
        $lista_s = mysqli_query($conexion,$sql);
        while ($lista = mysqli_fetch_array($lista_s)){
            echo '<option value = "'.$lista['switch'].'">'.$lista['switch'].'</option>';
        };
    };

    function data($conexion){
        $sql = 'select dia,medido where ubicacion = "'.$switch.'"';
        $data_sw = mysqli_query($conexion,$sql);

        while ($ver = mysqli_fetch_row($data_sw)){
            $value_X[] = json_encode($ver[0]);
            $value_Y[] = json_encode($ver[1]);
        }
    };
?>