<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/models/opcion.php');
include_once ('conexion.php');

class pisoController{

    public function contarRegistros($buscar){

        try
        {
            $conexion = new Conexion();
            $sql = "SELECT COUNT(*) AS total_registros FROM tbl_mp_piso WHERE
                    (id_mp_piso LIKE '%$buscar%' OR nombre LIKE '%$buscar%')";
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
            $sql = "SELECT * FROM tbl_mp_piso WHERE
                    (id_mp_piso LIKE '%$buscar%' OR nombre LIKE '%$buscar%') ORDER BY nombre ASC LIMIT $desde, $hasta";
            $stmt = $conexion->pdo->prepare($sql);
            $stmt->execute();

            foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $registro)
            {
                $o = new Opcion();

                $o->set('id_opcion', $registro->id_mp_piso);
                $o->set('nombre', $registro->nombre);
                $o->set('descripcion', $registro->descripcion);

                $resultado[] = $o;
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
            $sql = $conexion->pdo->prepare("SELECT * FROM tbl_mp_piso WHERE id_mp_piso = ?;");
            $sql->execute(array($id));

            $registro = $sql->fetch(PDO::FETCH_OBJ);

            $o = new Opcion();

            $o->set('id_opcion', $registro->id_mp_piso);
            $o->set('nombre', $registro->nombre);
            $o->set('descripcion', $registro->descripcion);

            return $o;


            return $resultado;
        }
        catch (Exception $e)
        {
            die('Error: '.$e->getMessage());
        }
    }

    public function guardar(Opcion $o){
        try
        {
            $sql = "INSERT INTO tbl_mp_piso (nombre, descripcion) VALUES (?,?)";

            $conexion = new Conexion();
            $resultado = $conexion->pdo->prepare($sql)->execute(
                array(
                    $o->get('nombre'),
                    $o->get('descripcion')
                )
            );

            return $resultado;
        }
        catch (Exception $e)
        {
            echo "error";
        }
    }

    public function editar(Opcion $o)
    {
        try
        {
            $conexion = new Conexion();
            $sql = "UPDATE tbl_mp_piso SET nombre=?, descripcion=? WHERE id_mp_piso=?";

            $resultado = $conexion->pdo->prepare($sql)->execute(
                array(
                  $o->get('nombre'),
                  $o->get('descripcion'),
                  $o->get('id_opcion')
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
            $sql = "DELETE FROM tbl_mp_piso WHERE id_mp_piso=?";

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
