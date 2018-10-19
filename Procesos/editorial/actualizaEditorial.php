<?php 
	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Editorial.php";

	
	$datos=array(
	$_POST['idEditorial'],
	$_POST['EditorialU']); //ESTOS VALORES VIENEN DEL NOMBRE DE LA VARIABLE DE LA CAJA DE TEXTO

	$obj= new editorial();

	echo $obj->actualizaEditorial($datos);

 ?>