<?php 

session_start();

	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Lectores.php";

	$obj= new lectores;

	$datos=array(
			$_POST['idlectoresU'],  
		    $_POST['carneU'] , 
		    $_POST['nombreU'],  
		    $_POST['direccionU'],
		    $_POST['telefonoU'],
		    $_POST['cargoU'],
		    $_POST['sexoU']
				);  
	echo $obj->actualizaLectores($datos);


 ?>