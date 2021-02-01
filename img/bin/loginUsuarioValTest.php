<?php
use \PHPUnit\Framework\TestCase;

class loginUsuarioValTest extends TestCase {

	private $op;
	public function setup(): void{

		$this->op=new loginUsuarioVal();
	}
	public function testCP1_ValidarCantidadMinimaCaracteresUser(){
		$this->op->verificarCaracteres("sebasadmi", "sebas123");
	}
	public function testCP2_ValidarCantidadMaximaCaracteresUser(){
		$this->op->verificarCaracteres("andresvend", "andres123");
	}
		public function testCP3_ValidarCantidadMinimaCaracteresContra(){
		$this->op->verificarCaracteres("saraadmi", "sara1234");
	}	
	public function testCP4_ValidarCantidadMaximaCaracteresContra(){
		$this->op->verificarCaracteres("fernanvend", "fernan123");
	}		
}

?>