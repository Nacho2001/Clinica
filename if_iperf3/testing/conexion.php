<?php
    function conn(){ 
        $hostname = "10.1.1.192"; // IP de la db
        $userdb = "iperf"; // Usuario db
        $passworddb = "iperf"; // Contraseña db
        $dbname = "iperf"; // Base de datos
        $conectar = mysqli_connect($hostname, $userdb, $passworddb, $dbname); // Conexion con la base
        return $conectar;
    };

    $conexion = conn();
    $sql = 'select dia,medido from diario_ps where ubicacion = "a2sw03"';
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
