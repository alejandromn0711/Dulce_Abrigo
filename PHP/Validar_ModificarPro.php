<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
	<link rel="stylesheet" type="text/css" href="css/estilosAñPro.css">
</head>
</html>
<?php
require "../Modulos/VerPro.php";

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
	echo '<script type="text/javascript">
    alert("Producto Actualizado");
    window.location.href="../indexAD.php?p=ProductosADMI";
    </script>';
}else{
	echo '<script type="text/javascript">
    alert("Error Al Actualizar");
    window.location.href="../indexAD.php?p=ProductosADMI";
    </script>';
}
?>
