<?php 

	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Libros.php";

	$obj= new libros();

	$idlibro=$_POST['idlibro'];

	echo json_encode($obj->obtenDatosLibros($idlibro));

 ?>