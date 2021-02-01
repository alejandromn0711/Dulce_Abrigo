<?php
use \PHPUnit\Framework\TestCase;

class agregarProductoTest extends TestCase {

	private $op;
	public function setup(): void{

		$this->op=new agregarProducto();
	}
	public function testCP1_ValidarCantidadMinimaCaracteresCod(){
		$this->expectException(InvalidArgumentException:: class);
		$this->op->verificarCaracteres("1222", "Colchon Sencillo", "Colchon", "10000", "12");
	}
	public function testCP2_ValidarCantidadMaximaCaracteresCod(){
		$this->expectException(InvalidArgumentException:: class);
		$this->op->verificarCaracteres("-10", "Colchon Doble", "Colchon Doble", "20000", "10");
	}
	public function testCP3_ValidarNumerosCod(){
		$this->expectException(InvalidArgumentException:: class);
		$this->op->verificarCaracteres("diez", "Colchon Matrimonial", "Colchon Matrimonial", "30000", "5");
	}
	public function testCP4_ValidarCantidadMinimaCaracteresNom(){
		$this->expectException(InvalidArgumentException:: class);
		$this->op->verificarCaracteres("11", "Colchon", "Colchon", "1000", "23");
	}
	public function testCP5_ValidarCantidadMaximaCaracteresNom(){
		$this->expectException(InvalidArgumentException:: class);
		$this->op->verificarCaracteres("12", "Colchon Super Extra Mega", "Colchon Super Extra Mega", "40000", "3");
	}
	public function testCP6_ValidarCantidadMinimaCaracteresDesc(){
		$this->expectException(InvalidArgumentException:: class);
		$this->op->verificarCaracteres("13", "Colchon King", "", "10000", "12");
	}
	public function testCP7_ValidarCaracteresPrecio(){
		$this->expectException(InvalidArgumentException:: class);
		$this->op->verificarCaracteres("14", "Colchon SemiDoble", "Colchon SemiDoble", "veintemil", "11");
	}	
	public function testCP8_ValidarCaracteresExistencias(){
		$this->expectException(InvalidArgumentException:: class);
		$this->op->verificarCaracteres("15", "Colchon Presidencial", "Colchon Presidencial", "60000", "cinco");
	}	
	public function testCP9_ValidarCantidadMinimaCaracteresExistencias(){
		$this->expectException(InvalidArgumentException:: class);
		$this->op->verificarCaracteres("16", "Almohada Doble", "Almohada Doble", "5000", "-11");
	}	
	public function testCP10_ValidarCantidadMaximaCaracteresPrecio(){
		$this->expectException(InvalidArgumentException:: class);
		$this->op->verificarCaracteres("17", "Almohada Sencilla", "Almohada Sencilla", "2000", "1000");
	}							
}
?>