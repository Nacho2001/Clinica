<?php // Obtiene las variables del login del mk
$ip = $_GET['ip'];
$macesc = $_GET['mac-esc'];
$username =  $_GET['username'];
$linkloginonly =  $_GET['link-login-only'];
$linkorigesc =  $_GET['link-orig-esc'];
?>
<html lang="en">
<head> <!--titulo y hoja de estilo -->
    <title>cphotspot.net</title>
    <link rel="stylesheet" href="login.css" media="screen">
</head>
<body>
<div>
	<div style="margin:0;padding:50;display:inline"></div>

	<center id="centro"> <!--Campo central con los componentes -->
		<div id="head"></div>
	<div id="box">
		<img class="logo" src="logo_sin_fondo.png" width="208px;"/> <!--Imagen de fondo-->
		<div>
			<form name="login" action="accion.php" method="post"> <!--El formulario toma los datos y los envia al login del mk -->
				<div id="campo" style="margin-top: 5px"><input id="email" class="campos" name="email" type="email" placeholder="Correo electronico" required></div> <!--Campo de email (obligatorio)-->
				<input name="backlink" value="<?php echo $linkloginonly; ?>?dst=<?php echo $linklogrigesc; ?>&username=T-<?php echo $macesc; ?>" hidden> <!--Almacena el enlace de regreso al mk, el cual se envia a accion.php para la redireccion-->
				<button style="margin-top: 1%" id="freebot" type="submit" value="" class="button"></button><!--Boton submit, id freebot aplica estilo-->
			</form>
			<p><span style="color: rgb(6, 17, 114); font-size: 16px">Ingrese un email para recibir un voucher</span></p><!--Mensaje de instruccion-->
		</div>
	</center>
	<div class='pre-footer'><!-- Footer vacio-->
		<p> </p><span></span>
	</div>
	<div class='footer'>
	<br>
	<p></p>
	</div>
</div>
</body>
</html>
