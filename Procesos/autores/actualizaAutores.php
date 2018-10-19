<?php 
	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Autores.php";

	
	$datos=array(
	$_POST['idAutor'],
	$_POST['AutorU']); //ESTOS VALORES VIENEN DEL NOMBRE DE LA VARIABLE DE LA CAJA DE TEXTO

	$obj= new autores();

	echo $obj->actualizaAutores($datos);

 ?>