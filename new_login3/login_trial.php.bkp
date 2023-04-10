<?php // Obtiene las variables del login del mk
$ip = $_GET['ip'];
$macesc = $_GET['mac-esc'];
$username =  $_GET['username'];
$linkloginonly =  $_GET['link-login-only'];
$linkorigesc =  $_GET['link-orig-esc'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body class="login">
    <div style="margin:0;padding:50;display:inline"></div>
    <center id="centro"> <!--Campo central con los componentes -->
		<div id="head"></div>
	<div id="box">
		<img class="logo" src="logo_sin_fondo.png" width="208px;"/> <!--Imagen de fondo width="208px;"-->
		<div>
			<form name="login" action="accion.php" method="post"> <!--El formulario toma los datos y los envia al login del mk -->
				<div id="campo" style="margin-top: 5px"><input id="email" class="campos" name="email" type="email" placeholder="Correo electronico" required></div> <!--Campo de email (obligatorio)-->
				<input name="backlink" value="<?php echo $linkloginonly; ?>?dst=<?php echo $linkorigesc; ?>&username=T-<?php echo $macesc; ?>" hidden> <!--Almacena el enlace de regreso al mk, el cual se envia a accion.php para la redireccion-->
				<input name="ip_send" value="<?php echo $ip; ?>" hidden> <!-- Tambien envia la ip del cliente -->
				<button id="freebot" type="submit" class="button">Ingresar</button><!--Boton submit, id freebot aplica estilo-->
			</form>
			<p><span style="color: rgb(6, 17, 114); font-size: 16px">Ingrese un email para recibir un voucher o <br>puede elegir navegar por 10 minutos</span></p><!--Mensaje de instruccion-->
			<form action="accion2.php" method="post">
				<input name="backlink" value="<?php echo $linkloginonly; ?>?dst=<?php echo $linkorigesc; ?>&username=T-<?php echo $macesc; ?>" hidden>
				<button type="submit" class="boton">Navegar por 10 minutos</button>
			</form>
		</div>
	</center>
    <div class='pre-footer'><!-- Footer vacio-->
		<p> </p><span></span>
	</div>
	<div class='footer'>
	<br>
	<p></p>
</body>
</html>
