<?php
	$accion=$_REQUEST['accion'];
	require_once("../model/factura.php");
	switch($accion)
	{
		case 'guardar':
			$id=$_REQUEST['id'];
			$fechaFactura=$_REQUEST['fechaFactura'];
			$id_cliente=$_REQUEST['id_cliente'];
			$id_mesa=$_REQUEST['id_mesa'];
			$id_Camarero=$_REQUEST['id_Camarero'];
			$ID_USUARIO=$_REQUEST['ID_USUARIO'];
			$factura=new factura($id,$fechaFactura,$id_cliente,$id_mesa,$id_Camarero,$ID_USUARIO);
			$factura->guardar();
			break;
		case 'eliminar':
			$id=$_REQUEST['id'];
			$factura=new factura($id,"","","","","");
			$factura->eliminar();
			break;
		case 'buscar':
			$campo=$_REQUEST['campo'];
			$operador=$_REQUEST['operador'];
			$valor=$_REQUEST['valor'];
			$tipo=$_REQUEST['tipo'];
			$factura=new factura(0,"","","","","");
			
			if($tipo==0)
			{	$ini=$_REQUEST['ini'];
				$n=$_REQUEST['n'];
				$j=$factura->buscar($campo,$operador,$valor,$ini,$n);
			}
			else
				$j=$factura->totalRegs($campo,$operador,$valor);
			echo $j;	
			break;
		case 'getFacturas':
			$factura=new factura(0,"","","","","");
			$facturas = $factura->getFacturas();

			echo $facturas;
			break;
	}
?>
