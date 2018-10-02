<?php 

	class lectores{

		public function registrarLectores($datos){
			$c= new conectar();
			$conexion=$c->conecxion();

			$sql="INSERT into lectores (carne,
										nombre,
										direccion,
										telefono,
										cargo,
										sexo)
							values ('$datos[0]',
									'$datos[1]',
									'$datos[2]',
									'$datos[3]',
									'$datos[4]',
									'$datos[5]')";
			return mysqli_query($conexion,$sql);	
		}

		public function obtenDatosLectores($idlector){
			$c= new conectar();
			$conexion=$c->conecxion();

			$sql="SELECT idlector, 
							carne,
							nombre,
							direccion,
							telefono,
							cargo,
							sexo 
				from lectores
				where idlector='$idlector'";

			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
					'idlector' => $ver[0], 
					'carne' => $ver[1],
					'nombre' => $ver[2],
					'direccion' => $ver[3],
					'telefono' => $ver[4],
					'cargo' => $ver[5],
					'sexo' => $ver[6]
						);
			return $datos;
		}

		public function actualizaLectores($datos){
			$c= new conectar();
			$conexion=$c->conecxion();
			$sql="UPDATE lectores set carne='$datos[1]',
										nombre='$datos[2]',
										direccion='$datos[3]',
										telefono='$datos[4]',
										cargo='$datos[5]',
										sexo='$datos[6]' 
								where idlector='$datos[0]'";
			return mysqli_query($conexion,$sql);
		}

		public function eliminarLectores($idlector){
			$c= new conectar();
			$conexion=$c->conecxion();

			$sql="DELETE from lectores where idlector='$idlector'";

			return mysqli_query($conexion,$sql);
		}
	}

 ?>