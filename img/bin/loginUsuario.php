<?php

class loginUsuario{

	public function verificarCaracteres($usuario, $contraseña){

		if (strlen($usuario) < 8 || strlen($usuario) > 15) {
			throw new InvalidArgumentException('Longitud De Caracteres Invalida');
		}
		if (strlen($contraseña) < 8 || strlen($contraseña) > 18) {
			throw new InvalidArgumentException('Longitud De Caracteres Invalida');
		}			
	}
} 
?>