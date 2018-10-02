<?php 
	session_start();
	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Estado.php";
	
	$estado=$_POST['estado'];

	$datos=array(
		$estado);

	$obj= new estado();

	echo $obj->agregaEstado($datos);


 ?>