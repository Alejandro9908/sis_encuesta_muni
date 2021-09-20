<?php
include ($_SERVER['DOCUMENT_ROOT']."/constantes.php");
include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
include_once ('conexion.php');

class reporteFamiliaController{
   
    public function contarRegistros($buscar){

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
                    LIMIT $desde, $hasta";
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

}

?>