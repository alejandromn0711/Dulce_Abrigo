<?php

class estadoCliente{

	private $estados=array("Activo", "Inactivo");

	public function modificarCliente($cedula, $estado){

		if (strlen($cedula) < 7 || strlen($cedula) > 10 || !is_numeric($cedula)) {
			throw new InvalidArgumentException('Documento Invalido');
		}
		if (!in_array($estado, $this->estados)) {
			throw new InvalidArgumentException('Estado Invalido');
		}			
	}
} 
?>