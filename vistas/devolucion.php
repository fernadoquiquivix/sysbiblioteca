<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
		
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Articulos</title>
	<?php require_once "menu.php"; ?>
</head>
<body style="background-color: gray">


</body>
</html>
<?php 
	}else{
		header("location:../index.php");
	}
 ?>