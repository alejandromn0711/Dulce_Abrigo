<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilosAñPro.css">
</head>
</html>
<?php
require "conexionbd.php";
require "ClasesProductos.php";
$objConexion=Conectarse();

$sql1= "SELECT producto SET nombre_producto=?, descripcion=?, precio=?, existencia=?, imagen=?, fk_idcategoria=? WHERE codproducto=?"; 
$sql="UPDATE producto SET nombre_producto=?, descripcion=?, precio=?, existencia=?, imagen=?, fk_idcategoria=? WHERE codproducto=?";

$resultado=$objConexion->Prepare($sql);

$nombre_producto=$_REQUEST['nombre_producto'];
$descripcion=$_REQUEST['descripcion'];
$precio=$_REQUEST['precio'];
$existencia=$_REQUEST['existencia'];
$imagen=$_REQUEST['imagen'];
$fk_idcategoria=$_REQUEST['fk_idcategoria'];
$codproducto=$_REQUEST['codproducto'];

$resultado->bind_param("sssssss",$nombre_producto, $descripcion, $precio, $existencia, $imagen, $fk_idcategoria, $codproducto);
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
