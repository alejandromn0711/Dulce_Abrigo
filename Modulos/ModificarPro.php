<?php

?>
<form method="post" action="PHP/Validar_ModificarPro.php" class="formAñadirP">
	<h2>Actualizar Productos</h2><br>
	<div class="form-group">
		<input type="text" class="form-control" name="codproducto" id="codproducto" placeholder="Codigo Del Producto" maxlength="3" minlength="1" pattern="[0-9]+" autocomplete="off">
	</div>

	<div class="form-group">
		<input type="text" class="form-control" name="nombre_producto" id="nombre_producto" placeholder="Nombre Del Producto" minlength="7" maxlength="30" autocomplete="off">
	</div>

	<div class="form-group">
		<input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion Del Producto" maxlength="50" autocomplete="off">
	</div>

	<div class="form-group">
		<input type="text" class="form-control" name="precio" id="precio" placeholder="Precio Del Producto" pattern="[0-9]+" autocomplete="off">
	</div>

	<div class="form-group">
		<input type="text" class="form-control" name="existencia" id="existencia" placeholder="Existencias Del Producto" maxlength="3" minlength="1" pattern="[0-9]+" autocomplete="off">
	</div>

	<div class="form-group">
		<input type="file" class="form-control" name="imagen" id="imagen" placeholder="Imagen Del Producto" autocomplete="off">
	</div>

	<div class="form-group">
		<input type="text" class="form-control" name="fk_idcategoria" id="fk_idcategoria" placeholder="Categoria" maxlength="1" minlength="1" pattern="[1-5]+" autocomplete="off">
	</div>

	<div class="form-group">
		<button type="submit" class="btnn" name="enviar"><i class="fa fa-check"></i> Actualizar Producto</button>
	</div>
</form>
</form>