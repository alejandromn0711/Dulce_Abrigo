<?php
class Producto
{

    Private $codproducto;
	Private $nombre_producto;
	Private $descripcion;
	Private $precio;
	private $existencia;
	private $imagen;
	private $Conexion;

	//Constructor
	public function Producto()
	{
		
	}

	public function getcodproducto()
	{
		return $this->codproducto;
	}

	
	public function getnombre_producto()
	{
		return $this->nombre_producto;
	}

	public function getdescripcion()
	{
		return $this->descripcion;
	}

	public function getprecio()
	{
		return $this->precio;
	}

	public function getexistencia()
	{
		return $this->existencia;
	}

	public function getimagen()
	{
		return $this->imagen;
	}

	

	public function setcodproducto($newVal)
	{
		 $this->codproducto=$newVal;
	}

	
	public function setnombre_producto($newVal)
	{
		 $this->nombre_producto=$newVal;
	}

	public function setdescripcion($newVal)
	{
		 $this->descripcion=$newVal;
	}

	public function setprecio($newVal)
	{
		 $this->precio=$newVal;
	}

	public function setexistencia($newVal)
	{
		 $this->existencia=$newVal;
	}

	public function setimagen($newVal)
	{
		 $this->imagen=$newVal;
	}

	
	public function crearProducto($codproducto,$nombre_producto,$descripcion,$precio,$existencia,$imagen)
	{
		
		$this->codproducto=$codproducto;
		$this->nombre_producto=$nombre_producto;
		$this->descripcion=$descripcion;
		$this->precio=$precio;
		$this->existencia=$existencia;
		$this->imagen=$imagen;
		
	}
	
	public function agregarproducto()
	{	
		$this->Conexion=Conectarse();
		$sql="INSERT INTO producto(codproducto, nombre_producto, descripcion, precio, existencia, imagen)
        values ('$this->codproducto', '$this->nombre_producto','$this->descripcion','$this->precio','$this->existencia','$this->imagen')";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}
	
	public function consultarproducto()
	{
		$this->Conexion=Conectarse();
		$sql="SELECT * from producto";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}

	public function modificarproducto()
	{
		$this->Conexion=Conectarse();
		$sql="UPDATE producto SET nombre_producto=?, descripcion=?, precio=?, existencia=?, imagen=? WHERE codproducto=?";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}	




}
?>