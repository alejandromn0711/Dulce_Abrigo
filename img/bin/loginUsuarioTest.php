<?php
use \PHPUnit\Framework\TestCase;

class loginUsuarioTest extends TestCase {

	private $op;
	public function setup(): void{

		$this->op=new loginUsuario();
	}
	public function testCP1_ValidarCantidadMinimaCaracteresUser(){
		$this->expectException(InvalidArgumentException:: class);
		$this->op->verificarCaracteres("sebas", "sebas123");
	}
	public function testCP2_ValidarCantidadMaximaCaracteresUser(){
		$this->expectException(InvalidArgumentException:: class);
		$this->op->verificarCaracteres("alejandromn071103", "alejandro123");
	}
		public function testCP3_ValidarCantidadMinimaCaracteresContra(){
		$this->expectException(InvalidArgumentException:: class);
		$this->op->verificarCaracteres("estefany90", "op1");
	}	
	public function testCP4_ValidarCantidadMaximaCaracteresContra(){
		$this->expectException(InvalidArgumentException:: class);
		$this->op->verificarCaracteres("luis0012", "holasoyluis00123455");
	}		
}

?>