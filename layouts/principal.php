<?php	  
  include("../header.php"); 
  //include("../includes/class.permisos.php");

?><style type="text/css">
</style>


<div class="container">
	<aside>
        <div class="jumbotron masthead">
            <div class="hero-unit">
	           <!--<center><img src="../img/monosales1.png"  /></center>	-->
            </div>
        </div>
        <ul class="thumbnails"> 
                <li class="span3"> 
                    <a href="empleados.html" class="btn thumbnail" onclick="bloquearUi();">
                        <img src='../img/escritorio128x128/empleados.png' class=""/>
                        <p><b>Empleados</b></p>
                    </a>
                </li>  
                    
          <li class="span3"> 
                    <a href="insumo.html" class="btn thumbnail" onclick="bloquearUi();">
                        <img src='../img/escritorio128x128/insumos.png' class=""/>
                        <p><b>Insumos</b></p>
                    </a>
                </li>
                <li class="span3"> 
                    <a href="compras.html" class="btn thumbnail" onclick="bloquearUi();">
                        <img src='../img/escritorio128x128/requisiciones.png' class=""/>
                        <p><b>Compras</b></p>
                    </a>
                </li>
                <li class="span3"> 
                    <a href="ventas.html" class="btn thumbnail" onclick="bloquearUi();">
                        <img src='../img/escritorio128x128/producto.png' class=""/>
                        <p><b>Requisiciones</b></p>
                    </a>
                </li> 
        </ul>
         <ul class="thumbnails"> 
                <li class="span3"> 
                    <a href="reporterequisiciones.html" class="btn thumbnail" onclick="bloquearUi();">
                        <img src='../img/escritorio128x128/historial.png' class=""/>
                        <p><b>Reporte de Requisiciones</b></p>
                    </a>
                </li>  
                    
          <li class="span3"> 
                    <a href="reportecompra.html" class="btn thumbnail" onclick="bloquearUi();">
                        <img src='../img/escritorio128x128/reporte.png' class=""/>
                        <p><b>Reporte de Compras</b></p>
                    </a>
                </li>
                <li class="span3"> 
                    <a href="unidad.html" class="btn thumbnail" onclick="bloquearUi();">
                        <img src='../img/escritorio128x128/unidades.png' class=""/>
                        <p><b>UNIDAD</b></p>
                    </a>
                </li>
                <li class="span3"> 
                    <a href="clasificacion.html" class="btn thumbnail" onclick="bloquearUi();">
                        <img src='../img/escritorio128x128/clasificacion.png' class=""/>
                        <p><b>Clasficación</b></p>
                    </a>
                </li>
                <li class="span3"> 
                    <a href="proveedor.html" class="btn thumbnail" onclick="bloquearUi();">
                        <img src='../img/escritorio128x128/proveedor.png' class=""/>
                        <p><b>Proveedor</b></p>
                    </a>
                </li>
                <li class="span3"> 
                    <a href="usuarios.html" class="btn thumbnail" onclick="bloquearUi();">
                        <img src='../img/escritorio128x128/usuarios.png' class=""/>
                        <p><b>Usuario</b></p>
                    </a>
                </li>
              
        </ul>


 
<script type="text/javascript">

    $(document).ready(function() {
      $('#contenido').css({'margin-left':'auto'});
      desbloquearUi();
    });
</script>
<?php 
include("../footer.php");
?>