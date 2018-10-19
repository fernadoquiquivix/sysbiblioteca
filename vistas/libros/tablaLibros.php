
<?php 
	require_once "../../Clases/Conecxion.php";
	$c= new conectar();
	$conexion=$c->conecxion();

	$sql="SELECT  l.idlibro, l.codigo, l.titulo, l.paginas,
                    a.nombreAutor, c.nombreCat, e.nombreEditorial, u.nombreUbicacion  
                    from libro l
                    inner join autor a on a.idautor=l.autor_idautor
                    inner join categoria c on c.idcategoria =l.categoria_idcategoria
                    inner join editorial e on e.ideditorial =l.editorial_ideditorial
                    inner join ubicacion u on u.idubicacion =l.ubicacion_idubicacion";

	$result=mysqli_query($conexion,$sql);

	

 ?>

<div class="table-responsive">
<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption><label>Tabla de Libros</label></caption>
	<tr>
		<td>Codigo</td>
		<td>Titulo</td>
		<td>Paginas</td>
		<td>Autor</td>
		<td>Categoria</td>
		<td>Editorial</td>
		<td>Ubicaicion</td>

		<td>Editar</td>
		<td>Eliminar</td>
	</tr>

	<?php while($ver=mysqli_fetch_row($result)): 
$sql2="SELECT ejemplares from donacion where libro_idlibro=".$ver[0];
	$result2=mysqli_query($conexion,$sql2);
	$ver2=mysqli_fetch_row($result2);
	?>

	<tr>
		<td><?php echo $ver[1]; ?></td>
		<td><?php echo $ver[2]; ?></td>
		<td><?php echo $ver[3]; ?></td>
	
		<td><?php echo $ver[4]; ?></td>
		<td><?php echo $ver[5]; ?></td>
		<td><?php echo $ver[6]; ?></td>
			<td><?php echo $ver[7]; ?></td>

		<td>
			<span  data-toggle="modal" data-target="#abremodalUpdateLibros" class="btn btn-warning btn-xs" onclick="agregaDatosLibros('<?php echo $ver[0] ?>')">
				<span class="glyphicon glyphicon-pencil"></span>
			</span>
		</td>
		<td>
		<?php
		if ($ver2 > 0){}
			else{?>
			<span class="btn btn-danger btn-xs" onclick="eliminarLibros('<?php echo $ver[0] ?>')">

			<?php }?>
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</td>
	</tr>
<?php endwhile; ?>
</table>
</div>