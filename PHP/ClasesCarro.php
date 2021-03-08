<?php
class Carro
{

    Private $id;
	Private $SeID;
	Private $fecha;
	Private $correocli;
	Private $telefono;
	private $total;
	private $estatus;
	private $direccion;
	private $cliente;
	private $cantidad;
	private $idpro;
	private $Conexion;

	//Constructor
	public function Carro()
	{
		
	}

	public function getid()
	{
		return $this->id;
	}

	public function getSeID()
	{
		return $this->SeID;
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

	public function getdireccion()
	{
		return $this->direccion;
	}

	public function getcliente()
	{
		return $this->cliente;
	}

	public function getcantidad()
	{
		return $this->cantidad;
	}

	public function getidpro()
	{
		return $this->idpro;
	}
	
	public function setid($newVal)
	{
		 $this->id=$newVal;
	}

	public function setSeID($newVal)
	{
		$this->SeID = $newVal;
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
	public function setdireccion($newVal)
	{
		$this->direccion = $newVal;
	}
	public function setcliente($newVal)
	{
		$this->cliente = $newVal;
	}
	public function setcantidad($newVal)
	{
		$this->cantidad = $newVal;
	}
	public function setidpro($newVal)
	{
		$this->idpro = $newVal;
	}
	
	public function crearVenta($id,$SeID,$fecha,$correocli,$telefono,$total,$estatus,$direccion,$cliente,$cantidad,$idpro)
	{
		
		$this->id=$id;
		$this->SeID = $SeID;
		$this->fecha=$fecha;
		$this->correocli=$correocli;
		$this->telefono=$telefono;		
		$this->total=$total;
		$this->estatus=$estatus;
		$this->direccion= $direccion;
		$this->cliente = $cliente;
		$this->cantidad = $cantidad;
		$this->idpro = $idpro;		
	}

	public function consultarVenta()
	{
		$this->Conexion = Conectarse();
		$sql = "SELECT * from ventas";
		$resultado = $this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}
	
	public function agregarVenta()
	{	
		$this->Conexion=Conectarse();
		$sql="INSERT INTO ventas(id, SeID, fecha, correocli, telefono, total, estatus,direccion,cliente,cantidad,idpro)
        values ('$this->id','$this->SeID','$this->fecha','$this->correocli','$this->telefono', '$this->total','$this->estatus','$this->direccion','$this->cliente','$this->cantidad','$this->idpro')";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}
}
?>