<?php 
session_start();
if($_SESSION['tipousuario'] == 'B'){

	?>


	<!DOCTYPE html>
	<html>
	<head>
		<title>Autores</title>
		<?php require_once "menu.php"; ?>
	</head>
	<body>

		<div class="container">
			<h1>Autor</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmAutores">
						<label>Autores de Libros</label>
						<input type="text" class="form-control input-sm" name="autor" id="autor">
						<p></p>
						<span class="btn btn-primary" id="btnAgregaAutor">Agregar</span>
					</form>
				</div>
				<div class="col-sm-6">
					<div id="tablaAutorLoad"></div>
				</div>
			</div>
		</div>

		<!-- Button trigger modal -->

		<!-- Modal -->
		<div class="modal fade" id="actualizaAutor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualiza Autores</h4>
					</div>
					<div class="modal-body">
						<form id="frmAutoresU">
							<input type="text" hidden="" id="idAutor" name="idAutor">
							<label>Autor</label>
							<input type="text" id="AutorU" name="AutorU" class="form-control input-sm">
						</form>


					</div>
					<div class="modal-footer">
						<button type="button" id="btnActualizaAutor" class="btn btn-warning" data-dismiss="modal">Guardar</button>

					</div>
				</div>
			</div>
		</div>

	</body>
	</html>
	<script type="text/javascript">
		$(document).ready(function(){

			$('#tablaAutorLoad').load("autor/tablaAutor.php");

			$('#btnAgregaAutor').click(function(){

				vacios=validarFormVacio('frmAutores');

				if(vacios > 0){
					alertify.alert("Debes llenar todos los campos!!");
					return false;
				}

				datos=$('#frmAutores').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../Procesos/autores/agregaAutor.php",
					success:function(r){
						if(r==1){
					//esta linea nos permite limpiar el formulario al insetar un registro
					$('#frmAutores')[0].reset();

					$('#tablaAutorLoad').load("autor/tablaAutor.php");
					alertify.success("Autor agregado con exito :D");
				}else{
					alertify.error("No se pudo agregar el autor");
				}
			}
		});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnActualizaAutor').click(function(){

				datos=$('#frmAutoresU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../Procesos/autores/actualizaAutores.php",
					success:function(r){
						if(r==1){
							$('#tablaAutorLoad').load("autor/tablaAutor.php");
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
		function agregaDato(idAutor,Autor){ //debe llevar los mismos valores
			$('#idAutor').val(idAutor); //sirve en procesos 
			$('#AutorU').val(Autor);
		}

		function eliminarAutores(idAutor){
			alertify.confirm('¿Desea eliminar este Autor?', function(){ 
				$.ajax({
					type:"POST",
					data:"idAutor=" + idAutor,
					url:"../Procesos/autores/eliminarAutores.php",
					success:function(r){
						if(r==1){
							$('#tablaAutorLoad').load("autor/tablaAutor.php");
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