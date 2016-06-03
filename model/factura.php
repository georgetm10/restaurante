<?php
require_once("conexion.php");
class factura
{	private $id;
	private $fechaFactura;
	private $id_cliente;
	private $id_mesa;
	private $id_Camarero;
	private $ID_USUARIO;
	
	public $mc; 
	
	function __construct($id,$fechaFactura,$id_cliente,$id_mesa,$id_Camarero,$ID_USUARIO)
	{	$this->id=$id;
		$this->fechaFactura=$fechaFactura;
		$this->id_cliente=$id_cliente;
		$this->id_mesa=$id_mesa;
		$this->id_Camarero=$id_Camarero;
		$this->ID_USUARIO=$ID_USUARIO;
		
		$this->mc=new conexion();
	}
	function guardar()
	{	$datos='"'."'$this->fechaFactura',$this->id_cliente,$this->id_mesa,$this->id_Camarero,$this->ID_USUARIO".'"';
		$sql="CALL guardar('factura',$datos)";
		$this->mc->conectar();
		$res=$this->mc->conex->query($sql);
		$r=$res->fetch_array();
		return $r[0];
	}
	function eliminar()
	{		
		$sql="CALL eliminar('factura','id_factura',$this->id)";
		$this->mc->conectar();
		$this->mc->conex->query($sql);
	}
	function actualizar()
	{	$datos='"'."'$this->fechaFactura',$this->id_cliente,$this->id_mesa,$this->id_Camarero,$this->ID_USUARIO".'"';
		$sql="CALL actualizar('factura',$datos,'$this->id')";
		$this->mc->conectar();
		$this->mc->conex->query($sql);
	}
		function buscar($campo,$operador,$valor,$ini,$n)
	{	$sql="CALL buscar('factura','$campo','$operador','$valor',0,1000)";
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
	{	$sql="CALL buscar('factura','$campo','$operador','$valor',0,1000)";
		$this->mc->conectar();
		$res=$this->mc->conex->query($sql);
		return $res->num_rows;
	}
	public function getFacturas()
	{
		$sql = "Select * from factura";
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
?> 