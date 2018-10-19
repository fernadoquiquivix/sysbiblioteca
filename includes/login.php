<?php
	session_start();
	include ("../orm/config.php");
	include ("../orm/rb.php");
	//echo 'SELECT id,usuario FROM usuarios where usuario='.$usuario.'and password='.$encriptado ;
    R::setup( $db,$user,$pass);
	$usuario = stripcslashes(mysql_real_escape_string($_REQUEST['username']));
	$clave = $_REQUEST['password'];
	$activo = 0;
$registros = R::getRow( 'SELECT id,user,tipouser FROM usuario where user='."'$usuario'".' and password='."'$clave'" );
	

	if (count ($registros) > 0){
		if($registros2['estado'] == $activo){			

			$_SESSION['usuario'] = $registros['user'];
			$_SESSION['idUsuario'] = $registros['id'];
			$_SESSION['tipoUsuario']= $registros['tipouser'];
			//$ultimoAcceso = date('Y/m/d h:i:s');
			//$objUsuarios->sql("UPDATE usuarios SET ultimaConexion = '".$ultimoAcceso."' WHERE idUsuario =".$registros[0]['idUsuario']);

			echo"
			<script>
				setTimeout(\"window.location='layouts/principal.html'\",1000); $('.form').css('box-shadow','inset 0 0 10px 2px rgba(0,255,0,0.25), 0 0 50px 10px rgba(0,255,0,0.3)');
			</script>";
		}	

		else{
			echo '
		<div class="alert alert- error">
		<a class="close" data-dismiss="alert">×</a>
		<strong>Error</strong>
		El Usuario no esta Activo
		</div>
		';	
			
			
			echo"
			<script> $('#frmLogin').effect('shake', { times:3 }, 70);
				setTimeout(\"$('.alert').fadeIn(1000)\",500)
				$('.form').css('box-shadow','inset 0 0 10px 2px rgba(255,0,0,0.25), 0 0 50px 10px rgba(255,0,0,0.7)');
			</script>";	
		}		
	}	
	
	else{
		//$objUsuarios->showMessage('Error','El usuario no existe','error');
				echo '
		<div class="alert alert- error">
		<a class="close" data-dismiss="alert">×</a>
		<strong>Error</strong>
		El usuario no existe
		</div>';
		echo"
		<script> 
			$('#frmLogin').effect('shake', { times:3 }, 70);
			setTimeout(\"$('.alert').fadeIn(1000)\",500)
			$('.form').css('box-shadow','inset 0 0 10px 2px rgba(255,0,0,0.25), 0 0 50px 10px rgba(255,0,0,0.7)');
		</script>";	
	}
?>