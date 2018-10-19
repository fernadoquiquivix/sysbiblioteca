

	<?php 
			require_once "../../Clases/Conecxion.php";
			$c= new conectar();
			$conexion=$c->conecxion();

			$sql="SELECT idestadolibro, estado
					FROM estadolibro";
			$result=mysqli_query($conexion,$sql);
	 ?>


<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption><label>Condiciones de Libros</label></caption>
	<tr>
		<td>Estado</td>
		<td>Editar</td>
		<td>Eliminar</td>
	</tr>

	<?php
	while ($ver=mysqli_fetch_row($result)):
	 ?>

	<tr>
		<td><?php echo $ver[1] ?></td>
		<td>
			<span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#actualizaEstado" onclick="agregaDato('<?php echo $ver[0] ?>','<?php echo $ver[1] ?>')">
				<span class="glyphicon glyphicon-pencil"></span>
			</span>
		</td>
		<td>
			<span class="btn btn-danger btn-xs" onclick="eliminarEstado('<?php echo $ver[0] ?>')">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</td>
	</tr>

<?php endwhile; ?>
</table>