<?php

   include_once "PHP/conexionBD.php";
   require "PHP/ClasesProductos.php";
   extract($_REQUEST);

   $objConexion = Conectarse();
   $objProducto = new Producto();

   $resultado = $objProducto->consultarproducto();

?>


<div class="agregarpro">
 <h1>Actualiza El Producto</h1><br>
  <a href="?p=VerPro" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
			<path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z" />
			<path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z" />
		</svg> Volver </a>
</div><br>



<?php
    
 if(isset($_POST['codproducto'])){

 

   $pro = $_POST['codproducto'];
   $sql = "SELECT * FROM producto WHERE codproducto = $pro";
   $conexion = Conectarse();
   $resul = mysqli_query($conexion, $sql);

   if (mysqli_num_rows($resul) > 0) {
	while ($row = mysqli_fetch_array($resul)) {

?>

 <!DOCTYPE html>
   <div class="card mb-3" style=" max-width: 680px;">
	<div class="row g-0"">
	 <div class=" col-md-4">
		<img style="margin-top: 140px;" title="<?php echo $row['nombre_producto']; ?>" alt="<?php echo $row['nombre_producto']; ?>" class="card-img-top" src="img/<?php echo $row['imagen']; ?>">
	 </div>

	<div class="col-md-8">
	  <div class="card-body">
		<form method="POST">

<?php
    if (isset($_POST['actualizar'])) {

	    $codproducto = $row['codproducto'];

		$sqlA = "UPDATE producto SET nombre_producto = '$_POST[nombre_producto]' , precio = '$_POST[precio]' , descripcion = '$_POST[descripcion]', existencia='$_POST[existencia]' WHERE codproducto = $codproducto";
		$resul = mysqli_query($conexion, $sqlA);

		if ($resul) {
			echo '<script type="text/javascript">
			alert("Producto Actualizado");
			window.location.href="indexADMI.php?p=VerPro";
			</script>';

				}
			}
?>


	<h5><input type="text" style="max-width:290px;" class="form-control" name="codproducto" id="codproducto" value="<?php echo $row['codproducto']; ?>"></h5>
	<h5><input style="max-width:290px;" class="form-control" name="nombre_producto" id="nombre_producto" required value="<?php echo $row['nombre_producto']; ?>"></h5>
	<h5><input style="max-width:290px;" class="form-control" name="precio" id="precio" required value="<?php echo $row['precio']; ?>"></h5>
	<o><input style="max-width:290px;" class="form-control" name="descripcion" id="descripcion" required value="<?php echo $row['descripcion']; ?>"></p>
	<p><input style="max-width:70px;" class="form-control" type="number" name="existencia" id="existencia" value="<?php echo $row['existencia']; ?>"></p>

		<button class="btn btn-secondary" style="background-color: #204a87; border-color:#204a87; margin:1rem;" name="actualizar" type="submit"> Actualizar</button>
	     </form>

<?php

	}

}else{
	echo '<script type="text/javascript">
	alert("Se Produjo Un Error Vuelve A Ingresar Un ID");
	window.location.href="indexADMI.php?p=VerPro";
	</script>';
}

 }
						
?>



					<h2>Actualizar foto de producto</h2>
					<form method="post" enctype="multipart/form-data">
						<?php

						if (isset($_POST['subir'])) {

							$subirarchivo = true;
							$subirarctivo_tamaño = $_FILES['archivo']['size'];
							echo $_FILES['archivo']['name'];

							if ($_FILES['archivo']['size'] > 200000) {
								$msg = '<script type="text/javascript">
							alert("El archivo pesa mas de 200kb");
							window.location.href="indexADMI.php?p=VerPro";
							</script>';
								$subirarchivo = false;
							}


							if (!($_FILES['archivo']['type'] == "image/jpeg" or $_FILES['archivo']['type'] == "image/png")) {
								$msg = '<script type="text/javascript">
							alert("El formato del archivo es incorrecto prueba con una imagen JPG o PNG");
							window.location.href="indexADMI.php?p=VerPro";
							</script>';
								$subirarchivo = false;
							}



							$nombreimg = $_FILES['archivo']['name'];
							$agregar = "img/$nombreimg";

							if ($subirarchivo == true) {

								if (move_uploaded_file($_FILES['archivo']['tmp_name'], $agregar)) {
									echo '<script type="text/javascript">
								alert("Se ha subido correctamente");
								window.location.href="indexADMI.php?p=VerPro";
								</script>';
								} else {
									echo '<script type="text/javascript"> alert("Error al subir el archivo");';
								}
							} else {
								echo $msg;
							}


							if ($subirarchivo == false) {
								exit();
							} else {
								 
								$sqlA = "SELECT * FROM producto";
								$conexionA = Conectarse();
								$resulA = mysqli_query($conexionA, $sqlA);
								$rowA = mysqli_fetch_array($resulA);

								$codpro = $rowA['codproducto'];



								$sql = "SELECT * FROM producto WHERE codproducto = '$codpro'";
								$conexion = Conectarse();
								$resu = mysqli_query($conexion, $sql);
								$row = mysqli_fetch_array($resu);
								$idpro = $row['codproducto'];
								



								$sqlB = "UPDATE producto SET imagen = '$nombreimg' WHERE codproducto = '$idpro'";
								$resulpro = mysqli_query($conexion, $sqlB);
								
							}
						}


						?>

						<div class="form-group">
							<label for="exampleFormControlInput1"><b>Archivos permtidos: JPG y PNG</b></label><br>
							<input class='filestyle' data-buttonText="Logo" type="file" name="archivo" id="archivo" required>
						</div>

						<div class="form-group">
							<label for="exampleFormControlInput1"><b>Imagen seleccionada:</b></label><br>
							<output id="img"></output>
						</div>


						<button type="submit" class="btn btn-primary" style="background-color: #204a87; border-color:#204a87;" name="subir">Actualizar foto</button>
						<button type="reset" class="btn btn-danger" id="cancelar">Cancelar</button>


					</form>
				</div>
			</div>
		</div>
		</div>

		</body>

</html>


<script>
	function archivo(evt) {
		var files = evt.target.files; // FileList object
		// Obtenemos la imagen del campo "file".
		for (var i = 0, f; f = files[i]; i++) {
			//Solo admitimos imágenes.
			if (!f.type.match('image.*')) {
				continue;
			}
			var reader = new FileReader();
			reader.onload = (function(theFile) {
				return function(e) {
					// Insertamos la imagen
					document.getElementById("img").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result, '" width="200px" title="', escape(theFile.name), '"/>'].join('');
				};
			})(f);
			reader.readAsDataURL(f);
		}
	}
	document.getElementById('archivo').addEventListener('change', archivo, false);



	$('#cancelar').click(function() {
		$('#img').hide();

	});
</script>