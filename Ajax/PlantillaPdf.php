<?php
require('fpdf/fpdf.php');
//require('fpdf/WriteHTML.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../View/images/logo.jpg',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(150);
    // Título
    $this->Cell(70,10,'REPUBLICA DE COLOMBIA MINISTERIO DE EDUCACION NACIONAL',0,0,'C');
    $this->Ln(10);
    $this->Cell(150);
    $this->Cell(70,10,'SECRETARIA DE EDUCACION DEPARTAMENTAL',0,0,'C');
    $this->Ln(10);
    $this->Cell(150);
    $this->Cell(70,10,utf8_decode('INSTITUCIÓN EDUCATIVA JORGE ELIÉCER GAITÁN'),0,0,'C');
    $this->Ln(10);
    $this->Cell(150);
    $this->Cell(70,10,utf8_decode('TOTA BOYACÁ'),0,0,'C');
    $this->Ln(10);
    $this->Cell(150);
    $this->Cell(70,10,'INFORME DE EVALUACION',0,0,'C');

    // Salto de línea
    $this->Ln(20);
    
    /*$this->Cell(60,10,"Id",1,0,"C",0);
    $this->Cell(40,10,"Nota Acumulativa",1,0,"C",0);
    $this->Cell(40,10,"Nota Comportamental",1,0,"C",0);
    $this->Cell(40,10,"AutoEvaluacion",1,0,"C",0);
    $this->Cell(40,10,"Evaluacion",1,0,"C",0);
    $this->Cell(40,10,"Promedio",1,true,"C",0);*/
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(400,5,'AMAMOS LA VIDA CUIDAMOS LA NATURALEZA',0,1,'C');
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}