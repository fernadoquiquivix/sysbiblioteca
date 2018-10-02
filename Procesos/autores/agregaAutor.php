<?php 
	session_start();
	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Autores.php";
	
	$autor=$_POST['autor'];

	$datos=array(
		$autor);

	$obj= new autores();

	echo $obj->agregaAutor($datos);


 ?>