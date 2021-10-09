<?php 
    include_once 'controllers/sesiones.php';
    include_once 'views/layout/header.php';
    $id_vivienda = $_GET['id_vivienda'];
    $id_familia = $_GET['id_familia'];
    if(!filter_var($id_vivienda,FILTER_VALIDATE_INT)){
      die('Error');
    }
    include_once 'views/layout/sidebar.php';
    include_once 'views/layout/topbar.php';
    include_once 'controllers/usuarioController.php';
    include_once 'controllers/reporteFamiliaController.php';
    include_once 'controllers/tenenciaController.php';
    include_once 'controllers/mpParedController.php';
    include_once 'controllers/mpTechoController.php';
    include_once 'controllers/mpPisoController.php';
    include_once 'controllers/servicioController.php';
    include_once 'controllers/mobiliarioController.php';
    include_once 'controllers/sanitarioController.php';

    $controlador = new reporteFamiliaController();
    $controladorTenencia = new tenenciaController();
    $controladorPared = new paredController();
    $controladorTecho = new techoController();
    $controladorPiso = new pisoController();
    $controladorServicio = new servicioController();
    $controladorMobiliario = new mobiliarioController();
    $controladorSanitario = new sanitarioController();

    $vivienda = array();
    $vivienda = $controlador->buscarVivienda($id_vivienda);
    $vivienda['mobiliarios'] = $controlador->buscarMobiliarios($id_vivienda);
    $vivienda['servicios'] = $controlador->buscarServiciosVivienda($id_vivienda);

    $listaTenencia = $controladorTenencia->listarSelect();
    $listaPared = $controladorPared->listarSelect();
    $listaTecho = $controladorTecho->listarSelect();
    $listaPiso = $controladorPiso->listarSelect();
    $listaServicio = $controladorServicio->listarSelect();
    $listaMobiliario = $controladorMobiliario->listarSelect();
    $listaSanitario = $controladorSanitario->listarSelect2();

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
                <form role="form" name="edit-form-vivienda" id="edit-form-vivienda" method="POST"
                        action="controllers/prueba.php">
                        <div class="form-row-4">
                        <div class="form-item">
                            <label for="txt_tenencia" class="text-gray">Tenencia</label>
                            <select class="form-control" name="txt_tenencia-edit" id="txt_tenencia-edit">
                                    <?php 
                                    foreach ($listaTenencia as $i){
                                    ?>
                                        <option <?php if($i['id_tenencia'] == $vivienda['id_tenencia']){?>selected <?php } ?> value="<?php echo $i['id_tenencia'];?>"><?php echo $i['nombre'];?></option>
                                    <?php 
                                    }//termina ciclo for
                                    ?>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_numero_dormitorios" class="text-gray">Numero de dormitorios</label>
                            <input type="number" id="txt_numero_dormitorios" name="txt_numero_dormitorios" value="<?php echo $vivienda['cantidad_cuartos']; ?>" class="form-control"
                                placeholder="" min="0">
                        </div>
        
                        <div class="form-item">
                            <label for="txt_sala" class="text-gray">¿Cuenta con sala?</label>
                            <select class="form-control" name="txt_sala" id="txt_sala">
                                <option <?php if($vivienda['sala'] == 1){?>selected <?php } ?> value="1">Si</option>
                                <option <?php if($vivienda['sala'] == 0){?>selected <?php } ?> value="0">No</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_comedor" class="text-gray">¿Cuenta con comedor?</label>
                            <select class="form-control" name="txt_comedor" id="txt_comedor">
                                <option <?php if($vivienda['comedor'] == 1){?>selected <?php } ?> value="1">Si</option>
                                <option <?php if($vivienda['comedor'] == 0){?>selected <?php } ?> value="0">No</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_cocina" class="text-gray">¿Cuenta con cocina?</label>
                            <select class="form-control" name="txt_cocina" id="txt_cocina">
                                <option <?php if($vivienda['cocina'] == 1){?>selected <?php } ?> value="1">Si</option>
                                <option <?php if($vivienda['cocina'] == 0){?>selected <?php } ?> value="0">No</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_banio_privado" class="text-gray">¿Cuenta con baño privado?</label>
                            <select class="form-control" name="txt_banio_privado" id="txt_banio_privado">
                                <option <?php if($vivienda['banio_privado'] == 1){?>selected <?php } ?> value="1">Si</option>
                                <option <?php if($vivienda['banio_privado'] == 0){?>selected <?php } ?> value="0">No</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_banio_colectivo" class="text-gray">¿Cuenta con baño colectivo?</label>
                            <select class="form-control" name="txt_banio_colectivo" id="txt_banio_colectivo">
                                <option <?php if($vivienda['banio_colectivo'] == 1){?>selected <?php } ?> value="1">Si</option>
                                <option <?php if($vivienda['banio_colectivo'] == 0){?>selected <?php } ?> value="0">No</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_metros_cuadrados" class="text-gray">Metros cuadrados de construcción</label>
                            <input type="number" id="txt_metros_cuadrados" name="txt_metros_cuadrados" class="form-control"
                                placeholder="" min="0" step="0.01" value="<?php echo $vivienda['metros_cuadrados']; ?>">
                        </div>
                    </div>
                    <div class="form-row-1">
                        <div class="form-item">
                            <label for="txt_observaciones_vivienda" class="text-gray">Observaciones</label>
                            <input type="text" id="txt_observaciones_vivienda" name="txt_observaciones_vivienda" value="<?php echo $vivienda['observaciones']; ?>" class="form-control"
                                placeholder="">
                        </div>
                    </div>
                    <div class="form-row-4">
                        <div class="form-item">
                            <label for="txt_pared" class="text-gray">Material predominante pared </label>
                            <select class="form-control" name="txt_pared-edit" id="txt_pared-edit">
                                    <?php 
                                    foreach ($listaPared as $i){
                                    ?>
                                        <option <?php if($i['id_mp_pared'] == $vivienda['id_pared']){?>selected <?php } ?> value="<?php echo $i['id_mp_pared'];?>"><?php echo $i['nombre'];?></option>
                                    <?php 
                                    }//termina ciclo for
                                    ?>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_techo" class="text-gray">Material predominante techo</label>
                            <select class="form-control" name="txt_techo-edit" id="txt_techo-edit">
                                    <?php 
                                    foreach ($listaTecho as $i){
                                    ?>
                                        <option <?php if($i['id_mp_techo'] == $vivienda['id_techo']){?>selected <?php } ?> value="<?php echo $i['id_mp_techo'];?>"><?php echo $i['nombre'];?></option>
                                    <?php 
                                    }//termina ciclo for
                                    ?>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_piso" class="text-gray">Material predominante piso</label>
                            <select class="form-control" name="txt_piso-edit" id="txt_piso-edit">
                                    <?php 
                                    foreach ($listaPiso as $i){
                                    ?>
                                        <option <?php if($i['id_mp_piso'] == $vivienda['id_piso']){?>selected <?php } ?> value="<?php echo $i['id_mp_piso'];?>"><?php echo $i['nombre'];?></option>
                                    <?php 
                                    }//termina ciclo for
                                    ?>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_mobiliario" class="text-gray">Mobiliario y equipo</label>
                            <select class="select-multiple" name="mobiliarios[]" id="txt_mobiliario-edit" multiple>
                                    <?php 
                                    foreach ($listaMobiliario as $i){
                                    ?>
                                        <option <?php   
                                        foreach($vivienda['mobiliarios'] as $m){
                                            if($i['id_mobiliario'] == $m['id_mobiliario']){ ?>
                                                selected
                                            <?php } 
                                        }
                                        ?> value="<?php echo $i['id_mobiliario'];?>"><?php echo $i['nombre'];?></option>
                                    <?php 
                                    }//termina ciclo for
                                    ?>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_servicio" class="text-gray">Servicio básico</label>
                            <select class="select-multiple" name="servicios[]" id="txt_servicio-edit" multiple>
                                    <?php 
                                    foreach ($listaServicio as $i){
                                    ?>
                                        <option <?php   
                                        foreach($vivienda['servicios'] as $s){
                                            if($i['id_servicio'] == $s['id_servicio']){ ?>
                                                selected
                                            <?php } 
                                        }
                                        ?> value="<?php echo $i['id_servicio'];?>"><?php echo $i['nombre'];?></option>
                                    <?php 
                                    }//termina ciclo for
                                    ?>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_sanitario" class="text-gray">Tipo de sanitario</label>
                            <select class="form-control" name="txt_sanitario" id="txt_sanitario-edit">
                                    <?php 
                                    foreach ($listaSanitario as $i){
                                    ?>
                                        <option <?php if($i['id_sanitario'] == $vivienda['id_sanitario']){?>selected <?php } ?> value="<?php echo $i['id_sanitario'];?>"><?php echo $i['nombre'];?></option>
                                    <?php 
                                    }//termina ciclo for
                                    ?>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_eliminacion_basura" class="text-gray">Eliminación de basura</label>
                            <input type="text" id="txt_eliminacion_basura" name="txt_eliminacion_basura" value="<?php echo $vivienda['eliminacion_basura']; ?>" class="form-control"
                                placeholder="">
                        </div>
                    </div>
                    <div class="content-footer">
                        <div class="form-footer">    
                            <input type="hidden" name="editar" id="editar" value="vivienda">
                            <input type="hidden" name="id" id="id" value="<?php echo $vivienda['id_vivienda']; ?>">
                            <input type="submit" value="Guardar Boleta" id="editar-form" class="color-primary text-light">
                            <a href="showFamilia.php?id_familia=<?php echo $id_familia ?>"><input type="button" value="Cancelar" class="color-danger text-light"></a>
                        </div>
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
    include_once ('views/layout/footer.php');
?>

<script type="text/javascript">

    $(document).ready(function(){

    });
   
</script>