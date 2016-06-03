<?php
	$accion=$_REQUEST['accion'];
	require_once("../model/camarero.php");
	switch($accion)
	{
		case 'guardar':
			$id=$_REQUEST['id'];
			$nombre=$_REQUEST['nombre'];
			$apellido1=$_REQUEST['apellido1'];
			$apellido2=$_REQUEST['apellido2'];
			$camarero=new camarero($id,$nombre,$apellido1,$apellido2);
			$camarero->guardar();
			break;
		case 'eliminar':
			$id=$_REQUEST['id'];
			$camarero=new camarero($id,"","","");
			$camarero->eliminar();
			break;
		case 'buscar':
			$campo=$_REQUEST['campo'];
			$operador=$_REQUEST['operador'];
			$valor=$_REQUEST['valor'];
			$tipo=$_REQUEST['tipo'];
			$camarero=new camarero(0,"","","");
			
			if($tipo==0)
			{	$ini=$_REQUEST['ini'];
				$n=$_REQUEST['n'];
				$j=$camarero->buscar($campo,$operador,$valor,$ini,$n);
			}
			else
				$j=$camarero->totalRegs($campo,$operador,$valor);
			echo $j;	
			break;
		case 'getCamareros':
			$camarero=new camarero(0,"","","");
			$camareros = $camarero->getCamareros();

			echo $camareros;
			break;
	}
?>