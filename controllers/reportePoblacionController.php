<?php
include ($_SERVER['DOCUMENT_ROOT']."/constantes.php");
include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
include_once ('conexion.php');

class ReportePoblacionController{
   
    public function contarRegistros($buscar){

        try
        {
            $conexion = new Conexion();
            $sql = "SELECT COUNT(*) AS total_registros
                    from tbl_persona as p inner join 
                    tbl_familia as f on p.id_familia = f.id_familia inner join 
                    tbl_boleta as b on f.id_boleta = b.id_boleta inner join 
                    tbl_vivienda as v on f.id_familia = v.id_familia inner join
                    tbl_comunidad as c on v.id_comunidad = c.id_comunidad inner join
                    tbl_sector as s on s.id_sector = c.id_sector
                    WHERE (concat_ws('',p.nombres,' ',p.primer_apellido,' ',p.segundo_apellido) LIKE '%$buscar%' 
                    OR p.dpi LIKE '%$buscar%' OR c.nombre LIKE '%$buscar%' OR s.nombre LIKE '%$buscar%')";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            $registro = $stmt->fetch(PDO::FETCH_OBJ);

            return $registro->total_registros;
        }catch(Exception $e)
        {
            echo $e;
        }
        
    }
    
    
    public function listar($buscar, $desde, $hasta)
    {
        try
        {
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT b.id_boleta, f.id_familia, p.id_persona, p.dpi, p.sexo, p.fecha_nacimiento, p.estado_civil, p.escolaridad, p.telefono,
                    concat_ws('',p.nombres,' ',p.primer_apellido,' ',p.segundo_apellido) as nombre_completo,
                    c.nombre as comunidad, s.nombre as sector
                    from tbl_persona as p inner join 
                    tbl_familia as f on p.id_familia = f.id_familia inner join 
                    tbl_boleta as b on f.id_boleta = b.id_boleta inner join 
                    tbl_vivienda as v on f.id_familia = v.id_familia inner join
                    tbl_comunidad as c on v.id_comunidad = c.id_comunidad inner join
                    tbl_sector as s on s.id_sector = c.id_sector
                    WHERE (concat_ws('',p.nombres,' ',p.primer_apellido,' ',p.segundo_apellido) LIKE '%$buscar%' 
                    OR p.dpi LIKE '%$buscar%' OR c.nombre LIKE '%$buscar%' OR s.nombre LIKE '%$buscar%') ORDER BY p.nombres ASC LIMIT $desde, $hasta";
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
                    "sector" => $registro->sector
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

    public function buscar($id)
    {
        try{
            $conexion = new Conexion();

            $sql = $conexion->pdo->prepare("SELECT * FROM tbl_comunidad WHERE id_comunidad = ?;");
            $sql->execute(array($id));

            $registro = $sql->fetch(PDO::FETCH_OBJ);

            $c = new Comunidad();

            $c->set('id_comunidad', $registro->id_comunidad);
            $c->set('nombre', $registro->nombre);
            $c->set('descripcion', $registro->descripcion);
            $c->set('tipo', $registro->tipo);
            $c->set('id_sector', $registro->id_sector);

            return $c;


        
        }
        catch (Exception $e)
        {
            die($e->getMessage());
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
            die($e->getMessage());
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
            die($e->getMessage());
        }
    }

    public function buscarPersona($id)
    {
        try{
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT b.id_boleta, f.id_familia, p.id_persona, p.dpi, p.sexo, p.edad, p.estado_civil, p.escolaridad, p.telefono,p.correo,
                    p.nombres ,p.primer_apellido, p.segundo_apellido,
                    p.ocupacion, s.nombre as sector, p.entrevistado, p.fecha_nacimiento, p.parentesco, p.gestacion, p.semanas_gestacion, p.ingreso_mensual 
                    from tbl_persona as p inner join 
                    tbl_familia as f on p.id_familia = f.id_familia inner join 
                    tbl_boleta as b on f.id_boleta = b.id_boleta inner join 
                    tbl_vivienda as v on f.id_familia = v.id_familia inner join
                    tbl_comunidad as c on v.id_comunidad = c.id_comunidad inner join
                    tbl_sector as s on s.id_sector = c.id_sector
                    WHERE p.id_persona = $id";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            $resultado = array();
            
            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $r = array(
                    "id_boleta" => $registro->id_boleta,
                    "id_familia" => $registro->id_familia,
                    "id_persona" => $registro->id_persona,
                    "nombres" => $registro->nombres,
                    "primer_apellido" => $registro->primer_apellido,
                    "segundo_apellido" => $registro->segundo_apellido,
                    "dpi" => $registro->dpi,
                    "sexo" => $registro->sexo,
                    "edad" => $registro->edad,
                    "estado_civil" => $registro->estado_civil,
                    "escolaridad" => $registro->escolaridad,
                    "telefono" => $registro->telefono,
                    "correo" => $registro->correo,
                    "ocupacion" => $registro->ocupacion,
                    "sector" => $registro->sector,
                    "entrevistado" => $registro->entrevistado,
                    "fecha_nacimiento" => $registro->fecha_nacimiento,
                    "parentesco" => $registro->parentesco,
                    "gestacion" => $registro->gestacion,
                    "semanas_gestacion" => $registro->semanas_gestacion,
                    'ingreso_mensual'  	=> $registro->ingreso_mensual
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

    public function buscarEnfermedades($id)
    {
        try{
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT e.id_enfermedad, e.nombre as enfermedad from
                    tbl_enfermedad_persona as ep inner join
                    tbl_enfermedad as e on ep.id_enfermedad = e.id_enfermedad Where
                    ep.id_persona = $id;";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            $resultado = array();
            
            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $r = array(
                    "id_enfermedad" => $registro->id_enfermedad,
                    "enfermedad" => $registro->enfermedad
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

    public function buscarDiscapacidad($id)
    {
        try{
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT d.id_discapacidad, d.nombre as discapacidad from
                    tbl_discapacidad_persona as dp inner join
                    tbl_discapacidad as d on dp.id_discapacidad = d.id_discapacidad Where
                    dp.id_persona = $id;";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            $resultado = array();
            
            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $r = array(
                    "id_discapacidad" => $registro->id_discapacidad,
                    "discapacidad" => $registro->discapacidad
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