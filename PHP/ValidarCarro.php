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
	$idventa=max('id');
	foreach ($_SESSION['CARRITO'] as $indice => $producto) {
		$total=$total+($producto['precio'])*$producto['cantidad'];
		}

$objProducto= new Carro();

$objProducto->crearVenta($idventa, $fecha, $correo, $total, 'Pendiente');

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
  <h1 class="display-4">¡Paso Final!</h1>
  <p class="lead"></p>
  <hr class="my-4">
  <p> Estas Apunto De Realizar Tu Pedido Por La Cantidad De:
  	<h4>$<?php echo number_format($total); ?></h4>
    <h6>(IVA No Incluido)</h6>
  </p>
  <form action="Validar_Venta.php" method="post">
    <button class="btn btn-primary btn-lg" href="#" role="button">Continuar</button><br><br><br>
  </form>
  <p>
  	Los Productos Seran Enviados A La Puerta De Tu Casa 10 Dias Despues De Tu Encargo<br>
  	<strong>(Para Dudas O Quejas: AsistenciaDulceAbrigo@gmail.com)</strong>
  </p>
</div>
</body>	