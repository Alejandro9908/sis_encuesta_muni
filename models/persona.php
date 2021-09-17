<?php
class Persona
{
    private $id_persona;
    private $id_familia;
    private $entrevistado;
    private $dpi;
    private $nombres;
    private $primer_apellido;
    private $segundo_apellido;
    private $sexo;
    private $fecha_nacimiento;
    private $perentesco;
    private $edad;
    private $estado_civil;
    private $escolaridad;
    private $ocupacion;
    private $gestacion;
    private $semanas_gestacion;
    private $telefono;
    private $ingreso_mensual;
    private $enfermedades = array();
    private $discapacidades = array();
    
    public function get($k){
        return $this->$k;
    }

    public function set($k, $v){
        return $this->$k = $v; 
    }
}
?>