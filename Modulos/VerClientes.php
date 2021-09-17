<?php
require_once "PHP/conexionbd.php";
require "PHP/ClasesClientes.php";
extract($_REQUEST);

$objConexion = Conectarse();
$objcliente = new Cliente();

$resultado = $objcliente->consultarcliente();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Ver clientes</title>
</head>

<body>
	<div class="formAñadirQ">
		<h1 style="text-align:center">Ver Clientes</h1><br>
		<div class="table-responsive">
		<table style="border:1px solid #204a87; width:900px; height:400px;" class="table table-bordered">
			<tr style="color:white; background-color: #204a87; text-align: center;" class="tr1">
				<td>Cedula</td>
				<td>Correo</td>
				<td>Nombre</td>
				<td>Telefono</td>
				<td>Direccion</td>
			</tr>

	</div>

	<?php
	while ($cliente = $resultado->fetch_object()) {
	?>
		<tr class="tr2" style="text-align: center; border:#204a87 1px solid;">
			<td><?php echo $cliente->cedula ?></td>
			<td><?php echo $cliente->correo ?></td>
			<td><?php echo $cliente->nombre ?></td>
			<td><?php echo $cliente->telefono ?></td>
			<td><?php echo $cliente->direccion ?></td>
		</tr>
	<?php
	}
	?>
	</table>
	</div>
</body>

</html>