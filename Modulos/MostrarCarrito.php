<?php

?>
<br>
<h3 class="nomcarro"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
</svg> Carrito De Compras</h3><br>

<?php if (!empty($_SESSION['CARRITO'])) {	
?>
<table class="table table-bordered">
	<tbody>
		<tr>
			<th width="40%" class="text-center">Nombre</th>
			<th width="15%" class="text-center">Cantidad</th>
			<th width="20%" class="text-center">Precio</th>
			<th width="20%" class="text-center">Total</th>
			<th width="5%" class="text-center">--</th>
		</tr>
		<?php $total=0; ?>
		<?php foreach ($_SESSION['CARRITO'] as $indice => $producto) {
		?>
		<tr>
			<td width="40%" class="text-center"><?php echo $producto['nombre']?></td>
			<td width="15%" class="text-center"><?php echo $producto['cantidad']?></td>
			<td width="20%" class="text-center"><?php echo $producto['precio']?></td>
			<td width="20%" class="text-center"><?php echo number_format($producto['cantidad']*$producto['precio']) ?></td>	
			<td width="5%"> 
		<form action="" method="post">

			<input type="hidden" id="codproducto" name="codproducto" value="<?php echo openssl_encrypt($producto['codproducto'], COD, KEY);?>">

			<button class="btn btn-danger" 
			type="submit" 
			name="btnAccion" 
			value="Eliminar">Eliminar</button>
		</form>
		</td>
		
		</tr>
		<?php $total=$total+($producto['cantidad']*$producto['precio']);?>
		<?php } ?>
		<tr>
			<td colspan="3" align="right"><h3>Total</h3></td>
			<td align="center"><h3>$<?php echo number_format($total,2);?></h3></td>
			<td></td>		
		</tr>
		<td colspan="5" >
		<form action="PHP/ValidarCarro.php" method="post">
			<div class="alert-success">
				<div class="form-group">
				<label for="my-input">Correo De Contacto</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="Escribe Tu Correo" required>	
				</div>
				<small id="emailHelp" class="form-text text-muted">La Factura Se Enviara A Este Correo</small>
			</div><br>
			<button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="Enviar">Finalizar Compra</button>
		</form>
		</td>
	</tbody>
</table>
<?php }else{?>
<div class="alert alert-success" style="color: #204a87; width: 60%; margin-left: 20%;">
	No Hay Productos En El Carrito...
</div>
<?php } ?>