<?php 
session_start();
	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Libros.php";

	$obj= new libros();

	$datos=array(
		$_POST['codigo'],
		$_POST['titulo'],
		$_POST['paginas'],
		$_POST['descripcion'],
		$_POST['autorSelect'],
		$_POST['categoriaSelect'],
		$_POST['editorialSelect'],
		$_POST['ubicacionSelect']
		
		);

	echo $obj->insertaLibros($datos);



 ?>