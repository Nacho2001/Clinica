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

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $switch = $_POST['switch'];
    $valueX = array();
    $valueY = array();
    $resp = mysqli_query($conn,'select dia,medido from diario_ps where ubicacion = "'.$switch.'"');
    while($ver = mysqli_fetch_row($resp)){
        $datoX = $ver[0];
        $datoY = $ver[1];
        $valueX[] = json_encode($datoX);
        $valueY[] = json_encode($datoY);
    }
    //valoresGrafico($conn,$switch);
}

function valoresGrafico($conexion,$switch){
    $resp = mysqli_query($conexion,'select dia,medido from diario_ps where ubicacion = "'.$switch.'"');
    while($ver = mysqli_fetch_row($resp)){
        $datoX = $ver[0];
        $datoY = $ver[1];
        $valueX[] = json_encode($datoX);
        $valueY[] = json_encode($datoY);
    }
}
?>