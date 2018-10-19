<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
		
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Principal</title>
	<?php require_once "menu.php"; ?>
</head>
<body style="background-color: white">
<div align="center">
	<img src="../img/logo-biblioteca.png" border="2" width="750" height="450">
</div>
</body>
</html>
<?php 
	}else{
		header("location:../index.php");
	}
 ?>