<?php 
	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Editorial.php";
	$id=$_POST['idEditorial'];

	$obj= new editorial();
	echo $obj->eliminarEditorial($id);

 ?>