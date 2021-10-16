<?php
    include('comunidadController.php');
    
    
    if($_POST['registro'] == 'guardar'){
        $controlador = new ComunidadController();
        $c = new Comunidad();

        $c->set('nombre',$_POST['txt_nombre']);
        $c->set('descripcion',$_POST['txt_descripcion']);
        $c->set('tipo',$_POST['txt_tipo']);
        $c->set('id_sector',$_POST['txt_sector']);
        

        if($controlador->guardar($c)){
            echo "exito";
        }else{
            echo "fallo";
        }

    } 

    if($_POST['registro'] == 'editar'){

        $controlador = new ComunidadController();
        $c = new Comunidad();

        $c->set('id_comunidad',$_POST['txt_id']);
        $c->set('nombre',$_POST['txt_nombre']);
        $c->set('descripcion',$_POST['txt_descripcion']);
        $c->set('tipo',$_POST['txt_tipo']);
        $c->set('id_sector',$_POST['txt_sector']);

        if($controlador->editar($c)){
            echo "exito";
        }else{
            echo "fallo";
        }
    }

    if($_POST['registro'] == 'inactivar'){
        $controlador = new ComunidadController();

        $id = $_POST['txt_id'];
         
        if($controlador->inactivar($id)){
                echo "exito";
        }else{
                echo "fallo";
        }
    }

    if($_POST['registro'] == 'activar'){
        $controlador = new ComunidadController();

        $id = $_POST['txt_id'];
         
        if($controlador->activar($id)){
                echo "exito";
        }else{
                echo "fallo";
        }
    }

?>