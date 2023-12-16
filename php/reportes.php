<?php
require('../pdf/fpdf.php');

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
    // Título
    $this->setTextColor(0,0,255);
    $this->Cell(70,10,utf8_decode('Reporte de Pagos '),0,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->setTextColor(0,0,0);
    $this->setFillColor(220.220,220); 
    $this->SetFont('Arial','B',7);
    $this->SetX(20);
    $this->Cell(25,15,'Nombre de usuario',1,0,'C',1);
    $this->Cell(27,15,'Nombre del titular',1,0,'C',1);
    $this->Cell(28,15,utf8_decode('Cédula del titular'),1,0,'C',1);
    $this->Cell(20,15,'Monto',1,0,'C',1);
    $this->Cell(20,15,'Referencia',1,0,'C',1);
    $this->Cell(20,15,'Banco',1,0,'C',1);
    $this->Cell(20,15,'Fecha',1,0,'C',1);
    $this->setFillColor(127,255,0); 
    $this->Cell(20,15,'Total',1,1,'C',1);
  
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
    $this->SetFont('helvetica', 'I', 10);

}
}

require ("../admin/usere.php");
$fechaInit = date("Y-m-d", strtotime($_POST['fecha_ingreso']));
$fechaFin  = date("Y-m-d", strtotime($_POST['fechaFin']));
$sqlTrabajadores = ("SELECT * FROM ordenes WHERE (fechatransferencia>='$fechaInit' and fechatransferencia<='$fechaFin') ORDER BY fechatransferencia ASC");
$query = mysqli_query($con, $sqlTrabajadores);
$total = 0;


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);


while ($row=$query->fetch_assoc()) {
    $pdf->SetX(20);
    
    $a = $total+=$row['monto'];
    $pdf->Cell(25,15,utf8_decode($row['nombre']),1,0,'C',0);
    $pdf->Cell(27,15,utf8_decode($row['nombretitular']),1,0,'C',0);
    $pdf->Cell(28,15,$row['cedulatitular'],1,0,'C',0);
    $pdf->Cell(20,15,$row['monto']."$",1,0,'C',0);
    $pdf->Cell(20,15,$row['numerotransferencia'],1,0,'C',0);
    $pdf->Cell(20,15,utf8_decode($row['banco']),1,0,'C',0);
	$pdf->Cell(20,15,$row['fechatransferencia'],1,0,'C',0);
    $pdf->Cell(20,15,$a."$",1,1,'C',0);
    

}




	$pdf->Output();
?>
