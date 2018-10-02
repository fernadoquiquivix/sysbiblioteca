<?php 
session_start();
if(isset($_SESSION['usuario'])){

?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Prestamo</title>
		<?php require_once "menu.php"; ?>

	<?php 
			require_once "../Clases/Conecxion.php";
			$c= new conectar();
			$conexion=$c->conecxion();

			$sql="SELECT idlibro, titulo
					FROM libro";
			$result=mysqli_query($conexion,$sql); //consulta de libros

			$sql	="SELECT idlector,nombre
					FROM lectores";
			$result1=mysqli_query($conexion,$sql); //consulta de lectores


			
	 ?>

	</head>
	<body>
		<div class="container">
			<h1>Prestamos</h1>

			<div class="row">
				<div class="col-sm-4">
					<form id="frmPrestamos" enctype="multipart/form-data">

		
						<label>Usuario</label>
						<input type="text" class="form-control input-sm" id="usuario" name="usuario" value ="<?php echo $_SESSION['usuario']; ?>" readonly="readonly" />

						<label>Cantidad</label>
						<input type="text" class="form-control input-sm" id="cantidad" name="cantidad">
					
<!--Libros-->			<label>Libros</label>
						<select class="form-control input-sm" id="libroSelect" name="libroSelect">
						<option value="A">Selecciona Libros</option>
						<?php 
						while($ver=mysqli_fetch_row($result)): ?>
						<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
						<?php endwhile; ?>
<!-- fin Libros-->	    </select>
						
	<!--Lectores-->	    <label>Lectores</label>
						<select class="form-control input-sm" id="lectoresSelect" name="lectoresSelect">
						<option value="A">Selecciona Lectores</option>
						<?php 
						while($ver=mysqli_fetch_row($result1)): ?>
						<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
						<?php endwhile; ?>
<!-- fin Lectores-->    </select>

						<p></p>
						<span id="btnAgregaPrestamo" class="btn btn-primary">Agregar</span>
					</form>
				</div>
				<div class="col-sm-8">
					<div id="tablaPrestamoLoad"></div>
				</div>
			</div>
		</div>

		<!-- Button trigger modal -->
		
		<!-- Modal -->
		<div class="modal fade" id="abremodalUpdatePrestamo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualiza Prestamos</h4>
					</div>
					<div class="modal-body">
						<form id="frmPrestamoU" enctype="multipart/form-data">
							<input type="text" id="idPrestamoU" hidden="" name="idPrestamoU">

						<label>Usuario</label>
						<input type="text" class="form-control input-sm" id="usuarioU" name="usuarioU" value ="<?php echo $_SESSION['usuario']; ?>" readonly="readonly" />

							<label>Cantidad</label>
							<input type="text" class="form-control input-sm" id="cantidadU" name="cantidadU">
					


	<!--Libro-->		<label>Libro</label>
							<select class="form-control input-sm" id="LibroSelectU" name="LibroSelectU">
								<option value="A">Selecciona Libro</option>
								<?php 
								$sql="SELECT idlibro, titulo
								from libro";
								$result=mysqli_query($conexion,$sql);
								?>
								<?php while($ver=mysqli_fetch_row($result)): ?>
									<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
								<?php endwhile; ?>
	<!--fin libro-->	</select>

	<!--Lectores-->		<label>Lectores</label>
							<select class="form-control input-sm" id="lectoresSelectU" name="lectoresSelectU">
								<option value="A">Selecciona Lectores</option>
								<?php 
								$sql="SELECT idlector, nombre
								FROM lectores";
								$result1=mysqli_query($conexion,$sql);
								?>
								<?php while($ver=mysqli_fetch_row($result1)): ?>
									<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
								<?php endwhile; ?>
	<!--fin Editorial-->	</select>
							


						</form>
					</div>
					<div class="modal-footer">
						<button id="btnActualizaPrestamo" type="button" class="btn btn-warning" data-dismiss="modal">Actualizar</button>

					</div>
				</div>
			</div>
		</div>

	</body>
	</html>

	<script type="text/javascript">
		function agregaDatosLibro(idlibro){
			$.ajax({
				type:"POST",
				data:"idlibro=" + idlibro,
				url:"../procesos/libros/obtenDatosLibros.php",
				success:function(r){
					
					dato=jQuery.parseJSON(r);
					$('#idCargaLibrosU').val(dato['iddonacion']);
					$('#cantidadU').val(dato['ejemplares']);
				
					$('#libroSelectU').val(dato['idlibro']);
					$('#donadorSelectU').val(dato['iddonador']);
				

				}
			});
		}

		function eliminarLibro(idlibro){
			alertify.confirm('¿Desea eliminar este Libro?', function(){ 
				$.ajax({
					type:"POST",
					data:"idlibro=" + idlibro,
					url:"../procesos/libros/eliminarLibros.php",
					success:function(r){
						if(r==1){
							$('#tablaLibrosLoad').load("libros/tablaLibros.php");
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
			$('#btnActualizaLibros').click(function(){

				datos=$('#frmLibrosU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/libros/actualizaLibros.php",
					success:function(r){
						if(r==1){
							$('#tablaCargaLibrosLoad').load("cargaLibros/tablaCargaLibros.php");
							alertify.success("Actualizado con exito :D");
						}else{
							alertify.error("Error al actualizar :(");
						}
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){

			$('#tablaCargaLibrosLoad').load("cargaLibros/tablaCargaLibros.php");

			$('#btnAgregaCargaLibros').click(function(){

				vacios=validarFormVacio('frmCargaLibros');

				if(vacios > 0){
					alertify.alert("Debes llenar todos los campos!!");
					return false;
				}

				var formData = new FormData(document.getElementById("frmCargaLibros"));

				$.ajax({
					url: "../Procesos/cargalibros/insertaCargaLibros.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

					success:function(r){
						
						if(r == 1){ 
							$('#frmCargaLibros')[0].reset();
							$('#tablaCargaLibrosLoad').load("cargaLibros/tablaCargaLibros.php");
							alertify.success("Agregado con exito :D");
						}else{
							alertify.error(r);
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