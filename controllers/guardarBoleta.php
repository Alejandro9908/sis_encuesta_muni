<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/models/persona.php');
    include_once ('conexion.php');

    $personas =  array();
    $personas = json_decode($_POST["personas"], true);
    //print_r($personas);

    $domicilio =  array();
    $domicilio = json_decode($_POST["domicilio"], true);
    //print_r($domicilio);

    $egresos =  array();
    $egresos = json_decode($_POST["egresos"], true);
    //print_r($egresos);

    $vivienda =  array();
    $vivienda = json_decode($_POST["vivienda"], true);
    //print_r($vivienda);

    $salud =  array();
    $salud = json_decode($_POST["salud"], true);
    //print_r($salud);

    $alimentacion =  array();
    $alimentacion = json_decode($_POST["alimentacion"], true);
    //print_r($alimentacion);

    $recreacion =  array();
    $recreacion = json_decode($_POST["recreacion"], true);
    //print_r($recreacion);

    $observacion =  array();
    $observacion = json_decode($_POST["observacion"], true);
    //print_r($observacion);


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
        $per->set('parentesco', $p["parentesco"]);
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

    try
    {
            $conexion = new Conexion();
            $sql = "SELECT COUNT(*) AS total_registros FROM tbl_usuario)";
            
            $stmt = $conexion->pdo;
            $stmt->beginTransaction();
            
            //tabla boleta
            $stmt->exec("INSERT INTO tbl_boleta (evaluador,observaciones,fecha_aplicacion,estado,id_usuario) 
                        values ('".$observacion['evaluador']."','".$observacion['observaciones_encuesta']."','".$observacion['fecha_evaluacion']."',1,'".$observacion['id_usuario']."')");
            $id_boleta = $stmt->lastInsertId();

            //tabla familia
            $stmt->exec("INSERT INTO tbl_familia (id_boleta) 
                        values ('".$id_boleta."')");
            $id_familia = $stmt->lastInsertId();
            

            //tabla persona
            foreach ($listaPersonas as $i){
                $stmt->exec("INSERT INTO tbl_persona (id_familia,entrevistado,nombres,primer_apellido,segundo_apellido,sexo,fecha_nacimiento,edad,dpi,estado_civil,escolaridad,ocupacion,telefono,gestacion,semanas_gestacion,ingreso_mensual, parentesco) 
                            values ('".$id_familia."','"
                                        .$i->get('entrevistado')."','"
                                        .$i->get('nombres')."','"
                                        .$i->get('primer_apellido')."','"
                                        .$i->get('segundo_apellido')."','"
                                        .$i->get('sexo')."','"
                                        .$i->get('fecha_nacimiento')."','"
                                        .$i->get('edad')."','"
                                        .$i->get('dpi')."','"
                                        .$i->get('estado_civil')."','"
                                        .$i->get('escolaridad')."','"
                                        .$i->get('ocupacion')."','"
                                        .$i->get('telefono')."','"
                                        .$i->get('gestacion')."','"
                                        .$i->get('semanas_gestacion')."','"
                                        .$i->get('ingreso_mensual')."','"
                                        .$i->get('parentesco')."')");
                $id_persona = $stmt->lastInsertId();
                //print_r($id_persona."-");

                foreach($i->get('enfermedades') as $enfermedad){
                    foreach($enfermedad as $e){
                        $stmt->exec("INSERT INTO tbl_enfermedad_persona (id_persona,id_enfermedad) 
                        values ('".$id_persona."','".$e."')");
                    }
                }
                
                foreach($i->get('discapacidades') as $discapacidad){
                    foreach($discapacidad as $d){
                        $stmt->exec("INSERT INTO tbl_discapacidad_persona (id_persona,id_discapacidad) 
                        values ('".$id_persona."','".$d."')");
                    }
                }
            }

            //tabla egreso
            $stmt->exec("INSERT INTO tbl_egreso (id_familia,alimentacion,combustible,renta,agua,electricidad,telefono_residencial,celular,transporte,educacion,medico,recreacion,cable,ropa_calzado,fondo_ahorro,credito) 
                            values ('".$id_familia."','"
                                        .$egresos['alimentacion']."','"
                                        .$egresos['gas']."','"
                                        .$egresos['renta']."','"
                                        .$egresos['agua']."','"
                                        .$egresos['electricidad']."','"
                                        .$egresos['telefono_residencial']."','"
                                        .$egresos['telefono_celular']."','"
                                        .$egresos['transporte']."','"
                                        .$egresos['educacion']."','"
                                        .$egresos['medicos']."','"
                                        .$egresos['gastos_recreacion']."','"
                                        .$egresos['cable']."','"
                                        .$egresos['ropa_calzado']."','"
                                        .$egresos['fondos_ahorro']."','"
                                        .$egresos['creditos']."')");

            //tabla alimentacion
            $stmt->exec("INSERT INTO tbl_alimentacion (id_familia,carne_res,carne_pollo,carne_cerdo,carne_pescado,leche,cereales,huevo,frutas,verduras,leguminosas) 
                            values ('".$id_familia."','"
                                        .$alimentacion['carne_res']."','"
                                        .$alimentacion['carne_pollo']."','"
                                        .$alimentacion['carne_cerdo']."','"
                                        .$alimentacion['carne_pescado']."','"
                                        .$alimentacion['leche']."','"
                                        .$alimentacion['cereales']."','"
                                        .$alimentacion['huevos']."','"
                                        .$alimentacion['frutas']."','"
                                        .$alimentacion['verduras']."','"
                                        .$alimentacion['leguminosas']."')");
            
            //tabla servicio medico
            $stmt->exec("INSERT INTO tbl_serviciomedico_familia (id_servicio_medico,id_familia,frecuencia_medico) 
                        values ('".$salud['servicio_medico']."','".$id_familia."','".$salud['frecuencia_medico']."')");



            //recreaciones
            foreach($recreacion as $r){
                foreach($r as $i){
                    $stmt->exec("INSERT INTO tbl_recreacion_familia (id_familia,id_recreacion) 
                    values ('".$id_familia."','".$i."')");
                }
            }

            //datos de vivienda y domicilio
            $stmt->exec("INSERT INTO tbl_vivienda (id_familia,id_comunidad,direccion,numero_casa,colindantes,latitud,longitud,telefono,id_tenencia,cantidad_cuartos,sala,comedor,cocina,banio_privado,banio_colectivo,observaciones,id_mp_pared,id_mp_techo,id_mp_piso,id_sanitario,eliminacion_basura) 
                            values ('".$id_familia."','"
                                        .$domicilio['comunidad']."','"
                                        .$domicilio['direccion']."','"
                                        .$domicilio['numero_casa']."','"
                                        .$domicilio['colindantes']."','"
                                        .$domicilio['latitud']."','"
                                        .$domicilio['longitud']."','"
                                        .$domicilio['telefono']."','"
                                        .$vivienda['tenencia']."','"
                                        .$vivienda['numero_dormitorios']."','"
                                        .$vivienda['sala']."','"
                                        .$vivienda['comedor']."','"
                                        .$vivienda['cocina']."','"
                                        .$vivienda['banio_privado']."','"
                                        .$vivienda['banio_colectivo']."','"
                                        .$vivienda['observaciones_vivienda']."','"
                                        .$vivienda['pared']."','"
                                        .$vivienda['techo']."','"
                                        .$vivienda['piso']."','"
                                        .$vivienda['sanitario']."','"
                                        .$vivienda['eliminacion_basura']."')");

            $id_vivienda = $stmt->lastInsertId();
            
            //transportes
            foreach($domicilio['transportes'] as $t){
                
                $stmt->exec("INSERT INTO tbl_transporte_vivienda (id_vivienda,id_transporte) 
                values ('".$id_vivienda."','".$t."')");
                
            }

            foreach($vivienda['mobiliarios'] as $m){
                
                $stmt->exec("INSERT INTO tbl_mobiliario_vivienda (id_vivienda,id_mobiliario) 
                values ('".$id_vivienda."','".$m."')");
                
            }

            foreach($vivienda['servicios'] as $s){
                
                $stmt->exec("INSERT INTO tbl_servicio_vivienda (id_vivienda,id_servicio) 
                values ('".$id_vivienda."','".$s."')");
                
            }

            //si todo sale bien, se hace el commit
            $stmt->commit();

            echo "exito";
    }catch(PDOException $e)
    {
            $stmt->rollBack();
            echo 'Error '. $e;
    }
    

?>