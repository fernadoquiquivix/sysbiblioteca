
<?php 
	require_once "../../Clases/Conecxion.php";
	$c= new conectar();
	$conexion=$c->conecxion();

	$sql="SELECT d.iddonacion,dr.nombre,l.titulo,d.ejemplares,d.fecha from libro l inner join donacion d on l.idlibro=d.libro_idlibro
    inner join cargadonacion c on d.iddonacion=c.donacion_iddonacion inner join 
    donadores dr on dr.iddonador=c.donadores_iddonador order by d.iddonacion";

	$result=mysqli_query($conexion,$sql);

 ?>

<div class="table-responsive">
<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption><label>Tabla de Libros</label></caption>
	<tr> <td>id</td>
		<td>Donador</td>
		<td>Titulo</td>
		<td>Cantidad</td>
		<td>fecha</td>
		
		<td>Editar</td>
		<td>Eliminar</td>
	</tr>

	<?php while($ver=mysqli_fetch_row($result)): ?>

	<tr>
	<td><?php echo $ver[0]; ?></td>
		<td><?php echo $ver[1]; ?></td>
		<td><?php echo $ver[2]; ?></td>
		<td><?php echo $ver[3]; ?></td>
	
		<td><?php echo $ver[4]; ?></td>

		<td>
			<span  data-toggle="modal" data-target="#abremodalUpdateCargaLibros" class="btn btn-warning btn-xs" onclick="agregaDatosLibro('<?php echo $ver[0] ?>')">
				<span class="glyphicon glyphicon-pencil"></span>
			</span>
		</td>
		<td>
			<span class="btn btn-danger btn-xs" onclick="eliminarLibros('<?php echo $ver[0] ?>')">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</td>
	</tr>
<?php endwhile; ?>
</table>
</div>