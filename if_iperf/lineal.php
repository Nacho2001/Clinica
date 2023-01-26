<?php
    function conn(){ 
        $hostname = "192.168.1.5"; // IP de la db
        $userdb = "iperf"; // Usuario db
        $passworddb = "iperf"; // Contraseña db
        $dbname = "sistemas"; // Base de datos
        $conectar = mysqli_connect($hostname, $userdb, $passworddb, $dbname); // Conexion con la base
        return $conectar;
    }
    $conexion=conn();
    $sql="select fecha,medido from iperf where host = 'admision01'";
    $consulta=mysqli_query($conexion,$sql);
    $valoresX=array(); //fecha
    $valoresY=array(); // mediciones

    while ($ver=mysqli_fetch_row($consulta)){
        $valoresX=$ver[1];
        $valoresY=$ver[0];
    }

    $datosX=json_encode($valoresX);
    $datosY=json_encode($valoresY);
?>
<div id="grafico"></div>

<script>
    function cadenaLineal(json){
        let capture = JSON.parse(json);
        let array = [];
        for(let i in capture){
            array.push(capture[i]);
        }
        return array;
    }
</script>
<script>

    datosX=cadenaLineal('<?php echo $datosX ?>')
    datosY=cadenaLineal('<?php echo $datosY ?>')

    var trace1 = {
    x: datosX,
    y: datosY,
    type: 'scatter'
    };
    /*
    var trace2 = {
    x: [1, 2, 3, 4],
    y: [16, 5, 11, 9],
    type: 'scatter'
    }*/

    var data = [trace1];

    Plotly.newPlot('grafico', data);

</script>