<?php
class Carro
{

    Private $id;
    Private $idproducto;
    Private $PrecioUnit;
    Private $Cantidad;
	Private $fecha;
	Private $correocli;
	Private $telefono;
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

	public function getfecha()
	{
		return $this->fecha;
	}

	public function getcorreocli()
	{
		return $this->correocli;
	}

	public function gettelefono()
	{
		return $this->telefono;
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

	public function setfecha($newVal)
	{
		 $this->fecha=$newVal;
	}

	public function setcorreocli($newVal)
	{
		 $this->correocli=$newVal;
	}

	public function settelefono($newVal)
	{
		 $this->telefono=$newVal;
	}


	public function settotal($newVal)
	{
		 $this->total=$newVal;
	}

	public function setestatus($newVal)
	{
		 $this->estatus=$newVal;
	}

	
	public function crearVenta($id,$fecha,$correocli,$telefono,$total,$estatus)
	{
		
		$this->id=$id;
		$this->fecha=$fecha;
		$this->correocli=$correocli;
		$this->telefono=$telefono;		
		$this->total=$total;
		$this->estatus=$estatus;

		
	}
	
	public function agregarVenta()
	{	
		$this->Conexion=Conectarse();
		$sql="INSERT INTO ventas(id, fecha, correocli, telefono, total, estatus)
        values ('$this->id','$this->fecha','$this->correocli','$this->telefono', '$this->total','$this->estatus')";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}
}
?>