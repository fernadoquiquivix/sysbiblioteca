<?php 
	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Autores.php";
	$id=$_POST['idAutor'];

	$obj= new autores();
	echo $obj->eliminaAutores($id);

 ?>