<?php
class Pedido
{

    Private $id;
	Private $fecha;
	Private $correocli;
	Private $total;
	private $estatus;
	private $Conexion;


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

	public function settotal($newVal)
	{
		 $this->total=$newVal;
	}

	public function setestatus($newVal)
	{
		 $this->estatus=$newVal;
	}


	public function crearpedido($id,$fecha,$correocli,$total,$estatus)
	{
		
		$this->id=$id;
		$this->fecha=$fecha;
		$this->correocli=$correocli;
		$this->total=$total;
		$this->estatus=$estatus;	
	}

	public function consultarPedido()
	{
		$this->Conexion=Conectarse();
		$sql="SELECT * from ventas";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}


	public function modificarPedido()
	{
		$this->Conexion=Conectarse();
		$sql="UPDATE ventas SET fecha=?, correocli=?, total=?, direccion=?, estatus=? WHERE id=?";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}

}
?>