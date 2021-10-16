<?php
    include('opcionesController.php');
    //resivimos el metodo guardar
    if($_POST['registro'] == 'guardar'){
        $controlador = new OpcionController();
        
        $datos = array(
            "nombre" => $_POST['txt_nombre'],
            "descripcion" => $_POST['txt_descripcion']
        );

        $opcion = $_POST['opcion'];

        $query = "";

        //definos que opcion queremos guardar
        switch($opcion)
        {
            case "enfermedad": $query = "INSERT INTO tbl_enfermedad (nombre, descripcion) VALUES (?,?)"; break; 
            case "discapacidad": $query = "INSERT INTO tbl_discapacidad (nombre, descripcion) VALUES (?,?)"; break; 
            case "transporte": $query = "INSERT INTO tbl_transporte (nombre, descripcion) VALUES (?,?)"; break; 
            case "pared": $query = "INSERT INTO tbl_mp_pared (nombre, descripcion) VALUES (?,?)"; break; 
            case "techo": $query = "INSERT INTO tbl_mp_techo (nombre, descripcion) VALUES (?,?)"; break; 
            case "piso": $query = "INSERT INTO tbl_mp_piso (nombre, descripcion) VALUES (?,?)"; break; 
            case "mobiliario": $query = "INSERT INTO tbl_mobiliario (nombre, descripcion) VALUES (?,?)"; break; 
            case "servicio_basico": $query = "INSERT INTO tbl_servicio (nombre, descripcion) VALUES (?,?)"; break; 
            case "sanitario": $query = "INSERT INTO tbl_sanitario (nombre, descripcion) VALUES (?,?)"; break; 
            case "servicio_medico": $query = "INSERT INTO tbl_servicio_medico (nombre, descripcion) VALUES (?,?)"; break; 
            case "recreacion": $query = "INSERT INTO tbl_recreacion (nombre, descripcion) VALUES (?,?)"; break; 
            default: echo "no existe"; break;
        }

        if($controlador->guardar($query,$datos)){
            echo "exito";
        }else{
            echo "fallo";
        }
    }
?>