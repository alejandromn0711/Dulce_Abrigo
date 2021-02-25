<?php
require_once "PHP/conexionbd.php";
require "PHP/ClasesPedidos.php";
extract($_REQUEST);

$objConexion=Conectarse();
$objpedido= new Pedido();

$resultado=$objpedido->consultarPedido();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Ver pedidos</title>
</head>
<body>
	<div class="formAñadirQ">
		<h1 align="center" >Ver pedidos</h1><br>
		<table border="1px solid white" width="900px;" height="400px;">
			<tr align="center" bgcolor="#204a87" class="tr1">	
				<td width="10%">ID Venta</td>
				<td width="25%">Fecha</td>
				<td width="40%">Correo cliente</td>
				<td width="15%">Total</td>
				<td width="10%">Estatus</td>	
			</tr>	
		
	</div>

	<?php
		while ($pedido=$resultado->fetch_object()){
		?>
		
			<tr class="tr2">
				<td width="10%"><?php echo $pedido->id ?></td>
				<td width="25%"><?php echo $pedido->fecha ?></td>
				<td width="40%"><?php echo $pedido->correocli ?></td>
				<td width="15%">$<?php echo $pedido->total ?></td>
				<td width="10%"><?php echo $pedido->estatus ?></td>
			</tr>
		<?php	
		}
		?>
		</table>
</body>
</html>