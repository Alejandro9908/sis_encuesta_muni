<?php
    include('usuarioController.php');
    
    
    if($_POST['registro'] == 'guardar'){
        $controlador = new UsuarioController();
        $u = new Usuario();

        $u->set('nombre',$_POST['txt_nombre']);
        $u->set('usuario',$_POST['txt_usuario']);
        $u->set('rol',$_POST['txt_rol']);
        $pass = $_POST['txt_password'];
        $confirmar = $_POST['txt_confirmar'];

        if($pass == $confirmar){
            $opciones = array ('cost' => 12);
            $password_hashed = password_hash($pass, PASSWORD_BCRYPT, $opciones);

            $u->set('password',$password_hashed);

            if($controlador->guardar($u)){
                echo "exito";
            }else{
                echo "fallo";
            }
        }else{
            echo "no es igual";
        }

    } 

    if($_POST['registro'] == 'editar'){

        $controlador = new UsuarioController();
        $u = new Usuario();
        $u->set('id_usuario',$_POST['txt_id']);
        $u->set('nombre',$_POST['txt_nombre']);
        $u->set('usuario',$_POST['txt_usuario']);
        $u->set('rol',$_POST['txt_rol']);

        if($controlador->editar($u)){
            echo "exito";
        }else{
            echo "fallo";
        }
    }


    if($_POST['registro'] == 'editarPassword'){
        $controlador = new UsuarioController();

        $id = $_POST['txt_id'];
        $password = $_POST['txt_pass'];
        $confirmar = $_POST['txt_confirmar'];
        
        if($password == $confirmar){
            $opciones = array ('cost' => 12);
            $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);
            
            if($controlador->editarPassword($id, $password_hashed)){
                echo "exito";
            }else{
                echo "fallo";
            }
        }else{
            echo "no es igual";
        }
        
    }

    if($_POST['registro'] == 'inactivar'){
        $controlador = new UsuarioController();

        $id = $_POST['txt_id'];
         
        if($controlador->inactivar($id)){
                echo "exito";
        }else{
                echo "fallo";
        }
    }

    if($_POST['registro'] == 'activar'){
        $controlador = new UsuarioController();

        $id = $_POST['txt_id'];
         
        if($controlador->activar($id)){
                echo "exito";
        }else{
                echo "fallo";
        }
    }

    if($_POST['registro'] == 'login'){
        $controlador = new UsuarioController();

        $usuario = $_POST['txt_usuario'];
        $pass = $_POST['txt_password'];

        $resultado = $controlador->login($usuario, $pass);

        if($resultado == "exito"){
            die("exito");
        }else if ($resultado == "fallo"){
            die("fallo");
        }
    }
    

?>