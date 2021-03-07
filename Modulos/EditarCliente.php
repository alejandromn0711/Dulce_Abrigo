<?php

?>
<form method="post" action="Validar_ModificarCli.php" class="formAñadirP">
	<h2>Estado Del Cliente</h2><br>

	<div class="form-group">
		<input type="text" class="form-control" name="idcliente" id="codproducto" placeholder="Cedula" pattern="[0-9]+" minlength="7" maxlength="15">
	</div>
	<div class="form-group">
		<select id="estadocli" name="estado">
		    <option value="">--Estado Del Cliente--</option>
		    <option value="Activo">Activo</option>
		    <option value="Inactivo">Inactivo</option>
		</select>
	</div>
	<div class="form-group">
		<button type="submit" class="btnn" name="enviar"><i class="fa fa-check"></i> Actualizar Estado</button>
	</div>
</form>	
</form>