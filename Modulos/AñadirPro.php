<?php

?>
<form method="post" action="PHP/Validar_AgregarPro.php" class="formAñadirP">
	<h2>Añadir Productos</h2><br>
	<div class="form-group">
		<input type="text" class="form-control" name="codproducto" id="codproducto" placeholder="Codigo Del Producto" maxlength="3" minlength="1" pattern="[0-9]+" required>
	</div>

	<div class="form-group">
		<input type="text" class="form-control" name="nombre_producto" id="nombre_producto" placeholder="Nombre Del Producto" minlength="7" maxlength="30" required>
	</div>

	<div class="form-group">
		<input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion Del Producto" maxlength="50" required>
	</div>

	<div class="form-group">
		<input type="text" class="form-control" name="precio" id="precio" placeholder="Precio Del Producto" pattern="[0-9]+" required>
	</div>

	<div class="form-group">
		<input type="text" class="form-control" name="existencia" id="existencia" placeholder="Existencias Del Producto" maxlength="3" minlength="1" pattern="[0-9]+" required>
	</div>


	<div class="form-group">
		<input type="text" class="form-control" name="fk_idcategoria" id="fk_idcategoria" placeholder="Categoria" maxlength="1" minlength="1" pattern="[0-9]+" required>
	</div>

	<div class="form-group">
		<input type="file" class="form-control" name="imagen" id="imagen" placeholder="Imagen Del Producto" required>
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary" name="enviar"><em class="fa fa-check"></em> Agregar Producto</button><br><br>
		<a href="?p=VerPro" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
			<path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z" />
			<path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z" />
		</svg> Volver </a>
		
	</div>
</form>
