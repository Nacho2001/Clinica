<?php /*
function base(){ // Conexion con base de datos
    // Orden de datos en conexion: "host", "usuarioDB", "contraseñaDB", "nombreDB"
    $conexion = mysqli_connect("localhost", "iperf", "iperf", "iperf");
    // Sale de la funcion con la conexion;
    return $conexion;
};*/
$base = new mysqli ("localhost", "iperf", "iperf", "iperf");

function listarSwitches(){ // llama a la base de datos y consulta ls switches
    // Invoca la funcion anterior para iniciar la conexion
    $conn = base();
    // Envia la consulta a la base y la resuesta se guarda en $consulta
    $consulta = mysqli_query($base,"select switch from switches");
    // Convierte el resultado en un array
    $switchArray = fetch_array($consulta);
    // Utiliza el bucle para recorrer el array
    for($i = 0; $i <= count($switchArray); $i++){
        $element = $switchArray[$i];
        // Para cada elemento de la lista, crea un option del select
        echo '<option value = "'.$lista['switch'].'">'.$lista['switch'].'</option>';
    }
}
?>