<?php 

	class donadores{

		public function registrarDonadores($datos){
			$c= new conectar();
			$conexion=$c->conecxion();

			$sql="INSERT into donadores (nombre,
										telefono,
										direccion)
							values ('$datos[0]',
									'$datos[1]',
									'$datos[2]')";
			return mysqli_query($conexion,$sql);	
		}

		public function obtenDatosDonadores($iddonador){
			$c= new conectar();
			$conexion=$c->conecxion();

			$sql="SELECT iddonador, 
							
							nombre,
							telefono,
							direccion
							
				from donadores
				where iddonador='$iddonador'";

			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
					'iddonador' => $ver[0], //aki
					'nombre' => $ver[1],
					'telefono' => $ver[2],
					'direccion' => $ver[3]
						);
			return $datos;
		}

		public function actualizaDonadores($datos){
			$c= new conectar();
			$conexion=$c->conecxion();
			$sql="UPDATE donadores set nombre='$datos[1]',
										telefono='$datos[2]',
										direccion='$datos[3]' 
								where iddonador='$datos[0]'";
			return mysqli_query($conexion,$sql);
		}

		public function eliminarDonadores($iddonador){
			$c= new conectar();
			$conexion=$c->conecxion();

			$sql="DELETE from donadores where iddonador='$iddonador'";

			return mysqli_query($conexion,$sql);
		}
	}

 ?>