<?php
require_once("conexion.php");
class cliente
{	private $id;
	private $nombre;
	private $apellido1;
	private $apellido2;
	private $observaciones;
	public $mc; 
	
	function __construct($nombre,$apellido1,$apellido2,$observaciones)
	{
		$this->nombre=$nombre;
		$this->apellido1=$apellido1;
		$this->apellido2=$apellido2;
		$this->observaciones=$observaciones;
		
		$this->mc=new conexion();
	}
	function guardar()
	{	$datos='"'."'$this->nombre','$this->apellido1','$this->apellido2','$this->observaciones'".'"';
		$sql="CALL guardar('cliente',$datos)";
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