<?php 

session_start();

	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/CargaLibros.php";

	$obj= new cargalibros();

	$datos=array(
			$_POST['idCargaLibrosU'],  
		    $_POST['cantidadU'] , 
		    $_POST['libroSelectU'],  
		    $_POST['donadorSelectU'],
		    $_POST['cantidadU2'], 
		    $_POST['libroSelectUA']
				);  
	echo $obj->actualizaCargaLibros($datos);


 ?>