<?php

class Conexion{
    public $pdo;

    public function Conexion()
    {
        try{
            $this->pdo = new PDO('mysql:host=localhost;dbname=db_encuesta_muni','root','');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e){
            die('Error'.$e->getMessage());
        }       
    }

}

?>