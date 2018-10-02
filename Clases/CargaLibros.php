

<?php 
	class cargalibros{
	
		public function insertaCargaLibros($datos){
			$c=new conectar();
			$conexion=$c->conecxion();
$fecha=date('Y-m-d');
		
			$sql="INSERT into donacion (ejemplares,
										fecha,
										libro_idlibro) 
							values ('$datos[0]',
									'$fecha',
									'$datos[1]')		
									";
			
			
mysqli_query($conexion,$sql);
			$sql2="SELECT MAX(iddonacion) AS iddonacion FROM donacion";
			$result=mysqli_query($conexion,$sql2);
$ultimoid=mysqli_fetch_row($result)[0];

$sql3="INSERT into cargadonacion (donadores_iddonador,
										donacion_iddonacion) 
							values ('$datos[2]',
									'$ultimoid')";
									mysqli_query($conexion,$sql3);

$sql4="SELECT ejemplares FROM libro where idlibro=".$datos[1];
			$result2=mysqli_query($conexion,$sql4);
$cantidad=mysqli_fetch_row($result2)[0];

$suma=$cantidad+$datos[0];
$sql5="UPDATE libro set ejemplares='$suma' where idlibro='$datos[1]'";
			
			
$r=mysqli_query($conexion,$sql5);


		
			return $r;

		}

		public function obtenDatosLibros2($iddonacion){
			$c=new conectar();
			$conexion=$c->conecxion();

            $sql="SELECT d.iddonacion, d.ejemplares,d.libro_idlibro,dn.iddonador
					FROM donacion d inner join 
                    cargadonacion c on d.iddonacion=c.donacion_iddonacion inner join donadores dn on dn.iddonador=c.donadores_iddonador where d.iddonacion=".$iddonacion;
			$result=mysqli_query($conexion,$sql);
$ver=mysqli_fetch_row($result);
			


			$datos=array(
					"iddonacion" => $ver[0],
					"ejemplares" => $ver[1],
					"idlibro" => $ver[2],
					"iddonador" => $ver[3]
						);

			return $datos;
		}

		public function actualizaCargaLibros($datos){
			$c=new conectar();
			$conexion=$c->conecxion();

			if($datos[2]==$datos[5]){
$sql2="UPDATE cargadonacion set 	
										donadores_iddonador='$datos[3]'
										
						where donacion_iddonacion='$datos[0]'";
mysqli_query($conexion,$sql2);
$sql3="SELECT ejemplares from libro where idlibro='$datos[2]'";
$cantidada=0;
$result=mysqli_query($conexion,$sql3);
	 while($ver=mysqli_fetch_row($result)): 
	 	$cantidada=$ver[0];
	 endwhile;
	 $sub=$datos[4]-$datos[1];
$total=$cantidada-$sub;
$sql4="UPDATE libro set 	ejemplares='$total'
										
						where idlibro='$datos[2]'";
mysqli_query($conexion,$sql4);
$sql="UPDATE donacion set 	ejemplares='$datos[1]',
										libro_idlibro='$datos[2]'
										
						where iddonacion='$datos[0]'";


			return mysqli_query($conexion,$sql);
}else{
	$sql2="UPDATE cargadonacion set 	
										donadores_iddonador='$datos[3]'
										
						where donacion_iddonacion='$datos[0]'";
mysqli_query($conexion,$sql2);
$sql3="SELECT ejemplares from libro where idlibro='$datos[5]'";
$cantidada=0;
$result=mysqli_query($conexion,$sql3);
	 while($ver=mysqli_fetch_row($result)): 
	 	$cantidada=$ver[0];
	 endwhile;
	 $sub=$cantidada-$datos[4];
$sql4="UPDATE libro set 	ejemplares='$sub'
										
						where idlibro='$datos[5]'";
mysqli_query($conexion,$sql4);


$sql5="SELECT ejemplares from libro where idlibro='$datos[2]'";
$cantidada2=0;
$result2=mysqli_query($conexion,$sql5);
	 while($ver2=mysqli_fetch_row($result2)): 
	 	$cantidada2=$ver2[0];
	 endwhile;

	 $sub2=$cantidada2+$datos[1];
$sql6="UPDATE libro set 	ejemplares='$sub2'
										
						where idlibro='$datos[2]'";
mysqli_query($conexion,$sql6);


$sql="UPDATE donacion set 	ejemplares='$datos[1]',
										libro_idlibro='$datos[2]'
										
						where iddonacion='$datos[0]'";


			return mysqli_query($conexion,$sql);

		}

		}



		public function eliminaArticulo($idarticulo){
			$c=new conectar();
			$conexion=$c->conexion();

			$idimagen=self::obtenIdImg($idarticulo);

			$sql="DELETE from articulos 
					where id_producto='$idarticulo'";
			$result=mysqli_query($conexion,$sql);

			if($result){
				$ruta=self::obtenRutaImagen($idimagen);

				$sql="DELETE from imagenes 
						where id_imagen='$idimagen'";
				$result=mysqli_query($conexion,$sql);
					if($result){
						if(unlink($ruta)){
							return 1;
						}
					}
			}
		}

		public function obtenIdImg($idProducto){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT id_imagen 
					from articulos 
					where id_producto='$idProducto'";
			$result=mysqli_query($conexion,$sql);

			return mysqli_fetch_row($result)[0];
		}

		public function obtenRutaImagen($idImg){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT ruta 
					from imagenes 
					where id_imagen='$idImg'";

			$result=mysqli_query($conexion,$sql);

			return mysqli_fetch_row($result)[0];
		}

	}

 ?>