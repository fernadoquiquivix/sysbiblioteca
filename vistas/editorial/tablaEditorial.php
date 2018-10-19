

	<?php 
			require_once "../../Clases/Conecxion.php";
			$c= new conectar();
			$conexion=$c->conecxion();

			$sql="SELECT ideditorial,nombreEditorial
					FROM editorial";
			$result=mysqli_query($conexion,$sql);
	 ?>


<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption><label>Editorial</label></caption>
	<tr>
		<td>Editorial</td>
		<td>Editar</td>
		<td>Eliminar</td>
	</tr>

	<?php
	while ($ver=mysqli_fetch_row($result)):
	 ?>

	<tr>
		<td><?php echo $ver[1] ?></td>
		<td>
			<span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#actualizaEditorial" onclick="agregaDato('<?php echo $ver[0] ?>','<?php echo $ver[1] ?>')">
				<span class="glyphicon glyphicon-pencil"></span>
			</span>
		</td>
		<td>
			<span class="btn btn-danger btn-xs" onclick="eliminarEditorial('<?php echo $ver[0] ?>')">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</td>
	</tr>

<?php endwhile; ?>
</table>