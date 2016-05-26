<?php
require_once("conexion.php");
class mesa
{	private $id;
	private $NumComensales;
	private $ubicacion;
	public $mc; 
	
	function __construct($NumComensales,$ubicacion)
	{
		$this->NumComensales=$NumComensales;
		$this->ubicacion=$ubicacion;
		$this->mc=new conexion();
	}
	function guardar()
	{	$datos='"'."'$this->NumComensales','$this->ubicacion'".'"';
		$sql="CALL guardar('mesa',$datos)";
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