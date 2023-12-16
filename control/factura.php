<?php
require('../pdf/fpdf.php');
session_start();
class PDF extends FPDF
{
// Cabecera de página
function Header()
{

    $this->Image('../img/900.jpg',10,5,40);
    $this->SetFont('Arial','B',16);
    $this->Cell(0,10,'FOODGO',0,0,'C');
    $this->Ln(10);
    date_default_timezone_set("America/Caracas");
    $tDate=date('d-m-y, g:i a');
    setlocale(LC_ALL, 'es_ES.UTF-8');
    $this->SetFont('Arial','B',8);
    $this->Cell(0, 10, 'FECHA Y HORA: '.$tDate, 0, false, 'C', 0, '', 0, false, 'T', 'M');
    $this->Ln(5);
    $this->Cell(0,10,'RIF: J-62503457-1',0,0,'C');
    $this->Ln(5);
    $this->Cell(0,10,utf8_decode('DIRECCIÓN: CARRERA 24, ENTRE CALLE 6 Y AV. MORÁN'),0,0,'C');
    $this->Ln(5);
    $this->Cell(0,10,utf8_decode('BARQUISIMETO. ESTADO LARA'),0,0,'C');
    $this->Ln(15);
    // Arial bold 15
    $this->SetFont('Arial','B',16);
    // Movernos a la derecha
    $this->Cell(60);
    $this->setTextColor(0,0,255);
    // Título
    $this->Cell(70,10,'FACTURA ',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->setTextColor(0,0,0);
    $this->setFillColor(220.220,220); 
    $this->SetFont('Arial','B',8);
    $this->SetX(3);
    $this->Cell(20,15,'C.I.',1,0,'C',1);
    $this->Cell(40,15,'Nombre',1,0,'C',1);
    $this->Cell(70,15,'Productos',1,0,'C',1);
    $this->Cell(15,15,'Monto',1,0,'C',1);
    $this->Cell(20,15,'Fecha',1,0,'C',1);
    $this->Cell(20,15,utf8_decode('N° Telefónico'),1,0,'C',1);
    $this->setFillColor(127,255,0); 
    $this->Cell(15,15,'Total',1,1,'C',1);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    $this->SetX(-30);
    // Arial italic 8
    $this->SetFont('Arial','I',10);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ') .$this->PageNo().'/{nb}',0,0,'C');
}
}

require ("../admin/usere.php");
$sqlTrabajadores = ("SELECT * FROM ordenes ORDER BY id DESC LIMIT 1");
$query = mysqli_query($con, $sqlTrabajadores);
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);
$total =0;

//Check if the value is not set, then set a random number
if(!isset($_SESSION["rand"])){ 
    $_SESSION["rand"] = rand(0,100000);
}

$randomNumber = $_SESSION["rand"];

while ($row=$query->fetch_assoc()) {
    $pdf->SetX(3);
    $a = $total+=$row['monto'];
    $pdf->Cell(20,15,utf8_decode($row['cedula']),1,0,'C',0);
    $pdf->Cell(40,15,utf8_decode($row['nombre']),1,0,'C',0);
    $pdf->Cell(70,15,utf8_decode($row['productos']),1,0,'C',0);
    $pdf->Cell(15,15,$row['monto']."$",1,0,'C',0);
	$pdf->Cell(20,15,$row['fechatransferencia'],1,0,'C',0);
    $pdf->Cell(20,15,utf8_decode($row['telefono']),1,0,'C',0);
    $pdf->Cell(15,15,$a."$",1,1,'C',0);
}
$pdf->Ln(10);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(50,10,utf8_decode("N de referencia: ").$randomNumber.".",0,0,'C');
$pdf->Ln(10);
$pdf->Cell(110,10,utf8_decode("A partir de este momento, tiene una hora para recibir su pedido."),0,0,'C');
$pdf->Ln(20);
$pdf->SetFont('Arial','B',18);
$pdf->setTextColor(255,0,0);
$pdf->Cell(190,10,utf8_decode("¡Gracias por su compra!"),0,0,'C');




	$pdf->Output();
?>