<?php
include ($_SERVER['DOCUMENT_ROOT']."/constantes.php");
include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
include_once ('conexion.php');

class conteoController{
   
    public function buscarComunidad($id){

        try
        {
            $conexion = new Conexion();
            $sql = "SELECT nombre from tbl_comunidad where id_comunidad = $id";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            $registro = $stmt->fetch(PDO::FETCH_OBJ);

            return $registro->nombre;
        }catch(Exception $e)
        {
            echo 'Error '. $e;
        }
        
    }
    
    
    public function contarRegistrosPersonas($sector, $comunidad){

        try
        {
            $conexion = new Conexion();
            $sql = "SELECT count(*) as total_registros from tbl_persona as p inner join 
                    tbl_familia as f on p.id_familia = f.id_familia inner join 
                    tbl_vivienda as v on f.id_familia = v.id_familia inner join
                    tbl_comunidad as c on v.id_comunidad = c.id_comunidad 
                    where c.id_sector like '$sector' and v.id_comunidad LIKE '$comunidad';";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            $registro = $stmt->fetch(PDO::FETCH_OBJ);

            return $registro->total_registros;
        }catch(Exception $e)
        {
            echo 'Error '. $e;
        }
        
    }

    public function contarRegistrosHombres($sector, $comunidad){

        try
        {
            $conexion = new Conexion();
            $sql = "SELECT count(sexo) as total_registros from tbl_persona as p inner join 
                    tbl_familia as f on p.id_familia = f.id_familia inner join 
                    tbl_vivienda as v on f.id_familia = v.id_familia inner join
                    tbl_comunidad as c on v.id_comunidad = c.id_comunidad 
                    where c.id_sector like '$sector' and v.id_comunidad LIKE '$comunidad' and p.sexo='M';";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            $registro = $stmt->fetch(PDO::FETCH_OBJ);

            return $registro->total_registros;
        }catch(Exception $e)
        {
            echo 'Error '. $e;
        }
        
    }

    public function contarRegistrosMujeres($sector, $comunidad){

        try
        {
            $conexion = new Conexion();
            $sql = "SELECT count(sexo) as total_registros from tbl_persona as p inner join 
                    tbl_familia as f on p.id_familia = f.id_familia inner join 
                    tbl_vivienda as v on f.id_familia = v.id_familia inner join
                    tbl_comunidad as c on v.id_comunidad = c.id_comunidad 
                    where c.id_sector like '$sector' and v.id_comunidad LIKE '$comunidad' and p.sexo='F';";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            $registro = $stmt->fetch(PDO::FETCH_OBJ);

            return $registro->total_registros;
        }catch(Exception $e)
        {
            echo 'Error '. $e;
        }
        
    }

    public function contarRegistrosFamilias($sector, $comunidad){

        try
        {
            $conexion = new Conexion();
            $sql = "SELECT count(*) as total_registros from tbl_familia as f inner join 
                    tbl_vivienda as v on f.id_familia = v.id_familia inner join
                    tbl_comunidad as c on v.id_comunidad = c.id_comunidad 
                    where c.id_sector like '$sector' and v.id_comunidad LIKE '$comunidad';";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            $registro = $stmt->fetch(PDO::FETCH_OBJ);

            return $registro->total_registros;
        }catch(Exception $e)
        {
            echo 'Error '. $e;
        }
        
    }

    public function listarEnfermedades($sector, $comunidad){
        try
        {
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT ep.id_enfermedad as id, e.nombre as nombre, count(*) as total from 
                    tbl_enfermedad_persona as ep inner join 
                    tbl_enfermedad as e on ep.id_enfermedad = e.id_enfermedad inner join 
                    tbl_persona as p on ep.id_persona = p.id_persona inner join 
                    tbl_familia as f on p.id_familia = f.id_familia inner join 
                    tbl_vivienda as v on f.id_familia = v.id_familia inner join
                    tbl_comunidad as c on v.id_comunidad = c.id_comunidad 
                    where c.id_sector like '$sector' and v.id_comunidad LIKE '$comunidad'
                    group by ep.id_enfermedad";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $c = array(
                    "id" => $registro->id,
                    "nombre" => $registro->nombre,
                    "total" => $registro->total
                );
                
                $resultado[] = $c;
            }

            return $resultado;
        }
        catch (Exception $e)
        {
            die('Error de: '.$e->getMessage());
        }
    }

    public function listarDiscapacidades($sector, $comunidad){
        try
        {
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT ed.id_discapacidad AS id, d.nombre as nombre, count(*) as total from 
                    tbl_discapacidad_persona as ed inner join 
                    tbl_discapacidad as d on ed.id_discapacidad = d.id_discapacidad inner join 
                    tbl_persona as p on ed.id_persona = p.id_persona inner join 
                    tbl_familia as f on p.id_familia = f.id_familia inner join 
                    tbl_vivienda as v on f.id_familia = v.id_familia inner join
                    tbl_comunidad as c on v.id_comunidad = c.id_comunidad 
                    where c.id_sector like '$sector' and v.id_comunidad LIKE '$comunidad'
                    group by ed.id_discapacidad;";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $l = array(
                    "id" => $registro->id,
                    "nombre" => $registro->nombre,
                    "total" => $registro->total
                );
                
                $resultado[] = $l;
            }

            return $resultado;
        }
        catch (Exception $e)
        {
            die('Error de: '.$e->getMessage());
        }
    }

    public function listarEstadoCivil($sector, $comunidad){
        try
        {
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT p.estado_civil as estado_civil, count(*) as total from 
                    tbl_persona as p inner join 
                    tbl_familia as f on p.id_familia = f.id_familia inner join 
                    tbl_vivienda as v on f.id_familia = v.id_familia inner join
                    tbl_comunidad as c on v.id_comunidad = c.id_comunidad 
                    where c.id_sector like '$sector' and v.id_comunidad LIKE '$comunidad'
                    group by p.estado_civil";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $l = array(
                    "estado_civil" => $registro->estado_civil,
                    "total" => $registro->total
                );
                
                $resultado[] = $l;
            }

            return $resultado;
        }
        catch (Exception $e)
        {
            die('Error de: '.$e->getMessage());
        }
    }

    public function listarEscolaridad($sector, $comunidad){
        try
        {
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT p.escolaridad as escolaridad, count(*) as total from 
                    tbl_persona as p inner join 
                    tbl_familia as f on p.id_familia = f.id_familia inner join 
                    tbl_vivienda as v on f.id_familia = v.id_familia inner join
                    tbl_comunidad as c on v.id_comunidad = c.id_comunidad 
                    where c.id_sector like '$sector' and v.id_comunidad LIKE '$comunidad'
                    group by p.escolaridad;";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $l = array(
                    "escolaridad" => $registro->escolaridad,
                    "total" => $registro->total
                );
                
                $resultado[] = $l;
            }

            return $resultado;
        }
        catch (Exception $e)
        {
            die('Error de: '.$e->getMessage());
        }
    }

    public function listarOcupacion($sector, $comunidad){
        try
        {
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT p.ocupacion as ocupacion, count(*) as total from 
                    tbl_persona as p inner join 
                    tbl_familia as f on p.id_familia = f.id_familia inner join 
                    tbl_vivienda as v on f.id_familia = v.id_familia inner join
                    tbl_comunidad as c on v.id_comunidad = c.id_comunidad 
                    where c.id_sector like '$sector' and v.id_comunidad LIKE '$comunidad'
                    group by p.ocupacion;";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $l = array(
                    "ocupacion" => $registro->ocupacion,
                    "total" => $registro->total
                );
                
                $resultado[] = $l;
            }

            return $resultado;
        }
        catch (Exception $e)
        {
            die('Error de: '.$e->getMessage());
        }
    }

    public function listarRangosEdades($sector, $comunidad){
        try
        {
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT 
                    CASE
                    WHEN TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE()) < 5 THEN 'Entre 1 y 4'
                    WHEN TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE()) < 8 THEN 'Entre 5 y 7'
                    WHEN TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE()) < 13 THEN 'Entre 8 y 12'
                    WHEN TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE()) < 19 THEN 'Entre 13 y 18'
                    WHEN TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE()) < 31 THEN 'Entre 19 y 30'
                    WHEN TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE()) < 41 THEN 'Entre 31 y 40'
                    WHEN TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE()) < 51 THEN 'Entre 41 y 50'
                    WHEN TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE()) < 61 THEN 'Entre 51 y 60'
                    WHEN TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE()) < 71 THEN 'Entre 61 y 70'
                    WHEN TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE()) < 81 THEN 'Entre 71 y 80'
                    WHEN TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE()) < 91 THEN 'Entre 81 y 90'
                    WHEN TIMESTAMPDIFF(YEAR,p.fecha_nacimiento,CURDATE()) < 101 THEN 'Entre 91 y 100'
                    ELSE 'más de 100'
                    END
                    as grupo_edad, count(*) as total
                    FROM tbl_persona as p inner join
                    tbl_familia as f on p.id_familia = f.id_familia inner join 
                    tbl_vivienda as v on f.id_familia = v.id_familia inner join
                    tbl_comunidad as c on v.id_comunidad = c.id_comunidad 
                    where c.id_sector like '$sector' and v.id_comunidad LIKE '$comunidad'
                    GROUP BY grupo_edad order by total desc;";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $l = array(
                    "grupo_edad" => $registro->grupo_edad,
                    "total" => $registro->total
                );
                
                $resultado[] = $l;
            }

            return $resultado;
        }
        catch (Exception $e)
        {
            die('Error de: '.$e->getMessage());
        }
    }

    public function listarRecreaciones($sector, $comunidad){
        try
        {
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT rf.id_recreacion, r.nombre, count(*) as total from 
                    tbl_recreacion_familia as rf inner join 
                    tbl_recreacion as r on rf.id_recreacion = r.id_recreacion inner join 
                    tbl_familia as f on f.id_familia = rf.id_familia inner join 
                    tbl_vivienda as v on f.id_familia = v.id_familia inner join
                    tbl_comunidad as c on v.id_comunidad = c.id_comunidad 
                    where c.id_sector like '$sector' and v.id_comunidad LIKE '$comunidad'
                    group by rf.id_recreacion;";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $l = array(
                    "id" => $registro->id_recreacion,
                    "nombre" => $registro->nombre,
                    "total" => $registro->total
                );
                
                $resultado[] = $l;
            }

            return $resultado;
        }
        catch (Exception $e)
        {
            die('Error de: '.$e->getMessage());
        }
    }

    public function listarServiciosMedicos($sector, $comunidad){
        try
        {
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT mf.id_servicio_medico, m.nombre, count(*) as total from 
                    tbl_serviciomedico_familia as mf inner join 
                    tbl_servicio_medico as m on mf.id_servicio_medico = m.id_servicio_medico inner join 
                    tbl_familia as f on f.id_familia = mf.id_familia inner join 
                    tbl_vivienda as v on f.id_familia = v.id_familia inner join
                    tbl_comunidad as c on v.id_comunidad = c.id_comunidad 
                    where c.id_sector like '$sector' and v.id_comunidad LIKE '$comunidad'
                    group by mf.id_servicio_medico;";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $l = array(
                    "id" => $registro->id_servicio_medico,
                    "nombre" => $registro->nombre,
                    "total" => $registro->total
                );
                
                $resultado[] = $l;
            }

            return $resultado;
        }
        catch (Exception $e)
        {
            die('Error de: '.$e->getMessage());
        }
    }

    public function listarTenencias($sector, $comunidad){
        try
        {
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT v.id_tenencia as id, t.nombre, count(*) as total from 
                    tbl_vivienda as v inner join 
                    tbl_tenencia as t on v.id_tenencia = t.id_tenencia inner join 
                    tbl_comunidad as c on v.id_comunidad = c.id_comunidad 
                    where c.id_sector like '$sector' and v.id_comunidad LIKE '$comunidad'
                    group by v.id_tenencia;";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $l = array(
                    "id" => $registro->id,
                    "nombre" => $registro->nombre,
                    "total" => $registro->total
                );
                
                $resultado[] = $l;
            }

            return $resultado;
        }
        catch (Exception $e)
        {
            die('Error de: '.$e->getMessage());
        }
    }

    public function listarServiciosBasicos($sector, $comunidad){
        try
        {
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT sv.id_servicio as id, s.nombre, count(*) as total from 
                    tbl_servicio_vivienda as sv inner join 
                    tbl_servicio as s on sv.id_servicio = s.id_servicio inner join
                    tbl_vivienda as v on v.id_vivienda = sv.id_vivienda inner join 
                    tbl_comunidad as c on v.id_comunidad = c.id_comunidad 
                    where c.id_sector like '$sector' and v.id_comunidad LIKE '$comunidad'
                    group by sv.id_servicio;";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $l = array(
                    "id" => $registro->id,
                    "nombre" => $registro->nombre,
                    "total" => $registro->total
                );
                
                $resultado[] = $l;
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