<?php 

	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/CargaLibros.php";

	$obj= new cargaLibros();

	$iddonacion=$_POST['iddonacion'];

	echo json_encode($obj->obtenDatosLibros2($iddonacion));

 ?>