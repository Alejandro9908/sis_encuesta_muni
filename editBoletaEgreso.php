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

    $controlador = new reporteFamiliaController();

    $egreso = array();
    $egreso = $controlador->buscarEgreso($id_familia);
 
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
                <form role="form" name="edit-form-egreso" id="edit-form-egreso" method="POST"
                        action="controllers/prueba.php">
                    <div class="form-row-4">
                        <div class="form-item">
                            <label for="txt_alimentacion" class="text-gray">Alimentación</label>
                            <input type="number" step="0.01" id="txt_alimentacion" name="txt_alimentacion" required value="<?php echo $egreso['alimentacion']; ?>" class="form-control"
                                placeholder="" min="0.00">
                        </div>
                        <div class="form-item">
                            <label for="txt_gas" class="text-gray">Gas o combustible</label>
                            <input type="number" step="0.01" id="txt_gas" name="txt_gas" value="<?php echo $egreso['combustible']; ?>" class="form-control"
                                placeholder="" min="0.00">
                        </div>
        
                        <div class="form-item">
                            <label for="txt_renta" class="text-gray">Renta</label>
                            <input type="number" step="0.01" id="txt_renta" name="txt_renta" value="<?php echo $egreso['renta']; ?>" class="form-control"
                                placeholder="" min="0.00">
                        </div>
                        <div class="form-item">
                            <label for="txt_agua" class="text-gray">Agua</label>
                            <input type="number" step="0.01" id="txt_agua" name="txt_agua" value="<?php echo $egreso['agua']; ?>" class="form-control"
                                placeholder="" min="0.00">
                        </div>
                        <div class="form-item">
                            <label for="txt_electricidad" class="text-gray">Electricidad</label>
                            <input type="number" step="0.01" id="txt_electricidad" name="txt_electricidad" value="<?php echo $egreso['electricidad']; ?>" class="form-control"
                                placeholder="" min="0.00">
                        </div>
                        <div class="form-item">
                            <label for="txt_telefono_residencial" class="text-gray">Telefono Residencial</label>
                            <input type="number" step="0.01" id="txt_telefono_residencial" name="txt_telefono_residencial" value="<?php echo $egreso['telefono residencial']; ?>" class="form-control"
                                placeholder="" min="0.00">
                        </div>
                        <div class="form-item">
                            <label for="txt_telefono_celular" class="text-gray">Telefono Celular</label>
                            <input type="number" step="0.01" id="txt_telefono_celular" name="txt_telefono_celular" value="<?php echo $egreso['celular']; ?>" class="form-control"
                                placeholder="" min="0.00">
                        </div>
                        <div class="form-item">
                            <label for="txt_transporte" class="text-gray">Transporte</label>
                            <input type="number" step="0.01" id="txt_transporte" name="txt_transporte" value="<?php echo $egreso['transporte']; ?>" class="form-control"
                                placeholder="" min="0.00">
                        </div>
                        <div class="form-item">
                            <label for="txt_educacion" class="text-gray">Educación</label>
                            <input type="number" step="0.01" id="txt_educacion" name="txt_educacion" value="<?php echo $egreso['educacion']; ?>" class="form-control"
                                placeholder="" min="0.00">
                        </div>
                        <div class="form-item">
                            <label for="txt_medicos" class="text-gray">Gastos Médicos</label>
                            <input type="number" step="0.01" id="txt_medicos" name="txt_medicos" value="<?php echo $egreso['medico']; ?>" class="form-control"
                                placeholder="" min="0.00">
                        </div>
                        <div class="form-item">
                            <label for="txt_gastos_recreacion" class="text-gray">Recreación</label>
                            <input type="number" step="0.01" id="txt_gastos_recreacion" name="txt_gastos_recreacion" value="<?php echo $egreso['recreacion']; ?>" class="form-control"
                                placeholder="" min="0.00">
                        </div>
                        <div class="form-item">
                            <label for="txt_cable" class="text-gray">Cable</label>
                            <input type="number" step="0.01" id="txt_cable" name="txt_cable" value="<?php echo $egreso['cable']; ?>" class="form-control"
                                placeholder="" min="0.00">
                        </div>
                        <div class="form-item">
                            <label for="txt_ropa_calzado" class="text-gray">Ropa y Calzado</label>
                            <input type="number" step="0.01" id="txt_ropa_calzado" name="txt_ropa_calzado" value="<?php echo $egreso['ropa calzado']; ?>" class="form-control"
                                placeholder="" min="0.00">
                        </div>
                        <div class="form-item">
                            <label for="txt_fondos_ahorro" class="text-gray">Fondos de ahorro</label>
                            <input type="number" step="0.01" id="txt_fondos_ahorro" name="txt_fondos_ahorro" value="<?php echo $egreso['fondo ahorro']; ?>" class="form-control"
                                placeholder="" min="0.00">
                        </div>
                        <div class="form-item">
                            <label for="txt_creditos" class="text-gray">Creditos</label>
                            <input type="number" step="0.01" id="txt_creditos" name="txt_creditos" value="<?php echo $egreso['credito']; ?>" class="form-control"
                                placeholder="" min="0.00">
                        </div>
                        
                    </div>
                    <div class="content-footer">
                        <div class="form-footer">    
                            <input type="hidden" name="editar" id="editar" value="egreso">
                            <input type="hidden" name="id" id="id" value="<?php echo $id_familia; ?>">
                            <input type="submit" value="Guardar Boleta" id="editar-alimentacion" class="color-primary text-light">
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