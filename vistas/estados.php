<?php 
session_start();
if($_SESSION['tipousuario'] == 'A'){

	?>


	<!DOCTYPE html>
	<html>
	<head>
		<title>Estado de Libros</title>
		<?php require_once "menu.php"; ?>
	</head>
	<body>

		<div class="container">
			<h1>Estado</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmEstado">
						<label>Condicion de Libros</label>
						<input type="text" class="form-control input-sm" name="estado" id="estado">
						<p></p>
						<span class="btn btn-primary" id="btnAgregaEstado">Agregar</span>
					</form>
				</div>
				<div class="col-sm-6">
					<div id="tablaEstadoLoad"></div>
				</div>
			</div>
		</div>

		<!-- Button trigger modal -->

		<!-- Modal -->
		<div class="modal fade" id="actualizaEstado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualizar Estados</h4>
					</div>
					<div class="modal-body">
						<form id="frmEstadosU">
							<input type="text" hidden="" id="idEstado" name="idEstado">
							<label>Estado</label>
							<input type="text" id="EstadoU" name="EstadoU" class="form-control input-sm">
						</form>


					</div>
					<div class="modal-footer">
						<button type="button" id="btnActualizaEstado" class="btn btn-warning" data-dismiss="modal">Guardar</button>

					</div>
				</div>
			</div>
		</div>

	</body>
	</html>
	<script type="text/javascript">
		$(document).ready(function(){

			$('#tablaEstadoLoad').load("estado/tablaEstadoLibros.php");

			$('#btnAgregaEstado').click(function(){

				vacios=validarFormVacio('frmEstado');

				if(vacios > 0){
					alertify.alert("Debes llenar todos los campos!!");
					return false;
				}

				datos=$('#frmEstado').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../Procesos/estado/agregaEstado.php",
					success:function(r){
						if(r==1){
					//esta linea nos permite limpiar el formulario al insetar un registro
					$('#frmEstado')[0].reset();

					$('#tablaEstadoLoad').load("estado/tablaEstadoLibros.php");
					alertify.success("Estado del libro agregado con exito :D");
				}else{
					alertify.error("No se pudo agregar el estado del libro");
				}
			}
		});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnActualizaEstado').click(function(){

				datos=$('#frmEstadosU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../Procesos/estado/actualizaEstado.php",
					success:function(r){
						if(r==1){
							$('#tablaEstadoLoad').load("estado/tablaEstadoLibros.php");
							alertify.success("Actualizado con exito :)");
						}else{
							alertify.error("no se pudo actaulizar :(");
						}
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		function agregaDato(idEstado, Estado){ //debe llevar los mismos valores
			$('#idEstado').val(idEstado); //sirve en procesos 
			$('#EstadoU').val(Estado);
		}

		function eliminarEstado(idEstado){
			alertify.confirm('¿Desea eliminar el Estado del Libro?', function(){ 
				$.ajax({
					type:"POST",
					data:"idEstado=" + idEstado,
					url:"../Procesos/estado/eliminarEstado.php",
					success:function(r){
						if(r==1){
							$('#tablaEstadoLoad').load("estado/tablaEstadoLibros.php");
							alertify.success("Eliminado con exito!!");
						}else{
							alertify.error("No se pudo eliminar :(");
						}
					}
				});
			}, function(){ 
				alertify.error('Cancelo !')
			});
		}
	</script>
	<?php 
}else{
	header("location:../index.php");
}
?>