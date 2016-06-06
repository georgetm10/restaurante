<?php
require_once("conexion.php");
class detallefactura
{	private $id;
	private $plato;
	private $importe;
	private $id_Cocinero;
	private $id_factura;
	
	public $mc; 
	
	function __construct($id,$plato,$importe,$id_Cocinero,$id_factura)
	{	$this->id=$id;
		$this->plato=$plato;
		$this->importe=$importe;
		$this->id_Cocinero=$id_Cocinero;
		$this->id_factura=$id_factura;
		
		$this->mc=new conexion();
	}
	function guardar()
	{	$datos='"'."'$this->plato','$this->importe',$this->id_Cocinero,$this->id_factura".'"';
		$sql="CALL guardar('detallefactura',$datos)";
		$this->mc->conectar();
		$res=$this->mc->conex->query($sql);
		$r=$res->fetch_array();
		return $r[0];
	}
	function eliminar()
	{		
		$sql="CALL eliminar('detallefactura','id_detallefactura',$this->id)";
		$this->mc->conectar();
		$this->mc->conex->query($sql);
	}
	function actualizar()
	{	$datos='"'."'$this->plato','$this->importe',$this->id_Cocinero,$this->id_factura".'"';
		$sql="CALL actualizar('detallefactura',$datos,'$this->id')";
		$this->mc->conectar();
		$this->mc->conex->query($sql);
	}
		function buscar($campo,$operador,$valor,$ini,$n)
	{	$sql="CALL buscar('detallefactura_vista','$campo','$operador','$valor',0,1000)";
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
	{	$sql="CALL buscar('detallefactura','$campo','$operador','$valor',0,1000)";
		$this->mc->conectar();
		$res=$this->mc->conex->query($sql);
		return $res->num_rows;
	}

}
?> 