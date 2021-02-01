<?php

class agregarProducto{

	public function verificarCaracteres($codigo, $nombre, $descripcion, $precio, $existencias){

		if ($codigo < 0 || $codigo > 999 || !is_numeric($codigo)){
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