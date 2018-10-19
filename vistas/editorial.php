<?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>


	<!DOCTYPE html>
	<html>
	<head>	<meta charset="UTF-8">
		<title>Editorial</title>
		<?php require_once "menu.php"; ?>
	</head>
	<body>

		<div class="container">
			<h1>Editorial</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmEditorial">
						<label>Editoriales de Libros</label>
						<input type="text" class="form-control input-sm" name="editorial" id="editorial">
						<p></p>
						<span class="btn btn-primary" id="btnAgregaEditorial">Agregar</span>
					</form>
				</div>
				<div class="col-sm-6">
					<div id="tablaEditorialLoad"></div>
				</div>
			</div>
		</div>

		<!-- Button trigger modal -->

		<!-- Modal -->
		<div class="modal fade" id="actualizaEditorial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualiza Editoriales</h4>
					</div>
					<div class="modal-body">
						<form id="frmEditorialU">
							<input type="text" hidden="" id="idEditorial" name="idEditorial">
							<label>Editorial</label>
							<input type="text" id="EditorialU" name="EditorialU" class="form-control input-sm">
						</form>


					</div>
					<div class="modal-footer">
						<button type="button" id="btnActualizaEditorial" class="btn btn-warning" data-dismiss="modal">Guardar</button>

					</div>
				</div>
			</div>
		</div>

	</body>
	</html>
	<script type="text/javascript">
		$(document).ready(function(){

			$('#tablaEditorialLoad').load("editorial/tablaEditorial.php");

			$('#btnAgregaEditorial').click(function(){

				vacios=validarFormVacio('frmEditorial');

				if(vacios > 0){
					alertify.alert("Debes llenar todos los campos!!");
					return false;
				}

				datos=$('#frmEditorial').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../Procesos/editorial/agregaEditorial.php",
					success:function(r){
						if(r==1){
					//esta linea nos permite limpiar el formulario al insetar un registro
					$('#frmEditorial')[0].reset();

					$('#tablaEditorialLoad').load("editorial/tablaEditorial.php");
					alertify.success("Editorial agregada con exito :D");
				}else{
					alertify.error("No se pudo agregar la Editorial");
				}
			}
		});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnActualizaEditorial').click(function(){

				datos=$('#frmEditorialU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../Procesos/editorial/actualizaEditorial.php",
					success:function(r){
						if(r==1){
							$('#tablaEditorialLoad').load("editorial/tablaEditorial.php");
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
		function agregaDato(idEditorial, Editorial){ //debe llevar los mismos valores
			$('#idEditorial').val(idEditorial); //sirve en procesos 
			$('#EditorialU').val(Editorial);
		}

		function eliminarEditorial(idEditorial){
			alertify.confirm('¿Desea eliminar esta Editorial?', function(){ 
				$.ajax({
					type:"POST",
					data:"idEditorial=" + idEditorial,
					url:"../Procesos/editorial/eliminarEditorial.php",
					success:function(r){
						if(r==1){
							$('#tablaEditorialLoad').load("editorial/tablaEditorial.php");
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