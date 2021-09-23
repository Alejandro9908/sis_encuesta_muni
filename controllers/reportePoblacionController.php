<?php
include ($_SERVER['DOCUMENT_ROOT']."/constantes.php");
include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
include_once ('conexion.php');

class reportePoblacionController{
   
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
            echo 'Error '. $e;
        }
        
    }
    
    
    public function listar($buscar, $desde, $hasta)
    {
        try
        {
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT b.id_boleta, f.id_familia, p.id_persona, p.dpi, p.sexo, p.edad, p.estado_civil, p.escolaridad, p.telefono,
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
                    "edad" => $registro->edad,
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
            die('Error de: '.$e->getMessage());
        }
    }

    public function buscar($id)
    {
        try{
            $conexion = new Conexion();
            $resultado = array();
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


            return $resultado;
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

    public function buscarPersona($id)
    {
        try{
            $conexion = new Conexion();
            $resultado = array();
            $sql = $conexion->pdo->prepare("SELECT id_persona, id_familia, entrevistado, nombres, primer_apellido, segundo_apellido, 
            sexo, fecha_nacimiento, edad, dpi, estado_civil, escolaridad, ocupacion, telefono, gestacion, semanas_gestacion, ingreso_mensual, parentesco FROM tbl_persona WHERE id_persona = ?;");
            $sql->execute(array($id));

            $registro = $sql->fetch(PDO::FETCH_OBJ);
            
            $u = new persona();
    
            $u->set('id_persona', $registro->id_persona);
            $u->set('id_familia', $registro->id_familia);
            $u->set('entrevistado', $registro->entrevistado);
            $u->set('nombres', $registro->nombres);
            $u->set('primer_apellido', $registro->primer_apellido);
            $u->set('segundo_apellido', $registro->segundo_apellido);
            $u->set('sexo', $registro->sexo);
            $u->set('fecha_nacimiento', $registro->fecha_nacimiento);
            $u->set('edad', $registro->edad);
            $u->set('dpi', $registro->dpi);
            $u->set('estado_civil', $registro->estado_civil);
            $u->set('escolaridad', $registro->escolaridad);
            $u->set('ocupacion', $registro->ocupacion);
            $u->set('telefono', $registro->telefono);
            $u->set('gestacion', $registro->gestacion);
            $u->set('semanas_gestacion', $registro->semanas_gestacion);
            $u->set('ingreso_mensual', $registro->ingreso_mensual);
            $u->set('parentesco', $registro->parentesco);
                
            return $u;
            

            return $resultado;
        }
        catch (Exception $e)
        {
            die('Error: '.$e->getMessage());
        }
    }


}

?>