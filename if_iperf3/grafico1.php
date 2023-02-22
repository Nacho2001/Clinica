<?php 
require_once "functions.php";

$id_switch = $_POST["switch"];
$conexion = conn();
$sql = "select dia,medido from diario_ps where ubicacion = '$id_switch'";
$consulta = mysqli_query($conexion,$sql);
$valoresX = array(); // fecha
$valoresY = array(); // mediciones

while ($ver = mysqli_fetch_row($consulta)){
    $datoX = $ver[0];
    $datoY = $ver[1];
    $valoresX[] = json_encode($datoX);
    $valoresY[] = json_encode($datoY);
};
?>
<script>
    var xValues = [<?php for($i=0;$i<count($valoresX);$i++){echo $valoresX[$i].',';} ?>];
    new Chart("myChart", {
    type: "line",
    data: {
        labels: xValues,
        datasets: [{ // Valores de Y
        data: [<?php for($i=0;$i<count($valoresY);$i++){echo $valoresY[$i].',';} ?>],
        borderColor: "green",
        fill: false
        }] 
    },
    options: {
        legend: {display: false}
    }
    }); 
</script>