<?php 

	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Libros.php";

	$obj= new libros;

	echo $obj->eliminarLibros($_POST['idlibro']);

 ?>