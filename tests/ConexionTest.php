<?php 

declare(strict_types=1);
use PHPUnit\Framework\TestCase;

define('UBICACION_PROYECTO', 'sis_encuesta_muni');
define('DB_HOST', '127.0.0.1');
define('DB_BASE_DATOS', 'db_encuesta_muni');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_PORT', '8000');

final class ConexionTest extends TestCase
{
    public function testConexion(): void
    {
        $bandera = false;
        $mensaje = '';

        try{
            $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_BASE_DATOS, DB_USER, DB_PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $bandera = true;
        } catch (\Exception $e){
            $mensaje = "Error: " . $e->getMessage();
        }

        $this->assertEquals($bandera, true, $mensaje);
    }
}
