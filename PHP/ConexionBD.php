/*Conexion con la base datos */
<?php
function Conectarse()
{
	$Conexion=new mysqli("localhost","root","","proyecto");
	
	if ($Conexion->connect_errno) 
		echo "Problemas en la Conexion ". $Conexion->connect_error;
	else
		return $Conexion;
	
}

?>
