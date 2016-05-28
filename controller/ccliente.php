<?php
	$accion=$_REQUEST['accion'];
	require_once("../model/cliente.php");
	switch($accion)
	{
		case 'guardar':
			$id=$_REQUEST['id'];
			$nombre=$_REQUEST['nombre'];
			$apellido1=$_REQUEST['apellido1'];
			$apellido2=$_REQUEST['apellido2'];
			$observaciones=$_REQUEST['observaciones'];
			$cliente=new cliente($nombre,$apellido1,$apellido2,$observaciones);
			$cliente->guardar();
			break;
		case 'eliminar':
			$id=$_REQUEST['id'];
			$cliente=new cliente($id,"","","","");
			$cliente->eliminar();
			break;
		case 'buscar':
			$campo=$_REQUEST['campo'];
			$operador=$_REQUEST['operador'];
			$valor=$_REQUEST['valor'];
			$tipo=$_REQUEST['tipo'];
			$cliente=new cliente(0,"","","","");
			
			if($tipo==0)
			{	$ini=$_REQUEST['ini'];
				$n=$_REQUEST['n'];
				$j=$cliente->buscar($campo,$operador,$valor,$ini,$n);
			}
			else
				$j=$cliente->totalRegs($campo,$operador,$valor);
			echo $j;	
			break;

		case 'getClientes':
			$cliente=new cliente(0,"","","","");
			$clientes = $cliente->getClientes();

			echo $clientes;
			break;
	}
?>
