
<?php
			require_once "../../Clases/Conecxion.php";
			$c= new conectar();
			$conexion=$c->conecxion();

		$sql= "SELECT  l.idlibro, l.titulo, l.paginas, l.ejemplares,
                    a.nombreAutor, c.nombreCat, e.nombreEditorial, u.nombreUbicacion  
                    from libro l
                    inner join autor a on a.idautor=l.autor_idautor
                    inner join categoria c on c.idcategoria =l.categoria_idcategoria
                    inner join editorial e on e.ideditorial =l.editorial_ideditorial
                    inner join ubicacion u on u.idubicacion =l.ubicacion_idubicacion";
	$result=mysqli_query($conexion,$sql);
?>

<?php if($result->num_rows>0):?>
<div class="table-responsive">
<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
<tr>
		<td>Titulo</td>
		<td>Paginas</td>
		<td>Ejemplares</td>
		<td>Autor</td>
		<td>Categoria</td>
		<td>Editorial</td>
		<td>Ubicaicion</td>

    </tr>

	<?php
	while ($ver=mysqli_fetch_row($result)):
	 ?>

<tr>
	<td><?php echo $ver[1] ?></td>
	<td><?php echo $ver[2]; ?></td>
	<td><?php echo $ver[3]; ?></td>
	<td><?php echo $ver[4] ?></td>
	<td><?php echo $ver[5]; ?></td>
	<td><?php echo $ver[6]; ?></td>
	<td><?php echo $ver[7]; ?></td>
	 
</tr>
<?php endwhile;?>
</table>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
  <!-- Modal -->

  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Actualizar</h4>
        </div>
        <div class="modal-body">
        <div id="form-edit"></div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  </div>