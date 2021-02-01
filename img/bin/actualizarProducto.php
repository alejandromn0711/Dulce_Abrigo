<?php

class actualizarProducto{

		private $codigosP=array("001", "002","003", "004", "005", "006", "007", "008", "009", "0001");

	public function verificarCaracteres($codigo, $nombre, $descripcion, $precio, $existencias){

		if (!in_array($codigo, $this->codigosP)){
		throw new InvalidArgumentException('Longitud De Caracteres Invalida');
		}
		if (strlen($nombre) <= 8 || strlen($nombre) >= 20){	
		throw new InvalidArgumentException('Longitud De Caracteres Invalida');
		}	
		if (strlen($descripcion) < 1){	
		throw new InvalidArgumentException('Longitud De Caracteres Invalida');	
		}
		if (!is_numeric($precio)){
		throw new InvalidArgumentException('Longitud De Caracteres Invalida');
		} 
		if ($existencias < 0 || $existencias > 999 || !is_numeric($existencias)) {
		throw new InvalidArgumentException('Longitud De Caracteres Invalida');		
		}
	}	
} 
?>