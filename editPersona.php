<?php 
   include_once 'controllers/sesiones.php';
   include_once 'views/layout/header.php';
   include_once 'views/layout/sidebar.php';
   include_once 'views/layout/topbar.php';
   include_once 'controllers/reportePoblacionController.php';
   include_once 'controllers/opcionesController.php';

   $id_persona = $_GET['id_persona'];
   if(!filter_var($id_persona,FILTER_VALIDATE_INT)){
     die('Error');
   }

   $controlador = new ReportePoblacionController();
   $controladorOpciones = new OpcionController();

   $personas = array();
   $personas = $controlador->buscarPersona($id_persona);
   $dis = $controlador->buscarDiscapacidad($id_persona);
   $enf = $controlador->buscarEnfermedades($id_persona);
   
   $enfermedad = array();
   $enfermedad = $controladorOpciones->listarSelect("SELECT * FROM tbl_enfermedad ORDER BY nombre ASC");
   
   $discapacidad = array();
   $discapacidad = $controladorOpciones->listarSelect("SELECT * FROM tbl_discapacidad ORDER BY nombre ASC");

   if ( count($personas) > 0 ){
       $personas = $personas[0];
   }

   $persona_json = json_encode($personas);

   date_default_timezone_set('America/Guatemala');
   $hoy = date('Y-m-d');
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
                    <form role="form" aria-label="editar persona" name="edit-form-persona" id="edit-form-persona" method="POST"
                        action="prueba.php">
                    <div>
                        <a href="showPersona.php?id_persona=<?php echo $id_persona?>" class="btn color-danger text-light"><i class="las la-times"></i></a>
                    </div>
                </div>
                <!--Formulario persona-->
                <div class="form-container">
                    <form role="form" aria-label="editar persona" name="edit-form-persona" id="edit-form-persona" method="POST"
                        action="controllers/prueba.php">
                        <input type="hidden" id="txt_entrevistado-edit" name="txt_entrevistado-edit" value="<?php echo $personas['entrevistado']; ?>">
                        <div class="form-row-4">
                            <div class="form-item">
                            <label for="txt_nombres" class="text-gray">Nombres <span style="color: red;">*</span></label>
                                <input type="text" id="txt_nombres" name="txt_nombres" required 
                                    value="<?php echo $personas['nombres']; ?>" class="form-control"
                                    placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_primer_apellido" class="text-gray">Primer apellido <span style="color: red;">*</span></label>
                                <input type="text" id="txt_primer_apellido" name="txt_primer_apellido" required
                                    value="<?php echo $personas['primer_apellido']; ?>" class="form-control"
                                    placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_segundo_apellido" class="text-gray">Segundo apellido</label>
                                <input type="text" id="txt_segundo_apellido" name="txt_segundo_apellido" 
                                    value="<?php echo $personas['segundo_apellido']; ?>" class="form-control"
                                    placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_sexo" class="text-gray">Sexo <span style="color: red;">*</span></label>
                                <select required class="form-control" name="txt_sexo" id="txt_sexo">
                                    <option value="" disabled selected>Seleccione una opción</option> 
                                    <option value="M" <?= $personas['sexo'] == 'M' ? 'selected' : '' ?>>Masculino</option>
                                    <option value="F" <?= $personas['sexo'] == 'F' ? 'selected' : '' ?>>Femenino</option>
                                </select>
                            </div>
                            
                            <div class="form-item" id="div-fecha-nacimiento">
                                <label for="txt_fecha_nacimiento-edit" class="text-gray">Fecha de nacimiento <span style="color: red;">*</span></label>
                                <input type="date" id="txt_fecha_nacimiento-edit" name="txt_fecha_nacimiento-edit" value="<?= $personas['fecha_nacimiento'] ?>"
                                    class="form-control" placeholder="" max="<?php echo $hoy ?>">
                            </div>
                            <?php if($personas['entrevistado'] == 1){ ?>
                            <input type="hidden" id="txt_parentesco-edit" name="txt_parentesco-edit" value="yo">
                            <?php }else if($personas['entrevistado'] == 0) { ?>
                            <div class="form-item" id="div-parentesco">
                                <label for="txt_parentesco" class="text-gray">Parentesco con el entrevistado</label>
                                <input type="text" id="txt_parentesco-edit" name="txt_parentesco-edit" required 
                                    value="<?php echo $personas['parentesco']; ?>" class="form-control"
                                    placeholder="">
                                <input type="hidden" id="txt_fecha_nacimiento-edit" name="txt_fecha_nacimiento-edit" value="">
                            </div>
                            <?php } ?>
                            
                            <div class="form-item">
                                <label for="txt_dpi" class="text-gray">DPI <span style="color: red;">*</span></label>
                                <input type="text" id="txt_dpi" name="txt_dpi" required 
                                    value="<?php echo $personas['dpi']; ?>" class="form-control"
                                    placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_estado_civil" class="text-gray">Estado Civil <span style="color: red;">*</span></label>
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
                                <label for="txt_escolaridad" class="text-gray">Escolaridad <span style="color: red;">*</span></label>
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
                                <input type="text" id="txt_ocupacion" name="txt_ocupacion"value="<?= $personas['ocupacion'] ?>" class="form-control"
                                    placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_telefono" class="text-gray">Teléfono</label>
                                <input type="text" id="txt_telefono" name="txt_telefono" required 
                                    value="<?php echo $personas['telefono']; ?>" class="form-control"
                                    placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_correo" class="text-gray">Correo electrónico</label>
                                <input type="text" id="txt_correo" name="txt_correo" value="<?php echo $personas['correo']; ?>"
                                    class="form-control" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_ingreso_mensual" class="text-gray">Ingreso Mensual <span style="color: red;">*</span></label>
                                <input type="text" id="txt_ingreso_mensual" name="txt_ingreso_mensual" required 
                                    value="<?php echo $personas['ingreso_mensual']; ?>" class="form-control"
                                    placeholder="" min="0.00">
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
                                <input type="text" id="txt_semanas_gestacion" name="txt_semanas_gestacion" required 
                                    value="<?php echo $personas['semanas_gestacion']; ?>" class="form-control"
                                    placeholder="">
                            </div>
                       
                        </div>
                        <div class="form-row-2">
                            <div class="form-item">
                                <label for="txt_enfermedad" class="text-gray">Enfermedades</label>
                                <select class="select-multiple" name="enfermedades[]" id="txt_enfermedad-edit" multiple>
                                    <?php 
                                    foreach ($enfermedad as $i){
                                    ?>
                                        <option <?php   
                                        foreach($enf as $k){
                                            if($i['id_enfermedad'] == $k['id_enfermedad']){ ?>
                                                selected
                                            <?php } 
                                        }
                                        ?> value="<?php echo $i['id_enfermedad'];?>"><?php echo $i['nombre'];?></option>
                                    <?php 
                                    }//termina ciclo for
                                    ?>
                                </select>
                            </div>
                            <div class="form-item">
                                <label for="txt_discapacidad" class="text-gray">Discapacidades</label>
                                <select class="select-multiple" name="discapacidades[]" id="txt_discapacidad-edit" multiple>
                                    <?php 
                                    foreach ($discapacidad as $i){
                                    ?>
                                        <option <?php   
                                        foreach($dis as $k){
                                            if($i['id_discapacidad'] == $k['id_discapacidad']){ ?>
                                                selected
                                            <?php } 
                                        }
                                        ?> value="<?php echo $i['id_discapacidad'];?>"><?php echo $i['nombre'];?></option>
                                    <?php 
                                    }//termina ciclo for
                                    ?>
                                </select>
                            </div>
                        </div>
                       
                        <div class="form-footer">
                            <input type="hidden" name="editar" id="editar-p" value="persona">
                            <input type="hidden" name="id" id="id_persona-edit" value="<?php echo $id_persona; ?>">
                            <input type="submit" value="Guardar Persona" id="editar-persona" class="color-primary text-light">
                            <a href="showPersona.php?id_persona=<?php echo $id_persona?>"><input type="button" value="Cancelar" class="color-danger text-light"></a>
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