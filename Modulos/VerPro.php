<?php
require_once "PHP/conexionbd.php";
require "PHP/ClasesProductos.php";
extract($_REQUEST);

$objConexion = Conectarse();
$objProducto = new Producto();

$resultado = $objProducto->consultarproducto();

?>
<div class="agregarpro">
<h1>Administrar Productos</h1><br>
<a href="?p=AñadirPro" class="btn btn-success" >Añadir Producto <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
	<path d="M.5 3l.04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.684.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z" />
	<path d="M13.5 10a.5.5 0 0 1 .5.5V12h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V13h-1.5a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z" /></svg></a> 
</div>

<?php
$sql = "SELECT * FROM producto";
$conexion = Conectarse();
$resul = mysqli_query($conexion, $sql);
if (mysqli_num_rows($resul) > 0) {
	while ($row = mysqli_fetch_array($resul)) {
?>

		<div class="card mb-3" style=" max-width: 700px;">
			<div class="row g-0"">
				<div class=" col-md-4">
				<img style="margin-top: 40px;" title="<?php echo $row['nombre_producto']; ?>" alt="<?php echo $row['nombre_producto']; ?>" class="card-img-top" src="img/<?php echo $row['imagen']; ?>">
			</div>
			<div class="col-md-8">
				<div class="card-body">
					<form method="POST">
						<?php


						if (isset($_POST['actualizar'])) {

							$codproducto = $_POST['codproducto'];

							$sqlA = "UPDATE producto SET nombre_producto = '$_POST[nombre_producto]' , precio = '$_POST[precio]' , descripcion = '$_POST[descripcion]', existencia='$_POST[existencia]', imagen='$_POST[imagen]' WHERE codproducto = $codproducto";
							$resul = mysqli_query($conexion, $sqlA);

							if ($resul) {
								echo '<script type="text/javascript">
								alert("Producto Actualizado");
								window.location.href="indexAD.php?p=VerPro";
								</script>';
							}
						}

						?>
						<h5><input type="hidden" style="max-width:270px;" class="form-control" name="codproducto" id="codproducto" value="<?php echo $row['codproducto']; ?>"></h5>
						<h5><input style="max-width:270px;" class="form-control" name="nombre_producto" id="nombre_producto" required value="<?php echo $row['nombre_producto']; ?>"></h5>
						<h5><input style="max-width:270px;" class="form-control" name="precio" id="precio" required value="<?php echo $row['precio']; ?>"></h5>
						<o><input style="max-width:270px;" class="form-control" name="descripcion" id="descripcion" required value="<?php echo $row['descripcion']; ?>"></p>
							<p><input style="max-width:270px;" class="form-control" name="existencia" id="existencia" value="<?php echo $row['existencia']; ?>"></p>
							<input class='filestyle' data-buttonText="Logo" type="file" name="imagen" required id="imagen">
							<button class="btn btn-secondary" style="background-color: #204a87; border-color:#204a87; margin-top:-443px; margin-left:300px;" name="actualizar" type="submit"> Actualizar
							</button>
					</form>
				</div>
			</div>
		</div>
		</div>

		</body>
		<div class="dropdown">



			</html>

	<?php
	}
}
	?>