<?php 
session_start(); 
  if(!$_SESSION["idUsuario"]){
      $_SESSION['redirect'] = 'http://'.$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI']; header ("Location: ../index.html"); 
  }
  //require_once('config/lang/eng.php');
require_once('tcpdf/examples/tcpdf_include.php');
include("../includes/class.prestamo.php");
        include("../includes/class.detalleprestamo.php");
         
class MYPDF extends TCPDF {
        public function Header() {
                $this->setJPEGQuality(90);
                $this->Image('tcpdf/examples/images/logo.png', 120, 10, 50, 0, 'PNG');
 
        }
        public function Footer() {
               $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
            }
        public function CreateTextBox($textval, $x = 0, $y, $width = 0, $height = 10, $fontsize = 10, $fontstyle = '', $align = 'L') {
                $this->SetXY($x+20, $y); // 20 = margin left
                $this->SetFont(PDF_FONT_NAME_MAIN, $fontstyle, $fontsize);
                $this->Cell($width, $height, $textval, 0, false, $align);
        }
}
$idF=$_REQUEST['idprestamo'];
$objprestamo= new prestamo();
$objdetalleprestamo= new detalleprestamo();

$regprestamo=$objprestamo->sql("SELECT 
    e.nombre as nomP,  
    e.carne as ibm, 
    s.lectores_idlector as idempleado, 
    s.fecha as fecha, 
    s.noprestamo as prestamo 
    FROM prestamo s 
    INNER JOIN lectores e ON s.lectores_idlector=e.idlector  
    WHERE s.idprestamo=$idF");

$regdetalleprestamo=$objdetalleprestamo->sql("SELECT
    t1.cantidadT as cantidad,
    p.titulo as producto
    FROM detalleprestamo t1
    INNER JOIN libro p ON t1.libro_idlibro=p.idlibro
    WHERE t1.prestamo_idprestamo=$idF");
// create a PDF object
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
 
// set document (meta) information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Biblioteca');
$pdf->SetTitle('Prestamo');
$pdf->SetSubject('Prestamos');
$pdf->SetKeywords('Prestamos, Prestamos, Prestamos, Prestamos');
 
// add a page
$pdf->AddPage();
 
// create address box
$pdf->CreateTextBox('Biblioteca', 0, 55, 80, 10, 10, 'B');
$pdf->CreateTextBox('CEPAC', 0, 60, 80, 10, 10);
$pdf->CreateTextBox('Entre 2Da. 3Ra. calle Ave. Mazatenango frente a los bomberos voluntarios', 0, 65, 80, 10, 10);
$pdf->CreateTextBox('Champerico', 0, 70, 80, 10, 10);
 
// invoice title / number
$pdf->CreateTextBox('Correlativo:'.$regprestamo[0]['prestamo'], 0, 90, 120, 20, 16);
$pdf->CreateTextBox('usuario: '.$regprestamo[0]['fecha'], 0, 96, 120, 20, 12);
$pdf->CreateTextBox('Fecha: '.$regprestamo[0]['fecha'], 0, 102, 120, 20, 12);
 
// date, order ref
$pdf->CreateTextBox('Nombre: '.$regprestamo[0]['fecha'].' '.$regprestamo[0]['fecha'], 0, 90, 0, 10, 10, '', 'R');
$pdf->CreateTextBox('Carne: '.$regprestamo[0]['ibm'], 0, 96, 0, 10, 10, '', 'R');

// list headers
$pdf->CreateTextBox('Cantidad', 0, 120, 20, 10, 10, 'B', 'C');
$pdf->CreateTextBox('Libro', 20, 120, 90, 10, 10, 'B');

 
$pdf->Line(20, 129, 195, 129);



// some example data
$precio=0;
foreach ($regdetalleprestamo as $key => $campo) 
          {
            
$orders[] = array('quant' => $campo['cantidad'], 'descr' => $campo['producto'], 'price' =>$precio);
 }
$currY = 128;
$total = 0;
foreach ($orders as $row) {
        $pdf->CreateTextBox($row['quant'], 0, $currY, 20, 10, 10, '', 'C');
        $pdf->CreateTextBox($row['descr'], 20, $currY, 90, 10, 10, '');
        
        $amount = $row['quant']*$row['price'];
        $pdf->CreateTextBox('Q'.$amount, 140, $currY, 30, 10, 10, '', 'R');
        $currY = $currY+5;
        $total = $total+$amount;

}
$pdf->Line(20, $currY+4, 195, $currY+4);

// output the total row
$pdf->CreateTextBox('Total', 20, $currY+5, 135, 10, 10, 'B', 'R');
$pdf->CreateTextBox('Q'.number_format($total, 2, '.', ''), 140, $currY+5, 30, 10, 10, 'B', 'R');
 
// some payment instructions or information
$pdf->setXY(20, $currY+30);
$pdf->SetFont(PDF_FONT_NAME_MAIN, '', 10);
$pdf->MultiCell(175, 10, '<em>Es una impresion para fines de reporte', 0, 'L', 0, 1, '', '', true, null, true);
 
//Close and output PDF document
//$pdf->Output('test.pdf', 'I');
$pdf->Output('compra_'.$idF.'.pdf', 'I');
echo $currY;
?>