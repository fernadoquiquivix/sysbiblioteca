<?php 
	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Estado.php";
	$id=$_POST['idEstado'];

	$obj= new estado();
	echo $obj->eliminarEstado($id);

 ?>