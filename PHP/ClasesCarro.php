<?php
class Carro
{

    Private $id;
	Private $clavetrans;
	Private $fecha;
	Private $correocli;
	private $total;
	private $estatus;
	private $Conexion;

	//Constructor
	public function Carro()
	{
		
	}

	public function getid()
	{
		return $this->id;
	}

	
	public function getclavetrans()
	{
		return $this->clavetrans;
	}

	public function getfecha()
	{
		return $this->fecha;
	}

	public function getcorreocli()
	{
		return $this->correocli;
	}

	public function gettotal()
	{
		return $this->total;
	}

	public function getestatus()
	{
		return $this->estatus;
	}

	

	public function setid($newVal)
	{
		 $this->id=$newVal;
	}

	
	public function setclavetrans($newVal)
	{
		 $this->clavetrans=$newVal;
	}

	public function setfecha($newVal)
	{
		 $this->fecha=$newVal;
	}

	public function setcorreocli($newVal)
	{
		 $this->correocli=$newVal;
	}

	public function settotal($newVal)
	{
		 $this->total=$newVal;
	}

	public function setestatus($newVal)
	{
		 $this->estatus=$newVal;
	}

	
	public function crearVenta($codproducto,$nombre_producto,$descripcion,$precio,$existencia,$imagen)
	{
		
		$this->id=$id;
		$this->clavetrans=$clavetrans;
		$this->fecha=$fecha;
		$this->correocli=$correocli;
		$this->total=$total;
		$this->estatus=$estatus;
		
	}
	
	public function agregarVenta()
	{	
		$this->Conexion=Conectarse();
		$sql="INSERT INTO ventas(id, clavetrans, fecha, correocli, total, estatus)
        values ('$this->id', '$this->clavetrans','$this->fecha','$this->correocli','$this->total','$this->estatus')";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}
}
?>