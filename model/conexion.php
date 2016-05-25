<?php
class conexion
{	private $server;
	private $user;
	private $clave;
	private $bd;
	public $conex;
	function __construct()
	{	$this->server="127.0.0.1";
		$this->user="root";
		$this->clave="";
		$this->bd="restaurante";
	}
	function conectar()
	{	$this->conex=new mysqli($this->server,$this->user,$this->clave,$this->bd);
	}
	function cerrar()
	{	$this->conex->close();
	}
}
?>