<?php 

	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Usuarios.php";

	$obj= new usuarios;

	echo json_encode($obj->obtenDatosUsuario($_POST['idusuario']));

 ?>