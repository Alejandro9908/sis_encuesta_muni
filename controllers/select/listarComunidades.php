<?php 
include_once ('../conexion.php');

    $sector = $_GET['sector'];
    try
    {
        $conexion = new Conexion();
        $resultado = array();
        $sql = "SELECT id_comunidad, nombre FROM tbl_comunidad WHERE id_sector=$sector AND estado=1 ORDER BY nombre ASC";
        $stmt = $conexion->pdo->prepare($sql);
        $stmt->execute();
       
        foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
        {

            $resultado[] = array(
                'id_comunidad' => $registro->id_comunidad,
                'nombre' => $registro->nombre
            );
        }
        $json = json_encode($resultado);
        echo $json;
    }
    catch (Exception $e)
    {
        die('Error de: '.$e->getMessage());
    }

?>