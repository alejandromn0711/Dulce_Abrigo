<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilosAñPro.css">
</head>
</html>
<?php
require "PHP/conexionbd.php";
require "PHP/ClasesProductosAd.php";
$objConexion=Conectarse();

$sql="UPDATE cliente SET estado=? WHERE cedula=?";

$resultado=$objConexion->Prepare($sql);

$estado=$_REQUEST['estado'];
$idcliente=$_REQUEST['idcliente'];

$resultado->bind_param("ss",$estado, $idcliente);
$result=$resultado->execute();

if ($result) {
	?>
<img class="LogoMensaje" src="img/1600738901566.png">
<div class="AllMensajes">
	<h2 class="MensajesP">Producto Actualizado</h2>
	<a class="volver" href="./IndexAd.php">Volver</a>
</div>
	<?php
}else{
	?>
<img class="LogoMensaje" src="img/1600738901566.png">
<div class="AllMensajes">
	<h2 class="MensajesP">Error Al Actualizar</h2>
	<a class="volver" href="./IndexAd.php">Volver</a>
</div>
	<?php
}
?>
