<?php
    include('tenenciaController.php');


    if($_POST['registro'] == 'guardar'){
        $controlador = new tenenciaController();
        $o = new Opcion();

        $o->set('nombre',$_POST['txt_nombre']);
        $o->set('descripcion',$_POST['txt_descripcion']);

        if($controlador->guardar($o)){
            echo "exito";
        }else{
            echo "fallo";
        }
    }

    if($_POST['registro'] == 'editar'){

        $controlador = new tenenciaController();
        $o = new Opcion();
        $o->set('id_opcion',$_POST['txt_id']);
        $o->set('nombre',$_POST['txt_nombre']);
        $o->set('descripcion',$_POST['txt_descripcion']);

        if($controlador->editar($d)){
            echo "exito";
        }else{
            echo "fallo";
        }
    }

    if($_POST['registro'] == 'eliminar'){
        $controlador = new tenenciaController();

        $id = $_POST['txt_id'];

        if($controlador->eliminar($id)){
                echo "exito";
        }else{
                echo "fallo";
        }
    }

?>