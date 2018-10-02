<?php 
	session_start();
if(($_SESSION['tipousuario'] == 'D') || ($_SESSION['tipousuario'] == 'B') || ($_SESSION['tipousuario'] == 'C')){
		
 ?>

<html>
	<head>
		<title>.: LIBROS:.</title>
		<?php require_once "menu.php"; ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.css">
<link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css">
<link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../librerias/select2/css/select2.css">
<link rel="stylesheet" type="text/css" href="../css/menu.css">

<script src="../librerias/jquery-3.2.1.min.js"></script>
<script src="../librerias/alertifyjs/alertify.js"></script>
<script src="../librerias/bootstrap/js/bootstrap.js"></script>
<script src="../librerias/select2/js/select2.js"></script>
<script src="../js/funciones.js"></script>
 

  </head>
	<body>
								<!--<?php //include "php/navbar.php"; ?>-->
<div class="container">
<div class="row">
<div class="col-md-12">
		<h2>CONSULTA DE LIBROS</h2>
<!-- Button trigger modal -->
<form class="form-inline" role="search" id="buscar">
      <div class="form-group">
        <input type="text" size="35" maxlength="30" name="s" class="form-control" placeholder="Buscar">
      </div>
      <button type="submit" class="btn btn-default">&nbsp;<i class="glyphicon glyphicon-search"></i>&nbsp;</button>
  <!-- <a data-toggle="modal" href="#newModal" class="btn btn-default">Agregar</a>-->
    </form>

<br>
  <!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar</h4> -->
        </div>
        <div class="modal-body">

        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

<div id="tablaLibros"></div>


</div>
</div>
</div>
<script src="../librerias/bootstrap/js/bootstrap.js"></script>
<script>

//ESTA FUNCION CARGA TODA LA TABLA
function loadTabla(){
  $('#editModal').modal('hide');
  $.get("consultaLibros/tablaConsultaLibros.php","",function(data){
    $("#tablaLibros").html(data);
  })

}

$("#buscar").submit(function(e){
  e.preventDefault();
  $.get("consultaLibros/busqueda.php",$("#buscar").serialize(),function(data){
    $("#tablaLibros").html(data);
  $("#buscar")[0].reset();
  });
});

//loadTabla();


  //$("#agregar").submit(function(e){
    //e.preventDefault();
    //$.post("./php/agregar.php",$("#agregar").serialize(),function(data){
    //});
    //alert("Agregado exitosamente!");
    //$("#agregar")[0].reset();
    //$('#newModal').modal('hide');
    //loadTabla();
  //});

</script>

	</body>
</html>

	<?php 
}else{
	header("location:../index.php");
}
?>