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

    $controladorAlementacion = new reporteFamiliaController();

    $alimentacion = array();
    $alimentacion = $controladorAlementacion->buscarAlimentacion($id_familia);

    //print_r($alimentacion);
 
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
                <form role="form" name="edit-form-alimentacion" id="edit-form-alimentacion" method="POST"
                        action="controllers/prueba.php">
                    <div class="form-row-4">
                        <div class="form-item">
                            <label for="txt_carne_res" class="text-gray">Carne de res</label>
                            <select class="form-control" name="txt_carne_res" id="txt_carne_res">
                                <option value="4" <?php if($alimentacion['carne de res'] == 4){?> selected <?php } ?> >Diario</option>
                                <option value="3" <?php if($alimentacion['carne de res'] == 3){?> selected <?php } ?>>Cada tres días</option>
                                <option value="2" <?php if($alimentacion['carne de res'] == 2){?> selected <?php } ?>>Una vez a la semana</option>
                                <option value="1" <?php if($alimentacion['carne de res'] == 1){?> selected <?php } ?>>Cada vez al mes</option>
                                <option value="0" <?php if($alimentacion['carne de res'] == 0){?> selected <?php } ?>>Nunca</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_carne_pollo" class="text-gray">Carne de pollo</label>
                            <select class="form-control" name="txt_carne_pollo" id="txt_carne_pollo">
                                <option value="4" <?php if($alimentacion['carne de pollo'] == 4){?> selected <?php } ?> >Diario</option>
                                <option value="3" <?php if($alimentacion['carne de pollo'] == 3){?> selected <?php } ?>>Cada tres días</option>
                                <option value="2" <?php if($alimentacion['carne de pollo'] == 2){?> selected <?php } ?>>Una vez a la semana</option>
                                <option value="1" <?php if($alimentacion['carne de pollo'] == 1){?> selected <?php } ?>>Cada vez al mes</option>
                                <option value="0" <?php if($alimentacion['carne de pollo'] == 0){?> selected <?php } ?>>Nunca</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_carne_cerdo" class="text-gray">Carne de cerdo</label>
                            <select class="form-control" name="txt_carne_cerdo" id="txt_carne_cerdo">
                                <option value="4" <?php if($alimentacion['carne de cerdo'] == 4){?> selected <?php } ?> >Diario</option>
                                <option value="3" <?php if($alimentacion['carne de cerdo'] == 3){?> selected <?php } ?>>Cada tres días</option>
                                <option value="2" <?php if($alimentacion['carne de cerdo'] == 2){?> selected <?php } ?>>Una vez a la semana</option>
                                <option value="1" <?php if($alimentacion['carne de cerdo'] == 1){?> selected <?php } ?>>Cada vez al mes</option>
                                <option value="0" <?php if($alimentacion['carne de cerdo'] == 0){?> selected <?php } ?>>Nunca</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_carne_pescado" class="text-gray">Carne de pescado</label>
                            <select class="form-control" name="txt_carne_pescado" id="txt_carne_pescado">
                                <option value="4" <?php if($alimentacion['carne de pescado'] == 4){?> selected <?php } ?> >Diario</option>
                                <option value="3" <?php if($alimentacion['carne de pescado'] == 3){?> selected <?php } ?>>Cada tres días</option>
                                <option value="2" <?php if($alimentacion['carne de pescado'] == 2){?> selected <?php } ?>>Una vez a la semana</option>
                                <option value="1" <?php if($alimentacion['carne de pescado'] == 1){?> selected <?php } ?>>Cada vez al mes</option>
                                <option value="0" <?php if($alimentacion['carne de pescado'] == 0){?> selected <?php } ?>>Nunca</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_leche" class="text-gray">Leche</label>
                            <select class="form-control" name="txt_leche" id="txt_leche">
                                <option value="4" <?php if($alimentacion['leche'] == 4){?> selected <?php } ?> >Diario</option>
                                <option value="3" <?php if($alimentacion['leche'] == 3){?> selected <?php } ?>>Cada tres días</option>
                                <option value="2" <?php if($alimentacion['leche'] == 2){?> selected <?php } ?>>Una vez a la semana</option>
                                <option value="1" <?php if($alimentacion['leche'] == 1){?> selected <?php } ?>>Cada vez al mes</option>
                                <option value="0" <?php if($alimentacion['leche'] == 0){?> selected <?php } ?>>Nunca</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_cereales" class="text-gray">Cereales</label>
                            <select class="form-control" name="txt_cereales" id="txt_cereales">
                                <option value="4" <?php if($alimentacion['cereales'] == 4){?> selected <?php } ?> >Diario</option>
                                <option value="3" <?php if($alimentacion['cereales'] == 3){?> selected <?php } ?>>Cada tres días</option>
                                <option value="2" <?php if($alimentacion['cereales'] == 2){?> selected <?php } ?>>Una vez a la semana</option>
                                <option value="1" <?php if($alimentacion['cereales'] == 1){?> selected <?php } ?>>Cada vez al mes</option>
                                <option value="0" <?php if($alimentacion['cereales'] == 0){?> selected <?php } ?>>Nunca</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_huevos" class="text-gray">Huevos</label>
                            <select class="form-control" name="txt_huevos" id="txt_huevos">
                                <option value="4" <?php if($alimentacion['huevo'] == 4){?> selected <?php } ?> >Diario</option>
                                <option value="3" <?php if($alimentacion['huevo'] == 3){?> selected <?php } ?>>Cada tres días</option>
                                <option value="2" <?php if($alimentacion['huevo'] == 2){?> selected <?php } ?>>Una vez a la semana</option>
                                <option value="1" <?php if($alimentacion['huevo'] == 1){?> selected <?php } ?>>Cada vez al mes</option>
                                <option value="0" <?php if($alimentacion['huevo'] == 0){?> selected <?php } ?>>Nunca</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_frutas" class="text-gray">Frutas</label>
                            <select class="form-control" name="txt_frutas" id="txt_frutas">
                                <option value="4" <?php if($alimentacion['frutas'] == 4){?> selected <?php } ?> >Diario</option>
                                <option value="3" <?php if($alimentacion['frutas'] == 3){?> selected <?php } ?>>Cada tres días</option>
                                <option value="2" <?php if($alimentacion['frutas'] == 2){?> selected <?php } ?>>Una vez a la semana</option>
                                <option value="1" <?php if($alimentacion['frutas'] == 1){?> selected <?php } ?>>Cada vez al mes</option>
                                <option value="0" <?php if($alimentacion['frutas'] == 0){?> selected <?php } ?>>Nunca</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_verduras" class="text-gray">Verduras</label>
                            <select class="form-control" name="txt_verduras" id="txt_verduras">
                                <option value="4" <?php if($alimentacion['verduras'] == 4){?> selected <?php } ?> >Diario</option>
                                <option value="3" <?php if($alimentacion['verduras'] == 3){?> selected <?php } ?>>Cada tres días</option>
                                <option value="2" <?php if($alimentacion['verduras'] == 2){?> selected <?php } ?>>Una vez a la semana</option>
                                <option value="1" <?php if($alimentacion['verduras'] == 1){?> selected <?php } ?>>Cada vez al mes</option>
                                <option value="0" <?php if($alimentacion['verduras'] == 0){?> selected <?php } ?>>Nunca</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="txt_leguminosas" class="text-gray">Leguminosas</label>
                            <select class="form-control" name="txt_leguminosas" id="txt_leguminosas">
                                <option value="4" <?php if($alimentacion['leguminosas'] == 4){?> selected <?php } ?> >Diario</option>
                                <option value="3" <?php if($alimentacion['leguminosas'] == 3){?> selected <?php } ?>>Cada tres días</option>
                                <option value="2" <?php if($alimentacion['leguminosas'] == 2){?> selected <?php } ?>>Una vez a la semana</option>
                                <option value="1" <?php if($alimentacion['leguminosas'] == 1){?> selected <?php } ?>>Cada vez al mes</option>
                                <option value="0" <?php if($alimentacion['leguminosas'] == 0){?> selected <?php } ?>>Nunca</option>
                            </select>
                        </div>
                    </div>
                    <div class="content-footer">
                        <div class="form-footer">    
                            <input type="hidden" name="editar" id="editar" value="alimentacion">
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