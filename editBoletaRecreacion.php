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
                    <h2>Editar boleta: Recreaciones y uso del tiempo libre</h2>
                    <div>
                        <a href="showFamilia.php?id_familia=<?php echo $id_familia ?>" class="btn color-danger text-light"><i class="las la-times"></i></a>
                    </div>   
                </div>
                <div class="form-contaniter">
                <form role="form" name="edit-form-recreacion" id="edit-form-recreacion" method="POST"
                        action="controllers/prueba.php">
                    <div class="form-row-1">
                        <div class="form-item">
                            <label for="txt_recreacion" class="text-gray">Activiades familiariares del fin de semana </label>
                            <select class="select-multiple" name="recreaciones[]" id="txt_recreacion" multiple>
                            </select>
                        </div>
                    </div>
                    <div class="content-footer">
                        <div class="form-footer">    
                            <input type="hidden" name="editar" id="editar" value="recreacion">
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