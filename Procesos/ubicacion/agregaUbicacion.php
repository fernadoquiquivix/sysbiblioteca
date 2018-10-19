<?php 
	session_start();
	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Ubicacion.php";
	
	$ubicacion=$_POST['ubicacion'];

	$datos=array(
		$ubicacion);

	$obj= new ubicacion();

	echo $obj->agregaUbicacion($datos);


 ?>