<?php 

	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Lectores.php";

	$obj= new lectores;

	echo $obj->eliminarLectores($_POST['idlector']);

 ?>