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
    include_once 'controllers/servicioMedicoController.php';

    $controladorMedico = new servicioMedicoController();
    $controlador = new reporteFamiliaController();

    $servicios_medicos = array();
    $servicios_medicos = $controladorMedico->listarSelect();

    $salud = array();
    $salud = $controlador->buscarServicioMedico($id_familia);

 
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
                <form role="form" name="edit-form-datos-salud" id="edit-form-datos-salud" method="POST"
                        action="controllers/prueba.php">
                        <div class="form-row-2">
                        <div class="form-item">
                            <label for="txt_servicio_medico" class="text-gray">Servicios Medicos <a href="#" id="addServicioMedico" class="btn color-primary" style="padding: 0px 2px;"><i class="las la-plus text-light"></i></a></label>
                            <select class="form-control" name="txt_servicio_medico-edit" id="txt_servicio_medico-edit">
                                    <?php 
                                    foreach ($servicios_medicos as $i){
                                    ?>
                                        <option <?php if($i['id_servicio_medico'] == $salud['id_servicio_medico']){?>selected <?php } ?> value="<?php echo $i['id_servicio_medico'];?>"><?php echo $i['nombre'];?></option>
                                    <?php 
                                    }//termina ciclo for
                                    ?>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_frecuencia_medico" class="text-gray">Fecuencia de uso de servicio medicos</label>
                            <select class="form-control" name="txt_frecuencia_medico-edit" id="txt_frecuencia_medico-edit">
                                <option value="" disabled>Seleccione una opción</option>
                                <option <?php if($salud['frecuencia_medico']=="una vez por semana"){?> selected <?php } ?> value="una vez por semana">Una vez por semana</option>
                                <option <?php if($salud['frecuencia_medico']=="mensualmente"){?> selected <?php } ?> value="mensualmente">Mensualmente</option>
                                <option <?php if($salud['frecuencia_medico']=="anualmente"){?> selected <?php } ?> value="anualmente">Anualmente</option>
                                <option <?php if($salud['frecuencia_medico']=="cuando se enferman"){?> selected <?php } ?> value="cuando se enferman">Cuando se enferman</option>
                            </select>
                        </div>
                    </div>
                    <div class="content-footer">
                        <div class="form-footer">    
                            <input type="hidden" name="editar" id="editar" value="salud">
                            <input type="hidden" name="id" id="id" value="<?php echo $id_familia; ?>">
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