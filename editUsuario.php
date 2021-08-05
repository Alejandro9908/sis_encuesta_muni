<?php 
    include_once 'controllers/sesiones.php';
    include_once 'views/layout/header.php';
    $id = $_GET['id_usuario'];
    if(!filter_var($id,FILTER_VALIDATE_INT)){
      die('Error');
    }
    include_once 'views/layout/sidebar.php';
    include_once 'views/layout/topbar.php';
    include_once 'controllers/usuarioController.php';

    $controlador = new usuarioController();

    $roles = array();
    $roles = $controlador->listarRoles();

    $resultado = $controlador->buscarUsuario($id);
    
?>



<div class="content-wrapper">
    <div class="content-header">
        <h2>Usuarios</h2>
    </div>
    <!--Termina content-heaer-->

    <div class="content">
        <div class="row">
            <div class="box color-light">
                <div class="box-header">
                    <h2>Editar Usuario</h2>
                    <div>
                        <a href="indexUsuario.php" class="btn color-danger text-light"><i class="las la-times"></i></a>
                    </div>   
                </div>
                <div class="form-container">
                    <form role="form" name="editarRegistro" id="editarRegistro" method="POST" action="controllers/usuarioProcesos.php">
                        <div class="form-row-2">
                            <div class="form-item">
                                <label for="txt_nombre" class="text-gray">Nombre Completo</label>
                                <input type="text" id="txt_nombre" name="txt_nombre" required value="<?php echo $resultado->get('nombre');?>" class="form-control"
                                placeholder="Ingresar nombre completo">
                            </div>
                            <div class="form-item">
                                <label  for="txt_usuario" class="text-gray">Usuario</label>
                                <input type="text" id="txt_usuario" name="txt_usuario" required value="<?php echo $resultado->get('usuario');?>" class="form-control"
                                placeholder="Nombre de usuario">
                            </div>
                            <div class="form-item">
                                <label for="txt_rol" class="text-gray">Rol de usuario</label>
                                <select class="form-control" name="txt_rol" id="txt_rol">
                                    <?php 
                                    foreach ($roles as $r){
                                    ?>
                                        <option <?php if($r->get('id_rol') == $resultado->get('rol')){?>selected <?php } ?> value="<?php echo $r->get('id_rol');?>"><?php echo $r->get('nombre');?></option>
                                    <?php 
                                    }//termina ciclo for
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-footer">
                            <input type="hidden" name="registro" value="editar">
                            <input type="hidden" name="txt_id" value="<?php echo $resultado->get('id_usuario');?>">      
                            <input type="submit" value="Guardar" class="color-primary text-light">
                            <a href="indexUsuario.php"><input type="button" value="Cancelar" class="color-danger text-light"></a>
                            <a href="#" product="<?php echo $resultado->get('id_usuario');?>" class="cambiar_password"><input type="button" value="Cambiar contraseña" class="color-info text-light"></a>
                        </div>
                    </form>
                </div>
            </div>
        
        </div>
        <!--Termina row-->

        <div class="content-footer">

        </div>
        <!--Termina content-footer-->
    </div>
    <!--Termina content-->
</div>
<!--Termina content-wraper-->

<?php 
    include_once 'views/layout/footer.php';
?>