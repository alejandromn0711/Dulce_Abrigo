
<?php

include_once "PHP/conexionBD.php";

?>


<form method="post" action="indexADMI.php?p=EditarPedidos" >
<h2>Estado Del Pedido</h2><br>
	<div class="form-group">
	<input type="text" class="form-control" name="id" id="id" placeholder="ID Pedido" pattern="[0-9]+" required>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary" name="enviar"><em class="fa fa-check"></em> Consultar Pedido</button><br><br>
	</div>	
</form>

<?php

if(isset($_POST['id'])){

	$id = $_POST['id'];
	$sql = "SELECT * FROM ventas WHERE id = $id";
  	$conexion = Conectarse();
   	$resul = mysqli_query($conexion, $sql);



?>

<div class="table-responsive">
		<table class="table table-bordered">
			<tr style="background-color: #204a87; color:white;">
				<td>ID Venta</td>
				<td>Fecha</td>
				<td>Cliente</td>
				<td>Total</td>
				<td>Estatus</td>
			</tr>

</div>

	<?php
	if ($pedido = $resul->fetch_object()) {
	?>

		<tr class="tr2" style="text-align: center; border:#204a87 1px solid;">
			<td><?php echo $pedido->id ?></td>
			<td><?php echo $pedido->fecha ?></td>
			<td><?php echo $pedido->nombrecli ?></td>
			<td>$<?php echo $pedido->total ?></td>
			<td><?php echo $pedido->estatus ?></td>
		</tr>
	<?php
	}
}
	?>
</table>







<form method="post" action="PHP/Validar_ModificarPed.php" class="formAñadirP">

<div class="form-group">
		<input type="hidden" class="form-control" name="id" id="id" placeholder="ID Pedido" pattern="[0-9]+" value="<?php  echo $id ?>">
	</div>
	
	<div class="form-group">
		<select id="estatus" name="estatus" class="btn btn-success" >
		    <option value="">--Estatus Del Pedido--</option>
		    <option value="Pendiente">Pendiente</option>
		    <option value="Procesado">Procesado</option>
		</select>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary" name="enviar"><em class="fa fa-check"></em> Actualizar Estatus</button>
	</div>
</form>	
