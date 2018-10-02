<?php 
session_start();
if(isset($_SESSION['usuario'])){

?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Libros</title>
		<?php require_once "menu.php"; ?>

	<?php 
			require_once "../Clases/Conecxion.php";
			$c= new conectar();
			$conexion=$c->conecxion();

			$sql="SELECT idcategoria,nombreCat
					FROM categoria";
			$result=mysqli_query($conexion,$sql);

			$sql="SELECT idautor,nombreAutor
					FROM autor";
			$result1=mysqli_query($conexion,$sql);

			$sql="SELECT ideditorial, nombreEditorial
					FROM editorial";
			$result2=mysqli_query($conexion,$sql);

			$sql="SELECT idubicacion, nombreUbicacion
					FROM ubicacion";
			$result3=mysqli_query($conexion,$sql);
	 ?>

	</head>
	<body>
		<div class="container">
			<h1>Ingreso de Libros</h1>

			<div class="row">
				<div class="col-sm-4">
					<form id="frmLibros" enctype="multipart/form-data">



						<label>Codigo</label>
						<input type="text" class="form-control input-sm" id="codigo" name="codigo">
						<label>Titulo</label>
						<input type="text" class="form-control input-sm" id="titulo" name="titulo">
						<label>Paginas</label>
						<input type="text" class="form-control input-sm" id="paginas" name="paginas">
						<label>Descripcion</label>
						<input type="text" class="form-control input-sm" id="descripcion" name="descripcion">

<!--autor-->			<label>Autor</label>
						<select class="form-control input-sm" id="autorSelect" name="autorSelect">
						<option value="A">Selecciona Autor</option>
						<?php 
						while($ver=mysqli_fetch_row($result1)): ?>
						<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
						<?php endwhile; ?>
<!-- fin Autor-->	    </select>
						
	<!--categoria-->	<label>Categoria</label>
						<select class="form-control input-sm" id="categoriaSelect" name="categoriaSelect">
						<option value="A">Selecciona Categoria</option>
						<?php 
						while($ver=mysqli_fetch_row($result)): ?>
						<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
						<?php endwhile; ?>
<!-- fin categoria-->	</select>

	<!--Editorial-->	<label>Editorial</label>
						<select class="form-control input-sm" id="editorialSelect" name="editorialSelect">
						<option value="A">Selecciona Editorial</option>
						<?php 
						while($ver=mysqli_fetch_row($result2)): ?>
						<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
						<?php endwhile; ?>
<!-- fin Editorial-->	</select>

	<!--Ubicacion-->	<label>Ubicacion</label>
						<select class="form-control input-sm" id="ubicacionSelect" name="ubicacionSelect">
						<option value="A">Selecciona Ubicacion</option>
						<?php 
						while($ver=mysqli_fetch_row($result3)): ?>
						<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
						<?php endwhile; ?>
<!-- fin Ubicacion-->	</select>

						<p></p>
						<span id="btnAgregaLibros" class="btn btn-primary">Agregar</span>
					</form>
				</div>
				<div class="col-sm-8">
					<div id="tablaLibrosLoad"></div>
				</div>
			</div>
		</div>

		<!-- Button trigger modal -->
		
		<!-- Modal -->
		<div class="modal fade" id="abremodalUpdateLibros" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualiza Libros</h4>
					</div>
					<div class="modal-body">
						<form id="frmLibrosU" enctype="multipart/form-data">
							<input type="text" id="idLibro" hidden="" name="idLibro">

	
							<label>Codigo</label>
							<input type="text" class="form-control input-sm" id="codigoU" name="codigoU">
							<label>Titulo</label>
							<input type="text" class="form-control input-sm" id="tituloU" name="tituloU">
							<label>Paginas</label>
							<input type="text" class="form-control input-sm" id="paginaU" name="paginaU">
							<label>Descripcion</label>
							<input type="text" class="form-control input-sm" id="descripcionU" name="descripcionU">

		<!--Autor-->		<label>Autor</label>
							<select class="form-control input-sm" id="autorSelectU" name="autorSelectU">
								<option value="A">Selecciona Autor</option>
								<?php 
								$sql="SELECT idautor,nombreAutor
					    		FROM autor";
								$result1=mysqli_query($conexion,$sql);
								?>
								<?php while($ver=mysqli_fetch_row($result1)): ?>
									<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
								<?php endwhile; ?>
		<!--fin Autor-->	</select>

	<!--categoria-->		<label>Categoria</label>
							<select class="form-control input-sm" id="categoriaSelectU" name="categoriaSelectU">
								<option value="A">Selecciona Categoria</option>
								<?php 
								$sql="SELECT idcategoria,nombreCat
								from categoria";
								$result=mysqli_query($conexion,$sql);
								?>
								<?php while($ver=mysqli_fetch_row($result)): ?>
									<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
								<?php endwhile; ?>
	<!--fin categoria-->	</select>

	<!--Editorial-->		<label>Editorial</label>
							<select class="form-control input-sm" id="editorialSelectU" name="editorialSelectU">
								<option value="A">Selecciona Editorial</option>
								<?php 
								$sql="SELECT ideditorial, nombreEditorial
								FROM editorial";
								$result2=mysqli_query($conexion,$sql);
								?>
								<?php while($ver=mysqli_fetch_row($result2)): ?>
									<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
								<?php endwhile; ?>
	<!--fin Editorial-->	</select>
							

	<!--Ubicaicon-->		<label>Ubicacion</label>
							<select class="form-control input-sm" id="ubicacionSelectU" name="ubicacionSelectU">
								<option value="A">Selecciona Ubicacion</option>
								<?php 
								$sql="SELECT idubicacion, nombreUbicacion
								FROM ubicacion";
								$result3=mysqli_query($conexion,$sql);
								?>
								<?php while($ver=mysqli_fetch_row($result3)): ?>
									<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
								<?php endwhile; ?>
	<!--fin Ubicacion-->	</select>

						</form>
					</div>
					<div class="modal-footer">
						<button id="btnActualizaLibros" type="button" class="btn btn-warning" data-dismiss="modal">Actualizar</button>

					</div>
				</div>
			</div>
		</div>

	</body>
	</html>

	<script type="text/javascript">
		function agregaDatosLibros(idlibro){ //sirve en tabla 
			$.ajax({
				type:"POST",
				data:"idlibro=" + idlibro,
				url:"../Procesos/libros/obtenDatosLibros.php",
				success:function(r){
					
					dato=jQuery.parseJSON(r);
					$('#idLibro').val(dato['idlibro']);
					$('#codigoU').val(dato['codigo']);
					$('#tituloU').val(dato['titulo']);
					$('#paginaU').val(dato['paginas']);
					$('#descripcionU').val(dato['descripcion']);
					$('#autorSelectU').val(dato['autor_idautor']);
					$('#categoriaSelectU').val(dato['categoria_idcategoria']);
					$('#editorialSelectU').val(dato['editorial_ideditorial']);
					$('#ubicacionSelectU').val(dato['ubicacion_idubicacion']);

				}
			});
		}

		function eliminarLibros(idlibro){
			alertify.confirm('¿Desea eliminar este Libro?', function(){ 
				$.ajax({
					type:"POST",
					data:"idlibro=" + idlibro,
					url:"../Procesos/libros/eliminarLibros.php",
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
					url:"../Procesos/libros/actualizaLibros.php",
					success:function(r){
						if(r==1){
							$('#tablaLibrosLoad').load("libros/tablaLibros.php");
							alertify.success("Actualizado con exito :D");
						}else{
							alertify.error("No se Pudo Actualizar ");
						}
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaLibrosLoad').load("libros/tablaLibros.php");

			$('#btnAgregaLibros').click(function(){

				vacios=validarFormVacio('frmLibros');

				if(vacios > 0){
					alertify.alert("Debes llenar todos los campos!!");
					return false;
				}

				var formData = new FormData(document.getElementById("frmLibros"));

				$.ajax({
					url: "../Procesos/libros/insertaLibros.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

					success:function(r){
						
						if(r == 1){
							$('#frmLibros')[0].reset();
							$('#tablaLibrosLoad').load("libros/tablaLibros.php");
							alertify.success("Agregado con exito :D");
						}else{
							alertify.error("No se pudo crear el Libro :(");
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