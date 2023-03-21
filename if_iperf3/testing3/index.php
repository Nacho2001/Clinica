<?php 
    $value_X = array();
    $value_Y = array();
    function mybase(){
        // Conexión con db = mysql_connect('ip_de_bd', 'usuario', 'clave', 'nombre_db')
        $base = mysqli_connect('localhost', 'iperf', 'iperf', 'iperf'); // Conexion con la base
        return $base;
    };

    $conexion = mybase();
    
    function host($conexion){
        $sql = 'select switch from switches';
        $lista_s = mysqli_query($conexion,$sql);
        while ($lista = mysqli_fetch_array($lista_s)){
            echo '<option value = "'.$lista['switch'].'">'.$lista['switch'].'</option>';
        };
    };

    function data($conexion){
        $sql = 'select dia,medido from diario_ps where ubicacion = "'.$switch.'"';
        $data_sw = mysqli_query($conexion,$sql);
        
        while ($ver = mysqli_fetch_row($data_sw)){
            $value_X[] = json_encode($ver[0]);
            $value_Y[] = json_encode($ver[1]);
        }
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <a>Elegir nivel</a><br>
        <select name="switch"  style="margin-top: 10px;">
            <option value="none">Switch</option>
            <?php host($conexion);?>
        </select>
        <input type="submit" value="Send">
    </form>
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $switch = $_POST['switch'];
    }
    ?>
    <canvas id="grafico" style="width: 100%; max-width: 600px;"></canvas>
    <?php 
        for($i=0; $i<$cont($value_X); $i++){echo $value_X[$i].'.';}
    ?>
</body>
<script>
    function take_var(){
        let xValues = [<?php for($i=0; $i<$cont($value_X); $i++){echo $value_X[$i].'.';} ?>];
        new Chart("grafico", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    data: [<?php for($i=0; $i<$cont($value_Y);$i++){echo $value_Y[$i].',';} ?>];
                    borderColor: 'red';
                    fill: false;
                }]
            },
            options: {display:false}
        })
    }
</script>
</html>