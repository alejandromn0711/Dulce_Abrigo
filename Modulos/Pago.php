<?php
include "../PHP/ConexionBD.php";
include "../PHP/config.php";
include "../Carrito.php";
?>
<?php
if ($_POST){ 
	$total=0;
	foreach ($_SESSION['CARRITO'] as $indice => $producto) {
		$total=$total+($producto['precio'])*$producto['cantidad'];
		
	}
	echo "<h3>".$total."</h3>";
}
