<?php
require_once "PHP/conexionbd.php";
require "PHP/ClasesPedidos.php";
extract($_REQUEST);

$objConexion = Conectarse();
$objpedido = new Pedido();

$resultado = $objpedido->consultarPedido();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Ver pedidos</title>
</head>

<body>
	<div class="formAñadirQ">
		<h1 style="text-align:center">Ver pedidos</h1><br>
		<div class="table-responsive">
			<table style="border:1px solid #204a87; width:900px;" class="table table-bordered">
				<tr style="color:white; background-color: #204a87; text-align: center;" class="tr1">
					<td width="15%">ID Venta</td>
					<td width="25%">Fecha</td>
					<td width="30%">Cliente</td>
					<td width="15%">Total</td>
					<td width="15%">Estatus</td>
					<td width="15%">Factura</td>
				</tr>

		</div>

		<?php
		while ($pedido = $resultado->fetch_object()) {
		?>

			<tr class="tr2" style="text-align: center; border:#204a87 1px solid;">
				<td width="15%"><?php echo $pedido->id ?></td>
				<td width="25%"><?php echo $pedido->fecha ?></td>
				<td width="30%"><?php echo $pedido->nombrecli ?></td>
				<td width="15%">$<?php echo $pedido->total ?></td>
				<td width="15%"><?php echo $pedido->estatus ?></td>
				<form action="Modulos/ModificarFacturas.php" method="post">
					<input type="hidden" name="id" value="<?php echo $pedido->id ?>">
					<input type="hidden" name="fecha" value="<?php echo $pedido->fecha ?>">
					<input type="hidden" name="nombre" value="<?php echo $pedido->nombrecli ?>">
					<input type="hidden" name="total" value="<?php echo $pedido->total ?>">
					<input type="hidden" name="estatus" value="<?php echo $pedido->estatus ?>">
					<td width="15%"><button class="botonpdf" type="submit" name="enviar">
					<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
						<path d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
						<path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
					</svg></button></td>
				</form>
			</tr>
		<?php
		}
		?>
		</table>
	</div>
</body>

</html>