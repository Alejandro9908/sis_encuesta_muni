<?php

include_once ('conexion.php');
//clase para guardar añadir nuevas opciones en create boleta
class OpcionController{

    public function guardar($query, $datos){
        //añadir nuevas opciones 
        try
        {
            //recibimos el query
            $conexion = new Conexion();
            //mandamos los datos en el execute
            $resultado = $conexion->pdo->prepare($query)->execute(array(
                $datos['nombre'],
                $datos['descripcion']
            ));

            return $resultado;
        }
        catch (Exception $e)
        {
            echo "-error: ".$e;
        }
    }

    public function listarSelect($query)
    {
        try
        {
            $conexion = new Conexion();
            $stmt = $conexion->pdo->prepare($query);
            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;
        }
        catch (Exception $e)
        {
            die('Error de: '.$e->getMessage());
        }
    }

}

?>
