<?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Lectores</title>
		<?php require_once "menu.php"; ?>
	</head>
	<body>
		<div class="container">
			<h1>Administrar Lectores</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmRegistro">
						<label>Carne</label>
						<input type="text" class="form-control input-sm" name="carne" id="carne">
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" name="nombre" id="nombre">
						<label>Direccion</label>
						<input type="text" class="form-control input-sm" name="direccion" id="direccion">
						<label>Telefono</label>
						<input type="text" class="form-control input-sm" name="telefono" id="telefono">
						<label>Cargo</label>
						<select class="form-control input-sm" name="cargo" id="cargo">
						<option>DOCENTE</option>
  						<option>ALUMNO</option>
						</select>

						<label>Sexo</label>
						<select class="form-control input-sm" name="sexo" id="sexo">
						<option>MASCULINO</option>
  						<option>FEMENINO</option>
						</select>


						<!--<label>Sexo</label>
						<input type="text" class="form-control input-sm" name="sexo" id="sexo">-->
						<p></p>
						<span class="btn btn-primary" id="registro">Registrar</span>

					</form>
				</div>
				<div class="col-sm-7">
					<div id="tablaLectoresLoad"></div>
				</div>
			</div>
		</div>


		<!-- Button trigger modal -->


		<!-- Modal -->
		<div class="modal fade" id="actualizaLectoresModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualizar Lectores</h4>
					</div>
					<div class="modal-body">
						<form id="frmRegistroU">
							<input type="text" hidden="" id="idlectoresU" name="idlectoresU">
							<label>Canre<Canre>
							<input type="text" class="form-control input-sm" name="carneU" id="carneU">
							<label>Nombre</label>
							<input type="text" class="form-control input-sm" name="nombreU" id="nombreU">
							<label>Direccion</label>
							<input type="text" class="form-control input-sm" name="direccionU" id="direccionU">
							<label>Telefono</label>
							<input type="text" class="form-control input-sm" name="telefonoU" id="telefonoU">
							<label>Cargo</label>
							<select class="form-control input-sm" name="cargoU" id="cargoU">
							<option>DOCENTE</option>
  							<option>ALUMNO</option>
							</select>

							<label>Sexo</label>
							<select class="form-control input-sm" name="sexoU" id="sexoU">
							<option>MASCULINO</option>
  							<option>FEMENINO</option>
							</select>

						</form>
					</div>
					<div class="modal-footer">
						<button id="btnActualizaLector" type="button" class="btn btn-warning" data-dismiss="modal">Actualizar Lector</button>

					</div>
				</div>
			</div>
		</div>

	</body>
	</html>

	<script type="text/javascript">
		function agregaDatosLector(idlector){

			$.ajax({
				type:"POST",
				data:"idlector=" + idlector,
				url:"../Procesos/lectores/obtenDatosLectores.php",
				success:function(r){
					dato=jQuery.parseJSON(r);

					$('#idlectoresU').val(dato['idlector']);
					$('#carneU').val(dato['carne']);
					$('#nombreU').val(dato['nombre']);
					$('#direccionU').val(dato['direccion']);
					$('#telefonoU').val(dato['telefono']);
					$('#cargoU').val(dato['cargo']);
					$('#sexoU').val(dato['sexo']);
				}
			});
		}

		function eliminarLector(idlector){
			alertify.confirm('¿Desea eliminar este lector?', function(){ 
				$.ajax({
					type:"POST",
					data:"idlector=" + idlector,
					url:"../Procesos/lectores/eliminarLectores.php",
					success:function(r){
						if(r==1){
							$('#tablaLectoresLoad').load('lectores/tablaLectores.php');
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

	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnActualizaLector').click(function(){
				datos=$('#frmRegistroU').serialize();

				$.ajax({
					type:"POST",
					data:datos,
					url:"../Procesos/lectores/actualizaLectores.php",
					success:function(r){

						if(r==1){
							$('#frmRegistro')[0].reset();
							$('#tablaLectoresLoad').load('lectores/tablaLectores.php');
							alertify.success("Actualizado con exito :D");
						}else{
							alertify.error("No se pudo actualizar :(");
						}
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){

			$('#tablaLectoresLoad').load('lectores/tablaLectores.php');

			$('#registro').click(function(){

				vacios=validarFormVacio('frmRegistro');

				if(vacios > 0){
					alertify.alert("Debes llenar todos los campos!!");
					return false;
				}

				datos=$('#frmRegistro').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../Procesos/lectores/registrarLectores.php",
					success:function(r){
						//alert(r);

						if(r==1){
							$('#frmRegistro')[0].reset();
							$('#tablaLectoresLoad').load('lectores/tablaLectores.php');
							alertify.success("Agregado con exito");
						}else{
							alertify.error("Fallo al agregar :(");
						}
					}
				});
			});
		});
	</script>

	<?php 
}else{
	header("location:../index.php");
}
?>