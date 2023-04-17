<?php
    $lista_switches = ["a2sw03", "a2sw02"];

    function conexion_base(){
        // Conexión con db = mysql_connect('ip_de_bd', 'usuario', 'clave', 'nombre_db')
        $conexion = mysqli_connect("localhost","iperf","iperf", "iperf");
        return $conexion;
    }
    $conn = conexion_base();
    
    function obtenerY(){
        $sql = "select distinct dia from diario_ps";
        $consulta = mysqli_query($conn,$sql);
        $dataY = array();
        while ($ver = mysqli_fetch_row($consulta)){
            $valueY = $ver[0];
            $datoY[] = json_encode($datoY);
        };
    }
?>