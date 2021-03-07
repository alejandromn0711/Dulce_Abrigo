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
    <link rel="stylesheet" href="css/style.css">

  </head>
  <div class="container">



    <h2>Editar informacion</h2>
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
        <img class="imgusuario" src="img/<?php echo $row['imagen'] ?>" alt="IMG USUARIO" name="imagencliente">
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1"><b>Nombre Completo</b></label>
        <input type="text" class="form-control" name="nombre" id="exampleFormControlInput1" value="<?php echo $row['nombre'] ?>">
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1"><b>Telefono</b></label>
        <input type="text" class="form-control" name="telefono" id="exampleFormControlInput1" value="<?php echo $row['telefono'] ?>">
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1"><b>Dirección</b></label>
        <input type="text" class="form-control" name="direccion" id="exampleFormControlInput1" value="<?php echo $row['direccion'] ?>">
      </div>

      <button type="submit" class="btn btn-primary" style="background-color: #204a87; border-color:#204a87;" name="actualizar">Actualizar información</button>
    </form>
    <br>

    <h2>Cambiar foto de perfil</h2>
    <form method="post" enctype="multipart/form-data">
      <?php

      if (isset($_POST['subir'])) {

        $subirarchivo = true;
        $subirarctivo_tamaño = $_FILES['archivo']['size'];
        echo $_FILES['archivo']['name'];

        if ($_FILES['archivo']['size'] > 2000000) {
          $msg = " El archivo es mayor que 200KB, debes reduzcirlo antes de subirlo";
          $subirarchivo = false;
        }

        if (!($_FILES['archivo']['type'] == "image/jpeg" or $_FILES['archivo']['type'] == "image/png")) {
          $msg = " Tu archivo tiene que ser JPG o png. Otros archivos no son permitidos";
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




        $sql = "SELECT * FROM cliente WHERE cedula = $cedula";
        $conexion = Conectarse();
        $resu = mysqli_query($conexion, $sql);
        $row = mysqli_fetch_array($resu);
        $id = $row['cedula'];



        $nombreusu = $_SESSION['nombre'];
        $sqlF = "UPDATE cliente SET imagen = '$nombreimg' WHERE cedula = '$id'";
        $resul = mysqli_query($conexion, $sqlF);

      }


      ?>

      <div class="form-group">
        <label for="exampleFormControlInput1"><b>Archivos permtidos</b></label><br>
        <input class='filestyle' data-buttonText="Logo" type="file" name="archivo" id="archivo">
      </div>

      <button type="submit" class="btn btn-primary" style="background-color: #204a87; border-color:#204a87;" name="subir">Actualizar foto</button>


    </form>






  </div>






  </div>
  <br>

<?php }  ?>


</html>