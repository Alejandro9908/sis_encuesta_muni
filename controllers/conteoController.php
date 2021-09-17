<?php
include ($_SERVER['DOCUMENT_ROOT']."/constantes.php");
include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
include_once ('conexion.php');

class conteoController{
   
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
}

?>