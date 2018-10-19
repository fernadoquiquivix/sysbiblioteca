<?php 

	class editorial{

		public function agregaEditorial($datos){
			$c= new conectar();
			$conexion=$c->conecxion();

			$sql="INSERT into editorial(nombreEditorial)					
						values ('$datos[0]')";     //AGREGAR CATEGORIA ARRGLO 0

			return mysqli_query($conexion,$sql);
		}

		public function actualizaEditorial($datos){
			$c= new conectar();
			$conexion=$c->conecxion();

			$sql="UPDATE editorial set nombreEditorial='$datos[1]'
								where ideditorial='$datos[0]'";
			echo mysqli_query($conexion,$sql);
		}

		public function eliminarEditorial($idEditorial){
			$c= new conectar();
			$conexion=$c->conecxion();
			$sql="DELETE from editorial 
					where ideditorial='$idEditorial'";
			return mysqli_query($conexion,$sql);
		}

	}

 ?>