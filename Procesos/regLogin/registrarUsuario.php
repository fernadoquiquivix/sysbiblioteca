<?php 

	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Usuarios.php";

	$obj= new usuarios();

	$pass=sha1($_POST['password']);
	$datos=array(
		$_POST['nombre'],
		$_POST['apellido'],
		$_POST['usuario'],
	    $pass,
	    $_POST['TusuarioSelect']

				);

	echo $obj->registroUsuario($datos);

 ?>