<?php 
session_start();
	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Lectores.php";

	$obj= new lectores();

	$datos=array(
		$_POST['carne'],
		$_POST['nombre'],
		$_POST['direccion'],
		$_POST['telefono'],
		$_POST['cargo'],
		$_POST['sexo']
				);

	echo $obj->registrarLectores($datos);

 ?>