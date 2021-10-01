<?php
require('fpdf/fpdf.php');
include_once ('controllers/reporteFamiliaController.php');

$id_familia = $_GET['id_familia'];

$controlador = new reporteFamiliaController();

$personas = array();
$personas = $controlador->buscarPersonas($id_familia);

$domicilio = array();
$domicilio = $controlador->buscarDomicilio($id_familia);
$domicilio['transportes'] = $controlador->buscarTransportes($domicilio['id_vivienda']);

$egreso = array();
$egreso = $controlador->buscarEgreso($id_familia);
$ingreso = array();
$ingreso = $controlador->buscaringreso($id_familia);

$vivienda = array();
$vivienda = $controlador->buscarVivienda($domicilio['id_vivienda']);
$vivienda['mobiliarios'] = $controlador->buscarMobiliarios($domicilio['id_vivienda']);
$vivienda['servicios'] = $controlador->buscarServiciosVivienda($domicilio['id_vivienda']);

$servicio_medico = array();
$servicio_medico = $controlador->buscarserviciomedico($id_familia);

$gestacion = array();
$gestacion = $controlador->buscargestacion($id_familia);
    
$enfermedades = array();
$enfermedades = $controlador->buscarenfermedades($id_familia);
$discapacidades = array();
$discapacidades = $controlador->buscarDiscapacidades($id_familia);

$alimentacion = array();
$alimentacion = $controlador->buscarAlimentacion($id_familia);

$recreaciones = array();
$recreaciones = $controlador->buscarRecreaciones($id_familia);

$datos_boleta = array();
$datos_boleta = $controlador->buscardatosboleta($id_familia);

////////////////////////////////////////////////
//
//   CONFIGURACION DE LA PAGINA
//
///////////////////////////////////////////////

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
$pdf->Cell(30,10,'ESTUDIO SOCIOECONOMICO',0,0,'C');
// Salto de línea
$pdf->Ln(20);

////////////////////////////////////////////////
//
//   ESTRUCTURA FAMILIAR
//
///////////////////////////////////////////////


$pdf->SetFont('Arial','B',12);
$pdf->Cell(60, 10, utf8_decode('1. Estructura Familiar'), 0, 1,'L', 0); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(60, 10, utf8_decode('Datos Generales del padre o madre'), 0, 1,'L', 0); 
$pdf->SetFont('Arial','B',8);

$pdf->Cell(70, 6, utf8_decode('Nombre'), 1, 0,'L', 0); 
$pdf->Cell(25, 6, utf8_decode('DPI'), 1, 0,'L', 0); 
$pdf->Cell(9, 6, utf8_decode('Sexo'), 1, 0,'C', 0);
$pdf->Cell(27, 6, utf8_decode('Fecha nacimiento'), 1, 0,'L', 0);
$pdf->Cell(9, 6, utf8_decode('Edad'), 1, 0,'C', 0);
$pdf->Cell(18, 6, utf8_decode('Estado Civil'), 1, 0,'L', 0);
$pdf->Cell(18, 6, utf8_decode('Escolaridad'), 1, 0,'L', 0); 
$pdf->Cell(15, 6, utf8_decode('Teléfono'), 1, 0,'L', 0); 
$pdf->Cell(22, 6, utf8_decode('Ocupacion'), 1, 1,'L', 0); 

$pdf->SetFont('Arial','',8);
foreach ($personas as $p){
    if($p['entrevistado'] == 1){
        $pdf->Cell(70, 6, utf8_decode($p['nombre_completo']), 1, 0,'L', 0); 
        $pdf->Cell(25, 6, utf8_decode($p['dpi']), 1, 0,'L', 0); 
        $pdf->Cell(9, 6, utf8_decode($p['sexo']), 1, 0,'C', 0);
        $pdf->Cell(27, 6, utf8_decode($p['fecha_nacimiento']), 1, 0,'L', 0);
        $pdf->Cell(9, 6, utf8_decode($p['edad']), 1, 0,'C', 0);
        $pdf->Cell(18, 6, utf8_decode($p['estado_civil']), 1, 0,'L', 0);
        $pdf->Cell(18, 6, utf8_decode($p['escolaridad']), 1, 0,'L', 0); 
        $pdf->Cell(15, 6, utf8_decode($p['telefono']), 1, 0,'L', 0); 
        $pdf->Cell(22, 6, utf8_decode($p['ocupacion']), 1, 1,'L', 0); 
    }
}//termina ciclo for

$pdf->SetFont('Arial','B',10);

$pdf->Cell(60, 10, utf8_decode('Personas que habitan en el domicilio'), 0, 1,'L', 0); 

$pdf->SetFont('Arial','B',8);

$pdf->Cell(70, 6, utf8_decode('Nombre'), 1, 0,'L', 0); 
$pdf->Cell(25, 6, utf8_decode('DPI'), 1, 0,'L', 0); 
$pdf->Cell(9, 6, utf8_decode('Sexo'), 1, 0,'C', 0);
$pdf->Cell(27, 6, utf8_decode('Parentesco'), 1, 0,'L', 0);
$pdf->Cell(9, 6, utf8_decode('Edad'), 1, 0,'C', 0);
$pdf->Cell(18, 6, utf8_decode('Estado Civil'), 1, 0,'L', 0);
$pdf->Cell(18, 6, utf8_decode('Escolardiad'), 1, 0,'L', 0); 
$pdf->Cell(15, 6, utf8_decode('Teléfono'), 1, 0,'L', 0); 
$pdf->Cell(22, 6, utf8_decode('Ocupacion'), 1, 1,'L', 0); 

$pdf->SetFont('Arial','',8);

foreach ($personas as $p){
    if($p['entrevistado'] == 0){
        $pdf->Cell(70, 6, utf8_decode($p['nombre_completo']), 1, 0,'L', 0); 
        $pdf->Cell(25, 6, utf8_decode($p['dpi']), 1, 0,'L', 0); 
        $pdf->Cell(9, 6, utf8_decode($p['sexo']), 1, 0,'C', 0);
        $pdf->Cell(27, 6, utf8_decode($p['parentesco']), 1, 0,'L', 0);
        $pdf->Cell(9, 6, utf8_decode($p['edad']), 1, 0,'C', 0);
        $pdf->Cell(18, 6, utf8_decode($p['estado_civil']), 1, 0,'L', 0);
        $pdf->Cell(18, 6, utf8_decode($p['escolaridad']), 1, 0,'L', 0); 
        $pdf->Cell(15, 6, utf8_decode($p['telefono']), 1, 0,'L', 0); 
        $pdf->Cell(22, 6, utf8_decode($p['ocupacion']), 1, 1,'L', 0); 
    }
}//termina ciclo for

$pdf->Ln(10);

////////////////////////////////////////////////
//
//   IDENTIFICACIÓN DOMICILIARIA
//
///////////////////////////////////////////////

$pdf->SetFont('Arial','B',12);
$pdf->Cell(60, 10, utf8_decode('2. Datos de identificación domiciliaria'), '', 1,'L', 0); 
$pdf->Ln(5);

$pdf->SetFont('Arial','',9);


$pdf->Cell(20, 4, utf8_decode('No. de casa: '), 0, 0,'L', 0);
$pdf->Cell(30, 4, utf8_decode($domicilio['numero_casa']), 'B', 0,'L', 0);  
$pdf->Cell(18, 4, utf8_decode('Dirección: '), 0, 0,'L', 0);
$pdf->Cell(145, 4, utf8_decode($domicilio['direccion']), 'B', 1,'L', 0);
$pdf->Ln(5); 
$pdf->Cell(20, 4, utf8_decode('Comunidad: '), 0, 0,'L', 0);
$pdf->Cell(30, 4, utf8_decode($domicilio['comunidad']), 'B', 0,'L', 0); 
$pdf->Cell(13, 4, utf8_decode('Sector: '), 0, 0,'L', 0);
$pdf->Cell(10, 4, utf8_decode($domicilio['id_sector']), 'B', 0,'L', 0);  
$pdf->Cell(20, 4, utf8_decode('Colindantes: '), 0, 0,'L', 0);
$pdf->Cell(119, 4, utf8_decode($domicilio['colindantes']), 'B', 1,'L', 0); 
$pdf->Ln(5); 
$pdf->Cell(15, 4, utf8_decode('Latitud: '), 0, 0,'L', 0);
$pdf->Cell(50, 4, utf8_decode($domicilio['latitud']), 'B', 0,'L', 0);  
$pdf->Cell(17, 4, utf8_decode('Longitud: '), 0, 0,'L', 0);
$pdf->Cell(50, 4, utf8_decode($domicilio['longitud']), 'B', 0,'L', 0); 
$pdf->Cell(30, 4, utf8_decode('Telefono domiciliar: '), 0, 0,'L', 0);
$pdf->Cell(51, 4, utf8_decode($domicilio['telefono']), 'B', 1,'L', 0); 


if(!empty($domicilio['transportes'])){
    $pdf->Ln(5); 
    $pdf->Cell(15, 4, utf8_decode('Medios de transporte para llegar al domicilio: '), 0, 0,'L', 0);
    $pdf->Ln(10); 
    $indice = 1;

    $pdf->Cell(13, 6, utf8_decode('No.'), 1, 0,'C', 0); 
    $pdf->Cell(200, 6, utf8_decode('Transporte'), 1, 1,'L', 0); 

    foreach ($domicilio['transportes'] as $i){
            $pdf->Cell(13, 6, utf8_decode($indice), 1, 0,'C', 0); 
            $pdf->Cell(200, 6, utf8_decode($i['transporte']), 1, 1,'L', 0); 
            $indice++;
    }
}

$pdf->Ln(10);


////////////////////////////////////////////////
//
//   INGRESOS Y EGRESOS
//
///////////////////////////////////////////////


$pdf->SetFont('Arial','B',12);
$pdf->Cell(60, 10, utf8_decode('3. Ingresos y egresos de la familia'), '', 1,'L', 0); 
$pdf->Ln(5);

$pdf->SetFont('Arial','B',10);

$pdf->Cell(60, 10, utf8_decode('Ingresos Mensuales'), 0, 1,'L', 0); 

$pdf->SetFont('Arial','B',8);

$pdf->Cell(13, 6, utf8_decode('No.'), 1, 0,'C', 0); 
$pdf->Cell(150, 6, utf8_decode('Nombre'), 1, 0,'L', 0); 
$pdf->Cell(50, 6, utf8_decode('Ingreso Mensual'), 1, 1,'L', 0); 

$pdf->SetFont('Arial','',8);

$indice = 1;
$total_ingresos = 0;

foreach ($ingreso as $i){
    if((float)$i['ingreso_mensual'] >= 0.01){
        $total_ingresos = $total_ingresos + (float)$i['ingreso_mensual']; 
        $pdf->Cell(13, 6, utf8_decode($indice), 1, 0,'C', 0);
        $pdf->Cell(150, 6, utf8_decode($i['nombre_completo']), 1, 0,'L', 0); 
        $pdf->Cell(50, 6, utf8_decode("Q. ".$i['ingreso_mensual']), 1, 1,'L', 0); 
        $indice++;
    }
}//termina ciclo for

$pdf->Cell(163, 6, utf8_decode('Total:'), 1, 0,'C', 0); 
$pdf->Cell(50, 6, utf8_decode("Q. ".$total_ingresos), 1, 1,'L', 0);

$pdf->SetFont('Arial','B',10);

$pdf->Cell(60, 10, utf8_decode('Egresos Mensuales'), 0, 1,'L', 0); 

$pdf->SetFont('Arial','B',8);

$pdf->Cell(13, 6, utf8_decode('No.'), 1, 0,'C', 0); 
$pdf->Cell(150, 6, utf8_decode('Tipo de gasto'), 1, 0,'L', 0); 
$pdf->Cell(50, 6, utf8_decode('Valor'), 1, 1,'L', 0); 

$pdf->SetFont('Arial','',8);

$indice = 1;

reset($egreso);
$total_egresos = 0;

while (list($clave, $valor) = each($egreso)){
    if((float)$valor >= 0.01){
        $total_egresos = $total_egresos + (float)$valor; 

        $pdf->Cell(13, 6, utf8_decode($indice), 1, 0,'C', 0);
        $pdf->Cell(150, 6, utf8_decode($clave), 1, 0,'L', 0); 
        $pdf->Cell(50, 6, utf8_decode("Q. ".$valor), 1, 1,'L', 0); 
        $indice++;

    }
    
}//termina ciclo for

$pdf->Cell(163, 6, utf8_decode('Total:'), 1, 0,'C', 0); 
$pdf->Cell(50, 6, utf8_decode("Q. ".$total_egresos), 1, 1,'L', 0);

$resultado_economico = $total_ingresos - $total_egresos;

$pdf->SetFont('Arial','B',10);
$pdf->Ln(5);

if($resultado_economico >= 0.01){
    $pdf->Cell(163, 10, utf8_decode('Superávit'), 1, 0,'L', 0); 
}else{
    $pdf->Cell(163, 10, utf8_decode('Déficit'), 1, 0,'L', 0);
}

$pdf->SetFont('Arial','',8);
$pdf->Cell(50, 10, utf8_decode("Q. ".$resultado_economico), 1, 1,'L', 0); 

$pdf->Ln(10);

////////////////////////////////////////////////
//
//   VIVIENDA
//
///////////////////////////////////////////////

$pdf->SetFont('Arial','B',12);
$pdf->Cell(60, 10, utf8_decode('4. Vivienda'), '', 1,'L', 0); 
$pdf->Ln(5);

$pdf->SetFont('Arial','B',10);

$pdf->Cell(60, 10, utf8_decode('Tenencia de la vivienda'), 0, 1,'L', 0); 

$pdf->SetFont('Arial','',9);

$sala = "";
$comedor = "";
$cocina = "";
$banio_privado = "";
$banio_colectivo = "";

if($vivienda['sala'] == 1){ $sala = "Si";}else{ $sala = "No";}
if($vivienda['comedor'] == 1){ $comedor = "Si";}else{ $comedor = "No";}
if($vivienda['cocina'] == 1){ $cocina = "Si";}else{ $cocina = "No";}
if($vivienda['banio_privado'] == 1){ $banio_privado = "Si";}else{ $banio_privado = "No";}
if($vivienda['banio_colectivo'] == 1){ $banio_colectivo = "Si";}else{ $banio_colectivo = "No";}



$pdf->Cell(20, 4, utf8_decode('Tenencia: '), 0, 0,'L', 0);
$pdf->Cell(193, 4, utf8_decode($vivienda['tenencia']), 'B', 1,'L', 0);  
$pdf->Ln(5); 
$pdf->Cell(38, 4, utf8_decode('Cantidad de dormitorios:'), 0, 0,'L', 0);
$pdf->Cell(10, 4, utf8_decode($vivienda['cantidad_cuartos']), 'B', 0,'L', 0);
$pdf->Cell(26, 4, utf8_decode('Cuanta con Sala:'), 0, 0,'L', 0);
$pdf->Cell(10, 4, utf8_decode($sala), 'B', 0,'L', 0);  
$pdf->Cell(16, 4, utf8_decode('Comedor: '), 0, 0,'L', 0);
$pdf->Cell(10, 4, utf8_decode($comedor), 'B', 0,'L', 0); 
$pdf->Cell(14, 4, utf8_decode('Cocina: '), 0, 0,'L', 0);
$pdf->Cell(10, 4, utf8_decode($cocina), 'B', 0,'L', 0); 
$pdf->Cell(22, 4, utf8_decode('Baño Privado:'), 0, 0,'L', 0);
$pdf->Cell(10, 4, utf8_decode($banio_privado), 'B', 0,'L', 0);
$pdf->Cell(25, 4, utf8_decode('Baño Colectivo:'), 0, 0,'L', 0);
$pdf->Cell(10, 4, utf8_decode($banio_colectivo), 'B', 1,'L', 0);
$pdf->Ln(5); 
$pdf->Cell(25, 4, utf8_decode('Observaciones: '), 0, 0,'L', 0);
$pdf->Cell(188, 4, utf8_decode($vivienda['observaciones']), 'B', 1,'L', 0);  
$pdf->Ln(5);

$pdf->SetFont('Arial','B',10);

$pdf->Cell(60, 10, utf8_decode('Materiales predominantes en la construcción de la vivienda'), 0, 1,'L', 0); 

$pdf->SetFont('Arial','',9);


$pdf->Cell(15, 4, utf8_decode('Pared: '), 0, 0,'L', 0);
$pdf->Cell(50, 4, utf8_decode($vivienda['pared']), 'B', 0,'L', 0);  
$pdf->Cell(15, 4, utf8_decode('Techo: '), 0, 0,'L', 0);
$pdf->Cell(50, 4, utf8_decode($vivienda['techo']), 'B', 0,'L', 0); 
$pdf->Cell(15, 4, utf8_decode('Piso: '), 0, 0,'L', 0);
$pdf->Cell(51, 4, utf8_decode($vivienda['piso']), 'B', 1,'L', 0); 
$pdf->Ln(5); 

if(!empty($vivienda['mobiliarios'])){
    $pdf->Cell(15, 4, utf8_decode('Mobiliario y equipo: '), 0, 0,'L', 0);
    $pdf->Ln(10); 
    $indice = 1;

    $pdf->Cell(13, 6, utf8_decode('No.'), 1, 0,'C', 0); 
    $pdf->Cell(200, 6, utf8_decode('Mobiliario o equipo'), 1, 1,'L', 0); 

    foreach ($vivienda['mobiliarios'] as $i){
            $pdf->Cell(13, 6, utf8_decode($indice), 1, 0,'C', 0); 
            $pdf->Cell(200, 6, utf8_decode($i['mobiliario']), 1, 1,'L', 0); 
            $indice++;
    }
    $pdf->Ln(5);
}

if(!empty($vivienda['servicios'])){

    $pdf->SetFont('Arial','B',10);

    $pdf->Cell(60, 10, utf8_decode('Servicios básicos del hogar'), 0, 1,'L', 0); 

    $pdf->SetFont('Arial','',9);

    $indice = 1;

    $pdf->Cell(13, 6, utf8_decode('No.'), 1, 0,'C', 0); 
    $pdf->Cell(200, 6, utf8_decode('Servicio básico'), 1, 1,'L', 0); 

    foreach ($vivienda['servicios'] as $i){
            $pdf->Cell(13, 6, utf8_decode($indice), 1, 0,'C', 0); 
            $pdf->Cell(200, 6, utf8_decode($i['servicio']), 1, 1,'L', 0); 
            $indice++;
    }
}

$pdf->Ln(10);



////////////////////////////////////////////////
//
//   SALUD
//
///////////////////////////////////////////////

$pdf->SetFont('Arial','B',12);
$pdf->Cell(60, 10, utf8_decode('5. Salud'), '', 1,'L', 0); 
$pdf->SetFont('Arial','',9);
$pdf->Ln(5);

$pdf->Cell(63, 4, utf8_decode('Servicio médico con el que cuenta familia: '), 0, 0,'L', 0);
$pdf->Cell(150, 4, utf8_decode($servicio_medico['servicio_medico']),'B', 1,'L', 0); 
$pdf->Ln(5);
$pdf->Cell(63, 4, utf8_decode('Frecuencia con la que asisten al medico: '), 0, 0,'L', 0);
$pdf->Cell(150, 4, utf8_decode($servicio_medico['frecuencia_medico']),'B', 1,'L', 0);  
$pdf->Ln(5); 


if(!empty($gestacion)){
    $pdf->SetFont('Arial','B',10);

    $pdf->Cell(60, 10, utf8_decode('Mujeres en estado de gestación'), 0, 1,'L', 0); 

    $pdf->SetFont('Arial','B',8);


    $pdf->Cell(13, 6, utf8_decode('No.'), 1, 0,'L', 0); 
    $pdf->Cell(150, 6, utf8_decode('Nombre'), 1, 0,'L', 0); 
    $pdf->Cell(50, 6, utf8_decode('Semanas en gestación'), 1, 1,'L', 0); 

    $pdf->SetFont('Arial','',8);
    $indice = 1;
    foreach ($gestacion as $i){

            $pdf->Cell(13, 6, utf8_decode($indice), 1, 0,'L', 0); 
            $pdf->Cell(150, 6, utf8_decode($i['nombre_completo']), 1, 0,'L', 0); 
            $pdf->Cell(50, 6, utf8_decode($i['semanas_gestacion']), 1, 1,'L', 0);
            $indice++; 

    }//termina ciclo for
}

if(!empty($enfermedades)){
    $pdf->SetFont('Arial','B',10);

    $pdf->Cell(60, 10, utf8_decode('Miembro de la familia con enfermedades'), 0, 1,'L', 0); 

    $indice = 1;
    foreach ($enfermedades as $i){
            $pdf->SetFont('Arial','B',8);
            $pdf->Cell(13, 6, utf8_decode($indice), 1, 0,'L', 0); 
            $pdf->Cell(200, 6, utf8_decode($i['nombre_completo']), 1, 1,'L', 0);
            $pdf->SetFont('Arial','',8); 
            foreach ($i['enfermedades'] as $k){
                $pdf->Cell(13);
                $pdf->Cell(200, 6, utf8_decode($k), 1, 1,'L', 0);
            }
            $indice++; 

    }//termina ciclo for
}

if(!empty($discapacidades)){
    $pdf->SetFont('Arial','B',10);

    $pdf->Cell(60, 10, utf8_decode('Miembro de la familia con discapacidades'), 0, 1,'L', 0); 

    $indice = 1;
    foreach ($discapacidades as $i){
            $pdf->SetFont('Arial','B',8);
            $pdf->Cell(13, 6, utf8_decode($indice), 1, 0,'L', 0); 
            $pdf->Cell(200, 6, utf8_decode($i['nombre_completo']), 1, 1,'L', 0);
            $pdf->SetFont('Arial','',8); 
            foreach ($i['discapacidades'] as $k){
                $pdf->Cell(13);
                $pdf->Cell(200, 6, utf8_decode($k), 1, 1,'L', 0);
            }
            $indice++; 

    }//termina ciclo for
}

////////////////////////////////////////////////
//
//   SALUD
//
///////////////////////////////////////////////

$pdf->Ln(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(60, 10, utf8_decode('6. Alimentacion'), '', 1,'L', 0); 
$pdf->SetFont('Arial','',9);
$pdf->Ln(5);

$pdf->SetFont('Arial','B',8);

$pdf->Cell(13, 6, utf8_decode('No.'), 1, 0,'C', 0); 
$pdf->Cell(150, 6, utf8_decode('Tipo de alimento'), 1, 0,'L', 0); 
$pdf->Cell(50, 6, utf8_decode('Frecuencia'), 1, 1,'L', 0); 

$pdf->SetFont('Arial','',8);

$indice = 1;

reset($alimentacion);


while (list($clave, $valor) = each($alimentacion)){

        switch($valor){
            case 0: $valor = "Nunca"; break;
            case 1: $valor = "Una vez al mes"; break;
            case 2: $valor = "Una vez a la semana"; break;
            case 3: $valor = "Cada tres días"; break;
            case 4: $valor = "Diario"; break;
        }

        $pdf->Cell(13, 6, utf8_decode($indice), 1, 0,'C', 0);
        $pdf->Cell(150, 6, utf8_decode($clave), 1, 0,'L', 0); 
        $pdf->Cell(50, 6, utf8_decode($valor), 1, 1,'L', 0); 
        $indice++;

}//termina ciclo for

if(!empty($recreaciones)){
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(60, 10, utf8_decode('7. Recreaciones y uso del tiempo familiar'), '', 1,'L', 0); 
    $pdf->SetFont('Arial','',9);
    $pdf->Ln(5);

    $pdf->SetFont('Arial','B',8);


    $pdf->Cell(13, 6, utf8_decode('No.'), 1, 0,'C', 0); 
    $pdf->Cell(200, 6, utf8_decode('Recreación'), 1, 1,'L', 0); 

    $pdf->SetFont('Arial','',8);

    $indice = 1;

    foreach ($recreaciones as $i){
            $pdf->Cell(13, 6, utf8_decode($indice), 1, 0,'C', 0); 
            $pdf->Cell(200, 6, utf8_decode($i['recreacion']), 1, 1,'L', 0); 
            $indice++;
    }
}
$pdf->Ln(10);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(60, 10, utf8_decode('8. Datos de la boleta'), '', 1,'L', 0); 
$pdf->SetFont('Arial','',9);
$pdf->Ln(5);
$pdf->Cell(25, 4, utf8_decode('Observaciones: '), 0, 0,'L', 0);
$pdf->Cell(188, 4, utf8_decode($datos_boleta['observaciones']), 'B', 1,'L', 0);  








$pdf->Output();
?>

