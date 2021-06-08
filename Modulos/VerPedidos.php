<?php
require_once "PHP/conexionbd.php";
require "PHP/ClasesPedidos.php";
extract($_REQUEST);

$objConexion = Conectarse();
$objpedido = new Pedido();

$resultado = $objpedido->consultarPedido();

?>
<!DOCTYPE html>
<html>

<head>
	<title>Ver pedidos</title>
</head>

<body>
	<div class="formAñadirQ">
		<h1 style="text-align:center">Ver pedidos</h1><br>
		<table style="border:1px solid #204a87; width:900px; height:400px;">
			<tr style="color:white; background-color: #204a87; text-align: center;" class="tr1">
				<td width="15%">ID Venta</td>
				<td width="25%">Fecha</td>
				<td width="30%">Cliente</td>
				<td width="15%">Total</td>
				<td width="15%">Estatus</td>
			</tr>

	</div>

	<?php
	while ($pedido = $resultado->fetch_object()) {
	?>

		<tr class="tr2" style="text-align: center; border:#204a87 1px solid;">
			<td width="15%"><?php echo $pedido->id ?></td>
			<td width="25%"><?php echo $pedido->fecha ?></td>
			<td width="30%"><?php echo $pedido->correocli ?></td>
			<td width="15%">$<?php echo $pedido->total ?></td>
			<td width="15%"><?php echo $pedido->estatus ?></td>
		</tr>
	<?php
	}
	?>
	</table>
</body>

</html>