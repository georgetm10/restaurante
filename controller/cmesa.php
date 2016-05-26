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