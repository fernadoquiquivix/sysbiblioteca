
<?php 

	class categorias{

		public function agregaCategoria($datos){
			$c= new conectar();
			$conexion=$c->conecxion();

			$sql="INSERT into categoria(nombreCat)					
						values ('$datos[0]')";     //AGREGAR CATEGORIA ARRGLO 0

			return mysqli_query($conexion,$sql);
		}

		public function actualizaCategoria($datos){
			$c= new conectar();
			$conexion=$c->conecxion();

			$sql="UPDATE categoria set nombreCat='$datos[1]'
								where idcategoria='$datos[0]'";
			echo mysqli_query($conexion,$sql);
		}

		public function eliminaCategoria($idcategoria){
			$c= new conectar();
			$conexion=$c->conecxion();
			$sql="DELETE from categoria 
					where idcategoria='$idcategoria'";
			return mysqli_query($conexion,$sql);
		}

	}

 ?>