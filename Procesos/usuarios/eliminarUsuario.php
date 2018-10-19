<?php 

	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Usuarios.php";

	$obj= new usuarios;

	echo $obj->eliminaUsuario($_POST['idusuario']);

 ?>