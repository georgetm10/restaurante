<?php
	$accion=$_REQUEST['accion'];
	require_once("../model/mesa.php");
	switch($accion)
	{
		case 'guardar':
			$NumComensales=$_REQUEST['NumComensales'];
			$ubicacion=$_REQUEST['ubicacion'];
			$mesa=new mesa($NumComensales,$ubicacion);
			$mesa->guardar();
			break;
		case 'eliminar':
			$id=$_REQUEST['id'];
			$mesa=new mesa($id,"","");
			$mesa->eliminar();
			break;
		case 'buscar':
			$campo=$_REQUEST['campo'];
			$operador=$_REQUEST['operador'];
			$valor=$_REQUEST['valor'];
			$tipo=$_REQUEST['tipo'];
			$mesa=new mesa(0,"","");
			
			if($tipo==0)
			{	$ini=$_REQUEST['ini'];
				$n=$_REQUEST['n'];
				$j=$mesa->buscar($campo,$operador,$valor,$ini,$n);
			}
			else
				$j=$mesa->totalRegs($campo,$operador,$valor);
			echo $j;	
			break;
				case 'getMesas':
			$mesa=new mesa(0,"","");
			$mesas = $mesa->getMesas();
			echo $mesas;
			break;
	}
?>
