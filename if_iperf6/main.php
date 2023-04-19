<?php

function conexionBase(){
    // Conexión con db = mysql_connect('ip_de_bd', 'usuario', 'clave', 'nombre_db')
    $base = mysqli_connect('localhost', 'iperf', 'iperf', 'iperf'); // Conexion con la base
    return $base;
}

$conn = conexionBase();

function host($conexion){
    $resp = mysqli_query($conexion,"select switch from switches");
    while ($lista = mysqli_fetch_array($resp)){
        echo '<option value = "'.$lista['switch'].'">'.$lista['switch'].'</option>';
    };
};

// Crear arrays con los valores x y el value y
function valoresX($enlace){
    $resp = mysqli_query($enlace, "select distinct dia from diario_ps");
    while($column = mysqli_fecht_row($resp)){
        $array_X[] = json_encode($column[0]);
    }
}

function valoresY($enlace,$switch){
    $resp = mysqli_query($enlace, 'select medido from diario_ps where host = "'.$switch.'"');
    while($column = mysqli_fecht_row($resp)){
        $array_Y[] = json_encode($column[0]);
    }
    return $array_Y;
}
/*
if($_SERVER["REQUEST METHOD"] == "POST"){
    $array_X = array();
    $array_Y1 = array();
    $array_Y2 = array();
    $switch1 = $_POST["switch1"];
    $switch2 = $_POST["switch2"];
    valoresY($conn);
    $array_Y1 = valoresY($conn,$switch1);
    $array_Y2 = valoresY($conn,$switch2);
}*/
?>