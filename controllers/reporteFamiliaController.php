<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/constantes.php");
include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
include_once ('conexion.php');

class reporteFamiliaController{
   
    public function contarRegistros($buscar)
    {

        try
        {
            $conexion = new Conexion();
            $sql = "SELECT COUNT(*) AS total_registros
                    FROM tbl_familia as f inner join 
                    tbl_persona as p on p.id_familia = f.id_familia inner join 
                    tbl_boleta as b on f.id_boleta = b.id_boleta inner join 
                    tbl_vivienda as v on f.id_familia = v.id_familia inner join
                    tbl_tenencia as t on v.id_tenencia = t.id_tenencia inner join
                    tbl_comunidad as c on v.id_comunidad = c.id_comunidad inner join
                    tbl_sector as s on s.id_sector = c.id_sector where
                    ((SELECT concat_ws('',pe.nombres,' ',pe.primer_apellido,' ',pe.segundo_apellido) as nombre_completo FROM tbl_persona as pe where pe.id_familia = f.id_familia AND pe.entrevistado = 1 ) LIKE '%$buscar%' OR
                    (SELECT pe.dpi FROM tbl_persona as pe where pe.id_familia = f.id_familia AND pe.entrevistado = 1 ) LIKE '%$buscar%' OR
                    c.nombre LIKE '%$buscar%' OR s.nombre LIKE '%$buscar%')";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            $registro = $stmt->fetch(PDO::FETCH_OBJ);

            return $registro->total_registros;
        }catch(Exception $e)
        {
            echo 'Error '. $e;
        }
        
    }
    
    
    public function listar($buscar, $desde, $hasta)
    {
        try
        {
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT b.id_boleta, f.id_familia, v.numero_casa, v.direccion, c.nombre as comunidad, 
                    s.nombre as sector, v.telefono as telefono_domiciliar, t.nombre as tenencia, 
                    (SELECT pe.dpi
                    FROM tbl_persona as pe where pe.id_familia = f.id_familia AND pe.entrevistado = 1 ) as dpi_entrevistado,
                    (SELECT concat_ws('',pe.nombres,' ',pe.primer_apellido,' ',pe.segundo_apellido) as entrevistado
                    FROM tbl_persona as pe where pe.id_familia = f.id_familia AND pe.entrevistado = 1 ) as nombre_entrevistado,
                    (SELECT pe.telefono
                    FROM tbl_persona as pe where pe.id_familia = f.id_familia AND pe.entrevistado = 1 ) as telefono_entrevistado
                    from tbl_familia as f inner join 
                    tbl_persona as p on p.id_familia = f.id_familia inner join 
                    tbl_boleta as b on f.id_boleta = b.id_boleta inner join 
                    tbl_vivienda as v on f.id_familia = v.id_familia inner join
                    tbl_tenencia as t on v.id_tenencia = t.id_tenencia inner join
                    tbl_comunidad as c on v.id_comunidad = c.id_comunidad inner join
                    tbl_sector as s on s.id_sector = c.id_sector where
                    ((SELECT concat_ws('',pe.nombres,' ',pe.primer_apellido,' ',pe.segundo_apellido) as nombre_completo FROM tbl_persona as pe where pe.id_familia = f.id_familia AND pe.entrevistado = 1 ) LIKE '%$buscar%' OR
                    (SELECT pe.dpi FROM tbl_persona as pe where pe.id_familia = f.id_familia AND pe.entrevistado = 1 ) LIKE '%$buscar%' OR
                    c.nombre LIKE '%$buscar%' OR s.nombre LIKE '%$buscar%')
                    GROUP BY f.id_familia LIMIT $desde, $hasta";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            $resultado = array();

            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $r = array(
                    "id_boleta" => $registro->id_boleta,
                    "id_familia" => $registro->id_familia,
                    "numero_casa" => $registro->numero_casa,
                    "direccion" => $registro->direccion,
                    "comunidad" => $registro->comunidad,
                    "sector" => $registro->sector,
                    "telefono_domiciliar" => $registro->telefono_domiciliar,
                    "tenencia" => $registro->tenencia,
                    "dpi_entrevistado" => $registro->dpi_entrevistado,
                    "nombre_entrevistado" => $registro->nombre_entrevistado,
                    "telefono_entrevistado" => $registro->telefono_entrevistado
                );
                
                $resultado[] = $r;
            }

            return $resultado;
        }
        catch (Exception $e)
        {
            die('Error de: '.$e->getMessage());
        }
    }

    public function buscarPersonas($id)
    {
        try{
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT b.id_boleta, f.id_familia, p.id_persona, p.dpi, p.sexo, p.edad, p.estado_civil, p.escolaridad, p.telefono,
                    concat_ws('',p.nombres,' ',p.primer_apellido,' ',p.segundo_apellido) as nombre_completo,
                    p.ocupacion, s.nombre as sector, p.entrevistado, p.fecha_nacimiento, p.parentesco, p.gestacion, p.semanas_gestacion
                    from tbl_persona as p inner join 
                    tbl_familia as f on p.id_familia = f.id_familia inner join 
                    tbl_boleta as b on f.id_boleta = b.id_boleta inner join 
                    tbl_vivienda as v on f.id_familia = v.id_familia inner join
                    tbl_comunidad as c on v.id_comunidad = c.id_comunidad inner join
                    tbl_sector as s on s.id_sector = c.id_sector
                    WHERE f.id_familia = $id";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            $resultado = array();
            
            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $r = array(
                    "id_boleta" => $registro->id_boleta,
                    "id_familia" => $registro->id_familia,
                    "id_persona" => $registro->id_persona,
                    "dpi" => $registro->dpi,
                    "sexo" => $registro->sexo,
                    "edad" => $registro->edad,
                    "estado_civil" => $registro->estado_civil,
                    "escolaridad" => $registro->escolaridad,
                    "telefono" => $registro->telefono,
                    "nombre_completo" => $registro->nombre_completo,
                    "ocupacion" => $registro->ocupacion,
                    "sector" => $registro->sector,
                    "entrevistado" => $registro->entrevistado,
                    "fecha_nacimiento" => $registro->fecha_nacimiento,
                    "parentesco" => $registro->parentesco,
                    "gestacion" => $registro->gestacion,
                    "semanas_gestacion" => $registro->semanas_gestacion
                );
                
                $resultado[] = $r;
            }

            return $resultado;

        }
        catch (Exception $e)
        {
            die('Error: '.$e->getMessage());
        }
    }

    public function buscarDomicilio($id)
    {
        try{
            $conexion = new Conexion();
            $sql = "SELECT v.id_vivienda, v.numero_casa, v.direccion, v.latitud, v.longitud, v.colindantes, v.telefono, 
                    c.nombre as comunidad, s.nombre as sector
                    from tbl_persona as p inner join 
                    tbl_familia as f on p.id_familia = f.id_familia inner join 
                    tbl_boleta as b on f.id_boleta = b.id_boleta inner join 
                    tbl_vivienda as v on f.id_familia = v.id_familia inner join
                    tbl_comunidad as c on v.id_comunidad = c.id_comunidad inner join
                    tbl_sector as s on s.id_sector = c.id_sector
                    WHERE f.id_familia = $id";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();
            
            $registro = $stmt->fetch(PDO::FETCH_OBJ);

            $r = array(
                "id_vivienda" => $registro->id_vivienda,
                "numero_casa" => $registro->numero_casa,
                "direccion" => $registro->direccion,
                "latitud" => $registro->latitud,
                "longitud" => $registro->longitud,
                "colindantes" => $registro->colindantes,
                "telefono" => $registro->telefono,
                "comunidad" => $registro->comunidad,
                "sector" => $registro->sector,
            );


            return $r;

        }
        catch (Exception $e)
        {
            die('Error: '.$e->getMessage());
        }
    }

    public function buscarTransportes($id)
    {
        try{
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT t.id_transporte, t.nombre as transporte from
                    tbl_transporte_vivienda as tv inner join
                    tbl_transporte as t on tv.id_transporte = t.id_transporte Where
                    tv.id_vivienda = $id;";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            $resultado = array();
            
            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $r = array(
                    "id_transporte" => $registro->id_transporte,
                    "transporte" => $registro->transporte
                );
                
                $resultado[] = $r;
            }

            return $resultado;

        }
        catch (Exception $e)
        {
            die('Error: '.$e->getMessage());
        }
    }

    public function buscarEgreso($id)
    {
        try{
            $conexion = new Conexion();
            $sql = "SELECT * FROM tbl_egreso WHERE id_familia = $id;";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            $registro = $stmt->fetch(PDO::FETCH_OBJ);
            

            $r = array(
                "alimentacion" => $registro->alimentacion,
                "combustible" => $registro->combustible,
                "renta" => $registro->renta,
                "agua" => $registro->agua,
                "electricidad" => $registro->electricidad,
                "telefono residencial" => $registro->telefono_residencial,
                "celular" => $registro->celular,
                "transporte" => $registro->transporte,
                "educacion" => $registro->educacion,
                "medico" => $registro->medico,
                "recreacion" => $registro->recreacion,
                "cable" => $registro->cable,
                "ropa calzado" => $registro->ropa_calzado,
                "fondo ahorro" => $registro->fondo_ahorro,
                "credito" => $registro->credito
            );


            return $r;

        }
        catch (Exception $e)
        {
            die('Error: '.$e->getMessage());
        }
    }

    public function buscarIngreso($id)
    {
        try{
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT p.id_persona, concat_ws('',p.nombres,' ',p.primer_apellido,' ',p.segundo_apellido) as nombre_completo, p.ingreso_mensual FROM
                    tbl_persona as p inner join
                    tbl_familia as f on f.id_familia = p.id_familia where
                    p.id_familia = $id;";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            $resultado = array();
            
            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $r = array(
                    "id_persona" => $registro->id_persona,
                    "nombre_completo" => $registro->nombre_completo,
                    "ingreso_mensual" => $registro->ingreso_mensual
                );
                
                $resultado[] = $r;
            }

            return $resultado;

        }
        catch (Exception $e)
        {
            die('Error: '.$e->getMessage());
        }
    }

    public function buscarVivienda($id)
    {
        try{
            $conexion = new Conexion();
            $sql = "SELECT t.nombre as tenencia, v.cantidad_cuartos, v.sala, v.comedor, v.cocina, v.banio_privado,
                    v.banio_colectivo, v.observaciones, pa.nombre as pared, te.nombre as techo, pi.nombre as piso,
                    sa.nombre as sanitario, v.eliminacion_basura from
                    tbl_vivienda as v inner join
                    tbl_tenencia as t on v.id_tenencia = t.id_tenencia inner join
                    tbl_mp_pared as pa on v.id_mp_pared = pa.id_mp_pared inner join
                    tbl_mp_techo as te on v.id_mp_techo = te.id_mp_techo inner join
                    tbl_mp_piso as pi on v.id_mp_piso = pi.id_mp_piso inner join
                    tbl_sanitario as sa on v.id_sanitario = sa.id_sanitario where
                    v.id_vivienda = $id;";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            $registro = $stmt->fetch(PDO::FETCH_OBJ);
            

            $r = array(
                "tenencia" => $registro->tenencia,
                "cantidad_cuartos" => $registro->cantidad_cuartos,
                "sala" => $registro->sala,
                "comedor" => $registro->comedor,
                "cocina" => $registro->cocina,
                "banio_privado" => $registro->banio_privado,
                "banio_colectivo" => $registro->banio_colectivo,
                "observaciones" => $registro->observaciones,
                "pared" => $registro->pared,
                "techo" => $registro->techo,
                "piso" => $registro->piso,
                "sanitario" => $registro->sanitario,
                "eliminacion_basura" => $registro->eliminacion_basura
            );


            return $r;

        }
        catch (Exception $e)
        {
            die('Error: '.$e->getMessage());
        }
    }

    public function buscarMobiliarios($id)
    {
        try{
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT m.id_mobiliario, m.nombre as mobiliario from
                    tbl_mobiliario_vivienda as mv inner join
                    tbl_mobiliario as m on mv.id_mobiliario = m.id_mobiliario Where
                    mv.id_vivienda = $id;";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            $resultado = array();
            
            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $r = array(
                    "id_mobiliario" => $registro->id_mobiliario,
                    "mobiliario" => $registro->mobiliario
                );
                
                $resultado[] = $r;
            }

            return $resultado;

        }
        catch (Exception $e)
        {
            die('Error: '.$e->getMessage());
        }
    }

    public function buscarServiciosVivienda($id)
    {
        try{
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT s.id_servicio, s.nombre as servicio from
                    tbl_servicio_vivienda as sv inner join
                    tbl_servicio as s on sv.id_servicio = s.id_servicio Where
                    sv.id_vivienda = $id;";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            $resultado = array();
            
            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $r = array(
                    "id_servicio" => $registro->id_servicio,
                    "servicio" => $registro->servicio
                );
                
                $resultado[] = $r;
            }

            return $resultado;

        }
        catch (Exception $e)
        {
            die('Error: '.$e->getMessage());
        }
    }

    public function buscarServicioMedico($id)
    {
        try{
            $conexion = new Conexion();
            $sql = "SELECT m.id_servicio_medico, m.nombre as servicio_medico, mf.frecuencia_medico from
                    tbl_serviciomedico_familia as mf inner join
                    tbl_servicio_medico as m on mf.id_servicio_medico = m.id_servicio_medico 
                    WHERE mf.id_familia = $id;";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();
            
            $registro = $stmt->fetch(PDO::FETCH_OBJ);

            $r = array(
                "id_servicio_medico" => $registro->id_servicio_medico,
                "servicio_medico" => $registro->servicio_medico,
                "frecuencia_medico" => $registro->frecuencia_medico
            );


            return $r;

        }
        catch (Exception $e)
        {
            die('Error: '.$e->getMessage());
        }
    }

    public function buscarGestacion($id)
    {
        try{
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT p.id_persona, concat_ws('',p.nombres,' ',p.primer_apellido,' ',p.segundo_apellido) as nombre_completo, 
                    p.semanas_gestacion 
                    FROM tbl_persona as p WHERE
                    p.id_familia = $id and p.gestacion = 1;";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            $resultado = array();
            
            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $r = array(
                    "id_persona" => $registro->id_persona,
                    "nombre_completo" => $registro->nombre_completo,
                    "semanas_gestacion" => $registro->semanas_gestacion
                );
                
                $resultado[] = $r;
            }

            return $resultado;

        }
        catch (Exception $e)
        {
            die('Error: '.$e->getMessage());
        }
    }

    public function buscarEnfermedades($id)
    {
        try{
            $conexion = new Conexion();
            $sql = "SELECT p.id_persona, concat_ws('',p.nombres,' ',p.primer_apellido,' ',p.segundo_apellido) as nombre_completo, e.nombre as enfermedad
                    FROM tbl_persona as p inner join
                    tbl_enfermedad_persona as ep on p.id_persona = ep.id_persona inner join
                    tbl_enfermedad as e on e.id_enfermedad = ep.id_enfermedad
                    WHERE p.id_familia = $id;";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            $resultado = array();
            $datos = array();
            
            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $r = array(
                    "id_persona" => $registro->id_persona,
                    "nombre_completo" => $registro->nombre_completo,
                    "enfermedad" => $registro->enfermedad
                );
                
                $datos[] = $r;
            }

            //print_r($datos);
            $listaId = array();
    
            foreach($datos as $d){
                $bandera = 0;
                foreach($listaId as $l){
                    if($l == $d['id_persona']){
                        $bandera = 1;
                    }
                }
                if($bandera == 0){
                    $listaId[] = $d['id_persona'];
                    $resultado[] = listaEnfermedades($datos, $d['id_persona'], $d['nombre_completo']);
                }
                
            }
    
            return $resultado;

        }
        catch (Exception $e)
        {
            die('Error: '.$e->getMessage());
        }
    }

    public function buscarDiscapacidades($id)
    {
        try{
            $conexion = new Conexion();
            $sql = "SELECT p.id_persona, concat_ws('',p.nombres,' ',p.primer_apellido,' ',p.segundo_apellido) as nombre_completo, d.nombre as discapacidad
                    FROM tbl_persona as p inner join
                    tbl_discapacidad_persona as dp on p.id_persona = dp.id_persona inner join
                    tbl_discapacidad as d on d.id_discapacidad = dp.id_discapacidad
                    WHERE p.id_familia = $id;";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            $resultado = array();
            $datos = array();
            
            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $r = array(
                    "id_persona" => $registro->id_persona,
                    "nombre_completo" => $registro->nombre_completo,
                    "discapacidades" => $registro->discapacidad
                );
                
                $datos[] = $r;
            }

            //print_r($datos);
            $listaId = array();
    
            foreach($datos as $d){
                $bandera = 0;
                foreach($listaId as $l){
                    if($l == $d['id_persona']){
                        $bandera = 1;
                    }
                }
                if($bandera == 0){
                    $listaId[] = $d['id_persona'];
                    $resultado[] = listaDiscapacidades($datos, $d['id_persona'], $d['nombre_completo']);
                }
                
            }
    
            return $resultado;

        }
        catch (Exception $e)
        {
            die('Error: '.$e->getMessage());
        }
    }

    public function buscarAlimentacion($id)
    {
        try{
            $conexion = new Conexion();
            $sql = "SELECT * FROM tbl_alimentacion WHERE id_familia = $id;";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            $registro = $stmt->fetch(PDO::FETCH_OBJ);
            

            $r = array(
                "carne de res" => $registro->carne_res,
                "carne de pollo" => $registro->carne_pollo,
                "carne de cerdo" => $registro->carne_cerdo,
                "carne de pescado" => $registro->carne_pescado,
                "leche" => $registro->leche,
                "cereales" => $registro->cereales,
                "huevo" => $registro->huevo,
                "frutas" => $registro->frutas,
                "verduras" => $registro->verduras,
                "leguminosas" => $registro->leguminosas
            );


            return $r;

        }
        catch (Exception $e)
        {
            die('Error: '.$e->getMessage());
        }
    }

    public function buscarRecreaciones($id)
    {
        try{
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT r.id_recreacion, r.nombre as recreacion from
                    tbl_recreacion_familia as rf inner join
                    tbl_recreacion as r on rf.id_recreacion = r.id_recreacion Where
                    rf.id_familia = $id;";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            $resultado = array();
            
            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $r = array(
                    "id_recreacion" => $registro->id_recreacion,
                    "recreacion" => $registro->recreacion
                );
                
                $resultado[] = $r;
            }

            return $resultado;

        }
        catch (Exception $e)
        {
            die('Error: '.$e->getMessage());
        }
    }

    public function buscarDatosBoleta($id)
    {
        try{
            $conexion = new Conexion();
            $sql = "SELECT b.id_boleta, b.observaciones, b.evaluador, b.fecha_aplicacion from 
                    tbl_boleta as b inner join 
                    tbl_familia as f on f.id_boleta = b.id_boleta
                    where f.id_familia = $id;";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();
            
            $registro = $stmt->fetch(PDO::FETCH_OBJ);

            $r = array(
                "id_boleta" => $registro->id_boleta,
                "observaciones" => $registro->observaciones,
                "evaluador" => $registro->evaluador,
                "fecha_aplicacion" => $registro->fecha_aplicacion
            );


            return $r;

        }
        catch (Exception $e)
        {
            die('Error: '.$e->getMessage());
        }
    }

    













    public function editar(Comunidad $c)
    {
        try
        {
            $conexion = new Conexion();
            $sql = "UPDATE tbl_comunidad SET nombre=?, descripcion=?, tipo=?, id_sector=? WHERE id_comunidad=?";

            $resultado = $conexion->pdo->prepare($sql)->execute(
                array(
                  $c->get('nombre'),
                  $c->get('descripcion'),
                  $c->get('tipo'),
                  $c->get('id_sector'),
                  $c->get('id_comunidad')
                )
            );

            return $resultado;
        }
        catch (Exception $e)
        {
            die('Error: '.$e->getMessage());
        }
    }

    public function eliminar($id)
    {
        try
        {
            $conexion = new Conexion();
            $sql = "UPDATE tbl_comunidad SET estado=1 WHERE id_comunidad=?";
            
            $resultado = $conexion->pdo->prepare($sql)->execute(
                array($id)
            );

            return $resultado;
        }
        catch (Exception $e)
        {
            die('Error: '.$e->getMessage());
        }
    }

}

function listaEnfermedades($datos, $id, $nombre){
    $registro = array(
        'id_persona' => $id,
        'nombre_completo' => $nombre
    );

    $enfermedades = array();
    foreach($datos as  $d){

        if($d['id_persona'] == $id){
                $enfermedades[] = $d['enfermedad'];
        }
    }
    $registro['enfermedades'] = $enfermedades;

    return $registro;
}

function listaDiscapacidades($datos, $id, $nombre){
    $registro = array(
        'id_persona' => $id,
        'nombre_completo' => $nombre
    );

    $discapacidades = array();
    foreach($datos as  $d){

        if($d['id_persona'] == $id){
                $discapacidades[] = $d['discapacidades'];
        }
    }
    $registro['discapacidades'] = $discapacidades;

    return $registro;
}

?>