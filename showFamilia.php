<?php 
    include_once 'controllers/sesiones.php';
    include_once 'views/layout/header.php';
    $id_familia = $_GET['id_familia'];
    if(!filter_var($id_familia,FILTER_VALIDATE_INT)){
      die('Error');
    }

    include_once 'views/layout/sidebar.php';
    include_once 'views/layout/topbar.php';
    include_once 'controllers/reporteFamiliaController.php';

    $controlador = new reporteFamiliaController();
    $personas = array();
    $personas = $controlador->buscarPersonas($id_familia);

    $domicilio = array();
    $domicilio = $controlador->buscarDomicilio($id_familia);
    $domicilio['transportes'] = $controlador->buscarTransportes($domicilio['id_vivienda']);

    $egreso = array();
    $egreso = $controlador->buscarEgreso($id_familia);

    $ingreso = array();
    $ingreso = $controlador->buscaringreso($id_familia);

    $vivienda = array();
    $vivienda = $controlador->buscarVivienda($domicilio['id_vivienda']);
    $vivienda['mobiliarios'] = $controlador->buscarMobiliarios($domicilio['id_vivienda']);
    $vivienda['servicios'] = $controlador->buscarServiciosVivienda($domicilio['id_vivienda']);

    $gestacion = array();
    $gestacion = $controlador->buscargestacion($id_familia);
    
    $enfermedades = array();
    $enfermedades = $controlador->buscarenfermedades($id_familia);

    $discapacidades = array();
    $discapacidades = $controlador->buscarDiscapacidades($id_familia);

    $servicio_medico = array();
    $servicio_medico = $controlador->buscarserviciomedico($id_familia);

    $alimentacion = array();
    $alimentacion = $controlador->buscarAlimentacion($id_familia);

    $recreaciones = array();
    $recreaciones = $controlador->buscarRecreaciones($id_familia);

    $datos_boleta = array();
    $datos_boleta = $controlador->buscardatosboleta($id_familia);

?>



<div class="content-wrapper">
    <div class="box-header">
        <h2>Datos de la boleta</h2>
        <div>
        <a href="imprimirBoleta.php?id_familia=<?php echo $id_familia ?>" target="_blank" id="editar-domicilio" class="btn color-danger text-light">Imprimir Boleta</a>
        </div>    
    </div>
    <!--Termina content-heaer-->

    <div class="content">
        <div class="row">

            <!--empieza estructura familiar-->
            <div class="box color-light">
                <div class="box-header">
                    <h2>1. Estructura Familiar</h2>
                    <div>

                    </div>
                </div>

                <div class="form-container">
                    <h3>Entrevistado</h3>
                    <table class="table tabla-normal-ancho">
                        <thead>
                            <td>ID</td>
                            <td>NOMBRE</td>
                            <td>DPI</td>
                            <td>SEXO</td>
                            <td>FECHA NACIMIENTO</td>
                            <td>EDAD</td>
                            <td>ESTADO CIVIL</td>
                            <td>ESCOLARIDAD</td>
                            <td>TELEFONO</td>
                            <td>OCUPACION</td>
                        </thead>
                        <tbody>
                            <?php 
                        foreach ($personas as $p){
                            if($p['entrevistado'] == 1){
                        ?>
                            <tr>
                                <td><?php echo $p['id_persona']; ?></td>
                                <td><?php echo $p['nombre_completo']; ?></td>
                                <td><?php echo $p['dpi']; ?></td>
                                <td><?php echo $p['sexo']; ?></td>
                                <td><?php echo $p['fecha_nacimiento']; ?></td>
                                <td><?php echo $p['edad']; ?></td>
                                <td><?php echo $p['estado_civil']; ?></td>
                                <td><?php echo $p['escolaridad']; ?></td>
                                <td><?php echo $p['telefono']; ?></td>
                                <td><?php echo $p['ocupacion']; ?></td>
                                <td>
                                    <a href="showPersona.php?id_persona=<?php echo $p['id_persona']; ?>"
                                        class="btn color-info">Ver</a>
                                </td>
                            </tr>
                            <?php 
                            }
                        }//termina ciclo for
                        ?>

                        </tbody>
                    </table>
                    <br>
                    <h3>Miembros de la familia</h3>
                    <table class="table tabla-normal-ancho">
                        <thead>
                            <td>ID</td>
                            <td>NOMBRE</td>
                            <td>DPI</td>
                            <td>SEXO</td>
                            <td>PARENTESCO</td>
                            <td>EDAD</td>
                            <td>ESTADO CIVIL</td>
                            <td>ESCOLARIDAD</td>
                            <td>TELEFONO</td>
                            <td>OCUPACION</td>
                        </thead>
                        <tbody>
                            <?php 
                        foreach ($personas as $p){
                            if($p['entrevistado'] == 0){
                        ?>
                            <tr>
                                <td><?php echo $p['id_persona']; ?></td>
                                <td><?php echo $p['nombre_completo']; ?></td>
                                <td><?php echo $p['dpi']; ?></td>
                                <td><?php echo $p['sexo']; ?></td>
                                <td><?php echo $p['parentesco']; ?></td>
                                <td><?php echo $p['edad']; ?></td>
                                <td><?php echo $p['estado_civil']; ?></td>
                                <td><?php echo $p['escolaridad']; ?></td>
                                <td><?php echo $p['telefono']; ?></td>
                                <td><?php echo $p['ocupacion']; ?></td>
                                <td>
                                    <a href="showPersona.php?id_persona=<?php echo $r['id_persona']; ?>"
                                        class="btn color-info">Ver</a>
                                </td>
                            </tr>
                            <?php 
                            }
                        }//termina ciclo for
                        ?>

                        </tbody>
                    </table>

                </div>
            </div>
            <!--termina estructura familiar-->

            <!--empieza identificacion domiciliaria-->
            <div class="box color-light">
                <div class="box-header">
                    <h2>2. Identificación domiciliaria</h2>
                    <div>
                        <a href="editBoletaDomicilio.php?id_familia=<?php echo $id_familia ?>" id="editar-domicilio" class="btn color-primary text-light">Editar</a>
                    </div>
                </div>
                <div class="form-contaniter">
                    <form role="form" name="add-form-2" id="add-form-2" method="POST"
                        action="controllers/boletaProcesos.php">
                        <div class="form-row-2">
                            <div class="form-item">
                                <label for="txt_sector" class="text-gray">Sector</label>
                                <input type="text" id="txt_sector" name="txt_sector" required readonly
                                    value="<?php echo $domicilio['sector']; ?>" class="form-control-2" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_comunidad" class="text-gray">Comunidad</label>
                                <input type="text" id="txt_comunidad" name="txt_comunidad" required readonly
                                    value="<?php echo $domicilio['comunidad']; ?>" class="form-control-2"
                                    placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_direccion" class="text-gray">Dirección</label>
                                <input type="text" id="txt_direccion" name="txt_direccion" required readonly
                                    value="<?php echo $domicilio['direccion']; ?>" class="form-control-2"
                                    placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_numero_casa" class="text-gray">Numero de casa</label>
                                <input type="text" id="txt_numero_casa" name="txt_numero_casa" readonly
                                    value="<?php echo $domicilio['numero_casa']; ?>" class="form-control-2"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="form-row-3">
                            <div class="form-item">
                                <label for="txt_colindantes" class="text-gray">Colindantes</label>
                                <input type="text" id="txt_colindantes" name="txt_colindantes" readonly
                                    value="<?php echo $domicilio['colindantes']; ?>" class="form-control-2"
                                    placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_latitud" class="text-gray">Latitud</label>
                                <input type="text" id="txt_latitud" name="txt_latitud" readonly
                                    value="<?php echo $domicilio['telefono']; ?>" class="form-control-2" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_longitud" class="text-gray">Longitud</label>
                                <input type="text" id="txt_longitud" name="txt_longitud" value="89151151" readonly
                                    class="form-control-2" placeholder="">
                            </div>
                        </div>
                        <div class="form-row-2">
                            <div class="form-item">
                                <label for="txt_telefono" class="text-gray">Telefono</label>
                                <input type="text" id="txt_telefono" name="txt_telefono" value="12345678" readonly
                                    class="form-control-2" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_transporte" class="text-gray">Medios de transporte para llegar al
                                    domicilio</label>
                                <ul class="form-control-2 listas">
                                    <?php foreach ($domicilio['transportes'] as $t){ ?>
                                    <li> <?php echo "&nbsp;●&nbsp;&nbsp;".$t['transporte']; ?> </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
            <!--termina identificacion domiciliaria-->

            <!--empieza ingresos y egresos-->
            <div class="box color-light">
                <div class="form-contaniter">
                    <div class="form-row-2">
                        <div>
                            <h2>3. Ingresos</h2>
                            <table class="table" style="width: 100%;">
                                <thead>
                                    <td>ID</td>
                                    <td>NOMBRE</td>
                                    <td>CANTIDAD</td>
                                </thead>
                                <tbody>
                                    <?php 
                                    $total_ingresos = 0;
                                    foreach ($ingreso as $p){
                                    $total_ingresos = $total_ingresos + (float)$p['ingreso_mensual'];
                                    ?>
                                    <tr>
                                        <td><?php echo $p['id_persona']; ?></td>
                                        <td><?php echo $p['nombre_completo']; ?></td>
                                        <td><?php echo $p['ingreso_mensual']; ?></td>
                                    </tr>
                                    <?php 
                                    }//termina ciclo for
                                    ?>

                                </tbody>
                                <tfoot>
                                    <td>
                                        <h4>TOTAL</h4>
                                    </td>
                                    <td></td>
                                    <td>
                                        <h4><?php echo 'Q '.$total_ingresos ?></h4>
                                    </td>
                                </tfoot>
                            </table>
                        </div>
                        <div>
                            <div class="box-header">
                                <h2>4. Egresos</h2>
                                <div>
                                    <a href="editBoletaEgreso.php?id_familia=<?php echo $id_familia ?>" id="editar-egresos" class="btn color-primary text-light">Editar</a>
                                </div>
                            </div>
                            <table class="table" style="width: 100%;">
                                <thead>
                                    <td>ID</td>
                                    <td>TIPO</td>
                                    <td>CANTIDAD</td>
                                </thead>
                                <tbody>
                                    <?php 
                            reset($egreso);
                            $numero_egreso = 1;
                            $total_egresos = 0;
                            while (list($clave, $valor) = each($egreso)){
                                $total_egresos = $total_egresos + (float)$valor;
                            ?>
                                    <tr>
                                        <td><?php echo $numero_egreso ?></td>
                                        <td><?php echo $clave ?></td>
                                        <td><?php echo 'Q '.$valor ?></td>
                                    </tr>
                                    <?php  
                                $numero_egreso++;   
                                 
                            }//termina ciclo for
                            ?>
                                </tbody>
                                <tfoot>
                                    <td>
                                        <h4>TOTAL</h4>
                                    </td>
                                    <td></td>
                                    <td>
                                        <h4><?php echo 'Q '.$total_egresos ?></h4>
                                    </td>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <!--termina ingresos y egresos-->

            <!--empieza vivienda-->
            <div class="box color-light">
                <div class="box-header">
                    <h2>4. Vivienda</h2>
                    <div>
                        <a href="editBoletaVivienda.php?id_vivienda=<?php echo $domicilio['id_vivienda'];?>&id_familia=<?php echo $id_familia ?>" id="editar-vivienda" class="btn color-primary text-light">Editar</a>
                    </div>
                </div>
                <div class="form-contaniter">
                    <form role="form" name="add-form-4" id="add-form-4" method="POST"
                        action="controllers/boletaProcesos.php">
                        <div class="form-row-4">
                            <div class="form-item">
                                <label for="txt_tenencia" class="text-gray">Tenencia:</label>
                                <input type="text" id="txt_tenencia" name="txt_tenencia" required readonly
                                    value="<?php echo $vivienda['tenencia']; ?>" class="form-control-2" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_cantidad_cuartos" class="text-gray">Numero de dormitorios:</label>
                                <input type="text" id="txt_cantidad_cuartos" name="txt_cantidad_cuartos" required
                                    readonly value="<?php echo $vivienda['cantidad_cuartos']; ?>" class="form-control-2"
                                    placeholder="">
                            </div>

                            <div class="form-item">
                                <label for="txt_sala" class="text-gray">¿Cuenta con sala?:</label>
                                <input type="text" id="txt_sala" name="txt_sala" required readonly
                                    value="<?php if($vivienda['sala'] == 1){ echo "Si";}else{ echo "No"; } ?>"
                                    class="form-control-2" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_comedor" class="text-gray">¿Cuenta con comedor?:</label>
                                <input type="text" id="txt_comedor" name="txt_comedor" required readonly
                                    value="<?php if($vivienda['comedor'] == 1){ echo "Si";}else{ echo "No"; } ?>"
                                    class="form-control-2" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_cocina" class="text-gray">¿Cuenta con cocina?:</label>
                                <input type="text" id="txt_cocina" name="txt_cocina" required readonly
                                    value="<?php if($vivienda['cocina'] == 1){ echo "Si";}else{ echo "No"; } ?>"
                                    class="form-control-2" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_banio_privado" class="text-gray">¿Cuenta con baño privado?:</label>
                                <input type="text" id="txt_banio_privado" name="txt_banio_privado" required readonly
                                    value="<?php if($vivienda['banio_privado'] == 1){ echo "Si";}else{ echo "No"; } ?>"
                                    class="form-control-2" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_banio_colectivo" class="text-gray">¿Cuenta con baño colectivo?:</label>
                                <input type="text" id="txt_banio_colectivo" name="txt_banio_colectivo" required readonly
                                    value="<?php if($vivienda['banio_colectivo'] == 1){ echo "Si";}else{ echo "No"; } ?>"
                                    class="form-control-2" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_sanitario" class="text-gray">Tipo de sanitario:</label>
                                <input type="text" id="txt_sanitario" name="txt_sanitario" required readonly
                                    value="<?php echo $vivienda['sanitario']; ?>" class="form-control-2" placeholder="">
                            </div>
                        </div>
                        <div class="form-row-1">
                            <div class="form-item">
                                <label for="txt_observaciones_vivienda" class="text-gray">Observaciones:</label>
                                <input type="text" id="txt_observaciones_vivienda" name="txt_observaciones_vivienda"
                                    required readonly value="<?php echo $vivienda['observaciones']; ?>"
                                    class="form-control-2" placeholder="">
                            </div>
                        </div>
                        <div class="form-row-4">
                            <div class="form-item">
                                <label for="txt_pared" class="text-gray">Material predominante pared</label>
                                <input type="text" id="txt_pared" name="txt_pared" required readonly
                                    value="<?php echo $vivienda['pared']; ?>" class="form-control-2" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_techo" class="text-gray">Material predominante techo </label>
                                <input type="text" id="txt_techo" name="txt_techo" required readonly
                                    value="<?php echo $vivienda['techo']; ?>" class="form-control-2" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_piso" class="text-gray">Material predominante piso </label>
                                <input type="text" id="txt_piso" name="txt_piso" required readonly
                                    value="<?php echo $vivienda['piso']; ?>" class="form-control-2" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_eliminacion_basura" class="text-gray">Eliminación de basura</label>
                                <input type="text" id="txt_eliminacion_basura" name="txt_eliminacion_basura" required
                                    readonly value="<?php echo $vivienda['eliminacion_basura']; ?>"
                                    class="form-control-2" placeholder="">
                            </div>
                        </div>
                        <div class="form-row-2">
                            <div class="form-item">
                                <label for="txt_mobiliario" class="text-gray">Mobiliario y equipo</label>
                                <ul class="form-control-2 listas">
                                    <?php foreach ($vivienda['mobiliarios'] as $t){ ?>
                                    <li> <?php echo "&nbsp;●&nbsp;&nbsp;".$t['mobiliario']; ?> </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="form-item">
                                <label for="txt_servicio_basico" class="text-gray">Servicio básico</label>
                                <ul class="form-control-2 listas">
                                    <?php foreach ($vivienda['servicios'] as $t){ ?>
                                    <li> <?php echo "&nbsp;●&nbsp;&nbsp;".$t['servicio']; ?> </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--termina vivienda-->

            <!--empieza salud-->
            <div class="box color-light">
                <div class="box-header">
                    <h2>6. Salud</h2>
                    <div>
                        <a href="editBoletaSalud.php?id_familia=<?php echo $id_familia ?>" id="editar-egresos" class="btn color-primary text-light">Editar</a>
                    </div>
                </div>
                <div class="form-contaniter">
                    <form role="form" name="add-form-5" id="add-form-5" method="POST"
                        action="controllers/boletaProcesos.php">
                        <div class="form-row-2">
                            <div class="form-item">
                                <label for="txt_servicio_medico" class="text-gray">Servicio medico:</label>
                                <input type="text" id="txt_servicio_medico" name="txt_servicio_medico" required readonly
                                    value="<?php echo $servicio_medico['servicio_medico']; ?>" class="form-control-2"
                                    placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_frecuencia_medico" class="text-gray">Frecuencia con la que asisten al
                                    medico:</label>
                                <input type="text" id="txt_frecuencia_medico" name="txt_frecuencia_medico" required
                                    readonly value="<?php echo $servicio_medico['frecuencia_medico']; ?>"
                                    class="form-control-2" placeholder="">
                            </div>
                        </div>
                        <br>

                        <?php if(!empty($gestacion)){ ?>
                        <div class="form-row-1">
                            <div>
                                <h3>Mujeres en estado de gestación</h3>
                                <table class="table" style="width: 100%;">
                                    <thead>
                                        <td>ID</td>
                                        <td>NOMBRE</td>
                                        <td>SEMANAS DE GESTACIÓN</td>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        foreach ($gestacion as $g){
                                        ?>
                                        <tr>
                                            <td><?php echo $g['id_persona']; ?></td>
                                            <td><?php echo $g['nombre_completo']; ?></td>
                                            <td><?php echo $g['semanas_gestacion']; ?></td>
                                        </tr>
                                        <?php 
                                        }//termina ciclo for
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php } ?>

                        <br>
                        <div class="form-row-2">
                            <?php if(!empty($enfermedades)){ ?>
                            <div>
                                <h3>Personas con enfermedad</h3>
                                <table class="table" style="width: 100%;">
                                    <thead>
                                        <td>ID</td>
                                        <td>NOMBRE</td>
                                        <td>ENFERMEDADES</td>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        foreach ($enfermedades as $i){
                                        ?>
                                        <tr>
                                            <td><?php echo $i['id_persona']; ?></td>
                                            <td><?php echo $i['nombre_completo']; ?></td>
                                            <td>
                                                <ul class="form-control-2"
                                                    style="font-size: var(--t6); list-style: none;">
                                                    <?php foreach ($i['enfermedades'] as $k){ ?>
                                                    <li> <?php echo $k; ?> </li>
                                                    <?php } ?>
                                                </ul>
                                            </td>
                                        </tr>
                                        <?php 
                                        }//termina ciclo for
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php } ?>
                            <?php if(!empty($discapacidades)){ ?>
                            <div>
                                <h3>Personas con discapacidad</h3>
                                <table class="table" style="width: 100%;">
                                    <thead>
                                        <td>ID</td>
                                        <td>NOMBRE</td>
                                        <td>DISCAPACIDADES</td>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        foreach ($discapacidades as $i){
                                        ?>
                                        <tr>
                                            <td><?php echo $i['id_persona']; ?></td>
                                            <td><?php echo $i['nombre_completo']; ?></td>
                                            <td>
                                                <ul class="form-control-2"
                                                    style="font-size: var(--t6); list-style: none;">
                                                    <?php foreach ($i['discapacidades'] as $k){ ?>
                                                    <li> <?php echo $k; ?> </li>
                                                    <?php } ?>
                                                </ul>
                                            </td>
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
            </div>
            <!--termina salud-->

            <!--empieza alimentacion-->
            <div class="box color-light">
                <div class="box-header">
                    <h2>7. Alimentación</h2>
                    <div>
                        <a href="editBoletaAlimentacion.php?id_familia=<?php echo $id_familia ?>" id="editar-egresos" class="btn color-primary text-light">Editar</a>
                    </div>
                </div>
                <div class="form-contaniter">
                    <form role="form" name="add-form-5" id="add-form-5" method="POST"
                        action="controllers/boletaProcesos.php">
                        <div class="form-row-1">
                            <div>
                                <table class="table" style="width: 100%;">
                                    <thead>
                                        <td>NO.</td>
                                        <td>TIPO DE ALIMENTACIÓN</td>
                                        <td>FRECUENCIA</td>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        reset($alimentacion);
                                        $numero_alimentacion = 1;
                                        while (list($clave, $valor) = each($alimentacion)){
                                        ?>
                                        <tr>
                                            <td><?php echo $numero_alimentacion ?></td>
                                            <td><?php echo $clave ?></td>
                                            <td><?php 
                                                if($valor == 0){
                                                    echo "nunca";
                                                }else if($valor == 1){
                                                    echo "una vez al mes";
                                                }else if($valor == 2){
                                                    echo "una vez al mes";
                                                }else if($valor == 3){
                                                    echo "una vez a la semana";
                                                }else if($valor == 4){
                                                    echo "diario";
                                                }
                                            
                                            ?></td>
                                        </tr>
                                        <?php  
                                        $numero_alimentacion++;    
                                        }//termina ciclo for
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
            <!--termina alimentacion-->

            <!--empieza recreaciones-->
            <?php if(!empty($recreaciones)){ ?>
            <div class="box color-light" id="div-recreaciones">
                <div class="box-header">
                    <h2>8. Recreaciones</h2>
                    <div>
                    <a href="editBoletaRecreacion.php?id_familia=<?php echo $id_familia ?>" id="editar-egresos" class="btn color-primary text-light">Editar</a>
                    </div>
                </div>
                <div class="form-contaniter">
                    <form role="form" name="add-form-5" id="add-form-5" method="POST"
                        action="controllers/boletaProcesos.php">
                        <div class="form-row-1">
                            <div>
                                <table class="table" style="width: 100%;">
                                    <thead>
                                        <td>ID</td>
                                        <td>RECREACION</td>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        foreach ($recreaciones as $r){
                                        
                                        ?>
                                        <tr>
                                            <td><?php echo $r['id_recreacion']; ?></td>
                                            <td><?php echo $r['recreacion']; ?></td>
                                        </tr>
                                        <?php 
                                        }//termina ciclo for
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
            <?php } ?>
            <!--termina recreaciones-->

            <!--empieza datos boleta-->
            <div class="box color-light">
                <div class="box-header">
                    <h2>Datos de boleta</h2>
                    <div>
                        <a href="editBoletaDatos.php?id_familia=<?php echo $id_familia ?>" id="editar-egresos" class="btn color-primary text-light">Editar</a>
                    </div>
                </div>
                <div class="form-contaniter">
                    <form role="form" name="add-form-4" id="add-form-4" method="POST"
                        action="controllers/boletaProcesos.php">
                        <div class="form-row-1">
                            <div class="form-item">
                                <label for="txt_observaciones_boleta" class="text-gray">Observaciones:</label>
                                <input type="text" id="txt_observaciones_boleta" name="txt_observaciones_boleta"
                                    required readonly value="<?php echo $datos_boleta['observaciones']; ?>"
                                    class="form-control-2" placeholder="">
                            </div>
                        </div>
                        <div class="form-row-2">
                            <div class="form-item">
                                <label for="txt_tenencia" class="text-gray">Evaluador:</label>
                                <input type="text" id="txt_tenencia" name="txt_tenencia" required readonly
                                    value="<?php echo $datos_boleta['evaluador']; ?>" class="form-control-2" placeholder="">
                            </div>
                            <div class="form-item">
                                <label for="txt_cantidad_cuartos" class="text-gray">Fecha de evaluación:</label>
                                <input type="text" id="txt_cantidad_cuartos" name="txt_cantidad_cuartos" required
                                    readonly value="<?php 
                                    
                                    $fecha_mostrar = date("d/m/Y", strtotime($datos_boleta['fecha_aplicacion']));
                                    
                                    echo $fecha_mostrar;  ?>" class="form-control-2"
                                    placeholder="">
                            </div>
                        </div>
 
                    </form>
                </div>
            </div>
            <!--termina datos boleta-->

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
    include_once 'views/layout/footer.php';
?>