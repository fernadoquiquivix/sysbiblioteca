<?php 
	session_start();
	require_once "../../Clases/Conecxion.php";
	require_once "../../Clases/Editorial.php";
	
	$editorial=$_POST['editorial'];

	$datos=array(
		$editorial);

	$obj= new editorial();

	echo $obj->agregaEditorial($datos);


 ?>