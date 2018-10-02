<?php 
	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Categorias.php";

	
	$datos=array(
	$_POST['idcategoria'],
	$_POST['categoriaU']); //ESTOS VALORES VIENEN DEL NOMBRE DE LA VARIABLE DE LA CAJA DE TEXTO

	$obj= new categorias();

	echo $obj->actualizaCategoria($datos);

 ?>