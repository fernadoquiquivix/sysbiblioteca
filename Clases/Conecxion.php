<?php 

	class conectar{
		private $servidor="localhost:3306";
		private $usuario="root";
		private $password="";
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