<?php 
    include_once 'controllers/sesiones.php';
    include_once 'views/layout/header.php';
    include_once 'views/layout/sidebar.php';
    include_once 'views/layout/topbar.php';
    include_once 'controllers/usuarioController.php';

    $controlador = new UsuarioController();
    
    $roles = array();
    $roles = $controlador->listarRoles();

    
?>


<div class="content-wrapper">
    <div class="box-header">
        <h2>Usuarios</h2>
        <div>
            <p style="font-size: small; color: red;">* Campo Obligatorio</p>
        </div>
    </div>
    <!--Termina content-heaer-->

    <div class="content">
        <div class="row">
            <div class="box color-light">
                <div class="box-header">
                    <h2>Nuevo Usuario</h2>
                    <div>
                        <a href="indexUsuario.php" class="btn color-danger text-light"><i class="las la-times"></i></a>
                    </div>   
                </div>
                <div class="form-container">
                    <form role="form" name="crearRegistro" id="crearRegistro" method="POST" action="controllers/usuarioProcesos.php">
                        <div class="form-row-2">
                            <div class="form-item">
                                <label for="txt_nombre" class="text-gray">Nombre Completo <span style="color: red;">*</span></label>
                                <input type="text" id="txt_nombre" name="txt_nombre" required value="" class="form-control"
                                placeholder="Ingresar nombre completo">
                            </div>
                            <div class="form-item">
                                <label for="txt_usuario" class="text-gray">Usuario <span style="color: red;">*</span></label>
                                <input type="text" id="txt_usuario" name="txt_usuario" required value="" class="form-control"
                                placeholder="Nombre de usuario">
                            </div>
                            <div class="form-item">
                                <label for="txt_rol" class="text-gray">Rol de usuario <span style="color: red;">*</span></label>
                                <select class="form-control" name="txt_rol" id="txt_rol" required>
                                  
                                    <?php 
                                    foreach ($roles as $r){
                                    ?>
                                        <option value="<?php echo $r->get('id_rol');?>"><?php echo $r->get('nombre');?></option>
                                    <?php 
                                    }//termina ciclo for
                                    ?>
                                </select>
                            </div>
                            <div class="form-item">
                                <label for="txt_password" class="text-gray">Contrase??a <span style="color: red;">*</span></label>
                                <input type="password" id="txt_password" name="txt_password" required value="" class="form-control"
                                placeholder="Minimo 6 caracteres" minlength="6">
                            </div>
                            <div class="form-item">
                                <label for="txt_confirmar" class="text-gray">Confirmar contrase??a <span style="color: red;">*</span></label>
                                <input type="password" id="txt_confirmar"  name="txt_confirmar" required value="" class="form-control"
                                placeholder="Minimo 6 caracteres" minlength="6">
                            </div>
                        </div>
                        <div class="form-footer">
                            <input type="hidden" name="registro" value="guardar">   
                            <input type="submit" value="Guardar" class="color-primary text-light">
                            <a href="indexUsuario.php"><input type="button" value="Cancelar" class="color-danger text-light"></a>
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