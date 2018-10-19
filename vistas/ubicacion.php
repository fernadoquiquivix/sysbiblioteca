<?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>


	<!DOCTYPE html>
	<html>
	<head>	<meta charset="UTF-8">
		<title>Ubicacion</title>
		<?php require_once "menu.php"; ?>
	</head>
	<body>

		<div class="container">
			<h1>Ubicacion</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmUbicacion">
						<label>Ubicacion de Libros</label>
						<input type="text" class="form-control input-sm" name="ubicacion" id="ubicacion">
						<p></p>
						<span class="btn btn-primary" id="btnAgregaUbicacion">Agregar</span>
					</form>
				</div>
				<div class="col-sm-6">
					<div id="tablaUbicacionLoad"></div>
				</div>
			</div>
		</div>

		<!-- Button trigger modal -->

		<!-- Modal -->
		<div class="modal fade" id="actualizaUbicacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualizar Ubicacion</h4>
					</div>
					<div class="modal-body">
						<form id="frmUbicacionU">
							<input type="text" hidden="" id="idUbicacion" name="idUbicacion">
							<label>Ubicacion</label>
							<input type="text" id="UbicacionU" name="UbicacionU" class="form-control input-sm">
						</form>


					</div>
					<div class="modal-footer">
						<button type="button" id="btnActualizaUbicacion" class="btn btn-warning" data-dismiss="modal">Guardar</button>

					</div>
				</div>
			</div>
		</div>

	</body>
	</html>
	<script type="text/javascript">
		$(document).ready(function(){

			$('#tablaUbicacionLoad').load("ubicacion/tablaUbicacion.php");

			$('#btnAgregaUbicacion').click(function(){

				vacios=validarFormVacio('frmUbicacion');

				if(vacios > 0){
					alertify.alert("Debes llenar todos los campos!!");
					return false;
				}

				datos=$('#frmUbicacion').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../Procesos/ubicacion/agregaUbicacion.php",
					success:function(r){
						if(r==1){
					//esta linea nos permite limpiar el formulario al insetar un registro
					$('#frmUbicacion')[0].reset();

					$('#tablaUbicacionLoad').load("ubicacion/tablaUbicacion.php");
					alertify.success("Ubicacion agregada con exito :D");
				}else{
					alertify.error("No se pudo agregar la Ubicacion");
				}
			}
		});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnActualizaUbicacion').click(function(){

				datos=$('#frmUbicacionU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../Procesos/ubicacion/actualizaUbicacion.php",
					success:function(r){
						if(r==1){
							$('#tablaUbicacionLoad').load("ubicacion/tablaUbicacion.php");
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
		function agregaDato(idUbicacion, Ubicacion){ //debe llevar los mismos valores
			$('#idUbicacion').val(idUbicacion); //sirve en procesos 
			$('#UbicacionU').val(Ubicacion);
		}

		function eliminarUbicacion(idUbicacion){
			alertify.confirm('¿Desea eliminar esta Ubicacion?', function(){ 
				$.ajax({
					type:"POST",
					data:"idUbicacion=" + idUbicacion,
					url:"../Procesos/ubicacion/eliminarUbicacion.php",
					success:function(r){
						if(r==1){
							$('#tablaUbicacionLoad').load("ubicacion/tablaUbicacion.php");
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