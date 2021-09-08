<?php 
include_once ('../conexion.php');

    try
    {
        $conexion = new Conexion();
        $resultado = array();
        $sql = "SELECT * FROM tbl_sector ORDER BY nombre ASC";
        $stmt = $conexion->pdo->prepare($sql);
        $stmt->execute();
       
        foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
        {

            $resultado[] = array(
                'id_opcion' => $registro->id_sector,
                'nombre' => $registro->nombre,
                'descripcion' => $registro->descripcion
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