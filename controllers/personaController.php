<?php

include ($_SERVER['DOCUMENT_ROOT']."/constantes.php");
include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
include_once ('conexion.php');

class personaController {

    public function listarEnfermedades($desde, $hasta, $sector, $comunidad, $enfermedad, $buscar){
        try
        {
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT b.id_boleta, f.id_familia, p.id_persona, p.dpi, p.sexo, p.fecha_nacimiento, p.estado_civil, p.escolaridad, p.telefono,
                    concat_ws('',p.nombres,' ',p.primer_apellido,' ',p.segundo_apellido) as nombre_completo,
                    c.nombre as comunidad
                    from tbl_enfermedad_persona as ep inner join 
                    tbl_enfermedad as e on ep.id_enfermedad = e.id_enfermedad inner join 
                    tbl_persona as p on ep.id_persona = p.id_persona inner join 
                    tbl_familia as f on p.id_familia = f.id_familia inner join 
                    tbl_boleta as b on f.id_boleta = b.id_boleta inner join
                    tbl_vivienda as v on f.id_familia = v.id_familia inner join
                    tbl_comunidad as c on v.id_comunidad = c.id_comunidad 
                    where (concat_ws('',p.nombres,' ',p.primer_apellido,' ',p.segundo_apellido) LIKE '%$buscar%' 
                    OR p.dpi LIKE '%$buscar%') AND 
                    c.id_sector like '$sector' AND v.id_comunidad LIKE '$comunidad' AND ep.id_enfermedad=$enfermedad 
                    ORDER BY c.nombre ASC LIMIT $desde, $hasta";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $r = array(
                    "id_boleta" => $registro->id_boleta,
                    "id_familia" => $registro->id_familia,
                    "id_persona" => $registro->id_persona,
                    "dpi" => $registro->dpi,
                    "sexo" => $registro->sexo,
                    "fecha_nacimiento" => $registro->fecha_nacimiento,
                    "estado_civil" => $registro->estado_civil,
                    "escolaridad" => $registro->escolaridad,
                    "telefono" => $registro->telefono,
                    "nombre_completo" => $registro->nombre_completo,
                    "comunidad" => $registro->comunidad,
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

    public function listarDiscapacidades($desde, $hasta, $sector, $comunidad, $discapacidad,$buscar){
        try
        {
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT b.id_boleta, f.id_familia, p.id_persona, p.dpi, p.sexo, p.fecha_nacimiento, p.estado_civil, p.escolaridad, p.telefono,
                    concat_ws('',p.nombres,' ',p.primer_apellido,' ',p.segundo_apellido) as nombre_completo,
                    c.nombre as comunidad
                    from tbl_discapacidad_persona as dp inner join 
                    tbl_discapacidad as d on dp.id_discapacidad = d.id_discapacidad inner join 
                    tbl_persona as p on dp.id_persona = p.id_persona inner join 
                    tbl_familia as f on p.id_familia = f.id_familia inner join 
                    tbl_boleta as b on f.id_boleta = b.id_boleta inner join
                    tbl_vivienda as v on f.id_familia = v.id_familia inner join
                    tbl_comunidad as c on v.id_comunidad = c.id_comunidad 
                    where (concat_ws('',p.nombres,' ',p.primer_apellido,' ',p.segundo_apellido) LIKE '%$buscar%' 
                    OR p.dpi LIKE '%$buscar%') AND 
                    c.id_sector like '$sector' and v.id_comunidad LIKE '$comunidad' and dp.id_discapacidad=$discapacidad 
                    ORDER BY c.nombre ASC LIMIT $desde, $hasta";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $r = array(
                    "id_boleta" => $registro->id_boleta,
                    "id_familia" => $registro->id_familia,
                    "id_persona" => $registro->id_persona,
                    "dpi" => $registro->dpi,
                    "sexo" => $registro->sexo,
                    "fecha_nacimiento" => $registro->fecha_nacimiento,
                    "estado_civil" => $registro->estado_civil,
                    "escolaridad" => $registro->escolaridad,
                    "telefono" => $registro->telefono,
                    "nombre_completo" => $registro->nombre_completo,
                    "comunidad" => $registro->comunidad,
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

    public function listarEstadoCivil($desde, $hasta, $sector, $comunidad, $estado_civil,$buscar){
        try
        {
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT b.id_boleta, f.id_familia, p.id_persona, p.dpi, p.sexo, p.fecha_nacimiento, p.estado_civil, p.escolaridad, p.telefono,
                    concat_ws('',p.nombres,' ',p.primer_apellido,' ',p.segundo_apellido) as nombre_completo,
                    c.nombre as comunidad
                    FROM tbl_persona as p inner join 
                    tbl_familia as f on p.id_familia = f.id_familia inner join 
                    tbl_boleta as b on f.id_boleta = b.id_boleta inner join
                    tbl_vivienda as v on f.id_familia = v.id_familia inner join
                    tbl_comunidad as c on v.id_comunidad = c.id_comunidad 
                    where (concat_ws('',p.nombres,' ',p.primer_apellido,' ',p.segundo_apellido) LIKE '%$buscar%' 
                    OR p.dpi LIKE '%$buscar%') AND  
                    (c.id_sector like '$sector' and v.id_comunidad LIKE '$comunidad') and p.estado_civil='$estado_civil' 
                    ORDER BY c.nombre ASC LIMIT $desde, $hasta";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $r = array(
                    "id_boleta" => $registro->id_boleta,
                    "id_familia" => $registro->id_familia,
                    "id_persona" => $registro->id_persona,
                    "dpi" => $registro->dpi,
                    "sexo" => $registro->sexo,
                    "fecha_nacimiento" => $registro->fecha_nacimiento,
                    "estado_civil" => $registro->estado_civil,
                    "escolaridad" => $registro->escolaridad,
                    "telefono" => $registro->telefono,
                    "nombre_completo" => $registro->nombre_completo,
                    "comunidad" => $registro->comunidad,
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

    public function listarEscolaridad($desde, $hasta, $sector, $comunidad, $escolaridad, $buscar){
        try
        {
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT b.id_boleta, f.id_familia, p.id_persona, p.dpi, p.sexo, p.fecha_nacimiento, p.estado_civil, p.escolaridad, p.telefono,
                    concat_ws('',p.nombres,' ',p.primer_apellido,' ',p.segundo_apellido) as nombre_completo,
                    c.nombre as comunidad
                    FROM tbl_persona as p inner join 
                    tbl_familia as f on p.id_familia = f.id_familia inner join 
                    tbl_boleta as b on f.id_boleta = b.id_boleta inner join
                    tbl_vivienda as v on f.id_familia = v.id_familia inner join
                    tbl_comunidad as c on v.id_comunidad = c.id_comunidad 
                    where (concat_ws('',p.nombres,' ',p.primer_apellido,' ',p.segundo_apellido) LIKE '%$buscar%' 
                    OR p.dpi LIKE '%$buscar%') AND 
                    (c.id_sector like '$sector' and v.id_comunidad LIKE '$comunidad') and p.escolaridad='$escolaridad' 
                    ORDER BY c.nombre ASC LIMIT $desde, $hasta";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $r = array(
                    "id_boleta" => $registro->id_boleta,
                    "id_familia" => $registro->id_familia,
                    "id_persona" => $registro->id_persona,
                    "dpi" => $registro->dpi,
                    "sexo" => $registro->sexo,
                    "fecha_nacimiento" => $registro->fecha_nacimiento,
                    "estado_civil" => $registro->estado_civil,
                    "escolaridad" => $registro->escolaridad,
                    "telefono" => $registro->telefono,
                    "nombre_completo" => $registro->nombre_completo,
                    "comunidad" => $registro->comunidad,
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

    public function listarOcupacion($desde, $hasta, $sector, $comunidad, $ocupacion, $buscar){
        try
        {
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT b.id_boleta, f.id_familia, p.id_persona, p.dpi, p.sexo, p.fecha_nacimiento, p.estado_civil, p.escolaridad, p.telefono,
                    concat_ws('',p.nombres,' ',p.primer_apellido,' ',p.segundo_apellido) as nombre_completo,
                    c.nombre as comunidad
                    FROM tbl_persona as p inner join 
                    tbl_familia as f on p.id_familia = f.id_familia inner join 
                    tbl_boleta as b on f.id_boleta = b.id_boleta inner join
                    tbl_vivienda as v on f.id_familia = v.id_familia inner join
                    tbl_comunidad as c on v.id_comunidad = c.id_comunidad 
                    where (concat_ws('',p.nombres,' ',p.primer_apellido,' ',p.segundo_apellido) LIKE '%$buscar%' 
                    OR p.dpi LIKE '%$buscar%') AND 
                    (c.id_sector like '$sector' and v.id_comunidad LIKE '$comunidad') and p.ocupacion='$ocupacion' 
                    ORDER BY c.nombre ASC LIMIT $desde, $hasta";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $r = array(
                    "id_boleta" => $registro->id_boleta,
                    "id_familia" => $registro->id_familia,
                    "id_persona" => $registro->id_persona,
                    "dpi" => $registro->dpi,
                    "sexo" => $registro->sexo,
                    "fecha_nacimiento" => $registro->fecha_nacimiento,
                    "estado_civil" => $registro->estado_civil,
                    "escolaridad" => $registro->escolaridad,
                    "telefono" => $registro->telefono,
                    "nombre_completo" => $registro->nombre_completo,
                    "comunidad" => $registro->comunidad,
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

}

?>