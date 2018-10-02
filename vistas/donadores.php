<?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Donadores</title>
		<?php require_once "menu.php"; ?>
	</head>
	<body>
		<div class="container">
			<h1>Administrar Donadores</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmRegistro">
						
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" name="nombre" id="nombre">
						<label>Telefono</label>
						<input type="text" class="form-control input-sm" name="telefono" id="telefono">
						<label>Direccion</label>
						<input type="text" class="form-control input-sm" name="direccion" id="direccion">
						<p></p>
						<span class="btn btn-primary" id="registro">Registrar</span>

					</form>
				</div>
				<div class="col-sm-7">
					<div id="tablaDonadoresLoad"></div>
				</div>
			</div>
		</div>


		<!-- Button trigger modal -->


		<!-- Modal -->
		<div class="modal fade" id="actualizaDonadoresModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualizar Donadores</h4>
					</div>
					<div class="modal-body">
						<form id="frmRegistroU">
							<input type="text" hidden="" id="iddonadorU" name="iddonadorU">
							
							<label>Nombre</label>
							<input type="text" class="form-control input-sm" name="nombreU" id="nombreU">
							<label>Telefono</label>
							<input type="text" class="form-control input-sm" name="telefonoU" id="telefonoU">
							<label>Direccion</label>
							<input type="text" class="form-control input-sm" name="direccionU" id="direccionU">
							

						</form>
					</div>
					<div class="modal-footer">
						<button id="btnActualizaDonador" type="button" class="btn btn-warning" data-dismiss="modal">Actualizar Donadores</button>

					</div>
				</div>
			</div>
		</div>

	</body>
	</html>

	<script type="text/javascript">
		function agregaDatosDonador(iddonador){

			$.ajax({
				type:"POST",
				data:"iddonador=" + iddonador,
				url:"../Procesos/donadores/obtenDatosDonadores.php",
				success:function(r){
					dato=jQuery.parseJSON(r);

					$('#iddonadorU').val(dato['iddonador']);
					$('#nombreU').val(dato['nombre']);
					$('#telefonoU').val(dato['telefono']);
					$('#direccionU').val(dato['direccion']);
					
				}
			});
		}

		function eliminarDonador(iddonador){
			alertify.confirm('¿Desea eliminar este donador?', function(){ 
				$.ajax({
					type:"POST",
					data:"iddonador=" + iddonador,
					url:"../Procesos/donadores/eliminarDonador.php",
					success:function(r){
						if(r==1){
							$('#tablaDonadoresLoad').load('donadores/tablaDonadores.php');
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
			$('#btnActualizaDonador').click(function(){
				datos=$('#frmRegistroU').serialize();

				$.ajax({
					type:"POST",
					data:datos,
					url:"../Procesos/donadores/actualizaDonadores.php",
					success:function(r){

						if(r==1){
							$('#frmRegistro')[0].reset();
							$('#tablaDonadoresLoad').load('donadores/tablaDonadores.php');
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

			$('#tablaDonadoresLoad').load('donadores/tablaDonadores.php');

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
					url:"../Procesos/donadores/registrarDonadores.php",
					success:function(r){
						//alert(r);

						if(r==1){
							$('#frmRegistro')[0].reset();
								$('#tablaDonadoresLoad').load('donadores/tablaDonadores.php');
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