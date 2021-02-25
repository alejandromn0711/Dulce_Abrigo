<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilosAñPro.css">
</head>
</html>
<?php
require "conexionbd.php";
require "ClasesPedidos.php";
$objConexion=Conectarse();

$sql="UPDATE ventas SET estatus=? WHERE id=?";

$resultado=$objConexion->Prepare($sql);

$estatus=$_REQUEST['estatus'];
$id=$_REQUEST['id'];

$resultado->bind_param("ss",$estatus, $id);
$result=$resultado->execute();

if ($result) {
	?>
<img class="LogoMensaje" src="img/1600738901566.png">
<div class="AllMensajes">
	<h2 class="MensajesP">Producto Actualizado</h2>
	<a class="volver" href="../IndexAd.php">Volver</a>
</div>
	<?php
}else{
	?>
<img class="LogoMensaje" src="img/1600738901566.png">
<div class="AllMensajes">
	<h2 class="MensajesP">Error Al Actualizar</h2>
	<a class="volver" href="../IndexAd.php">Volver</a>
</div>
	<?php
}
?>