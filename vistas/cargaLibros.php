<?php 
session_start();
if(isset($_SESSION['usuario'])){

?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Carga de Libros</title>
		<?php require_once "menu.php"; ?>

	<?php 
			require_once "../Clases/Conecxion.php";
			$c= new conectar();
			$conexion=$c->conecxion();

			$sql="SELECT idlibro, titulo
					FROM libro";
			$result=mysqli_query($conexion,$sql);

			$sql="SELECT iddonador,nombre
					FROM donadores";
			$result1=mysqli_query($conexion,$sql);

			
	 ?>

	</head>
	<body>
		<div class="container">
			<h1>Carga de Libros Donados</h1>

			<div class="row">
				<div class="col-sm-4">
					<form id="frmCargaLibros" enctype="multipart/form-data">


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
						
	<!--Donador-->	<label>Donador</label>
						<select class="form-control input-sm" id="donadorSelect" name="donadorSelect">
						<option value="A">Selecciona Donadores</option>
						<?php 
						while($ver=mysqli_fetch_row($result1)): ?>
						<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
						<?php endwhile; ?>
<!-- fin Donador-->	</select>


						<p></p>
						<span id="btnAgregaCargaLibros" class="btn btn-primary">Agregar</span>
					</form>
				</div>
				<div class="col-sm-8">
					<div id="tablaCargaLibrosLoad"></div>
				</div>
			</div>
		</div>

		<!-- Button trigger modal -->
		
		<!-- Modal -->
		<div class="modal fade" id="abremodalUpdateCargaLibros" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualiza Carga de Libros</h4>
					</div>
					<div class="modal-body">
						<form id="frmCargaLibrosU" enctype="multipart/form-data">
							
							<input type="text" id="idCargaLibrosU" hidden="" name="idCargaLibrosU">
							<input type="text" id="cantidadU2" hidden="" name="cantidadU2">
							<input type="text" id="libroSelectUA" hidden="" name="libroSelectUA">

	
							<label>Cantidad</label>
							<input type="text" class="form-control input-sm" id="cantidadU" name="cantidadU">
					


	<!--Libro-->		<label>libro </label>
							<select class="form-control input-sm" id="libroSelectU" name="libroSelectU">
								<option value="A">Selecciona libro</option>
								<?php 
								$sql="SELECT idlibro, titulo
								FROM libro";
								$result1=mysqli_query($conexion,$sql);
								?>
								<?php while($ver1=mysqli_fetch_row($result1)): ?>
									<option value="<?php echo $ver1[0] ?>"><?php echo $ver1[1]; ?></option>
								<?php endwhile; ?>
	<!--fin Editorial-->	</select>

	<!--donador-->		<label>Donador</label>
							<select class="form-control input-sm" id="donadorSelectU" name="donadorSelectU">
								<option value="A">Selecciona Donador</option>
								<?php 
								$sql="SELECT iddonador, nombre
								FROM donadores";
								$result1=mysqli_query($conexion,$sql);
								?>
								<?php while($ver1=mysqli_fetch_row($result1)): ?>
									<option value="<?php echo $ver1[0] ?>"><?php echo $ver1[1]; ?></option>
								<?php endwhile; ?>
	<!--fin Editorial-->	</select>


						</form>
					</div>
					<div class="modal-footer">
						<button id="btnActualizaCargaLibros" type="button" class="btn btn-warning" data-dismiss="modal">Actualizar</button>

					</div>
				</div>
			</div>
		</div>

	</body>
	</html>

	<script type="text/javascript">
		function agregaDatosLibro(iddonacion){
			$.ajax({
				type:"POST",
				data:"iddonacion=" + iddonacion,
				url:"../Procesos/cargalibros/obtenDatosLibros.php",
				success:function(r){
					dato=jQuery.parseJSON(r);
	
					
					$('#idCargaLibrosU').val(dato['iddonacion']);
					$('#cantidadU').val(dato['ejemplares']);
					$('#libroSelectUA').val(dato['idlibro']);
					$('#libroSelectU').val(dato['idlibro']);
					$('#donadorSelectU').val(dato['iddonador']);
					$('#cantidadU2').val(dato['ejemplares']);
	
		
				

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
			$('#btnActualizaCargaLibros').click(function(){

				datos=$('#frmCargaLibrosU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../Procesos/cargalibros/actualizarCargaLibros.php",
					success:function(r){
						if(r==1){
							$('#tablaCargaLibrosLoad').load("cargaLibros/tablaCargaLibros.php");
							alertify.success("Actualizado con exito :D");
						}else{
							alertify.error(r);
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