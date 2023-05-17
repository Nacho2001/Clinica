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
    $values = array();
    $resp = mysqli_query($enlace, "select distinct dia from diario_ps");
    while($column = mysqli_fetch_array($resp)){
        $ver = $column['dia'];
        $values[] = json_encode($ver);
    }
    return $values;
}

function valoresY($enlace,$switch){
    $arrayY = array();
    $resp = mysqli_query($enlace, 'select medido from diario_ps where ubicacion = "'.$switch.'"');
    while($column = mysqli_fetch_array($resp)){
        $arrayY[] = json_encode($column['medido']);
    }
    return $arrayY;
}
function AñadirLinea(){
    echo `{
        data: [<?php for($i=0;$i<count($arrayY2);$i++){echo $arrayY2[$i].',';} ?>],
        borderColor: "red",
        fill: false
    },`;
}



$cp0 = ["a0sw03","a0sw05","a0sw01b","a0sw02","a0sw06","a0sw04b","a0sw01"];
$cp2 = ["a2sw02","a2sw03b","a2sw04"];
$cp6 = ["a6sw02","a6sw01"];
$cpOtros = ["a1sw01", "a4sw01"];
$arrayClinica = [$cp0, $cp2, $cp6, $cpOtros];
$arrayX = array();
$arrayX = valoresX($conn);
for ($i=0; $i < count($arrayClinica); $i++) { 
    $piso = $arrayClinica[$i];
    $piso
}
$arrayY1 = array();
$arrayY2 = array();
$arrayY1 = valoresY($conn,$switch1);
$arrayY2 = valoresY($conn,$switch2);

?>