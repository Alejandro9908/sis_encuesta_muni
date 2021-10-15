<?php

    require('fpdf/fpdf.php');
    include_once ('controllers/conteoController.php');

    $sector = $_GET['sector'];
    $comunidad = $_GET['comunidad'];

    $controlador = new conteoController();

    $total_registros_persona = $controlador->contarRegistrosPersonas("$sector","$comunidad");
    $total_registros_mujeres = $controlador->contarRegistrosMujeres("$sector","$comunidad");
    $total_registros_hombres = $controlador->contarRegistrosHombres("$sector","$comunidad");
    $total_registros_familia = $controlador->contarRegistrosFamilias("$sector","$comunidad");
    $lista_enfermedades = array();
    $lista_enfermedades = $controlador->listarEnfermedades("$sector","$comunidad");
    $lista_discapacidades = array();
    $lista_discapacidades = $controlador->listarDiscapacidades("$sector","$comunidad");
    $lista_estado_civil = array();
    $lista_estado_civil = $controlador->listarEstadoCivil("$sector","$comunidad");
    $lista_escolaridad = array();
    $lista_escolaridad = $controlador->listarEscolaridad("$sector","$comunidad");
    $lista_ocupacion = array();
    $lista_ocupacion = $controlador->listarOcupacion("$sector","$comunidad");
    $lista_rango_edades = array();
    $lista_rango_edades = $controlador->listarRangosEdades("$sector","$comunidad");

    $lista_recreaciones = array();
    $lista_recreaciones = $controlador->listarRecreaciones("$sector","$comunidad");
    $lista_servicios_medicos = array();
    $lista_servicios_medicos = $controlador->listarServiciosMedicos("$sector","$comunidad");
    $lista_tenencias = array();
    $lista_tenencias = $controlador->listarTenencias("$sector","$comunidad");
    $lista_servicios_basicos = array();
    $lista_servicios_basicos = $controlador->listarServiciosBasicos("$sector","$comunidad");





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
$pdf->Cell(30,10,utf8_decode('CENSO SOCIOECONÓMICO - CONTEO DE DATOS'),0,0,'C');
// Salto de línea
$pdf->Ln(20);


////////////////////////////////////////////////
//
//   DATOS GENERALES
//
///////////////////////////////////////////////


$pdf->SetFont('Arial','B',12);
$pdf->Cell(60, 10, utf8_decode('Datos generales'), 0, 1,'L', 0); 

$pdf->SetFont('Arial','B',10);
$pdf->Cell(100, 6, utf8_decode('Familias'), 1, 0,'L', 0); 
$pdf->SetFont('Arial','',10);
$pdf->Cell(113, 6, utf8_decode($total_registros_familia), 1, 1,'L', 0); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100, 6, utf8_decode('Personas'), 1, 0,'L', 0); 
$pdf->SetFont('Arial','',10);
$pdf->Cell(113, 6, utf8_decode($total_registros_persona), 1, 1,'L', 0); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100, 6, utf8_decode('Hombres'), 1, 0,'L', 0);
$pdf->SetFont('Arial','',10); 
$pdf->Cell(113, 6, utf8_decode($total_registros_hombres), 1, 1,'L', 0); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100, 6, utf8_decode('Mujeres'), 1, 0,'L', 0); 
$pdf->SetFont('Arial','',10);
$pdf->Cell(113, 6, utf8_decode($total_registros_mujeres), 1, 1,'L', 0); 

////////////////////////////////////////////////
//
//   EDADES
//
///////////////////////////////////////////////

$pdf->Ln(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(60, 10, utf8_decode('Edades'), 0, 1,'L', 0);

$pdf->SetFont('Arial','B',10);

$pdf->Cell(100, 6, utf8_decode('Rangos de edades'), 1, 0,'L', 0); 
$pdf->Cell(113, 6, utf8_decode('Resultado'), 1, 1,'L', 0); 

$pdf->SetFont('Arial','',10);

foreach ($lista_rango_edades as $ld){

    $pdf->Cell(100, 6, utf8_decode($ld['grupo_edad']), 1, 0,'L', 0); 
    $pdf->Cell(113, 6, utf8_decode($ld['total']), 1, 1,'L', 0);

}

////////////////////////////////////////////////
//
//   ENFERMEDADES
//
///////////////////////////////////////////////

$pdf->Ln(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(60, 10, utf8_decode('Enfermedades'), 0, 1,'L', 0);

$pdf->SetFont('Arial','B',10);

$pdf->Cell(100, 6, utf8_decode('Nombre'), 1, 0,'L', 0); 
$pdf->Cell(113, 6, utf8_decode('Resultado'), 1, 1,'L', 0); 

$pdf->SetFont('Arial','',10);

foreach ($lista_enfermedades as $i){

    $pdf->Cell(100, 6, utf8_decode(ucfirst(strtolower($i['nombre']))), 1, 0,'L', 0); 
    $pdf->Cell(113, 6, utf8_decode($i['total']), 1, 1,'L', 0);

}

////////////////////////////////////////////////
//
//   DISCAPACIDADES
//
///////////////////////////////////////////////

$pdf->Ln(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(60, 10, utf8_decode('Discapacidades'), 0, 1,'L', 0);

$pdf->SetFont('Arial','B',10);

$pdf->Cell(100, 6, utf8_decode('Nombre'), 1, 0,'L', 0); 
$pdf->Cell(113, 6, utf8_decode('Resultado'), 1, 1,'L', 0); 

$pdf->SetFont('Arial','',10);

foreach ($lista_discapacidades as $i){

    $pdf->Cell(100, 6, utf8_decode(ucfirst(strtolower($i['nombre']))), 1, 0,'L', 0); 
    $pdf->Cell(113, 6, utf8_decode($i['total']), 1, 1,'L', 0);

}

////////////////////////////////////////////////
//
//   ESTADO CIVIL
//
///////////////////////////////////////////////

$pdf->Ln(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(60, 10, utf8_decode('Estado civil'), 0, 1,'L', 0);

$pdf->SetFont('Arial','B',10);

$pdf->Cell(100, 6, utf8_decode('Nombre'), 1, 0,'L', 0); 
$pdf->Cell(113, 6, utf8_decode('Resultado'), 1, 1,'L', 0); 

$pdf->SetFont('Arial','',10);

foreach ($lista_estado_civil as $i){

    $pdf->Cell(100, 6, utf8_decode(ucfirst(strtolower($i['estado_civil']))), 1, 0,'L', 0); 
    $pdf->Cell(113, 6, utf8_decode($i['total']), 1, 1,'L', 0);

}

////////////////////////////////////////////////
//
//   ESCOLARIDAD
//
///////////////////////////////////////////////

$pdf->Ln(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(60, 10, utf8_decode('Escolaridad'), 0, 1,'L', 0);

$pdf->SetFont('Arial','B',10);

$pdf->Cell(100, 6, utf8_decode('Nombre'), 1, 0,'L', 0); 
$pdf->Cell(113, 6, utf8_decode('Resultado'), 1, 1,'L', 0); 

$pdf->SetFont('Arial','',10);

foreach ($lista_escolaridad as $i){

    $pdf->Cell(100, 6, utf8_decode(ucfirst(strtolower($i['escolaridad']))), 1, 0,'L', 0); 
    $pdf->Cell(113, 6, utf8_decode($i['total']), 1, 1,'L', 0);

}

////////////////////////////////////////////////
//
//   OCUPACION
//
///////////////////////////////////////////////

$pdf->Ln(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(60, 10, utf8_decode('Ocupacion'), 0, 1,'L', 0);

$pdf->SetFont('Arial','B',10);

$pdf->Cell(100, 6, utf8_decode('Nombre'), 1, 0,'L', 0); 
$pdf->Cell(113, 6, utf8_decode('Resultado'), 1, 1,'L', 0); 

$pdf->SetFont('Arial','',10);

foreach ($lista_ocupacion as $i){
    $pdf->Cell(100, 6, utf8_decode(ucfirst(strtolower($i['ocupacion']))), 1, 0,'L', 0); 
    $pdf->Cell(113, 6, utf8_decode($i['total']), 1, 1,'L', 0);
}

////////////////////////////////////////////////
//
//   RECREACIONES
//
///////////////////////////////////////////////

$pdf->Ln(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(60, 10, utf8_decode('Recreación y uso del tiempo familiar'), 0, 1,'L', 0);

$pdf->SetFont('Arial','B',10);

$pdf->Cell(100, 6, utf8_decode('Nombre'), 1, 0,'L', 0); 
$pdf->Cell(113, 6, utf8_decode('Resultado'), 1, 1,'L', 0); 

$pdf->SetFont('Arial','',10);

foreach ($lista_recreaciones as $i){

    $pdf->Cell(100, 6, utf8_decode(ucfirst(strtolower($i['nombre']))), 1, 0,'L', 0); 
    $pdf->Cell(113, 6, utf8_decode($i['total']), 1, 1,'L', 0);

}

////////////////////////////////////////////////
//
//   SERVICIO MEDICO
//
///////////////////////////////////////////////

$pdf->Ln(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(60, 10, utf8_decode('Servicios medicos'), 0, 1,'L', 0);

$pdf->SetFont('Arial','B',10);

$pdf->Cell(100, 6, utf8_decode('Nombre'), 1, 0,'L', 0); 
$pdf->Cell(113, 6, utf8_decode('Resultado'), 1, 1,'L', 0); 

$pdf->SetFont('Arial','',10);

foreach ($lista_servicios_medicos as $i){

    $pdf->Cell(100, 6, utf8_decode(ucfirst(strtolower($i['nombre']))), 1, 0,'L', 0); 
    $pdf->Cell(113, 6, utf8_decode($i['total']), 1, 1,'L', 0);

}

////////////////////////////////////////////////
//
//   tenencia
//
///////////////////////////////////////////////

$pdf->Ln(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(60, 10, utf8_decode('Tenencia de la vivienda'), 0, 1,'L', 0);

$pdf->SetFont('Arial','B',10);

$pdf->Cell(100, 6, utf8_decode('Nombre'), 1, 0,'L', 0); 
$pdf->Cell(113, 6, utf8_decode('Resultado'), 1, 1,'L', 0); 

$pdf->SetFont('Arial','',10);

foreach ($lista_tenencias as $i){

    $pdf->Cell(100, 6, utf8_decode(ucfirst(strtolower($i['nombre']))), 1, 0,'L', 0); 
    $pdf->Cell(113, 6, utf8_decode($i['total']), 1, 1,'L', 0);

}

////////////////////////////////////////////////
//
//   SERVICIOS BASICOS
//
///////////////////////////////////////////////

$pdf->Ln(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(60, 10, utf8_decode('Servicios básicos de las viviendas'), 0, 1,'L', 0);

$pdf->SetFont('Arial','B',10);

$pdf->Cell(100, 6, utf8_decode('Nombre'), 1, 0,'L', 0); 
$pdf->Cell(113, 6, utf8_decode('Resultado'), 1, 1,'L', 0); 

$pdf->SetFont('Arial','',10);

foreach ($lista_servicios_basicos as $i){

    $pdf->Cell(100, 6, utf8_decode(ucfirst(strtolower($i['nombre']))), 1, 0,'L', 0); 
    $pdf->Cell(113, 6, utf8_decode($i['total']), 1, 1,'L', 0);

}
















$pdf->Output();


?>