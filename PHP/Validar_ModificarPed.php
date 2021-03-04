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
	echo '<script type="text/javascript">
    alert("Pedido Actualizado");
    window.location.href="../indexAD.php?p=PedidosADMI";
    </script>';
}else{
	echo '<script type="text/javascript">
    alert("Error Al Actualizar");
    window.location.href="../indexAD.php?p=PedidosADMI";
    </script>';
}
?>