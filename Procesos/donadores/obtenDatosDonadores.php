<?php 

	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Donadores.php";

	$obj= new donadores;

	echo json_encode($obj->obtenDatosDonadores($_POST['iddonador']));

 ?>