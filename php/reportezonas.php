<?php
require('../pdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function getDataFrmFile($file) {
 
    // Read file lines
  $lines = file($file);
 
  // Get a array for returning output data
  $data = array();
 
  // Read each line and separate the semicolons
  foreach($lines as $line)
      $data[] = explode(';', chop($line));
  return $data;
}

// Simple table
function getSimpleTable($header, $data) {
 
  // Header
  foreach($header as $column)
      $this->Cell(50,40, $column, 1);
  $this->Ln(); // Set current position
 
  // Data
  foreach($data as $row) {
      foreach($row as $col)
          $this->Cell(50,50, $col, 1);
      $this->Ln(); // Set current position
  }
}

// Get styled table
function getStyledTable($header, $data) {
 
  // Colors, line width and bold font
  $this->SetFillColor(255, 0, 0);
  $this->SetTextColor(255);
  $this->SetDrawColor(128, 0, 0);
  $this->SetLineWidth(.3);
  $this->SetFont('', 'B');
 
  // Header
  $colWidth = array(95, 85, 80, 85);
  for($i = 0; $i < count($header); $i++)
      $this->Cell($colWidth[$i], 7,
                  $header[$i], 1, 0, 'C', 1);
  $this->Ln();
 
  // Setting text color and color fill
  // for the background
  $this->SetFillColor(224, 235, 255);
  $this->SetTextColor(0);
  $this->SetFont('');
 
  // Data
  $fill = 0;
  foreach($data as $row) {
     
      // Prints a cell, first 2 columns  are left aligned
      $this->Cell($colWidth[0], 16, $row[0], 'LR', 0, 'C', $fill);
      $this->Cell($colWidth[1], 16, $row[1], 'LR', 0, 'C', $fill);
     
      // Prints a cell,last 2 columns  are right aligned
    //   $this->Cell($colWidth[2], 6, number_format($row[2]),
    //               'LR', 0, 'R', $fill);
    //   $this->Cell($colWidth[3], 6, number_format($row[3]),
    //               'LR', 0, 'R', $fill);
      $this->Ln();
      $fill=!$fill;
  }
  $this->Cell(array_sum($colWidth), 0, '', 'T');
}

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
    $this->Cell(70,10,utf8_decode('Reporte de 3 zonas de residencias'),0,0,'C');
    $this->Cell(-70,30,utf8_decode('con mayor número de pedidos en Abril de 2023'),0,0,'C');
    // Salto de línea
    $this->Ln(30);
 
  
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

$pdf = new PDF();

$header = array('Zonas de residencia',utf8_decode('Número de usuarios'));
 
// Get data from the text files
$data = $pdf->getDataFrmFile('employees2.txt');

$pdf->SetFont('Arial', '', 14);

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->getStyledTable($header,$data);

$pdf->Output();
?>