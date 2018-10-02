<?php 
	session_start();
	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Categorias.php";
	
	$categoria=$_POST['categoria'];

	$datos=array(
		$categoria);

	$obj= new categorias();

	echo $obj->agregaCategoria($datos);


 ?>