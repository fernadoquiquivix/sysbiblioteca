<?php	  
  include("../header.php"); 
?>

<div class="container">
	<aside>
<div class="jumbotron masthead">
<div class="hero-unit1">
	<!--<center><img src="../img/monosales1.png"  /></center>	-->
</div>
</div>
<ul class="thumbnails">  
     
      <li class="span3"> 
        <a href="regiones.html" class="btn thumbnail" onclick="bloquearUi();">
          <img src='../img/escritorio128x128/regiones.png' class=""/>
          <p><b>Regiones</b></p>
        </a>
      </li>

      <li class="span3"> 
        <a href="sucursales.html" class="btn thumbnail" onclick="bloquearUi();">
          <img src='../img/escritorio128x128/sucursales.png' class=""/>
          <p><b>Sucursales</b></p>
        </a>
      </li>

      <li class="span3"> 
        <a href="proveedores.html" class="btn thumbnail" onclick="bloquearUi();">
          <img src='../img/escritorio128x128/proveedores.png' class=""/>
          <p><b>Proveedores</b></p>
        </a>
      </li>

       <li class="span3">     
        <a href="unidades.html" class="btn thumbnail" onclick="bloquearUi();">
          <img src='../img/escritorio128x128/unidades.png' class=""/>
          <p><b>Unidades</b></p>
        </a>
      </li>
      
      <li class="span3">     
        <a href="insumos.html" class="btn thumbnail" onclick="bloquearUi();">
          <img src='../img/escritorio128x128/insumos.png' class=""/>
          <p><b>Insumos</b></p>
        </a>
      </li>

      <li class="span3">     
        <a href="requisiciones.html" class="btn thumbnail" onclick="bloquearUi();">
          <img src='../img/escritorio128x128/requisiciones.png' class=""/>
          <p><b>Requisiciones</b></p>
        </a>
      </li>
     
      <li class="span3"> 
        <a href="servicios.html" class="btn thumbnail" onclick="bloquearUi();">
          <img src='../img/escritorio128x128/servicios.png' class=""/>
          <p><b>Servicios</b></p>
        </a>
      </li>

      <li class="span3">     
        <a href="pacientes.html" class="btn thumbnail" onclick="bloquearUi();">
          <img src='../img/escritorio128x128/pacientes.png' class=""/>
          <p><b>Pacientes</b></p>
        </a>
      </li>

      <li class="span3">     
        <a href="citas.html" class="btn thumbnail" onclick="bloquearUi();">
          <img src='../img/escritorio128x128/citas.png' class=""/>
          <p><b>Citas</b></p>
        </a>
      </li>

       <li class="span3">     
        <a href="historial.html" class="btn thumbnail" onclick="bloquearUi();">
          <img src='../img/escritorio128x128/historial.png' class=""/>
          <p><b>Historial Médico</b></p>
        </a>
      </li>

      <li class="span3">     
        <a href="abonos.html" class="btn thumbnail" onclick="bloquearUi();">
          <img src='../img/escritorio128x128/abonos.png' class=""/>
          <p><b>Abono de Pacientes</b></p>
        </a>
      </li>

      <li class="span3"> 
        <a href="compras.html" class="btn thumbnail" onclick="bloquearUi();">
          <img src='../img/escritorio128x128/compras.png' class=""/>
          <p><b>Compras</b></p>
        </a>
      </li>

       <li class="span3"> 
        <a href="empleados.html" class="btn thumbnail" onclick="bloquearUi();">
          <img src='../img/escritorio128x128/empleados.png' class=""/>
          <p><b>Empleados</b></p>
        </a>
      </li>
            
      <li class="span3">     
        <a href="usuarios.html" class="btn thumbnail" onclick="bloquearUi();">
          <img src='../img/escritorio128x128/usuarios.png' class=""/>
          <p><b>Usuarios</b></p>
        </a>
      </li>

      <li class="span3"> 
        <a href="tiposusuarios.html" class="btn thumbnail" onclick="bloquearUi();">
          <img src='../img/escritorio128x128/tipousuarios.png' class=""/>
          <p><b>Tipo Usuarios</b></p>
        </a>
      </li>      
</ul>
</aside>
</div>
<script type="text/javascript">
$(document).ready(function() {
  $('#contenido').css({'margin-left':'auto'});
  desbloquearUi();

});
</script>
<?php 
include("../footer.php");
?>