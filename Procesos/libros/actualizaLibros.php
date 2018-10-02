<?php 

session_start();

	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Libros.php";

	$obj= new libros();

	$datos=array(
			$_POST['idLibro'],  
		    $_POST['codigoU'] , 
		    $_POST['tituloU'],  
		    $_POST['paginaU'],
		    $_POST['descripcionU'],
		    $_POST['autorSelectU'],
		    $_POST['categoriaSelectU'],
		    $_POST['editorialSelectU'],
		    $_POST['ubicacionSelectU']
				);  
	echo $obj->actualizaLibros($datos);


 ?>