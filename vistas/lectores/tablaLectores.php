<?php 
	
	require_once "../../Clases/Conecxion.php";
	$c= new conectar();
	$conexion=$c->conecxion();

	$sql="SELECT idlector,
					carne,
					nombre,
					direccion,
					telefono,
					cargo,
					sexo
			from lectores";
	$result=mysqli_query($conexion,$sql);

 ?>


<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption><label>Lectores :)</label></caption>
	<tr>
		<td>Carne</td>
		<td>Nombre</td>
		<td>Direccion</td>
		<td>telefono</td>
		<td>Cargo</td>
		<td>Sexo</td>
		<td>Editar</td>
		<td>Eliminar</td>
	</tr>

	<?php while($ver=mysqli_fetch_row($result)): ?>

	<tr>
		<td><?php echo $ver[1]; ?></td>
		<td><?php echo $ver[2]; ?></td>
		<td><?php echo $ver[3]; ?></td>
		<td><?php echo $ver[4]; ?></td>
		<td><?php echo $ver[5]; ?></td>
		<td><?php echo $ver[6]; ?></td> 

		<td>
			<span data-toggle="modal" data-target="#actualizaLectoresModal" class="btn btn-warning btn-xs" onclick="agregaDatosLector('<?php echo $ver[0]; ?>')">
				<span class="glyphicon glyphicon-pencil"></span>
			</span>
		</td>
		<td>
			<span class="btn btn-danger btn-xs" onclick="eliminarLector('<?php echo $ver[0]; ?>')">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</td>
	</tr>
<?php endwhile; ?>
</table>