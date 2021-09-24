<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/constantes.php");
include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
include_once ($_SERVER['DOCUMENT_ROOT'].'/models/comunidad.php');
include_once ('conexion.php');

class comunidadController{
   
    public function contarRegistros($buscar){

        try
        {
            $conexion = new Conexion();
            $sql = "SELECT COUNT(*) AS total_registros FROM tbl_comunidad WHERE 
                    (id_comunidad LIKE '%$buscar%' OR nombre LIKE '%$buscar%' OR descripcion LIKE '%$buscar%')";
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
            $sql = "SELECT c.id_comunidad, c.nombre as comunidad, c.descripcion, c.id_sector, c.estado, c.tipo 
            FROM tbl_comunidad as c INNER JOIN tbl_sector as s on c.id_sector = s.id_sector
            WHERE (c.nombre LIKE '%$buscar%' OR s.nombre LIKE '%$buscar%' ) ORDER BY c.nombre ASC LIMIT $desde, $hasta";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $r = array(
                    'id_comunidad' => $registro->id_comunidad,
                    'comunidad' => $registro->comunidad,
                    'descripcion' => $registro->descripcion,
                    'id_sector' => $registro->id_sector,
                    'estado' => $registro->estado,
                    'tipo' => $registro->tipo

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

    public function listarSelect($sector)
    {
        try
        {
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT id_comunidad, nombre, descripcion FROM tbl_comunidad WHERE id_sector=$sector AND estado=1 ORDER BY nombre ASC";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $r = array(
                    'id_comunidad' => $registro->id_comunidad,
                    'nombre' => $registro->nombre,
                    'descripcion' => $registro->descripcion,
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

    public function guardar(Comunidad $c){
        try
        {
            $sql = "INSERT INTO tbl_comunidad (nombre, descripcion, tipo, id_sector, estado) VALUES (?,?,?,?,1)";

            $conexion = new Conexion();
            $resultado = $conexion->pdo->prepare($sql)->execute(
                array(
                    $c->get('nombre'),
                    $c->get('descripcion'),
                    $c->get('tipo'),
                    $c->get('id_sector')
                )
            );

            return $resultado;
        }
        catch (Exception $e)
        {
            echo "error: ".$e;
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

    public function inactivar($id)
    {
        try
        {
            $conexion = new Conexion();
            $sql = "UPDATE tbl_comunidad SET estado=0 WHERE id_comunidad=?";
            
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

    public function activar($id)
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

    public function listarSectores(){
        try
        {
            $conexion = new Conexion();
            $resultado = array();
            $sql = "SELECT * FROM tbl_sector;";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $c = new Comunidad();
    
                $c->set('id_sector', $registro->id_sector);
                $c->set('nombre', $registro->nombre);
                $c->set('descripcion', $registro->descripcion);
                
                $resultado[] = $c;
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