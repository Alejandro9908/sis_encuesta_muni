<?php

include_once ($_SERVER['DOCUMENT_ROOT']."/constantes.php");

class Conexion{
    public $pdo;

    public function __construct()
    {
        try{

            $this->pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_BASE_DATOS, DB_USER, DB_PASS);

            
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e){
            echo "Error: " . $e->getMessage();
            die('Error'.$e->getMessage());
        }       
    }

}

?>