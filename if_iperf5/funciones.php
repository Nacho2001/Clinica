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

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $switch = $_POST['switch'];
    array_push($lista_switches,$switch);
    
    /*for ($i=0; $i < count($lista_switches); $i++) { 
        $datos.'$i' = array();
        //$datos.$i = ["1","2"];
        echo "$datos.$i";
        $X = array();
        $Y = array();
        $consulta = mysqli_query($conexionBase,'select dia,medido from diario_ps where ubicacion = "'.$lista_switches[$i].'"');
        while($ver = mysqli_fetch_row($consulta)){
            $datoX = $ver[0];
            $datoY = $ver[1];
            $X[] = json_encode($datoX);
            $Y[] = json_encode($datoY);
        }
        //array_push($datos.$i,$X,$Y);
    }*/
}

if($_SERVER["REQUEST_METHOD" == "POST"]){
    $cont=0;
    for ($i=0; $i < count($lista_switches); $i++) { 
        ${"valueXsw".$cont} = "";
    }
}
?>