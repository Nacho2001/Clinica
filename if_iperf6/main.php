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
    $arrayX[] = array();
    $resp = mysqli_query($enlace, "select distinct dia from diario_ps");
    while($column = mysqli_fetch_array($resp)){
        $arrayX[] = json_encode($column['dia']);
    }
    array_splice($arrayX,0);
    return $arrayX;
}

function valoresY($enlace,$switch){
    $arrayY[] = array();
    $resp = mysqli_query($enlace, 'select medido from diario_ps where host = "'.$switch.'"');
    while($column = mysqli_fetch_array($resp)){
        $arrayY[] = json_encode($column['medido']);
    }
    return $arrayY;
}


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $switch1 = $_POST['switch1'];
    $switch2 = $_POST['switch2'];
    $arrayX = valoresX($conn);
    //for($i=0;$i<count($arrayX);$i++){echo $arrayX[$i].',';}
    $arrayY1 = valoresY($conn,$switch1);
    $arrayY2 = valoresY($conn,$switch2);
}
?>