<?php
class Usuario
{
    private $id_usuario;
    private $nombre;
    private $usuario;
    private $rol;
    private $password;
    private $estado;
    private $fecha_commit;
    private $fecha_update;

    public function get($k){
        return $this->$k;
    }

    public function set($k, $v){
        return $this->$k = $v; 
    }
}
?>