<?php 

	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Donadores.php";

	$obj= new donadores;

	echo $obj->eliminarDonadores($_POST['iddonador']);

 ?>