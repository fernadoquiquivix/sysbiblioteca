<?php 
	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Estado.php";

	
	$datos=array(
	$_POST['idEstado'],
	$_POST['EstadoU']); //ESTOS VALORES VIENEN DEL NOMBRE DE LA VARIABLE DE LA CAJA DE TEXTO

	$obj= new estado();

	echo $obj->actualizaEstado($datos);

 ?>