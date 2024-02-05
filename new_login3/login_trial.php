<?php // Obtiene las variables del login del mk
$ip = $_POST['ip'];
$macesc = $_POST['mac-esc'];
$username =  $_POST['username'];
$linkloginonly =  $_POST['link-login-only'];
$linkorigesc =  $_POST['link-orig-esc'];
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
				<button class="freebot" onclick="mensaje()" type="submit">Ingresar</button><!--Boton submit, id freebot aplica estilo-->
			</form>
			<p><span style="color: rgb(6, 17, 114); font-size: 16px">Ingrese un email para recibir un código de acceso o puede elegir navegar por 10 minutos</span></p><!--Mensaje de instruccion-->
			<form action="accion2.php" method="post">
				<input name="backlink" value="<?php echo $linkloginonly; ?>?dst=<?php echo $linkorigesc; ?>&username=T-<?php echo $macesc; ?>" hidden>
				<button type="submit" class="boton">Navegar por 10 minutos</button>
			</form>
			<button class="botonRed" onclick="visualizar()">Ya tengo un código</button>
			<form action="accion3.php" method="post" id="voucherCampo" style="margin-top: 10px" hidden>
				<input name="backlink" value="<?php echo $linkloginonly; ?>?dst=<?php echo $linkorigesc; ?>&username=" hidden>
				<input type="text" class="campos" name="username" placeholder="Código de ingreso">
				<button type="submit" class="freebot">Ingresar</button>
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
<script>
function mensaje(){
	alert("Tiene 10 minutos para verificar su email, luego ingrese el código cuando se le solicite")
}
function visualizar(){
	let campoVoucher = document.getElementById("voucherCampo")
	campoVoucher.removeAttribute("hidden")
}
</script>
</html>
