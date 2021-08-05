<?php
class Rol
{
    private $id_rol;
    private $nombre;
    private $descripcion;
    
    public function get($k){
        return $this->$k;
    }

    public function set($k, $v){
        return $this->$k = $v; 
    }
}
?>