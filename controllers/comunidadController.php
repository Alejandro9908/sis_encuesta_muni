<?php
include ($_SERVER['DOCUMENT_ROOT']."/constantes.php");
include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
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
            $sql = "SELECT c.id_comunidad, c.nombre, c.descripcion, c.tipo, s.nombre AS id_sector, c.estado FROM tbl_comunidad AS c INNER JOIN tbl_sector AS s ON c.id_sector = s.id_sector WHERE 
                    (c.id_comunidad LIKE '%$buscar%' OR c.nombre LIKE '%$buscar%' OR c.descripcion LIKE '%$buscar%') ORDER BY nombre ASC LIMIT $desde, $hasta";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $c = new Comunidad();
    
                $c->set('id_comunidad', $registro->id_comunidad);
                $c->set('nombre', $registro->nombre);
                $c->set('descripcion', $registro->descripcion);
                $c->set('tipo', $registro->tipo);
                $c->set('id_sector', $registro->id_sector);
                $c->set('estado', $registro->estado);
                
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