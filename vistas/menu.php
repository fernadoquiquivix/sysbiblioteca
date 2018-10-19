
<?php require_once "dependencias.php" ?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

  <!-- Begin Navbar -->
  <div id="nav">
    <div class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="100">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="inicio.php"><img class="img-responsive logo img-thumbnail" src="../img/logo.jpg" alt="" width="100px" height="100px"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

          <ul class="nav navbar-nav navbar-right">

            <li class="active"><a href="inicio.php"><span class="glyphicon glyphicon-home"></span> Inicio</a>
            </li>

            
          </li>
          <?php
           if($_SESSION['tipousuario']=="B"){
               ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Mantenimiento <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="categorias.php">Categorias</a></li>
              <li><a href="autores.php">Autores</a></li>
              <li><a href="editorial.php">Editorial</a></li>
              <li><a href="ubicacion.php">Ubicacion</a></li>
              <li><a href="libros.php"><span class="glyphicon glyphicon-book"></span> Creacion de Libros</a></li>
            </ul>
          </li>
<?php 
               }
               ?>
<!--registro de libros-->
          </li>
           <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Registro de Libros <span class="caret"></span></a>
            <ul class="dropdown-menu">
           
              <li><a href="cargaLibros.php">Carga de Donacion</a></li>
            </ul>
          </li>


<!--prestamos y devoluciones-->
          </li>
           <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Actividades <span class="caret"></span></a>
            <ul class="dropdown-menu">
<<<<<<< HEAD
              <li><a href="../layouts/prestamo.html">Prestamos</a></li>
=======
              <li><a href="prestamos.php">Prestamos</a></li>
>>>>>>> 79b8749ad79bec5d57817dadb5a87057992d5248
              <li><a href="devolucion.php">Devoluciones</a></li>
               <li><a href="consultaLibros.php"><span class="glyphicon glyphicon-book"></span> Consulta Libros</a></li>
            </ul>
          </li>
        

<!--prestamos y devoluciones-->
          </li>
           <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Registros <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="lectores.php"><span class="glyphicon glyphicon-user"></span> Lectores</a></li>
              <li><a href="donadores.php"><span class="glyphicon glyphicon-user"></span> Donadores</a></li>
          
              <?php
            if($_SESSION['tipousuario']=="B"):
               ?>
              <li><a href="usuarios.php"><span class="glyphicon glyphicon-user"></span> Administrar usuarios</a>
               </li>
               <?php 
               endif;
               ?>


            </ul>
          </li>

<!--reportes-->
          </li>
           <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Reportes <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="prestamos.php">libros prestados</a></li>
              <li><a href="devolucion.php">lectores </a></li>
            </ul>
          </li>


          
          <li class="dropdown" >
            <a href="#" style="color: red"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Usuario: <?php echo $_SESSION['usuario']; ?>  <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li> <a style="color: red" href="../Procesos/salir.php"><span class="glyphicon glyphicon-off"></span> Salir</a></li>
              
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.contatiner -->
  </div>
</div>
<!-- Main jumbotron for a primary marketing message or call to action -->


<!-- /container -->        


</body>
</html>

<script type="text/javascript">
  $(window).scroll(function() {
    if ($(document).scrollTop() > 150) {
      $('.logo').height(200);

    }
    else {
      $('.logo').height(100);
    }
  }
  );
</script>