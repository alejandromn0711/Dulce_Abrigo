
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilosAñPro.css">
</head>
</html>
<?php
require "ConexionBD.php";
require "ClasesClientes.php";
extract($_REQUEST);
$default= "usuario.jpg";
if ($_REQUEST['imagen']=NULL) {
    $_REQUEST['imagen']=$default;
}
$objProducto= new Cliente();

$objProducto->crearcliente($_REQUEST['cedula'],$_REQUEST['correo'], $_REQUEST['nombre'], $_REQUEST['telefono'], $_REQUEST['direccion'], md5($_REQUEST['clave']), 'usuario.png');
$resultado=$objProducto->agregarcliente();

if ($resultado) {
	echo'<script type="text/javascript">
    alert("Usuario Registrado");
    window.location.href="../index.php";
    </script>';
}else{
	echo'<script type="text/javascript">
    alert("Registro Fallido, este usuario ya esta registrado");
    window.location.href="../index.php";
    </script>';
}
?>

