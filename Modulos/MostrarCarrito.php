<?php
if (!isset($_SESSION['active'])) {
	echo '<script type="text/javascript">
    alert("¡Primero Inicia Sesion!");
    window.location.href="Modulos/Logincliente.php";
    </script>';
}
?>
<br>
<h3 class="nomcarro"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		<path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
	</svg> Carrito De Compras</h3><br>
<script type="text/javascript">
	function ConfirmCompra() {
		var respuesta = confirm("¿Estas Seguro Que Deseas Realizar Tu Pedido? \n(Recuerda Verificar Que Tus Datos Esten Actualizado)");
		if (respuesta == true) {
			return true;
		} else
			return false;
	}
</script>
<?php if (!empty($_SESSION['CARRITO'])) {
?>
	<table class="table table-bordered">
		<tbody>
			<tr>
				<th  id="" class="text-center">Nombre</th>
				<th  id="" class="text-center">Cantidad</th>
				<th  id="" class="text-center">Precio</th>
				<th  id="" class="text-center">Total</th>
				<th id="" class="text-center">--</th>
			</tr>
			<?php $total = 0; ?>
			<?php foreach ($_SESSION['CARRITO'] as $indice => $producto) {
			?>
				<tr>
					<td  id="" class="text-center"><?php echo $producto['nombre'] ?></td>
					<td  id="" class="text-center"><?php echo $producto['cantidad'] ?></td>
					<td  id="" class="text-center"><?php echo number_format($producto['precio']) ?></td>
					<td  id="" class="text-center"><?php echo number_format($producto['cantidad'] * $producto['precio']) ?></td>
					<td>
						<form action="" method="post">

							<input type="hidden" id="codproducto" name="codproducto" value="<?php echo openssl_encrypt($producto['codproducto'], COD, KEY); ?>">

							<button class="btn btn-danger" type="submit" name="btnAccion" value="Eliminar">Eliminar</button>
						</form>
					</td>

				</tr>
				<?php $total = $total + ($producto['cantidad'] * $producto['precio']); ?>
			<?php } ?>
			<tr>
				<td colspan="3">
					<h3>Total</h3>
				</td>
				<td>
					<h3>$<?php echo number_format($total); ?></h3>
				</td>
				<td></td>
			</tr>
			<td colspan="5">
				<form action="PHP/ValidarCarro.php" method="post">
					<div class="alert-success">
						<small id="emailHelp" class="form-text text-muted" style="text-align: center;">La Factura Se Enviara Tu Correo <br> (Verifica Que Tus Datos Esten Actualizados)</small>
					</div><br>
					<button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="Enviar" onclick="return ConfirmCompra()">Finalizar Compra</button>
				</form>
			</td>
		</tbody>
	</table>
<?php } else { ?>
	<div class="alert alert-success" style="color: #204a87; width: 60%; margin-left: 20%;">
		No Hay Productos En El Carrito...
	</div>
<?php } ?>