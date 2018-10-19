<?php 

	class autores{

		public function agregaAutor($datos){
			$c= new conectar();
			$conexion=$c->conecxion();

			$sql="INSERT into autor(nombreAutor)					
						values ('$datos[0]')";     //AGREGAR CATEGORIA ARRGLO 0

			return mysqli_query($conexion,$sql);
		}

		public function actualizaAutores($datos){
			$c= new conectar();
			$conexion=$c->conecxion();

			$sql="UPDATE autor set nombreAutor='$datos[1]'
								where idautor='$datos[0]'";
			echo mysqli_query($conexion,$sql);
		}

		public function eliminaAutores($idautor){
			$c= new conectar();
			$conexion=$c->conecxion();
			$sql="DELETE from autor 
					where idautor='$idautor'";
			return mysqli_query($conexion,$sql);
		}

	}

 ?>