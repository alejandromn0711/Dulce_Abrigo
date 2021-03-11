<?php include_once "PHP/conexionBD.php"; ?>
<?php

if (!isset($_SESSION['active'])) {
  header("location: Modulos/Logincliente.php");
}

if (isset($_SESSION['active'])) {

?>

  <?php

  $cedula = $_SESSION['cedula'];
  $sql = "SELECT * FROM cliente WHERE cedula = $cedula";
  $conexion = Conectarse();
  $resul = mysqli_query($conexion, $sql);
  $row = mysqli_fetch_array($resul)

  ?>


  <!DOCTYPE html>

  <head>
    <title>Colchones Dulce Abrigo</title>
    <link rel="stylesheet" href="css/style-usuario.css">

  </head>

  <section class="seccion-perfil-usuario">
    <div class="perfil-usuario-header">
      <div class="perfil-usuario-portada">
        <img class="img" src="img/<?php echo $row['imagen'] ?>" alt="IMG USUARIO" name="imagencliente">
      </div>
    </div>

    <div class="perfil-usuario-body">
      <div class="perfil-usuario-bio">
        <h2>Actualizar información</h2>
        <form method="POST">

          <?php

          if (isset($_POST['actualizar'])) {

            $conexion = Conectarse();
            $cedula = $_SESSION['cedula'];

            $sqlA = "UPDATE cliente SET nombre = '$_POST[nombre]' , telefono = '$_POST[telefono]' , direccion = '$_POST[direccion]' WHERE cedula = $cedula";
            $resul = mysqli_query($conexion, $sqlA);

            if ($resul) {
              echo '<script type="text/javascript">
          alert("Se han actualizado los datos correctamente");
          window.location.href="index.php?p=EditarInfoCliente";
          </script>';
            }
          }

          ?>



          <div class="form-group">
            <label for="exampleFormControlInput1"><b>Nombre Completo</b></label>
            <input type="text" class="form-control" name="nombre" id="exampleFormControlInput1" value="<?php echo $row['nombre'] ?>" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1"><b>Telefono</b></label>
            <input type="text" class="form-control" name="telefono" id="exampleFormControlInput1" value="<?php echo $row['telefono'] ?>" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1"><b>Dirección</b></label>
            <input type="text" class="form-control" name="direccion" id="exampleFormControlInput1" value="<?php echo $row['direccion'] ?>" autocomplete="off">
          </div>

          <button type="submit" class="btn btn-primary" style="background-color: #204a87; border-color:#204a87;" name="actualizar">Actualizar información</button>
        </form>
      </div>
    </div>





    <div class="perfil-usuario-body">
      <div class="perfil-usuario-bio">
        <h2>Cambiar foto de perfil</h2>
        <form method="post" enctype="multipart/form-data">
          <?php

          if (isset($_POST['subir'])) {

            $subirarchivo = true;
            $subirarctivo_tamaño = $_FILES['archivo']['size'];
            echo $_FILES['archivo']['name'];

            if ($_FILES['archivo']['size'] > 200000) {
              $msg = '<script type="text/javascript">
          alert("El archivo pesa mas de 200kb");
          window.location.href="index.php?p=EditarInfoCliente";
          </script>';
              $subirarchivo = false;
            }


            if (!($_FILES['archivo']['type'] == "image/jpeg" or $_FILES['archivo']['type'] == "image/png")) {
              $msg = '<script type="text/javascript">
          alert("El formato del archivo es incorrecto prueba con una imagen JPG o PNG");
          window.location.href="index.php?p=EditarInfoCliente";
          </script>';
              $subirarchivo = false;
            }

            

            $nombreimg = $_FILES['archivo']['name'];
            $agregar = "img/$nombreimg";

            if ($subirarchivo == true) {

              if (move_uploaded_file($_FILES['archivo']['tmp_name'], $agregar)) {
                echo '<script type="text/javascript">
            alert("Se ha subido correctamente");
            window.location.href="index.php?p=EditarInfoCliente";
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
              $sql = "SELECT * FROM cliente WHERE cedula = $cedula";
              $conexion = Conectarse();
              $resu = mysqli_query($conexion, $sql);
              $row = mysqli_fetch_array($resu);
              $id = $row['cedula'];



            
              $sqlF = "UPDATE cliente SET imagen = '$nombreimg' WHERE cedula = '$id'";
              $resul = mysqli_query($conexion, $sqlF);
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
  </section>


  <br>

<?php }  ?>

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