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

    $controlador = new ReporteFamiliaController();

    $datos_boleta = array();
    $datos_boleta = $controlador->buscardatosboleta($id_familia);

    $fecha_mostrar = date("Y-m-d", strtotime($datos_boleta['fecha_aplicacion']));

 
?>




<div class="content-wrapper">
    <div class="box-header">
        <h2>Editar boleta</h2>
        <div>
            <p style="font-size: small; color: red;">* Campo Obligatorio</p>
        </div>
    </div>
    <!--Termina content-heaer-->
    <div class="content">
        <div class="row">
            <div class="box color-light">
                <div class="box-header">
                    <h2>Datos de la boleta</h2>
                    <div>
                        <a href="showFamilia.php?id_familia=<?php echo $id_familia ?>" class="btn color-danger text-light"><i class="las la-times"></i></a>
                    </div>   
                </div>
                <div class="form-contaniter">
                <form role="form" name="edit-form-datos-boleta" id="edit-form-datos-boleta" method="POST"
                        action="controllers/prueba.php">
                    <div class="form-row-1">
                        <div class="form-item">
                            <label for="txt_observaciones_encuesta" class="text-gray">Observaciones</label>
                            <input type="text" id="txt_observaciones_encuesta" name="txt_observaciones_encuesta" value="<?php echo $datos_boleta['observaciones'] ?>"
                            class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-row-2">
                        <div class="form-item">
                            <label for="txt_evaluador" class="text-gray">Evaluador <span style="color: red;">*</span></label>
                            <input type="text" id="txt_evaluador" required name="txt_evaluador" value="<?php echo $datos_boleta['evaluador'] ?>"
                            class="form-control" placeholder="" >
                        </div>
                        <div class="form-item">
                            <label for="txt_fecha_evaluacion" class="text-gray">Fecha de evaluación <span style="color: red;">*</span></label>
                            <input type="date" id="txt_fecha_evaluacion" required name="txt_fecha_evaluacion" value="<?php echo $fecha_mostrar ?>"
                            class="form-control" placeholder="">
                        </div>
                        <div class="form-item">
                            <input type="hidden" id="txt_usuario" name="txt_usuario" required value="<?php echo $_SESSION['id_usuario'] ?>"
                            class="form-control" placeholder="" >
                        </div>
                    </div>
                    <div class="content-footer">
                        <div class="form-footer">    
                            <input type="hidden" name="editar" id="editar" value="datos-boleta">
                            <input type="hidden" name="id" id="id" value="<?php echo $datos_boleta['id_boleta']; ?>">
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