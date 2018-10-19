<?php 
	
	require_once "../../Clases/Conecxion.php";
	$c= new conectar();
	$conexion=$c->conecxion();

	$sql="SELECT iddonador,
					nombre,
					telefono,
					direccion
			from donadores";
	$result=mysqli_query($conexion,$sql);

 ?>


<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption><label>Donadores :)</label></caption>
	<tr>
		
		<td>Nombre</td>
		<td>telefono</td>
		<td>Direccion</td>
		<td>Editar</td>
		<td>Eliminar</td>
	</tr>

	<?php while($ver=mysqli_fetch_row($result)): ?>

	<tr>
		<td><?php echo $ver[1]; ?></td>
		<td><?php echo $ver[2]; ?></td>
		<td><?php echo $ver[3]; ?></td>
	

		<td>
			<span data-toggle="modal" data-target="#actualizaDonadoresModal" class="btn btn-warning btn-xs" onclick="agregaDatosDonador('<?php echo $ver[0]; ?>')">
				<span class="glyphicon glyphicon-pencil"></span>
			</span>
		</td>
		<td>
			<span class="btn btn-danger btn-xs" onclick="eliminarDonador('<?php echo $ver[0]; ?>')">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</td>
	</tr>
<?php endwhile; ?>
</table>