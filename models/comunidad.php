<?php
class Comunidad
{
    private $id_comunidad;
    private $nombre;
    private $descripcion;
    private $tipo;
    private $id_sector;
    private $estado;
    
    public function get($k){
        return $this->$k;
    }

    public function set($k, $v){
        return $this->$k = $v; 
    }
}
?>