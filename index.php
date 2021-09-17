<?php
include 'Carrito.php';
if (!isset($_GET["p"])) {
  $p = "PaginaP";
} else {
  $p = $_GET["p"];
}

if (isset($_REQUEST["sesionDestroy"])) {
  session_destroy();
  header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Colchones Dulce Abrigo</title>
  <link rel="icon" type="image/jpg" href="img/icon.ico">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/style-usuario.css">
  <link rel="stylesheet" type="text/css" href="css/catEstilos.css">
</head>

<body>

  <!--BARRA DE NAVEGACION-->
  <nav class="navbar navbar-expand-lg" style="border-bottom: solid 2px white;">

    <a href="" class="navbar-brand"><img src="" alt="">Colchones Dulce Abrigo</a>


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
      <em class="fas fa-bars"></em>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">

      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="index.php" class="nav-link active">Home</a></li>
        <li class="nav-item"><a href="?p=Productos" class="nav-link">Productos</a></li>





        <?php
        if (!isset($_SESSION)) {
          session_start();
        }
        if (isset($_SESSION['active'])) {

          include "PHP/ConexionBD.php";
          $conexion = Conectarse();
          $cedula = $_SESSION['cedula'];
          $sql = "SELECT * FROM cliente WHERE cedula = '$cedula'";
          $resul = mysqli_query($conexion, $sql);
          $row = mysqli_fetch_array($resul)


        ?>

          <li class="nav-item"><a href="?p=Salir" class="nav-link">Salir</a></li>
          <li class="nav-item"><a href="?p=EditarInfoCliente" class="nav-link"><img class="imgcliente" width="20px" src="img/<?php echo $row['imagen'] ?>" alt="">&nbsp;&nbsp;<?php echo ucwords($row['nombre']); ?></a></li>
          <li class="nav-item"><a href="?p=MostrarCarrito" class="nav-link">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
              </svg><span class="contador">
          <?php echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']); ?></span></a></li>



        <?php
        } else {

        ?>

          <li class="nav-item"><a href="Modulos/LoginADMI.php" class="nav-link">ADMIN</a></li>
          <li class="nav-item"><a href="Modulos/Logincliente.php" class="nav-link">Iniciar sesion</a></li>

        <?php
        }
        ?>
      </ul>






    </div>
  </nav>
  <!-- FIN BARRA DE NAVEGACION-->


  <div class="cuerpo">

    <?php
    if (file_exists("Modulos/" . $p . ".php")) {
      include "Modulos/" . $p . ".php";
    } else {
      echo "modulo desconocido";
    }

    ?>

  </div><br>



  <!--FOOTER-->

  <footer>
    <div class="container">
      <div class="row text-light text-center py-4 justify-content-center">

        <div class="col-sm-10 col-md-8 col-lg-6">
          <img src="img/logo1.png" alt="">
          <p>AsistenciaDulceAbrigo@gmail.com<br>Telefono</p>
          <ul class="social pt-3">
            <li><a href="#" target="_blank"><em class="fab fa-facebook"></em></a></li>
            <li><a href="#" target="_blank"><em class="fab fa-instagram"></em></a></li>
            <li><a href="#" target="_blank"><em class="fab fa-twitter"></em></a></li>
          </ul>
        </div>

      </div>
    </div>
  </footer>

  <!--FIN FOOTER-->

  <!--PARTE DOS FOOTER-->

  <div class="socket text-light text-center py-3">
    <p>&copy; <a href="index.php" target="_blank">colchonesdulceabrigo.com</a></p>
  </div>

  <!-- FIN PARTE DOS FOOTER-->


  <!--FIN PAG-->



  </div>


</body>

</html>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/all.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.bundle2.min.js"></script>
<script>
  $(function() {
    $('[data-toggle="popover"]').popover()
  })
</script>