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
	echo '<script type="text/javascript">
    alert("Cliente Actualizado");
    window.location.href="../indexAD.php?p=ClientesADMI";
    </script>';
}else{
	echo '<script type="text/javascript">
    alert("Error Al Actualizar");
    window.location.href="../indexAD.php?p=ClientesADMI";
    </script>';
}
?>
