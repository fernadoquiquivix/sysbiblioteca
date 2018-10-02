<?php 

	class estado{

		public function agregaEstado($datos){
			$c= new conectar();
			$conexion=$c->conecxion();

			$sql="INSERT into estadolibro(estado)					
						values ('$datos[0]')";     //AGREGAR CATEGORIA ARRGLO 0

			return mysqli_query($conexion,$sql);
		}

		public function actualizaEstado($datos){
			$c= new conectar();
			$conexion=$c->conecxion();

			$sql="UPDATE estadolibro set estado='$datos[1]'
								where idestadolibro='$datos[0]'";
			echo mysqli_query($conexion,$sql);
		}

		public function eliminarEstado($idEstado){
			$c= new conectar();
			$conexion=$c->conecxion();
			$sql="DELETE from estadolibro 
					where idestadolibro='$idEstado'";
			return mysqli_query($conexion,$sql);
		}

	}

 ?>