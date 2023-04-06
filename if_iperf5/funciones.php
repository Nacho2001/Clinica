<?php
$lista_switches = array();

function conexion_base(){
    // Conexión con db = mysql_connect('ip_de_bd', 'usuario', 'clave', 'nombre_db')
    $conexion = mysqli_connect("localhost","iperf","iperf", "iperf");
    return $conexion;
}

$conn = conexion_base();

function host($conexionBase){
    $resp = mysqli_query($conexionBase,"select switch from switches");
    while ($lista = mysqli_fetch_array($resp)){
        echo '<option value = "'.$lista['switch'].'">'.$lista['switch'].'</option>';
    };
};

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $switch = $_POST['switch'];
    $lista_switches[] = $switch;
    echo $lista_switches[0];
}
?>