<?php
class Cliente
{

    Private $cedula;
	Private $correo;
	Private $nombre;
	Private $telefono;
	private $clave;
	private $estado;
	private $direccion;
	private $Conexion;

	public function Cliente()
	{
		
	}

	public function getcedula()
	{
		return $this->cedula;
	}

	
	public function getcorreo()
	{
		return $this->correo;
	}

	public function getnombre()
	{
		return $this->nombre;
	}

	public function gettelefono()
	{
		return $this->telefono;
	}

	public function getclave()
	{
		return $this->clave;
	}

	public function getestado()
	{
		return $this->estado;
	}
	public function getdireccion()
	{
		return $this->direccion;
	}

	

	public function setcedula($newVal)
	{
		 $this->cedula=$newVal;
	}

	
	public function setcorreo($newVal)
	{
		 $this->correo=$newVal;
	}

	public function setnombre($newVal)
	{
		 $this->nombre=$newVal;
	}

	public function settelefono($newVal)
	{
		 $this->telefono=$newVal;
	}

	public function setclave($newVal)
	{
		 $this->clave=$newVal;
	}

	public function setestado($newVal)
	{
		 $this->estado=$newVal;
	}
	public function setdireccion($newVal)
	{
		 $this->direccion=$newVal;
	}	


	public function crearcliente($cedula,$correo,$nombre,$telefono,$clave, $direccion)
	{
		
		$this->cedula=$cedula;
		$this->correo=$correo;
		$this->nombre=$nombre;
		$this->telefono=$telefono;
		$this->clave=$clave;
		$this->direccion=$direccion;	
	}
	public function agregarcliente()
	{	
		$this->Conexion=Conectarse();
		$sql="INSERT INTO cliente( , correo, nombre, telefono, direccion, clave)
		values ('$this->cedula', '$this->correo','$this->nombre','$this->telefono','$this->direccion','$this->clave')";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
		}	
	


	public function consultarcliente()
	{
		$this->Conexion=Conectarse();
		$sql="SELECT * from cliente";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}


	public function modificarcliente()
	{
		$this->Conexion=Conectarse();
		$sql="UPDATE cliente SET correo=?, nombre=?, telefono=?, direccion=?, clave=? WHERE cedula=?";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}

}
?>