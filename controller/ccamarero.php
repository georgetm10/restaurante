<?php
	$accion=$_REQUEST['accion'];
	require_once("../model/camarero.php");
	switch($accion)
	{
		case 'guardar':
			$nombre=$_REQUEST['nombre'];
			$apellido1=$_REQUEST['apellido1'];
			$apellido2=$_REQUEST['apellido2'];
			$camarero=new camarero($nombre,$apellido1,$apellido2);
			$camarero->guardar();
			break;
		case 'eliminar':
			$id=$_REQUEST['id'];
			$cliente=new cliente($id,"","","","","","");
			$cliente->eliminar();
			break;
		case 'buscarUsuario':
			$user=$_REQUEST['Usuario'];
			$Con=$_REQUEST['Con'];
			$usuario=new usuario(0,"","","","","","","","");
			$j=$usuario->buscarUsuario($user,$Con);
			echo $j;	
			break;
	}
?>