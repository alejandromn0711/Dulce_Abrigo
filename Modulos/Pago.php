<?php

if ($_POST) {
	$total=0;
	$SID=session_id();
	$Correo=$_POST['email'];

	foreach ($_SESSION['CARRITO'] as $indice => $producto){
		$total=$total+($producto['cantidad']*$producto['precio']);

	$sql="INSERT INTO `ventas`
	    (`id`, `clavetrans`,`fecha`, `correo`, `total`, `estatus`) 
	    VALUES (NULL,`123456789`,NOW(),`alejandromn0711@gmail.com`,`1000000`,`pendiente`);";

	}echo "<h3>".$total."<h3>";
}
?>
