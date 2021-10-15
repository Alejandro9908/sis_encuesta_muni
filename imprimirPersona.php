<?php

    require('fpdf/fpdf.php');
    include_once 'controllers/reportePoblacionController.php';

    $id_persona = $_GET['id_persona'];



    $controlador = new reportePoblacionController();

    $personas = array();
    $personas = $controlador->buscarPersona($id_persona);
    $dis = $controlador->buscarDiscapacidad($id_persona);
    $enf = $controlador->buscarEnfermedades($id_persona);

    if ( count($personas) > 0 ){
        $personas = $personas[0];
    }


    $pdf = new FPDF('P','mm', array(245,325));
$pdf->SetMargins(15, 15 ,15);

$pdf->AddPage();
$pdf->AliasNbPages();
// Logo
$pdf->Image('img/logo.jpg',15,10,33);
// Arial bold 15
$pdf->SetFont('Arial','B',15);
// Movernos a la derecha
$pdf->Cell(90);
// Título
$pdf->Cell(30,10,utf8_decode('DATOS DE PERSONA'),0,0,'C');
// Salto de línea
$pdf->Ln(20);


////////////////////////////////////////////////
//
//   DATOS GENERALES
//
///////////////////////////////////////////////


$pdf->SetFont('Arial','B',12);
$pdf->Cell(60, 10, utf8_decode('Datos'), 0, 1,'L', 0); 

$pdf->SetFont('Arial','B',10);
$pdf->Cell(100, 6, utf8_decode('Nombres'), 1, 0,'L', 0); 
$pdf->SetFont('Arial','',10);
$pdf->Cell(113, 6, utf8_decode($personas['nombres']), 1, 1,'L', 0); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100, 6, utf8_decode('Primer Apellido'), 1, 0,'L', 0); 
$pdf->SetFont('Arial','',10);
$pdf->Cell(113, 6, utf8_decode($personas['primer_apellido']), 1, 1,'L', 0); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100, 6, utf8_decode('Segundo Apellido'), 1, 0,'L', 0);
$pdf->SetFont('Arial','',10); 
$pdf->Cell(113, 6, utf8_decode($personas['segundo_apellido']), 1, 1,'L', 0); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100, 6, utf8_decode('Sexo'), 1, 0,'L', 0); 
$pdf->SetFont('Arial','',10);
$pdf->Cell(113, 6, utf8_decode($personas['sexo']), 1, 1,'L', 0); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100, 6, utf8_decode('Edad'), 1, 0,'L', 0); 
$pdf->SetFont('Arial','',10);
$pdf->Cell(113, 6, utf8_decode($personas['edad']), 1, 1,'L', 0); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100, 6, utf8_decode('DPI'), 1, 0,'L', 0); 
$pdf->SetFont('Arial','',10);
$pdf->Cell(113, 6, utf8_decode($personas['dpi']), 1, 1,'L', 0); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100, 6, utf8_decode('Estado Civil'), 1, 0,'L', 0); 
$pdf->SetFont('Arial','',10);
$pdf->Cell(113, 6, utf8_decode($personas['estado_civil']), 1, 1,'L', 0); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100, 6, utf8_decode('Escolaridad'), 1, 0,'L', 0); 
$pdf->SetFont('Arial','',10);
$pdf->Cell(113, 6, utf8_decode($personas['escolaridad']), 1, 1,'L', 0); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100, 6, utf8_decode('Ocupación'), 1, 0,'L', 0); 
$pdf->SetFont('Arial','',10);
$pdf->Cell(113, 6, utf8_decode($personas['ocupacion']), 1, 1,'L', 0); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100, 6, utf8_decode('Telefono'), 1, 0,'L', 0); 
$pdf->SetFont('Arial','',10);
$pdf->Cell(113, 6, utf8_decode($personas['telefono']), 1, 1,'L', 0); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100, 6, utf8_decode('Ingreso Mensual'), 1, 0,'L', 0); 
$pdf->SetFont('Arial','',10);
$pdf->Cell(113, 6, utf8_decode($personas['ingreso_mensual']), 1, 1,'L', 0); 




////////////////////////////////////////////////
//
//   enfermedades
//
///////////////////////////////////////////////
if(!empty($enf)){
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(60, 10, utf8_decode('Enfermedades'), 0, 1,'L', 0);

    $pdf->SetFont('Arial','B',10);

    $pdf->Cell(20, 6, utf8_decode('No.'), 1, 0,'L', 0); 
    $pdf->Cell(193, 6, utf8_decode('Resultado'), 1, 1,'L', 0); 

    $pdf->SetFont('Arial','',10);
    $indice = 1;
    foreach ($enf as $i){

        $pdf->Cell(20, 6, utf8_decode($indice), 1, 0,'L', 0); 
        $pdf->Cell(193, 6, utf8_decode($i['enfermedad']), 1, 1,'L', 0);
        $indice++;
    }
}

////////////////////////////////////////////////
//
//   discapacidades
//
///////////////////////////////////////////////
if(!empty($dis)){
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(60, 10, utf8_decode('Discapacidades'), 0, 1,'L', 0);

    $pdf->SetFont('Arial','B',10);

    $pdf->Cell(20, 6, utf8_decode('No.'), 1, 0,'L', 0); 
    $pdf->Cell(193, 6, utf8_decode('Resultado'), 1, 1,'L', 0); 

    $pdf->SetFont('Arial','',10);
    $indice = 1;
    foreach ($dis as $i){

        $pdf->Cell(20, 6, utf8_decode($indice), 1, 0,'L', 0); 
        $pdf->Cell(193, 6, utf8_decode($i['discapacidad']), 1, 1,'L', 0);
        $indice++;
    }
}








$pdf->Output();


?>