<?php 
   include_once 'controllers/sesiones.php';
   include_once 'views/layout/header.php';
   include_once 'views/layout/sidebar.php';
   include_once 'views/layout/topbar.php';
   include_once 'controllers/reportePoblacionController.php';
   include_once 'controllers/enfermedadController.php';
   include_once 'controllers/discapacidadController.php';

   $id_persona = $_GET['id_persona'];
   if(!filter_var($id_persona,FILTER_VALIDATE_INT)){
     die('Error');
   }

   $controlador = new reportePoblacionController();
   $controladorDiscapacidad = new discapacidadController();
   $controladorEnfermedad = new enfermedadController();

   
   
   
   $personas = array();
   $personas = $controlador->buscarPersona($id_persona);
   $dis = $controlador->buscarDiscapacidad($id_persona);
   $enf = $controlador->buscarEnfermedades($id_persona);
   
   $enfermedad = array();
   $enfermedad = $controladorEnfermedad->listarSelect();
   
   $discapacidad = array();
   $discapacidad = $controladorDiscapacidad->listarSelect();

   if ( count($personas) > 0 ){
       $personas = $personas[0];
   }
//    var_dump$personas);
//    die();

   $persona_json = json_encode($personas);
//    var_dump($persona_json);
//    die();

date_default_timezone_set('America/Guatemala');
$hoy = new DateTime();

$fecha_nacimiento = new DateTime($personas['fecha_nacimiento']);
$personas['edad'] = $hoy->diff($fecha_nacimiento);

$fecha_nacimiento_mostrar = date("d-m-Y", strtotime($personas['fecha_nacimiento']));



?>

<script>
    let form_persona = '<?php  echo $persona_json;  ?>';
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
                    <div>
                        <a href="editPersona.php?id_persona=<?php echo $personas['id_persona']; ?>"
                                        class="btn color-primary">Editar</a>
                                        <a href="imprimirPersona.php?id_persona=<?php echo $personas['id_persona']; ?>" target="_blank" id="editar-domicilio" class="btn color-danger text-light">Imprimir</a>
                    </div>
                </div>
                <!--Formulario persona-->
                <div class="form-container">
                    <form role="form" name="edit-form-persona" id="edit-form-persona" method="POST"
                        action="controllers/prueba.php">
                        <input type="hidden" id="txt_entrevistado-edit" name="txt_entrevistado-edit" value="<?php echo $personas['entrevistado']; ?>">
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
                                <input type="text" id="txt_sexo" name="txt_sexo" required readonly
                                    value="<?php echo $personas['sexo']; ?>" class="form-control-2"
                                    placeholder="">
                            </div>
                            
                            <div class="form-item" id="div-fecha-nacimiento">
                                <label for="txt_fecha_nacimiento-edit" class="text-gray">Fecha de nacimiento</label>
                                <input type="text" id="txt_segundo_apellido" name="txt_segundo_apellido" required readonly
                                    value="<?php echo $fecha_nacimiento_mostrar ?>" class="form-control-2"
                                    placeholder="">
                            </div>
                            <?php if($personas['entrevistado'] == 1){ ?>
                            <input type="hidden" id="txt_parentesco-edit" name="txt_parentesco-edit" value="yo">
                            <?php }else if($personas['entrevistado'] == 0) { ?>
                            <div class="form-item" id="div-parentesco">
                                <label for="txt_parentesco" class="text-gray">Parentesco con el entrevistado</label>
                                <input type="text" id="txt_parentesco-edit" name="txt_parentesco-edit" required readonly
                                    value="<?php echo $personas['parentesco']; ?>" class="form-control-2"
                                    placeholder="">
                                <input type="hidden" id="txt_fecha_nacimiento-edit" name="txt_fecha_nacimiento-edit" value="">
                            </div>
                            <?php } ?>
                            <div class="form-item">
                                <label for="txt_edad" class="text-gray">Edad</label>
                                <input type="text" id="txt_edad" name="txt_edad" required readonly
                                    value="<?php echo $personas['edad']->y; ?>" class="form-control-2"
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
                                <input type="text" id="txt_estado_civil" name="txt_estado_civil" required readonly
                                    value="<?php echo $personas['estado_civil']; ?>" class="form-control-2"
                                    placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_escolaridad" class="text-gray">Escolaridad</label>
                                <input type="text" id="txt_escolaridad" name="txt_escolaridad" required readonly
                                    value="<?php echo $personas['escolaridad']; ?>" class="form-control-2"
                                    placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_ocupacion" class="text-gray">Ocupación</label>
                                <input type="text" id="txt_ocupacion" name="txt_ocupacion"value="<?= $personas['ocupacion'] ?>" class="form-control-2"
                                    placeholder="" readonly>
                            </div>
                            <div class="form-item">
                                <label for="txt_telefono" class="text-gray">Teléfono</label>
                                <input type="text" id="txt_telefono" name="txt_telefono" required readonly
                                    value="<?php echo $personas['telefono']; ?>" class="form-control-2"
                                    placeholder="">
                            </div>
                            <div class="form-item" id="div-gestacion">
                                <label for="txt_gestacion" class="text-gray">Gestación</label>
                                <input type="text" id="txt_gestacion" name="txt_gestacion" required readonly
                                    value="<?php if($personas['gestacion'] == 1){ echo "Si";}else{ echo "No";} ?>" class="form-control-2"
                                    placeholder="">
                            </div>
                            <div class="form-item" id="div-semanas-gestacion">
                                <label for="txt_semanas_gestacion" class="text-gray">Semanas de gestación</label>
                                <input type="text" id="txt_semanas_gestacion" name="txt_semanas_gestacion" required readonly
                                    value="<?php echo $personas['semanas_gestacion']; ?>" class="form-control-2"
                                    placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_ingreso_mensual" class="text-gray">Ingreso Mensual</label>
                                <input type="text" id="txt_ingreso_mensual" name="txt_ingreso_mensual" required  readonly
                                    value="<?php echo $personas['ingreso_mensual']; ?>" class="form-control-2"
                                    placeholder="" min="0.00">
                            </div>
                        </div>
                        <div class="form-row-2">
                            <?php if(!empty($enf)){ ?>
                            <div>
                                <h3>Enfermedades</h3>
                                <table class="table" style="width: 100%;">
                                    <thead>
                                        <td>ID</td>
                                        <td>ENFERMEDADES</td>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        foreach ($enf as $i){
                                        ?>
                                        <tr>
                                            <td><?php echo $i['id_enfermedad']; ?></td>
                                            <td><?php echo ucwords($i['enfermedad']); ?></td>
                                        </tr>
                                        <?php 
                                        }//termina ciclo for
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php } ?>
                            <?php if(!empty($dis)){ ?>
                            <div>
                                <h3>Personas con discapacidad</h3>
                                <table class="table" style="width: 100%;">
                                    <thead>
                                        <td>ID</td>
                                        <td>DISCAPACIDADES</td>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        foreach ($dis as $i){
                                        ?>
                                        <tr>
                                            <td><?php echo $i['id_discapacidad']; ?></td>
                                            <td><?php echo ucwords($i['discapacidad']); ?></td>
                                        </tr>
                                        <?php 
                                        }//termina ciclo for
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php } ?>
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