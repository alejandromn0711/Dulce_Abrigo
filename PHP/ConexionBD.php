<?php
function Conectarse()
{
	$Conexion = new mysqli("localhost","root","Wozniak123","proyecto");
	
	if ($Conexion->connect_errno) 
		echo "Problemas en la Conexion ". $Conexion->connect_error;
	else
		return $Conexion;
	
}

?>
