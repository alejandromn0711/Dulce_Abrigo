<?php
class Venta
{

    Private $id;
	Private $idventa;
	Private $idproducto;
	private $peciounit;
	private $cantidad;
	private $Conexion;

	//Constructor
	public function Venta()
	{
		
	}

	public function getid()
	{
		return $this->id;
	}

	public function getidventa()
	{
		return $this->idventa;
	}

	public function getidproducto()
	{
		return $this->idproducto;
	}

	public function getpreciounit()
	{
		return $this->preciounit;
	}

	public function getcantidad()
	{
		return $this->cantidad;
	}

	

	public function setid($newVal)
	{
		 $this->id=$newVal;
	}

	public function setidventa($newVal)
	{
		 $this->idventa=$newVal;
	}

	public function setidproducto($newVal)
	{
		 $this->idproducto=$newVal;
	}

	public function setpreciounit($newVal)
	{
		 $this->preciounit=$newVal;
	}

	public function setcantidad($newVal)
	{
		 $this->cantidad=$newVal;
	}

	
	public function crearregVenta($id,$idventa,$idproducto,$preciounit,$cantidad)
	{
		
		$this->id=$id;
		$this->idventa=$idventa;
		$this->idproducto=$idproducto;
		$this->preciounit=$preciounit;
		$this->cantidad=$cantidad;
		
	}
	
	public function agregarRegVenta()
	{	
		$this->Conexion=Conectarse();
		$sql="INSERT INTO registroventas(id, idventa, idproducto, preciounit, cantidad)
        values ('$this->id','$this->idventa','$this->idproducto','$this->preciounit','$this->cantidad')";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}
}
?>