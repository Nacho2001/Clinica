<?php

function conexionBase(){
    // Conexión con db = mysql_connect('ip_de_bd', 'usuario', 'clave', 'nombre_db')
    $base = mysqli_connect('localhost', 'iperf', 'iperf', 'iperf'); // Conexion con la base
    return $base;
}

function host(){
    $conn = conexionBase();
    $resp = mysqli_query($conn,"select switch from switches");
    while ($lista = mysqli_fetch_array($resp)){
        echo '<option value = "'.$lista['switch'].'">'.$lista['switch'].'</option>';
    };
};

if($_SERVER["request method"] == "POST"){
    $switch = $_POST["switch"];
    if($switch == 0){
        echo "Elegir valor válido";
    }else{
        echo $switch;
    }
}
?>