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
    $this->setTextColor(0,0,255);
    // Título
    $this->Cell(70,10,utf8_decode('Reporte de 5 urbanizaciones de la Parroquia Agua Viva '),0,0,'C');
    $this->Cell(-70,30,utf8_decode('(Cabudare) con mayor número de pedidos en Abril de 2023'),0,0,'C');
    // Salto de línea
    $this->Ln(20);
    // $this->setTextColor(0,0,0);
    // $this->setFillColor(220.220,220); 
    // $this->SetFont('Arial','B',12);
    // $this->SetX(25);
    // $this->Cell(50,15,'Nombre',1,0,'C',1);
	// $this->Cell(50,15,'Precio',1,0,'C',1);
	// $this->Cell(70,15,utf8_decode('N° de unidades vendidas'),1,1,'C',1);
    // $this->Ln(20);
  
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
$consulta = "SELECT * FROM articulos LIMIT 5";
$resultado = mysqli_query($con, $consulta);



$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$key = 28;
$pdf->Image('../img/grafico1.jpg',-25,70,250);

// while ($row=$resultado->fetch_assoc()) {
//     $pdf->SetX(25);
// 	$pdf->Cell(50,15,utf8_decode($row['nombre']),1,0,'C',0);
// 	$pdf->Cell(50,15,$row['precio']."$",1,0,'C',0);
// 	$pdf->Cell(70,15,$key,1,1,'C',0);
//     $key--;
// };


$pdf->output();