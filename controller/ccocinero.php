<?php
	$accion=$_REQUEST['accion'];
	require_once("../model/cocinero.php");
	switch($accion)
	{
		case 'guardar':
			$id=$_REQUEST['id'];
			$nombre=$_REQUEST['nombre'];
			$apellido1=$_REQUEST['apellido1'];
			$apellido2=$_REQUEST['apellido2'];
			$cocinero=new cocinero($nombre,$apellido1,$apellido2);
			$cocinero->guardar();
			break;
		case 'eliminar':
			$id=$_REQUEST['id'];
			$cocinero=new cocinero($id,"","","");
			$cocinero->eliminar();
			break;
		case 'buscar':
			$campo=$_REQUEST['campo'];
			$operador=$_REQUEST['operador'];
			$valor=$_REQUEST['valor'];
			$tipo=$_REQUEST['tipo'];
			$cocinero=new cocinero(0,"","","","");
			
			if($tipo==0)
			{	$ini=$_REQUEST['ini'];
				$n=$_REQUEST['n'];
				$j=$cocinero->buscar($campo,$operador,$valor,$ini,$n);
			}
			else
				$j=$cocinero->totalRegs($campo,$operador,$valor);
			echo $j;	
			break;
	}
?>
