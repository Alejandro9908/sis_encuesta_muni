<?php

include ($_SERVER['DOCUMENT_ROOT']."/constantes.php");
include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
include_once ('conexion.php');

class FamiliaController {


    public function listarRecreaciones($desde, $hasta, $sector, $comunidad, $recreacion, $buscar){
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
                    tbl_recreacion_familia as r on f.id_familia = r.id_familia inner join
                    tbl_vivienda as v on f.id_familia = v.id_familia inner join
                    tbl_tenencia as t on v.id_tenencia = t.id_tenencia inner join
                    tbl_comunidad as c on v.id_comunidad = c.id_comunidad inner join
                    tbl_sector as s on s.id_sector = c.id_sector where
                    ((SELECT concat_ws('',pe.nombres,' ',pe.primer_apellido,' ',pe.segundo_apellido) as nombre_completo FROM tbl_persona as pe where pe.id_familia = f.id_familia AND pe.entrevistado = 1 ) LIKE '%$buscar%' OR
                    (SELECT pe.dpi FROM tbl_persona as pe where pe.id_familia = f.id_familia AND pe.entrevistado = 1 ) LIKE '%$buscar%') 
                    AND c.id_sector like '$sector' and v.id_comunidad LIKE '$comunidad' and r.id_recreacion=$recreacion
                    GROUP BY f.id_familia LIMIT $desde, $hasta";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

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
            die($e->getMessage());
        }
    }

    public function listarMedico($desde, $hasta, $sector, $comunidad, $data, $buscar){
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
                    tbl_serviciomedico_familia as m on f.id_familia = m.id_familia inner join
                    tbl_vivienda as v on f.id_familia = v.id_familia inner join
                    tbl_tenencia as t on v.id_tenencia = t.id_tenencia inner join
                    tbl_comunidad as c on v.id_comunidad = c.id_comunidad inner join
                    tbl_sector as s on s.id_sector = c.id_sector where
                    ((SELECT concat_ws('',pe.nombres,' ',pe.primer_apellido,' ',pe.segundo_apellido) as nombre_completo FROM tbl_persona as pe where pe.id_familia = f.id_familia AND pe.entrevistado = 1 ) LIKE '%$buscar%' OR
                    (SELECT pe.dpi FROM tbl_persona as pe where pe.id_familia = f.id_familia AND pe.entrevistado = 1 ) LIKE '%$buscar%') 
                    AND c.id_sector like '$sector' and v.id_comunidad LIKE '$comunidad' and m.id_servicio_medico=$data
                    GROUP BY f.id_familia LIMIT $desde, $hasta";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

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
            die($e->getMessage());
        }
    }

    public function listarTenencia($desde, $hasta, $sector, $comunidad, $data, $buscar){
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
                    (SELECT pe.dpi FROM tbl_persona as pe where pe.id_familia = f.id_familia AND pe.entrevistado = 1 ) LIKE '%$buscar%') 
                    AND c.id_sector like '$sector' and v.id_comunidad LIKE '$comunidad' and v.id_tenencia=$data
                    GROUP BY f.id_familia LIMIT $desde, $hasta";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

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
            die($e->getMessage());
        }
    }

    public function listarServicioBasico($desde, $hasta, $sector, $comunidad, $data, $buscar){
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
                    tbl_servicio_vivienda as sv on sv.id_vivienda = v.id_vivienda inner join
                    tbl_tenencia as t on v.id_tenencia = t.id_tenencia inner join
                    tbl_comunidad as c on v.id_comunidad = c.id_comunidad inner join
                    tbl_sector as s on s.id_sector = c.id_sector where
                    ((SELECT concat_ws('',pe.nombres,' ',pe.primer_apellido,' ',pe.segundo_apellido) as nombre_completo FROM tbl_persona as pe where pe.id_familia = f.id_familia AND pe.entrevistado = 1 ) LIKE '%$buscar%' OR
                    (SELECT pe.dpi FROM tbl_persona as pe where pe.id_familia = f.id_familia AND pe.entrevistado = 1 ) LIKE '%$buscar%') 
                    AND c.id_sector like '$sector' and v.id_comunidad LIKE '$comunidad' and sv.id_servicio=$data
                    GROUP BY f.id_familia LIMIT $desde, $hasta";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

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
            die($e->getMessage());
        }
    }



}

?>