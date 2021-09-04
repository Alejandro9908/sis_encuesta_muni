<?php 
    include_once 'controllers/sesiones.php';
    include_once 'views/layout/header.php';
    include_once 'views/layout/sidebar.php';
    include_once 'views/layout/topbar.php';
    include_once 'controllers/comunidadController.php';

    $controlador = new comunidadController();

    
?>


<div class="content-wrapper">
    <div class="content-header">
        <h2>Comunidades</h2>
    </div>
    <!--Termina content-heaer-->

    <div class="content">
        <div class="row">
            <div class="box color-light">
                <div class="box-header">
                    <h2>Nueva Comunidad</h2>
                    <div>
                        <a href="indexComunidad.php" class="btn color-danger text-light"><i class="las la-times"></i></a>
                    </div>   
                </div>
                <div class="form-container">
                    <form role="form" name="crearRegistro" id="crearRegistro" method="POST" action="controllers/comunidadProcesos.php">
                        <div class="form-row-2">
                            <div class="form-item">
                                <label for="txt_nombre" class="text-gray">Nombre </label>
                                <input type="text" id="txt_nombre" name="txt_nombre" required value="" class="form-control"
                                placeholder="Ingresar nombre">
                            </div>
                            <div class="form-item">
                                <label for="txt_descripcion" class="text-gray">Descripcion</label>
                                <input type="text" id="txt_descripcion" name="txt_descripcion" required value="" class="form-control"
                                placeholder="Ingrese una descripcion">
                            </div>
                            <div class="form-item">
                            <label for="txt_tipo" class="text-gray">Tipo</label>
                                <input type="text" id="txt_tipo" name="txt_tipo" required value="" class="form-control"
                                placeholder="Indique el tipo de comunidad">
                            </div>
                            <div class="form-row-2">
                            <div class="form-item">
                                <label for="txt_sector" class="text-gray">Sector <a href="indexComunidad.php" class="btn color-primary" style="padding: 0px 2px;"><i class="las la-plus text-light"></i></a></label>
                                <select class="select-multiple" name="sector[]" id="txt_sector" multiple>
                                    <option value="1">Sector 1</option>
                                    <option value="2">Sector 2</option>
                                    <option value="3">Sector 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-footer">
                            <input type="hidden" name="registro" value="guardar">   
                            <input type="submit" value="Guardar" class="color-primary text-light">
                            <a href="indexComunidad.php"><input type="button" value="Cancelar" class="color-danger text-light"></a>
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