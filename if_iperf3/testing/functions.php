<?php
    $c1=0;
    $c2=0;
    function mybase(){
        // Conexión con db = mysql_connect('ip_de_bd', 'usuario', 'clave', 'nombre_db')
        $base = mysqli_connect('localhost', 'iperf', 'iperf', 'iperf'); // Conexion con la base
        return $base;
    };

    $conexion = mybase();
    $sql = 'select switch from switches';
    $lista_s = mysqli_query($conexion,$sql);
    
    function host($conexion,$lista_s){
        while ($lista = mysqli_fetch_array($lista_s)){
            echo '<option value = "'.$lista['switch'].'">'.$lista['switch'].'</option>';
        };
    };
    
    function grafico_single(){
        $consulta = mysqli_query($conexion,'select dia,medido from diario_ps where ubicacion = "'.$switch.'";');
        $valoresX=array();
        $valoresY=array();
        while ($res = mysqli_fetch_row($consulta)){
            $datoX = $res[0];
            $datoY = $res[1];
            $valoresX = json_encode($datoX);
            $valoresY = json_encode($datoY);
        }
    };
?>