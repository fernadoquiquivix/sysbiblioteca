<?php 
	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Ubicacion.php";
	$id=$_POST['idUbicacion'];

	$obj= new ubicacion();
	echo $obj->eliminarUbicacion($id);

 ?>