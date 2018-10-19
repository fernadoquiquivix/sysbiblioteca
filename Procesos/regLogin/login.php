<?php 
	session_start();
	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Usuarios.php";

	$obj= new usuarios();

	$datos=array(
		$_POST['usuario'],
	$_POST['password']
	);

	

	echo $obj->loginUser($datos);

 ?>