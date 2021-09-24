<?php 
   include_once 'controllers/sesiones.php';
   include_once 'views/layout/header.php';
   include_once 'views/layout/sidebar.php';
   include_once 'views/layout/topbar.php';
   include_once 'controllers/reportePoblacionController.php';

   $id_persona = $_GET['id_persona'];
   if(!filter_var($id_persona,FILTER_VALIDATE_INT)){
     die('Error');
   }

   $controlador = new reportePoblacionController();
   $personas = array();
   $personas = $controlador->buscarPersona($id_persona);

   if ( count($personas) > 0 ){
       $personas = $personas[0];
   }
//    var_dump$personas);
//    die();

   $persona_json = json_encode($personas);
//    var_dump($persona_json);
//    die();

?>

<script>
    let form_persona = '<?php echo $persona_json; ?>';
    persona = JSON.parse(form_persona);
</script>


<div class="content-wrapper">
    <div class="content-header">
        <h2>Detalle Persona</h2>
    </div>
    <!--Termina content-heaer-->

    <div class="content">
        <div class="row">
        <div class="box color-light">
                <div class="box-header">
                    <h2>Datos de la persona</h2>
                    <form role="form" name="add-form-2" id="add-form-2" method="POST"
                        action="controllers/boletaProcesos.php">
                    <div>
                        <label><input type="checkbox" id="cbox_entrevistado" <?= $personas['entrevistado'] == 1 ? 'checked' : ''?>s> Entrevistado</label><br>
                        <input type="hidden" id="txt_entrevistado" name="txt_entrevistado">
                    </div>
                </div>
                <!--Formulario persona-->
                <div class="form-container">
                    <form role="form" name="addPersona" id="addPersona" method="POST"
                        action="controllers/usuarioProcesos.php">
                        <div class="form-row-4">
                            <div class="form-item">
                            <label for="txt_nombres" class="text-gray">Nombres</label>
                                <input type="text" id="txt_nombres" name="txt_nombres" required readonly
                                    value="<?php echo $personas['nombres']; ?>" class="form-control-2"
                                    placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_primer_apellido" class="text-gray">Primer apellido</label>
                                <input type="text" id="txt_primer_apellido" name="txt_primer_apellido" required readonly
                                    value="<?php echo $personas['primer_apellido']; ?>" class="form-control-2"
                                    placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_segundo_apellido" class="text-gray">Segundo apellido</label>
                                <input type="text" id="txt_segundo_apellido" name="txt_segundo_apellido" required readonly
                                    value="<?php echo $personas['segundo_apellido']; ?>" class="form-control-2"
                                    placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_sexo" class="text-gray">Sexo</label>
                                <select required class="form-control" name="txt_sexo" id="txt_sexo">
                                    <option value="" disabled selected>Seleccione una opción</option> 
                                    <option value="M" <?= $personas['sexo'] == 'M' ? 'selected' : '' ?>>Masculino</option>
                                    <option value="F" <?= $personas['sexo'] == 'F' ? 'selected' : '' ?>>Femenino</option>
                                </select>
                            </div>
                            <div class="form-item" id="div-fecha-nacimiento">
                                <label for="txt_fecha_nacimiento" class="text-gray">Fecha de nacimiento</label>
                                <input type="date" id="txt_fecha_nacimiento" name="txt_fecha_nacimiento" value="<?= $personas['fecha_nacimiento'] ?>"
                                    class="form-control" placeholder="" max="<?php echo $hoy ?>">
                            </div>
                            <div class="form-item" id="div-parentesco">
                                <label for="txt_parentesco" class="text-gray">Parentesco con el entrevistado</label>
                                <input type="text" id="txt_parentesco" name="txt_parentesco" required readonly
                                    value="<?php echo $personas['parentesco']; ?>" class="form-control-2"
                                    placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_edad" class="text-gray">Edad</label>
                                <input type="text" id="txt_edad" name="txt_edad" required readonly
                                    value="<?php echo $personas['edad']; ?>" class="form-control-2"
                                    placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_dpi" class="text-gray">DPI</label>
                                <input type="text" id="txt_dpi" name="txt_dpi" required readonly
                                    value="<?php echo $personas['dpi']; ?>" class="form-control-2"
                                    placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_estado_civil" class="text-gray">Estado Civil</label>
                                <select required class="form-control" name="txt_estado_civil" id="txt_estado_civil">
                                    <option value="" disabled selected>Seleccione una opción</option>    
                                    <option value="soltero" <?= $personas['estado_civil'] == 'soltero' ? 'selected' : '' ?>>Soltero(a)</option>
                                    <option value="casado" <?= $personas['estado_civil'] == 'casado' ? 'selected' : '' ?>>Casado(a)</option>
                                    <option value="divorsiado" <?= $personas['estado_civil'] == 'divorsiado' ? 'selected' : '' ?>>Divorciado(a)</option>
                                    <option value="viudo" <?= $personas['estado_civil'] == 'viudo' ? 'selected' : '' ?>>Viudo(a)</option>
                                    <option value="union libre" <?= $personas['estado_civil'] == 'union libre' ? 'selected' : '' ?>>Unión Libre</option>
                                </select>
                            </div>
                            <div class="form-item">
                                <label for="txt_escolaridad" class="text-gray">Escolaridad</label>
                                <select required class="form-control" name="txt_escolaridad" id="txt_escolaridad">
                                    <option value="" disabled selected>Seleccione una opción</option>
                                    <option value="sin estudios" <?= $personas['escolaridad'] == 'sin estudios' ? 'selected' : '' ?>>Sin estudio</option>
                                    <option value="primaria"<?= $personas['escolaridad'] == 'primaria' ? 'selected' : '' ?>>Nivel primario</option>
                                    <option value="basico"<?= $personas['escolaridad'] == 'basico' ? 'selected' : '' ?>>Nivel básico</option>
                                    <option value="diversificado"<?= $personas['escolaridad'] == 'diversificado' ? 'selected' : '' ?>>Nivel diversificado</option>
                                    <option value="universitario"<?= $personas['escolaridad'] == 'universitario' ? 'selected' : '' ?>>Nivel universitario</option>
                                </select>
                            </div>
                            <div class="form-item">
                                <label for="txt_ocupacion" class="text-gray">Ocupacion</label>
                                <input type="text" id="txt_ocupacion" name="txt_ocupacion"value="<?= $personas['ocupacion'] ?>" class="form-control-2"
                                    placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_telefono" class="text-gray">Teléfono</label>
                                <input type="text" id="txt_telefono" name="txt_telefono" required readonly
                                    value="<?php echo $personas['telefono']; ?>" class="form-control-2"
                                    placeholder="">
                            </div>
                            <div class="form-item" id="div-gestacion">
                                <label for="txt_gestacion" class="text-gray">Gestación</label>
                                <select class="form-control" name="txt_gestacion" id="txt_gestacion">
                                    <option value="0" <?= $personas['gestacion'] == '0' ? 'selected' : '' ?>>No</option>
                                    <option value="1"<?= $personas['gestacion'] == '1' ? 'selected' : '' ?>>Si</option>
                                </select>
                            </div>
                            <div class="form-item" id="div-semanas-gestacion">
                                <label for="txt_semanas_gestacion" class="text-gray">Semanas de gestación</label>
                                <input type="text" id="txt_semanas_gestacion" name="txt_semanas_gestacion" required readonly
                                    value="<?php echo $personas['semanas_gestacion']; ?>" class="form-control-2"
                                    placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_ingreso_mensual" class="text-gray">Ingreso Mensual</label>
                                <input type="text" id="txt_ingreso_mensual" name="txt_ingreso_mensual" required readonly
                                    value="<?php echo $personas['ingreso_mensual']; ?>" class="form-control-2"
                                    placeholder="" min="0.00">
                            </div>
                        </div>
                       
                        <div class="form-footer">
                            <input type="hidden" name="registro" value="guardar">
                            <!--<input type="submit" value="Actualizar" class="color-primary text-light">-->
                            <input type="reset" value="Regresar" class="color-danger text-light">
                        </div>
                    </form>
                </div>
                <!--Termina formulario para añadir persona-->
            </div>
    <!--Termina content-->
</div>
<!--Termina content-wraper-->

<?php 
    include_once 'views/layout/footer.php';
?>