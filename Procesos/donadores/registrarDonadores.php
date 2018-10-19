<?php 
session_start();
	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Donadores.php";

	$obj= new donadores();

	$datos=array(
	
		$_POST['nombre'],
		$_POST['telefono'],
		$_POST['direccion']
		);

	echo $obj->registrarDonadores($datos);

 ?>