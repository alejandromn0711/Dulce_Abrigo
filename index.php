<?php
if (!isset($_GET["p"])) {
  $p = "PaginaP";
} else {
  $p = $_GET["p"];
}
?>



<!DOCTYPE html>
<html>

<head>
  <title>Colchones Dulce Abrigo</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="iconos/fontawesome/css/all.css">
</head>

<body>

  <!--BARRA DE NAVEGACION-->
  <nav class="navbar navbar-expand-lg">

    <a href="" class="navbar-brand"><img src="" alt="">Colchones Dulce Abrigo</a>


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
      <i class="fas fa-bars"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">

      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="index.php" class="nav-link active">Home</a></li>
        <li class="nav-item"><a href="?p=Productos" class="nav-link">Productos</a></li>
        <li class="nav-item"><a href="" class="nav-link">Carro de compras</a></li>




        <?php
        session_start();
        if (isset($_SESSION['active'])) {

        ?>


          <li class="nav-item"><a href="Modulos/Logincliente.php" class="nav-link"><i class="fas fa-user-alt fa-1x"></i>&nbsp;&nbsp;<?php echo ucwords($_SESSION['nombre']); ?></a></li>
          <li class="nav-item"><a href="?p=Salir" class="nav-link">Salir</a></li>


        <?php
        } else {

        ?>

          <li class="nav-item"><a href="Modulos/LoginADMI.php" class="nav-link">ADMI</a></li>
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

  </div>



  <!--FOOTER-->

  <footer>
    <div class="container">
      <div class="row text-light text-center py-4 justify-content-center">

        <div class="col-sm-10 col-md-8 col-lg-6">
          <img src="img/logo1.png" alt="">
          <p>ooooooooootro parrafo...</p>
          <ul class="social pt-3">
            <li><a href="#" target="_blank"><i class="fab fa-facebook"></i></a></li>
            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/all.min.js"></script>