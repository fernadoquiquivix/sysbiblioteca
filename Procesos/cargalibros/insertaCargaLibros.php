<?php 
session_start();
	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/CargaLibros.php";

	$obj= new cargalibros();

	$datos=array(
		$_POST['cantidad'],
		$_POST['libroSelect'],
		$_POST['donadorSelect']
				);
 
	echo $obj->insertaCargaLibros($datos);



 ?>