<?php
require "ConexionBD.php";
include "../Carrito.php";
require "ClasesCarro.php";
?>
<?php  
if ($_POST){ 
	$total=0;
	$fecha=date('Y-m-d');
	$SID=session_id();
	$correo=$_POST['email'];
	$telefono=$_POST['telefono'];
	$idventa=NULL;
	foreach ($_SESSION['CARRITO'] as $indice => $producto) {
		$total=$total+($producto['precio'])*$producto['cantidad'];
		}

$objProducto= new Carro();

$objProducto->crearVenta($idventa, $fecha, $correo, $telefono, $total, 'Pendiente');

$resultado=$objProducto->agregarVenta();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Colchones Dulce Abrigo</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../iconos/fontawesome/css/all.css">
</head>

<body>
	<div class="jumbotron text-center">
  <h1 class="display-4">¡Compra Realizada!</h1>
  <p class="lead"></p>
  <hr class="my-4">
  <p> Tu Pedido Ha Sido Realizado El Pago Contra Entrega Sera De:
  	<h4>$<?php echo number_format($total); ?></h4>
    <h6>(IVA Incluido)</h6>
  </p>
    <a class="btn btn-primary btn-lg" href="../index.php" role="button">Volver Al Inicio</a><br><br><br>
  <p>
  	Los Productos Seran Enviados A La Puerta De Tu Casa 10 Dias Despues De Tu Encargo<br>
  	<strong>(Para Dudas O Quejas: AsistenciaDulceAbrigo@gmail.com)</strong>
  </p>
</div>
</body>	