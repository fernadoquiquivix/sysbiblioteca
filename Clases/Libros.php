

<?php 
	class libros{
	
		public function insertaLibros($datos){
			$c=new conectar();
			$conexion=$c->conecxion();

		
			$sql="INSERT into libro (codigo,
										titulo,
										paginas,
										descripcion,
										autor_idautor,
										categoria_idcategoria,
										editorial_ideditorial,
										ubicacion_idubicacion) 
							values ('$datos[0]',
									'$datos[1]',
									'$datos[2]',
									'$datos[3]',
									'$datos[4]',
									'$datos[5]',
									'$datos[6]',
									'$datos[7]')
											";
			return mysqli_query($conexion,$sql);
		}

		public function obtenDatosLibros($idlibro){
			$c=new conectar();
			$conexion=$c->conecxion();

			$sql="SELECT idlibro, 
						codigo, 
						titulo,
						paginas,
						descripcion,
						autor_idautor,
						categoria_idcategoria,
						editorial_ideditorial,
						ubicacion_idubicacion 
				from libro 
				where idlibro='$idlibro'";
			$result=mysqli_query($conexion,$sql);

			$ver=mysqli_fetch_row($result);

			$datos=array(
					"idlibro" => $ver[0],
					"codigo" => $ver[1],
					"titulo" => $ver[2],
					"paginas" => $ver[3],
					"descripcion" => $ver[4],
					"autor_idautor" => $ver[5],
					"categoria_idcategoria" => $ver[6],
					"editorial_ideditorial" => $ver[7],
					"ubicacion_idubicacion" => $ver[8]
						);

			return $datos;
		}

		public function actualizaLibros($datos){
			$c=new conectar();
			$conexion=$c->conecxion();

			$sql="UPDATE libro set 
								   codigo='$datos[1]',
								   titulo='$datos[2]',
								   paginas='$datos[3]',
								   descripcion='$datos[4]',
								   autor_idautor='$datos[5]',
								   categoria_idcategoria='$datos[6]',
								   editorial_ideditorial='$datos[7]',
								   ubicacion_idubicacion='$datos[8]'
						where idlibro='$datos[0]'";

		return mysqli_query($conexion,$sql);

		}

		public function eliminarLibros($idlibro){
			$c= new conectar();
			$conexion=$c->conecxion();
			$sql="DELETE from libro 
					where idlibro='$idlibro'";
			return mysqli_query($conexion,$sql);
					
		}
		

	}

 ?>