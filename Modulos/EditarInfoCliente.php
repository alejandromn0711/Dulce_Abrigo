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




    <form method="POST">

      <?php

      if (isset($_POST['actualizar'])) {

        $conexion = Conectarse();
        $cedula = $_SESSION['cedula'];





        $sqlA = "UPDATE cliente SET nombre = '$_POST[nombre]' , telefono = '$_POST[telefono]' , direccion = '$_POST[direccion]', imagen = '$_POST[imagenclien]' WHERE cedula = $cedula";
        $resul = mysqli_query($conexion, $sqlA);

        if ($resul) {
          header('location:index.php?p=EditarInfoCliente');
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

      <div class="form-group">
        <label for="exampleFormControlInput1"><b>Cambiar Foto de perfil (jpg)</b></label><br>
        <input class='filestyle' data-buttonText="Logo" type="file" name="imagenclien" id="imagefile" accept="image/*">
      </div>


      <button type="submit" class="btn btn-primary" style="background-color: #204a87; border-color:#204a87;" name="actualizar">Actualizar información</button>
    </form>





  </div>






  </div>
  <br>

<?php }  ?>


</html>