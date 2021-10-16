<?php
class Usuario
{
    public function get($k){
        return $this->$k;
    }

    public function set($k, $v){
        return $this->$k = $v; 
    }
}
?>