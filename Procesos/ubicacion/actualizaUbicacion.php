<?php 
	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Ubicacion.php";

	
	$datos=array(
	$_POST['idUbicacion'],
	$_POST['UbicacionU']); //ESTOS VALORES VIENEN DEL NOMBRE DE LA VARIABLE DE LA CAJA DE TEXTO

	$obj= new ubicacion();

	echo $obj->actualizaUbicacion($datos);

 ?>