<?php
require_once("conexion.php");
class usuario
{	private $id;
	private $usuario;
	private $Contrasena;
	private $Nombre;
	private $apellidos;
	private $DNI;
	private $email;
	private $Sexo;
	private $Telefono;
	private $Direccion;	
	public $mc; 
	
	function __construct($usuario,$Contrasena,$Nombre,$Apellidos,$DNI,$email,$Sexo,$Telefono,$Direccion)
	{
		$this->usuario=$usuario;
		$this->Contrasena=$Contrasena;
		$this->Nombre=$Nombre;
		$this->Apellidos=$Apellidos;
		$this->DNI=$DNI;
		$this->email=$email;
		$this->Sexo=$Sexo;
		$this->Telefono=$Telefono;
		$this->Direccion=$Direccion;
		
		$this->mc=new conexion();
	}
	function guardar()
	{	$datos='"'."'$this->Nombre','$this->Apellidos','$this->DNI','$this->Direccion','$this->email','$this->Sexo','$this->Telefono','$this->usuario','$this->Contrasena'".'"';
		$sql="CALL guardar('usuario',$datos)";
		echo $sql;
		$this->mc->conectar();
		$res=$this->mc->conex->query($sql);
	}
	function buscarUsuario($user,$Con)
	{	
		$sql="CALL buscarUsuario('$user','$Con')";
		//echo "$sql";
		$this->mc->conectar();
		$re=$this->mc->conex->query($sql);
		//print_r($re);
		$j='';
		if($re->num_rows>0)
		{	while($r=$re->fetch_array())
				$a[]=$r;
			$j=json_encode($a);
		}
		else {
			$j = 0;
			$j=json_encode($j);
		}
		return $j;
	}
}
?> 