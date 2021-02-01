<?php
use \PHPUnit\Framework\TestCase;

class estadoClienteTest extends TestCase {

	private $op;
	public function setup(): void{

		$this->op=new estadoCliente();
	}
		public function testCP1_ValidarCantidadMinimaCaracteresCedula(){
		$this->expectException(InvalidArgumentException:: class);
		$this->op->modificarCliente("123", "Inactivo");
	}
		public function testCP2_ValidarCantidadMaximaCaracteresCedula(){
		$this->expectException(InvalidArgumentException:: class);
		$this->op->modificarCliente("10006948283", "Activo");
	}	
		public function testCP3_ValidarEstadoCliente(){
		$this->expectException(InvalidArgumentException:: class);
		$this->op->modificarCliente("10006743", "");
	}	
}	
