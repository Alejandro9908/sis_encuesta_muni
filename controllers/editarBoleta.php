<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/constantes.php");
include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
include_once ('conexion.php');

class editarBoletaController{

    public function editarDomicilio($id_vivienda, $domicilio)
    {
        try
        {
            $conexion = new Conexion();
            $stmt = $conexion->pdo;
            $stmt->beginTransaction();

            //borramos datos actuales transportes
            $stmt->exec("DELETE FROM tbl_transporte_vivienda WHERE id_vivienda = $id_vivienda;");

            //insertamos nuevos datos actualziados
            foreach($domicilio['transportes'] as $t){
                $stmt->exec("INSERT INTO tbl_transporte_vivienda (id_vivienda,id_transporte) 
                values ('".$id_vivienda."','".$t."')");
            }

            //editamos datos vehiculos
            $stmt->exec("UPDATE tbl_vivienda SET 
                        id_comunidad= '".$domicilio['comunidad']."', 
                        numero_casa= '".$domicilio['numero_casa']."', 
                        direccion ='".$domicilio['direccion']."', 
                        colindantes = '".$domicilio['colindantes']."',
                        latitud = '".$domicilio['latitud']."', 
                        longitud = '".$domicilio['longitud']."', 
                        telefono = '".$domicilio['telefono']."'  
                        WHERE id_vivienda = '".$id_vivienda."';");

            $stmt->commit();

            die("exito");
        }
        catch (Exception $e)
        {
            $stmt->rollBack();
            echo 'Error '. $e;
        }
    }

    public function editarAlimentacion($id_familia, $alimentacion)
    {
        try
        {
            $conexion = new Conexion();
            $stmt = $conexion->pdo;
            $stmt->beginTransaction();

            //editamos datos de alimentacion
            $stmt->exec("UPDATE tbl_alimentacion SET
                        carne_res = '".$alimentacion['carne_res']."',
                        carne_pollo = '".$alimentacion['carne_pollo']."',
                        carne_cerdo = '".$alimentacion['carne_cerdo']."',
                        carne_pescado = '".$alimentacion['carne_pescado']."',
                        leche = '".$alimentacion['leche']."',
                        cereales = '".$alimentacion['cereales']."',
                        huevo = '".$alimentacion['huevos']."',
                        frutas = '".$alimentacion['frutas']."',
                        verduras = '".$alimentacion['verduras']."',
                        leguminosas = '".$alimentacion['leguminosas']."'
                        WHERE id_familia = '".$id_familia."';");

            $stmt->commit();

            die("exito");
        }
        catch (Exception $e)
        {
            $stmt->rollBack();
            echo 'Error '. $e;
        }
    }

    public function editarEgreso($id_familia, $egreso)
    {
        try
        {
            $conexion = new Conexion();
            $stmt = $conexion->pdo;
            $stmt->beginTransaction();

            //editamos datos de egresos
            $stmt->exec("UPDATE tbl_egreso SET
                        alimentacion = '".$egreso['alimentacion']."',
                        combustible = '".$egreso['gas']."',
                        renta = '".$egreso['renta']."',
                        agua = '".$egreso['agua']."',
                        electricidad = '".$egreso['electricidad']."',
                        telefono_residencial = '".$egreso['telefono_residencial']."',
                        celular = '".$egreso['telefono_celular']."',
                        transporte = '".$egreso['transporte']."',
                        educacion = '".$egreso['educacion']."',
                        medico = '".$egreso['medicos']."',
                        recreacion = '".$egreso['gastos_recreacion']."',
                        cable = '".$egreso['cable']."',
                        ropa_calzado = '".$egreso['ropa_calzado']."',
                        fondo_ahorro = '".$egreso['fondos_ahorro']."',
                        credito = '".$egreso['creditos']."' 
                        WHERE id_familia = '".$id_familia."';");

            $stmt->commit();

            die("exito");
        }
        catch (Exception $e)
        {
            $stmt->rollBack();
            echo 'Error '. $e;
        }
    }

    public function editarDatosBoleta($id_boleta, $datosBoleta)
    {
        try
        {
            $conexion = new Conexion();
            $stmt = $conexion->pdo;
            $stmt->beginTransaction();

            //editamos datos de boleta
            $stmt->exec("UPDATE tbl_boleta SET
                        observaciones = '".$datosBoleta['observaciones_encuesta']."',
                        evaluador = '".$datosBoleta['evaluador']."',
                        fecha_aplicacion = '".$datosBoleta['fecha_evaluacion']."',
                        id_usuario = '".$datosBoleta['id_usuario']."'
                        WHERE id_boleta = '".$id_boleta."';");

            $stmt->commit();

            die("exito");
        }
        catch (Exception $e)
        {
            $stmt->rollBack();
            echo 'Error '. $e;
        }
    }

    public function editarSalud($id_familia, $salud)
    {
        try
        {
            $conexion = new Conexion();
            $stmt = $conexion->pdo;
            $stmt->beginTransaction();

            //editamos datos de salud
            $stmt->exec("UPDATE tbl_serviciomedico_familia SET
                        id_servicio_medico = '".$salud['servicio_medico']."',
                        frecuencia_medico = '".$salud['frecuencia_medico']."'
                        WHERE id_familia = '".$id_familia."';");

            $stmt->commit();

            die("exito");
        }
        catch (Exception $e)
        {
            $stmt->rollBack();
            echo 'Error '. $e;
        }
    }

    public function editarRecreaciones($id_familia, $recreaciones)
    {
        try
        {
            $conexion = new Conexion();
            $stmt = $conexion->pdo;
            $stmt->beginTransaction();


            //borramos datos actuales recreaciones
            $stmt->exec("DELETE FROM tbl_recreacion_familia WHERE id_familia = $id_familia;");

            //insertamos nuevos datos actualziados
            foreach($recreaciones as $i){
                foreach($i as $k){
                    $stmt->exec("INSERT INTO tbl_recreacion_familia (id_familia,id_recreacion) 
                    values ('".$id_familia."','".$k."')");
                }
            }

            $stmt->commit();

            die("exito");
        }
        catch (Exception $e)
        {
            $stmt->rollBack();
            echo 'Error '. $e;
        }
    }

    public function editarVivienda($id_vivienda, $vivienda)
    {
        try
        {
            $conexion = new Conexion();
            $stmt = $conexion->pdo;
            $stmt->beginTransaction();


            //borramos datos actuales mobiliario
            $stmt->exec("DELETE FROM tbl_mobiliario_vivienda WHERE id_vivienda = $id_vivienda;");

            //insertamos nuevos datos actualziados en mobiliarios
            foreach($vivienda['mobiliarios'] as $i){
                $stmt->exec("INSERT INTO tbl_mobiliario_vivienda (id_vivienda,id_mobiliario) 
                values ('".$id_vivienda."','".$i."')");
            }

            //borramos datos actuales servicios
            $stmt->exec("DELETE FROM tbl_servicio_vivienda WHERE id_vivienda = $id_vivienda;");

            //insertamos nuevos datos actualziados en servicios
            foreach($vivienda['servicios'] as $i){
                $stmt->exec("INSERT INTO tbl_servicio_vivienda (id_vivienda,id_servicio) 
                values ('".$id_vivienda."','".$i."')");
            }

            //editamos datos vivienda
            $stmt->exec("UPDATE tbl_vivienda SET 
                        id_tenencia= '".$vivienda['tenencia']."', 
                        cantidad_cuartos= '".$vivienda['numero_dormitorios']."', 
                        sala ='".$vivienda['sala']."', 
                        comedor = '".$vivienda['comedor']."',
                        cocina = '".$vivienda['cocina']."', 
                        banio_privado = '".$vivienda['banio_privado']."', 
                        banio_colectivo = '".$vivienda['banio_colectivo']."', 
                        observaciones = '".$vivienda['observaciones_vivienda']."', 
                        id_mp_pared = '".$vivienda['pared']."', 
                        id_mp_techo = '".$vivienda['techo']."', 
                        id_mp_piso = '".$vivienda['piso']."', 
                        id_sanitario = '".$vivienda['sanitario']."',  
                        eliminacion_basura = '".$vivienda['eliminacion_basura']."'  
                        WHERE id_vivienda = '".$id_vivienda."';");

            $stmt->commit();

            die("exito");
        }
        catch (Exception $e)
        {
            $stmt->rollBack();
            echo 'Error '. $e;
        }
    }

    public function editarPersona($id_persona, $persona)
    {
        try
        {
            $conexion = new Conexion();
            $stmt = $conexion->pdo;
            $stmt->beginTransaction();


            //borramos datos actuales enfermedades
            $stmt->exec("DELETE FROM tbl_enfermedad_persona WHERE id_persona = $id_persona;");

            //insertamos nuevos datos actualziados en enfermedades
            foreach($persona['enfermedades'] as $i){
                $stmt->exec("INSERT INTO tbl_enfermedad_persona (id_persona,id_enfermedad) 
                values ('".$id_persona."','".$i."')");
            }

            //borramos datos actuales discapacidades
            $stmt->exec("DELETE FROM tbl_discapacidad_persona WHERE id_persona = $id_persona;");

            //insertamos nuevos datos actualziados en enfermedades
            foreach($persona['discapacidades'] as $i){
                $stmt->exec("INSERT INTO tbl_discapacidad_persona (id_persona,id_discapacidad) 
                values ('".$id_persona."','".$i."')");
            }

            //print_r($persona);

            //editamos datos de persona
            $stmt->exec("UPDATE tbl_persona SET 
                        entrevistado= '".$persona['entrevistado']."', 
                        nombres= '".$persona['nombres']."', 
                        primer_apellido ='".$persona['primer_apellido']."', 
                        segundo_apellido = '".$persona['segundo_apellido']."',
                        sexo = '".$persona['sexo']."', 
                        fecha_nacimiento = '".$persona['fecha_nacimiento']."', 
                        edad = '".$persona['edad']."', 
                        dpi = '".$persona['dpi']."', 
                        estado_civil = '".$persona['estado_civil']."', 
                        escolaridad = '".$persona['escolaridad']."', 
                        ocupacion = '".$persona['ocupacion']."', 
                        telefono = '".$persona['telefono']."',  
                        gestacion = '".$persona['gestacion']."',  
                        semanas_gestacion = '".$persona['semanas_gestacion']."',  
                        ingreso_mensual = '".$persona['ingreso_mensual']."'  
                        WHERE id_persona = '".$id_persona."';");

            $stmt->commit();

            die("exito");
        }
        catch (Exception $e)
        {
            $stmt->rollBack();
            echo 'Error '. $e;
        }
    }

}