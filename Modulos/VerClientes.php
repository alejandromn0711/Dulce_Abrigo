<?php
require_once "PHP/conexionbd.php";
require "PHP/ClasesClientes.php";
extract($_REQUEST);

$objConexion = Conectarse();
$objcliente = new Cliente();

$resultado = $objcliente->consultarcliente();

?>
<!DOCTYPE html>
<html>

<head>
	<title>Ver clientes</title>
</head>

<body>
	<div class="formAñadirQ">
		<h1 style="text-align:center">Ver Clientes</h1><br>
		<div class="table-responsive">
		<table style="border:1px solid #204a87; width:900px; height:400px;" class="table table-bordered">
			<tr style="color:white; background-color: #204a87; text-align: center;" class="tr1">
				<td width="10%">Cedula</td>
				<td width="25%">Correo</td>
				<td width="15%">Nombre</td>
				<td width="15%">Telefono</td>
				<td width="35%">Direccion</td>
			</tr>

	</div>

	<?php
	while ($cliente = $resultado->fetch_object()) {
	?>
		<tr class="tr2" style="text-align: center; border:#204a87 1px solid;">
			<td width="10%"><?php echo $cliente->cedula ?></td>
			<td width="29%"><?php echo $cliente->correo ?></td>
			<td width="20%"><?php echo $cliente->nombre ?></td>
			<td width="16%"><?php echo $cliente->telefono ?></td>
			<td width="25%"><?php echo $cliente->direccion ?></td>
		</tr>
	<?php
	}
	?>
	</table>
	</div>
</body>

</html>