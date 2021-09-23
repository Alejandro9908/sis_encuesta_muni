<?php 
    include_once 'controllers/sesiones.php';
    include_once 'views/layout/header.php';
    $id_familia = $_GET['id_familia'];
    if(!filter_var($id_familia,FILTER_VALIDATE_INT)){
      die('Error');
    }
    include_once 'views/layout/sidebar.php';
    include_once 'views/layout/topbar.php';
    include_once 'controllers/usuarioController.php';
    include_once 'controllers/reporteFamiliaController.php';

    $controladorMostrar = new reporteFamiliaController();
    $domicilio = array();
    $domicilio = $controladorMostrar->buscarDomicilio($id_familia);
    $domicilio['transportes'] = $controladorMostrar->buscarTransportes($domicilio['id_vivienda']);

    //print_r($domicilio);
    
?>



<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="box color-light">
                <div class="box-header">
                    <h2>Editar boleta</h2>
                    <div>
                        <a href="showFamilia.php?id_familia=<?php echo $id_familia ?>" class="btn color-danger text-light"><i class="las la-times"></i></a>
                    </div>   
                </div>
                <div class="form-contaniter">
                    <form role="form" name="edit-form-domicilio" id="edit-form-domicilio" method="POST"
                        action="controllers/boletaProcesos.php">
                    <div class="form-row-2">
                        <div class="form-item">
                            <label for="txt_sector" class="text-gray">Sector</label>
                            <select required class="form-control" name="txt_sector" id="txt_sector">
                                <option value="" disabled selected>Seleccione una opción</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_comunidad" class="text-gray">Comunidad</label>
                            <select class="form-control" name="txt_comunidad" id="txt_comunidad">
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_direccion" class="text-gray">Dirección</label>
                            <input type="text" id="txt_direccion" name="txt_direccion" required value="<?php echo $domicilio['direccion']; ?>" class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-item">
                            <label for="txt_numero_casa" class="text-gray">Numero de casa</label>
                            <input type="text" id="txt_numero_casa" name="txt_numero_casa" value="<?php echo $domicilio['numero_casa']; ?>" class="form-control"
                                placeholder="">
                        </div>
                    </div>
                    <div class="form-row-3">
                        <div class="form-item">
                            <label for="txt_colindantes" class="text-gray">Colindantes</label>
                            <input type="text" id="txt_colindantes" name="txt_colindantes" value="<?php echo $domicilio['colindantes']; ?>" class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-item">
                            <label for="txt_latitud" class="text-gray">Latitud</label>
                            <input type="text" id="txt_latitud" name="txt_latitud" value="<?php echo $domicilio['latitud']; ?>" class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-item">
                            <label for="txt_longitud" class="text-gray">Longitud</label>
                            <input type="text" id="txt_longitud" name="txt_longitud" value="<?php echo $domicilio['longitud']; ?>" class="form-control"
                                placeholder="">
                        </div>
                    </div>
                    <div class="form-row-2">
                        <div class="form-item">
                            <label for="txt_telefono" class="text-gray">Telefono</label>
                            <input type="text" id="txt_telefono" name="txt_telefono" value="<?php echo $domicilio['telefono']; ?>" class="form-control"
                                placeholder="">
                        </div>
                        <div class="form-item">
                            <label for="txt_transporte" class="text-gray">Medios de transporte para llegar al
                                domicilio <a href="#" id="addTransporte" class="btn color-primary" style="padding: 0px 2px;"><i class="las la-plus text-light"></i></a></label>
                            <select class="select-multiple" name="transportes[]" id="txt_transportes" multiple>

                            </select>
                        </div>
                    </div>
                    <div class="content-footer">
                        <div class="form-footer">
                            
                            <input type="hidden" name="registro" value="domicilio">
                            <input type="submit" value="Guardar Boleta" class="color-primary text-light">
                            <a href="showFamilia.php?id_familia=<?php echo $id_familia ?>"><input type="button" value="Cancelar" class="color-danger text-light"></a>

                        </div>
                    </div>
                    <!--Termina content-footer-->
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
    include_once ('views/layout/footer.php');
?>