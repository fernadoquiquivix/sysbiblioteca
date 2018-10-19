<?php 

	class usuarios{
		public function registroUsuario($datos){
			$c=new conectar();
			$conexion=$c->conecxion();

			$fecha=date('Y-m-d');

			$sql="INSERT into usuarios (nombre,
								apellido,
								email,
								password,
								fechaCaptura,
								tipousuario
								)
						values ('$datos[0]',
								'$datos[1]',
								'$datos[2]',
								'$datos[3]',
								'$fecha',
								'$datos[4]'
								)";
			return mysqli_query($conexion,$sql);

		}
		public function loginUser($datos){
			$c=new conectar();
			$conexion=$c->conecxion();
			$password=sha1($datos[1]);

	
			$_SESSION['iduser']=self::traeID($datos);

<<<<<<< HEAD
			$sql="SELECT tipousuario, email,id_usuario
=======
			$sql="SELECT tipousuario, apellido
>>>>>>> 79b8749ad79bec5d57817dadb5a87057992d5248
					from usuarios 
				where email='$datos[0]'
				and password='$password'";

			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);
			$_SESSION['tipousuario'] =$ver[0];
			$_SESSION['usuario']=$ver[1];
<<<<<<< HEAD
			$_SESSION['idUsuario']=$ver[2];
=======
>>>>>>> 79b8749ad79bec5d57817dadb5a87057992d5248

			if(mysqli_num_rows($result) > 0){
				return 1;
			}else{
				return 0;
			}
		}
		public function traeID($datos){
			$c=new conectar();
			$conexion=$c->conecxion();

			$password=sha1($datos[1]);

			$sql="SELECT id_usuario 
					from usuarios 
					where email='$datos[0]'
					and password='$password'"; 
			$result=mysqli_query($conexion,$sql);

			return mysqli_fetch_row($result)[0];
		}

		public function obtenDatosUsuario($idusuario){

			$c=new conectar();
			$conexion=$c->conecxion();

			$sql="SELECT id_usuario,
							nombre,
							apellido,
							email
					from usuarios 
					where id_usuario='$idusuario'";
			$result=mysqli_query($conexion,$sql);

			$ver=mysqli_fetch_row($result);

			$datos=array(
						'id_usuario' => $ver[0],
							'nombre' => $ver[1],
							'apellido' => $ver[2],
							'email' => $ver[3]
						);

			return $datos;
		}

		public function actualizaUsuario($datos){
			$c=new conectar();
			$conexion=$c->conecxion();//ver clase conecxion

			$sql="UPDATE usuarios set nombre='$datos[1]',
									apellido='$datos[2]',
									email='$datos[3]'
						where id_usuario='$datos[0]'";
			return mysqli_query($conexion,$sql);	
		}

		public function eliminaUsuario($idusuario){
			$c=new conectar();
			$conexion=$c->conecxion();

			$sql="DELETE from usuarios 
					where id_usuario='$idusuario'";
			return mysqli_query($conexion,$sql);
		}
	}

 ?>