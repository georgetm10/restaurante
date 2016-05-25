<?php
	$accion=$_REQUEST['accion'];
	require_once("../model/usuario.php");
	switch($accion)
	{
		case 'guardar':
			$Usuario=$_REQUEST['Usuario'];
			$Contrasena=$_REQUEST['Contrasena'];
			$Nombre=$_REQUEST['Nombre'];
			$Apellidos=$_REQUEST['Apellidos'];
			$DNI=$_REQUEST['DNI'];
			$email=$_REQUEST['email'];
			$Sexo=$_REQUEST['Sexo'];
			$Telefono=$_REQUEST['Telefono'];
			$Direccion=$_REQUEST['Direccion'];
			$usuario=new usuario($Usuario,$Contrasena,$Nombre,$Apellidos,$DNI,$email,$Sexo,$Telefono,$Direccion);
			$usuario->guardar();
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