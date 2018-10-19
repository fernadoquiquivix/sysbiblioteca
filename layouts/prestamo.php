<?php 
    include("../header2.php");
   include("../includes/class.libro.php");
   include("../includes/class.prestamo.php");

  
	$usu=$_SESSION['idUsuario'];
    $nomUs=$_SESSION['usuario'];
     $fecha=date('d-M-Y');


?>
<div>
<div class="container" id="contenido" name="contenido">
    <div class="jumbotron masthead">  


    <script type="text/javascript">setTimeout("actualizarReloj()",10);</script>
    	<table width="100%">
          <tr>
            <td>            
            	<table class="table table-bordered">
                  <tr class="hero-unit">
                    <td>
                   	    <div class="row-fluid">
                            <h2 style="margin:0 0 0 30px">Realizar Prestamo</h2><br>             
                            <div class="span1">                                             
                               
                            </div>
	                        <div class="span6">
                            	<form id="forumulario" name="formulario" onsubmit="#"  method="post">
                                    <strong>Nombre libro</strong><br>                                    
                                    <input type="text" id="imp" autofocus list="browsers" name="buscarV" on autocomplete="off" class="input-xxlarge" required>
                                    <datalist id="browsers">
                                        <?php
                                            $objlibro=new libro();
                                           $reglibro=$objlibro->getRecords();
                                            foreach ($reglibro as $key => $value) 
                                            {                                             
                                                echo '<option value="'.$value['titulo'].'">';
                                            }
                                        ?> 
                                    </datalist>                                                                        
                                </form>
                            </div>                             
    	                    <div class="span4"> 

                                        <i class="icon-ok"></i> <strong>Usuario: </strong><?php echo $nomUs; ?><br>
                                        <i class="icon-ok"></i> <strong>Fecha: </strong> <?php echo $fecha; ?><br>
                                        <i class="icon-ok"></i> <strong>Hora: </strong><input id="reloj"> <br>                                        
                                </div>
                            </div>
                    </td>
                  </tr>
                </table>               
                    </br>
                    <div class="row-fluid">                	                
                        <table class="table table-bordered">
                                    <tr>
                                        <td>
                                           <div class="span8">
                                                <div id="divtablaprincipal" style="width:100%; height:300px; overflow: auto;"></br>                               
                                            </div>
                                            </div>
                                                <div id="divtabladerecha"class="span4">
                                            </div>
                                        </td>
                                    </tr>
                        </table>
                    </div>                
            </td>
          </tr>
        </table>
            <div class="modal hide fade in" data-backdrop="static" id="divmodal" name="divmodal"></div>
            <div class="modal hide fade in" data-backdrop="static" id="divmodal2" name="divmodal2"></div>
    </div>

     </div> </div> </div> </div>
     <script type="text/javascript">            
            function dos_digitos(val)
            {
                return (val<10)? '0'+val : String(val);
            }

            function actualizarReloj()
            {
                
                var momentoActual = new Date();
                var hora = dos_digitos(momentoActual.getHours());
                var minuto = dos_digitos(momentoActual.getMinutes());
                var segundo = dos_digitos(momentoActual.getSeconds());

                var horaImprimible = hora + ":" + minuto + ":" + segundo;
                document.getElementById("reloj").value=""+horaImprimible+"";                
                setTimeout("actualizarReloj()",1000);
            }
  
        </script>
<?php 
    if($_POST['buscarV'])
        {
            $_SESSION['idventa']=$_POST['buscarV'];
            ?>
            <script type="text/javascript">
            $(document).ready(function() {
                         $('#divmodal').load('../includes/actions/prestamo.html?a=ingresarcantidad').modal('show', function(){ $('#cantidadProducto').focus();});
                         desbloquearUi();
                        });
            </script>
            <?php
        }
        else
        { ?>
             <script type="text/javascript">
            $(document).ready(function() {
                $("#divtablaprincipal").load('../includes/actions/prestamo.html?a=tablaprincipalventas');
                desbloquearUi();                
                });
            </script>
        <?php
        }
    
include("../footer.php");
?>


