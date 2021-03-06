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

    $controlador = new UsuarioController();

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
                    <h2>Mi Usuario</h2>
                    <div>
                    </div>   
                </div>
                <div class="form-container">
                    <form role="form" name="crearRegistro" id="crearRegistro" method="POST" action="controllers/usuarioProcesos.php">
                        <div class="form-row-2">
                            <div class="form-item">
                                <label for="txt_nombre" class="text-gray">Nombre Completo</label>
                                <input type="text" id="txt_nombre" name="txt_nombre" readonly="readonly" value="<?php echo $resultado->get('nombre');?>" class="form-control"
                                placeholder="Ingresar nombre completo">
                            </div>
                            <div class="form-item">
                                <label for="txt_usuario" class="text-gray">Usuario</label>
                                <input type="text" id="txt_usuario" name="txt_usuario" readonly="readonly" value="<?php echo $resultado->get('usuario');?>" class="form-control"
                                placeholder="Nombre de usuario">
                            </div>
                            <div class="form-item">
                                <label for="txt_rol" class="text-gray">Rol de usuario</label>
                                <input type="text" id="txt_rol" name="txt_rol" readonly="readonly" value="<?php if($resultado->get('rol')== "1"){echo "normal";}else if($resultado->get('rol')== "2"){echo "administrador";}else{echo "super administrador";}?>" class="form-control"
                                placeholder="Nombre de usuario">
                            </div>
                            <div class="form-item">
                                <label for="txt_estado" class="text-gray">Estado</label>
                                <input type="text" id="txt_estado" name="txt_estado" readonly="readonly" value="<?php if($resultado->get('estado')== "1"){echo "Activo";}else{echo "De baja";} ?>" class="form-control"
                                placeholder="estado">
                            </div>
                            <div class="form-item">
                                <label for="txt_fecha_commit" class="text-gray">Fecha de creaci??n</label>
                                <input type="text" id="txt_fecha_commit" name="txt_fecha_commit" readonly="readonly" value="<?php echo $resultado->get('fecha_commit');?>" class="form-control">
                            </div>
                            <div class="form-item">
                                <label for="txt_fecha_update" class="text-gray">Fecha de ultima actualizaci??n</label>
                                <input type="text" id="txt_fecha_update" name="txt_fecha_update" readonly="readonly" value="<?php echo $resultado->get('fecha_update');?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-footer">
        
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