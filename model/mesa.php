<?php
require_once("conexion.php");
class mesa
{	private $id;
	private $NumComensales;
	private $ubicacion;
	public $mc; 
	
	function __construct($id,$NumComensales,$ubicacion)
	{
		$this->id=$id;
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
	function actualizar()
	{	$datos='"'."'$this->NumComensales','$this->ubicacion'".'"';
		$sql="CALL guardar('mesa',$datos)";
		$sql="CALL actualizar('mesa',$datos,$this->id)";
		//echo $sql;
		$this->mc->conectar();
		$this->mc->conex->query($sql);
	}
	function eliminar()
	{		
		$sql="CALL eliminar('mesa','id_mesa',$this->id)";
		$this->mc->conectar();
		$this->mc->conex->query($sql);
	}
	function buscar($campo,$operador,$valor,$ini,$n)
	{	$sql="CALL buscar('mesa','$campo','$operador','$valor',$ini,$n)";
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
	{	$sql="CALL buscar('mesa','$campo','$operador','$valor',0,1000)";
		$this->mc->conectar();
		$res=$this->mc->conex->query($sql);
		return $res->num_rows;
	}
	public function getMesas()
	{
		$sql = "Select * from mesa";
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
}