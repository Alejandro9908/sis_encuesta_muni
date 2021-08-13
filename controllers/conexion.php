<?php

require_once ("../constantes.php");

class Conexion{
    public $pdo;

    public function Conexion()
    {
        try{
            $this->pdo = new PDO('mysql:host=localhost;dbname=db_encuesta_muni','root','');
            
            //$this->pdo = new PDO('mysql:host=localhost;dbname=db_encuesta_muni;port=8889','root','');
            //$this->pdo = new PDO("mysql:host={DB_HOST};dbname={DB_BASE_DATOS};port={DB_PORT}", DB_USER, DB_PASS);
            
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e){
            echo "Error: " . $e->getMessage();
            die('Error'.$e->getMessage());
        }       
    }

}

?>