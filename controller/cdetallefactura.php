<?php
	$accion=$_REQUEST['accion'];
	require_once("../model/detallefactura.php");
	switch($accion)
	{
		case 'guardar':
			$id=$_REQUEST['id'];
			$plato=$_REQUEST['plato'];
			$importe=$_REQUEST['importe'];
			$id_Cocinero=$_REQUEST['id_Cocinero'];
			$id_factura=$_REQUEST['id_factura'];
			$detallefactura=new detallefactura($id,$plato,$importe,$id_Cocinero,$id_factura);
			$detallefactura->guardar();
			break;
		case 'eliminar':
			$id=$_REQUEST['id'];
			$detallefactura=new detallefactura($id,"","","","");
			$detallefactura->eliminar();
			break;
		case 'buscar':
			$campo=$_REQUEST['campo'];
			$operador=$_REQUEST['operador'];
			$valor=$_REQUEST['valor'];
			$tipo=$_REQUEST['tipo'];
			$detallefactura=new detallefactura(0,"","","","");
			
			if($tipo==0)
			{	$ini=$_REQUEST['ini'];
				$n=$_REQUEST['n'];
				$j=$detallefactura->buscar($campo,$operador,$valor,$ini,$n);
			}
			else
				$j=$detallefactura->totalRegs($campo,$operador,$valor);
			echo $j;	
			break;
	}
?>
