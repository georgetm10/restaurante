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
		$this->id=$id;
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
	function actualizar()
	{	$datos='"'."'$this->nombre','$this->apellido1','$this->apellido2','$this->observaciones'".'"';
		$sql="CALL guardar('cliente',$datos)";
		$sql="CALL actualizar('cliente',$datos,$this->id)";
		//echo $sql;
		$this->mc->conectar();
		$this->mc->conex->query($sql);
	}
	function eliminar()
	{		
		$sql="CALL eliminar('cliente','id',$this->id)";
		$this->mc->conectar();
		$this->mc->conex->query($sql);
	}
	function buscar($campo,$operador,$valor,$ini,$n)
	{	$sql="CALL buscar('cliente','$campo','$operador','$valor',$ini,$n)";
		$this->mc->conectar();
		$res=$this->mc->conex->query($sql);
		$j='';
		if($res->num_rows>0)
		{	while($r=$res->fetch_array())
				$a[]=$r;
			$j=json_encode($a);
		}
		return $j;
	}
	function totalRegs($campo,$operador,$valor)
	{	$sql="CALL buscar('cliente','$campo','$operador','$valor',0,1000)";
		$this->mc->conectar();
		$res=$this->mc->conex->query($sql);
		return $res->num_rows;
	}
}