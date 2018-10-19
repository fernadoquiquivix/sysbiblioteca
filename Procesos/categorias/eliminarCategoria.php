<?php 
	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Categorias.php";
	$id=$_POST['idcategoria'];

	$obj= new categorias();
	echo $obj->eliminaCategoria($id);

 ?>