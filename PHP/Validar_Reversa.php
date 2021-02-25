<?php
include "ValidarCarro.php";
?>
<?php
$objProducto= new Carro();

$objProducto->EliminarVenta($idventa, $fecha, $correo, $total, 'Pendiente');

$resultado=$objProducto->EliminarVenta();

?>