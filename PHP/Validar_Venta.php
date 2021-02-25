<?php
require "ConexionBD.php";
include "../Carrito.php";
require "ClasesVentas.php";

?>
<?php  
if ($_POST){ 
  $total=0;
  $id=NULL;
  $SID=session_id();
  $correo=$_POST['email'];
  foreach ($_SESSION['CARRITO'] as $indice => $producto) {
    $total=$total+($producto['precio'])*$producto['cantidad'];
    }

$objProducto= new Venta();

$objProducto->crearregVenta($id, $idventa, $producto['codproducto'], $producto['precio'], $producto['cantidad']);

$resultado=$objProducto->agregarRegVenta();
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
  <h1 class="display-4">¡Todo Listo!</h1>
  <p class="lead"></p>
  <hr class="my-4">
  <p> El Pedido Ha Sido Realizado, El Pago Contraentrega Sera De:
  	<h4>$<?php echo number_format($total); ?></h4>
  </p>
    <p>
  	Los Productos Seran Enviados A La Puerta De Tu Casa 10 Dias Despues De Tu Encargo<br>
  	<strong>(Para Dudas O Quejas: alejandromn0711@gmail.com)</strong>
  </p>
</div>
</body>	