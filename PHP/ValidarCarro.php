<?php
include "../PHP/configPDO.php";
include "../PHP/ConexionPDO.php";
include "../Carrito.php";
?>
<?php

$total = 0;
$SID = session_id();
$correo = $_SESSION['nombre'];
foreach ($_SESSION['CARRITO'] as $indice => $producto) {
  $total = $total + ($producto['precio']) * $producto['cantidad'];
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Colchones Dulce Abrigo</title>
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../iconos/fontawesome/css/all.css">
</head>

<body>
  <div class="jumbotron text-center">
    <h1 class="display-4">¡Ultimo Paso!</h1>
    <p class="lead"></p>
    <hr class="my-4">
    <p> Vas A Realizar Una Compra Por:
    <h4>$<?php echo number_format($total); ?></h4>
    <h6>(IVA Incluido)</h6>
    </p>
    <a class="btn btn-success btn-lg" download="Factura<?php echo $_SESSION['nombre'] ?>" href="../Modulos/Factura.php">Procesar Compra</a><br><br>
    <form action="../index.php" method="post">
      <input type="submit" class="btn btn-danger btn-lg" name="sesionDestroy" value="Finalizar" />
    </form><br>
   <br><br>
    <p>
      Se Te Contactara Para Validar Tu Compra Y Los Productos Seran Enviados A La Puerta De Tu Casa 10 Dias Despues De Tu Encargo<br>
      <strong>(Para Dudas O Quejas: AsistenciaDulceAbrigo@gmail.com)</strong>
    </p>
  </div>
  </div>
</body>
<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.js"></script>

</html>