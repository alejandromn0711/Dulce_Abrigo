<?php
use \PHPUnit\Framework\TestCase;

class HolaMundoTest extends TestCase{
	public function testDiceHolaMundoCuandoSaluda(){
		$holaMundo=New HolaMundo();
		$this->assertEquals('Hola Mundo!', $holaMundo->saluda());
	}
}

