<?php
    include('editarBoleta.php');


    if($_POST['editar'] == 'domicilio'){
        $controlador = new EditarBoletaController();
        
        $domicilio =  array();
        $domicilio = json_decode($_POST["domicilio"], true);

        $id_vivienda = $_POST['id_vivienda'];

        $controlador->editarDomicilio($id_vivienda, $domicilio);
    }

    if($_POST['editar'] == 'alimentacion'){
        $controlador = new EditarBoletaController();
        
        $alimentacion =  array();
        $alimentacion = json_decode($_POST["alimentacion"], true);

        $id_familia = $_POST['id_familia'];

        $controlador->editarAlimentacion($id_familia, $alimentacion);
    }

    if($_POST['editar'] == 'egreso'){
        $controlador = new EditarBoletaController();
        
        $egreso =  array();
        $egreso = json_decode($_POST["egreso"], true);

        $id_familia = $_POST['id_familia'];

        $controlador->editarEgreso($id_familia, $egreso);
    }

    if($_POST['editar'] == 'datos-boleta'){
        $controlador = new EditarBoletaController();
        
        $datosBoleta =  array();
        $datosBoleta = json_decode($_POST["datosBoleta"], true);

        $id_boleta = $_POST['id_boleta'];

        $controlador->editarDatosBoleta($id_boleta, $datosBoleta);
    }

    if($_POST['editar'] == 'salud'){
        $controlador = new EditarBoletaController();
        
        $salud =  array();
        $salud = json_decode($_POST["salud"], true);

        $id_familia = $_POST['id_familia'];

        $controlador->editarSalud($id_familia, $salud);
    }

    if($_POST['editar'] == 'recreacion'){
        $controlador = new EditarBoletaController();
        
        $recreacion =  array();
        $recreacion = json_decode($_POST["recreacion"], true);

        $id_familia = $_POST['id_familia'];

        $controlador->editarRecreaciones($id_familia, $recreacion);
    }

    if($_POST['editar'] == 'vivienda'){
        $controlador = new EditarBoletaController();
        
        $vivienda =  array();
        $vivienda = json_decode($_POST["vivienda"], true);

        $id_vivienda = $_POST['id_vivienda'];

        $controlador->editarVivienda($id_vivienda, $vivienda);
    }

    if($_POST['editar'] == 'persona'){
        $controlador = new EditarBoletaController();
        
        $persona =  array();
        $persona = json_decode($_POST["persona"], true);
        $id_persona = $_POST['id_persona'];

        $controlador->editarPersona($id_persona, $persona);
    }

?>