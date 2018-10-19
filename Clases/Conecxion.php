<?php 

	class conectar{
		private $servidor="localhost:3306";
		private $usuario="root";
<<<<<<< HEAD
		private $password="";
=======
		private $password="Quiquivix19872017#";
>>>>>>> 79b8749ad79bec5d57817dadb5a87057992d5248
		private $bd="Biblioteca";

		public function conecxion(){
			$conexion=mysqli_connect($this->servidor,
									 $this->usuario,
									 $this->password,
									 $this->bd);
			return $conexion;
		}
	}
		
 ?>