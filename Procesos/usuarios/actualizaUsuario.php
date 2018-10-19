<?php 

	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Usuarios.php";

	$obj= new usuarios;

	$datos=array(
			$_POST['idUsuario'],  
		    $_POST['nombreU'] ,  
		    $_POST['apellidoU'],  
		    $_POST['usuarioU'],
		    $_POST['TusuarioSelectU']
				);  
	echo $obj->actualizaUsuario($datos);


 ?>