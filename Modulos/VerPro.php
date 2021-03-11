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
	<a href="?p=AñadirPro" class="btn btn-success">Añadir Producto <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
			<path d="M.5 3l.04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.684.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z" />
			<path d="M13.5 10a.5.5 0 0 1 .5.5V12h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V13h-1.5a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z" />
		</svg></a>
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
							<button class="btn btn-secondary" style="background-color: #204a87; border-color:#204a87; margin-top:-390px; margin-left:300px;" name="actualizar" type="submit"> Actualizar
							</button>
					</form>
                    
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
          window.location.href="indexAD.php?p=VerPro";
          </script>';
								$subirarchivo = false;
							}


							if (!($_FILES['archivo']['type'] == "image/jpeg" or $_FILES['archivo']['type'] == "image/png")) {
								$msg = '<script type="text/javascript">
          alert("El formato del archivo es incorrecto prueba con una imagen JPG o PNG");
          window.location.href="indexAD.php?p=VerPro";
          </script>';
								$subirarchivo = false;
							}



							$nombreimg = $_FILES['archivo']['name'];
							$agregar = "img/$nombreimg";

							if ($subirarchivo == true) {

								if (move_uploaded_file($_FILES['archivo']['tmp_name'], $agregar)) {
									echo '<script type="text/javascript">
            alert("Se ha subido correctamente");
            window.location.href="indexAD.php?p=VerPro";
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
								$codproducto = $row['codproducto'];
								$sql = "SELECT * FROM producto WHERE codproducto = $codproducto";
								$conexion = Conectarse();
								$resu = mysqli_query($conexion, $sql);
								$row = mysqli_fetch_array($resu);
								$id = $row['codproducto'];



								$sqlB = "UPDATE producto SET imagen = '$nombreimg' WHERE codproducto = '$id'";
								$resul = mysqli_query($conexion, $sqlB);
								echo $id;
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
		<div class="dropdown">

		<?php
	}
}
	?>

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
            reader.onload = (function (theFile) {
                return function (e) {
                    // Insertamos la imagen
                    document.getElementById("img").innerHTML = ['<img class="thumb thumbnail" src="',e.target.result, '" width="200px" title="', escape(theFile.name), '"/>'].join('');
                };
            })(f);
            reader.readAsDataURL(f);
        }
    }
    document.getElementById('archivo').addEventListener('change', archivo, false);



  $('#cancelar').click(function(){
    $('#img').hide();

  });
</script>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/all.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.bundle2.min.js"></script>