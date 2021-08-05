<?php 
    
    include_once 'controllers/sesiones.php';
    include_once 'views/layout/header.php';
    include_once 'views/layout/sidebar.php';
    include_once 'views/layout/topbar.php';
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
                    <h2>Nuevo Usuario</h2>
                    <div>
                        <a href="indexUsuario.php" class="btn color-danger text-light">×</a>
                    </div>   
                </div>
                <div class="form-container">
                    <form role="form" name="crearRegistro" id="crearRegistro" method="POST" action="controllers/usuarioProcesos.php">
                        <div class="form-row-2">
                            <div class="form-item">
                                <label for="txt_nombre" class="text-gray">Nombre Completo</label>
                                <input type="text" id="txt_nombre" name="txt_nombre" required value="" class="form-control"
                                placeholder="Ingresar nombre completo">
                            </div>
                            <div class="form-item">
                                <label for="txt_usuario" class="text-gray">Usuario</label>
                                <input type="text" id="txt_usuario" name="txt_usuario" required value="" class="form-control"
                                placeholder="Nombre de usuario">
                            </div>
                            <div class="form-item">
                                <label for="txt_rol" class="text-gray">Rol de usuario</label>
                                <select class="form-control" name="txt_rol" id="txt_rol">
                                    <option value="1">Usuario normal</option>
                                    <option value="2">Usuario Administrador</option>
                                </select>
                            </div>
                            <div class="form-item">
                                <label for="txt_password" class="text-gray">Contraseña</label>
                                <input type="password" id="txt_password" name="txt_password" required value="" class="form-control"
                                placeholder="Minimo 8 caracteres">
                            </div>
                        </div>
                        <div class="form-footer">
                            <input type="hidden" name="registro" value="guardar">   
                            <input type="submit" value="Guardar" class="color-primary text-light">
                            <input type="reset" value="Cancelar" class="color-danger text-light">
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