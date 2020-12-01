<?php
require_once "PHP/conexionbd.php";
require "PHP/ClasesProductos.php";
extract($_REQUEST);

$objConexion=Conectarse();
$objProducto= new Producto();

$resultado=$objProducto->consultarproducto();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Ver Productos</title>
</head>
<body>
	<div class="formAñadirQ">
		<h1 align="center" >Ver Productos</h1><br>
		<table class="tablapro" border="1px solid white" width="900px;" height="400px;">
			<tr align="center" bgcolor="#204a87" class="tr1" style="color: white">	
				<td width="6%">Codigo</td>
				<td width="19%">Nombre</td>
				<td width="45%">Descripcion</td>
				<td width="10%">Precio</td>
				<td width="5%">Existencias</td>
				<td width="15%">Imagen</td>						
			</tr>	
		
	</div>

	<?php
		while ($producto=$resultado->fetch_object()){
		?>
		
			<tr class="tr2" style="text-align: center">
				<td width="6%"><?php echo $producto->codproducto ?></td>
				<td width="19%"><?php echo $producto->nombre_producto ?></td>
				<td width="45%"><?php echo $producto->descripcion ?></td>
				<td width="10%"><?php echo $producto->precio ?></td>
				<td width="5%"><?php echo $producto->existencia ?></td>
				<td width="15%"><?php echo $producto->imagen ?></td>
			</tr>
		<?php	
		}
		?>
		</table>
		<br><br>
</body>
</html>