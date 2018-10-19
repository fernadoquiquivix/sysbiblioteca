<?php 

	class ubicacion{

		public function agregaUbicacion($datos){
			$c= new conectar();
			$conexion=$c->conecxion();

			$sql="INSERT into ubicacion(nombreUbicacion)					
						values ('$datos[0]')";     //AGREGAR CATEGORIA ARRGLO 0

			return mysqli_query($conexion,$sql);
		}

		public function actualizaUbicacion($datos){
			$c= new conectar();
			$conexion=$c->conecxion();

			$sql="UPDATE ubicacion set nombreUbicacion='$datos[1]'
								where idubicacion='$datos[0]'";
			echo mysqli_query($conexion,$sql);
		}

		public function eliminarUbicacion($idUbicacion){
			$c= new conectar();
			$conexion=$c->conecxion();
			$sql="DELETE from ubicacion
					where idubicacion='$idUbicacion'";
			return mysqli_query($conexion,$sql);
		}

	}

 ?>