<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilosAñPro.css">
</head>
</html>
<?php
require "ConexionBD.php";
require "ClasesProductos.php";
extract($_REQUEST);

$objProducto= new Producto();

$objProducto->crearProducto($_REQUEST['codproducto'], $_REQUEST['nombre_producto'], $_REQUEST['descripcion'], $_REQUEST['precio'], $_REQUEST['existencia'], $_REQUEST['imagen'], $_REQUEST['fk_idcategoria']);

$resultado=$objProducto->agregarproducto();

if ($resultado) {
?>
<img class="LogoMensaje" src="img/1600738901566.png">
<div class="AllMensajes">
	<h2 class="MensajesP">Producto Agregado</h2>
	<a class="volver" href="../IndexAd.php">Volver</a>
</div>
	<?php
}else{
	?>
<img class="LogoMensaje" src="img/1600738901566.png">
<div class="AllMensajes">
	<h2 class="MensajesP">Error Al Agregar Producto</h2>
	<a class="volver" href="../IndexAd.php">Volver</a>
</div>
	<?php
}
?>