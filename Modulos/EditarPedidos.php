<?php

?>
<form method="post" action="PHP/Validar_ModificarPed.php" class="formAñadirP">
	<h2>Estado Del Pedido</h2><br>

	<div class="form-group">
		<input type="text" class="form-control" name="id" id="id" placeholder="ID Pedido" pattern="[0-9]+">
	</div>
	<div class="form-group">
		<select id="estatus" name="estatus">
		    <option value="">--Estatus Del Pedido--</option>
		    <option value="Pendiente">Pendiente</option>
		    <option value="Procesado">Procesado</option>
		</select>
	</div>
	<div class="form-group">
		<button type="submit" class="btnn" name="enviar"><i class="fa fa-check"></i> Actualizar Estatus</button>
	</div>
</form>	
</form>