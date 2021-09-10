<?php
    include('boletaController.php');

    $personas =  array();
    $personas = json_decode($_POST["personas"], true);
    print_r($personas);

    $domicilio =  array();
    $domicilio = json_decode($_POST["domicilio"], true);
    print_r($domicilio);

    $egresos =  array();
    $egresos = json_decode($_POST["egresos"], true);
    print_r($egresos);

    $vivienda =  array();
    $vivienda = json_decode($_POST["vivienda"], true);
    print_r($vivienda);

    $salud =  array();
    $salud = json_decode($_POST["salud"], true);
    print_r($salud);

    $alimentacion =  array();
    $alimentacion = json_decode($_POST["alimentacion"], true);
    print_r($alimentacion);

    $recreacion =  array();
    $recreacion = json_decode($_POST["recreacion"], true);
    print_r($recreacion);

    $observacion =  array();
    $observacion = json_decode($_POST["observacion"], true);
    print_r($observacion);


   //con esto podría mostrar todos los datos del JSON recibido
    $listaPersonas = array();

    foreach ($personas as $p){
        $per = new Persona();
        $enfermedades = array();
        $discapacidades = array();

        $per->set('entrevistado', $p["entrevistado"]); 
        $per->set('nombres', $p["nombres"]); 
        $per->set('primer_apellido', $p["primer_apellido"]); 
        $per->set('segundo_apellido', $p["segundo_apellido"]); 
        $per->set('sexo', $p["sexo"]); 
        $per->set('fecha_nacimiento', $p["fecha_nacimiento"]); 
        $per->set('edad', $p["edad"]); 
        $per->set('dpi', $p["dpi"]); 
        $per->set('estado_civil', $p["estado_civil"]); 
        $per->set('escolaridad', $p["escolaridad"]); 
        $per->set('ocupacion', $p["ocupacion"]); 
        $per->set('telefono', $p["telefono"]); 
        $per->set('gestacion', $p["gestacion"]); 
        $per->set('semanas_gestacion', $p["semanas_gestacion"]); 
        $per->set('ingreso_mensual', $p["ingreso_mensual"]); 
        
        array_push($enfermedades,$p["enfermedades"]); 
        array_push($discapacidades,$p["discapacidades"]); 
        $per->set('enfermedades', $enfermedades);
        $per->set('discapacidades', $discapacidades);
        $listaPersonas[] = $per;          
    }
    /*print_r("Lista Personas:"."\n");

    foreach ($listaPersonas as $i){
        print_r("ENTREVISTADO: ".$i->get('entrevistado')."\n");
        print_r("NOMBRES: ".$i->get('nombres')."\n");
        print_r("PRIMERR APELLIDO: ".$i->get('primer_apellido')."\n");
        print_r("SEGUNDO APELLIDO: ".$i->get('segundo_apellido')."\n");
        print_r("SEXO: ".$i->get('sexo')."\n");
        print_r("FECHA NACIMEINTO: ".$i->get('fecha_nacimiento')."\n");
        print_r("EDAD: ".$i->get('edad')."\n");
        print_r("DPI: ".$i->get('dpi')."\n");
        print_r("ESTADO CIVIL: ".$i->get('estado_civil')."\n");
        print_r("ESCOLARIDAD: ".$i->get('escolaridad')."\n");
        print_r("OCUPACION: ".$i->get('ocupacion')."\n");
        print_r("TELEFONO: ".$i->get('telefono')."\n");
        print_r("GESTACION: ".$i->get('gestacion')."\n");
        print_r("SEMANAS: ".$i->get('semanas_gestacion')."\n");
        print_r("INGRESO MENSUAL: ".$i->get('ingreso_mensual')."\n");
        print_r($i->get('enfermedades'));
        print_r($i->get('discapacidades'));
        foreach($i->get('enfermedades') as $j){print_r($j[0]);}
        foreach($i->get('discapacidades') as $j){print_r($j[0]);}
    }*/
    

?>