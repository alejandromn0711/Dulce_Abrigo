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
	echo '<script type="text/javascript">
    alert("Producto Agregado");
    window.location.href="../indexAD.php?p=ProductosADMI";
    </script>';
}else{
	echo '<script type="text/javascript">
    alert("Error Al Agregar");
    window.location.href="../indexAD.php?p=ProductosADMI";
    </script>';
}
?>