<?php
    include('boletaController.php');

    $personas =  array();
    $personas = json_decode($_POST["personas"], true);
    
    //print_r($personas);

   //con esto podría mostrar todos los datos del JSON recibido
    $listaPersonas = array();

    foreach ($personas as $p){
        $per = new Persona();
        $enfermedades = array();
        $discapacidades = array();

        $per->set('entrevistado', $p["txt_entrevistado"]); 
        $per->set('nombres', $p["txt_nombres"]); 
        $per->set('primer_apellido', $p["txt_primer_apellido"]); 
        $per->set('segundo_apellido', $p["txt_segundo_apellido"]); 
        $per->set('sexo', $p["txt_sexo"]); 
        $per->set('fecha_nacimiento', $p["txt_fecha_nacimiento"]); 
        $per->set('edad', $p["txt_edad"]); 
        $per->set('dpi', $p["txt_dpi"]); 
        $per->set('estado_civil', $p["txt_estado_civil"]); 
        $per->set('escolaridad', $p["txt_escolaridad"]); 
        $per->set('ocupacion', $p["txt_ocupacion"]); 
        $per->set('telefono', $p["txt_telefono"]); 
        $per->set('gestacion', $p["txt_gestacion"]); 
        $per->set('semanas_gestacion', $p["txt_semanas_gestacion"]); 
        $per->set('ingreso_mensual', $p["txt_ingreso_mensual"]); 
        
        array_push($enfermedades,$p["txt_enfermedades"]); 
        array_push($discapacidades,$p["txt_discapacidades"]); 
        $per->set('enfermedades', $enfermedades);
        $per->set('discapacidades', $discapacidades);
        $listaPersonas[] = $per;          
    }
    print_r("Lista Personas:"."\n");

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
    }
    

    //print_r($personas[0][0]["name"]);
    //print_r($personas[0]->{"txt_nombre"});
    /*if($_POST['registro'] == 'guardar'){
        //$controlador = new servicioController();
 

       

        
    }*/


?>