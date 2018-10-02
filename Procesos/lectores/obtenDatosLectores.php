<?php 

	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Lectores.php";

	$obj= new lectores;

	echo json_encode($obj->obtenDatosLectores($_POST['idlector']));

 ?>