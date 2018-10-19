<?php 

session_start();

	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Donadores.php";

	$obj= new donadores;

	$datos=array(
			$_POST['iddonadorU'],  
		    $_POST['nombreU'] , 
		    $_POST['telefonoU'],  
		    $_POST['direccionU']
				);  
	echo $obj->actualizaDonadores($datos);


 ?>