<?php 
    //include ("constantes.php");

    include_once ('routes.php');
    include_once ("controllers/sesiones.php");
    include_once 'views/layout/header.php';
    include_once 'views/layout/sidebar.php';
    include_once 'views/layout/topbar.php';
    include_once ('controllers/conteoController.php');

    $controlador = new conteoController();

    if(!isset($_GET['sector'])){
        $_GET['sector'] = "%%";
    }

    if(!isset($_GET['comunidad'])){
        $_GET['comunidad'] = "%%";
    }

    $sector = $_GET['sector'];
    $comunidad = $_GET['comunidad'];
    $nombre_comunidad = "";

    if($comunidad == "%%"){
        $nombre_comunidad = "Todos";
    }else{
        $nombre_comunidad = $controlador->buscarComunidad($comunidad);
    }

    $total_registros_persona = $controlador->contarRegistrosPersonas("$sector","$comunidad");
    $total_registros_mujeres = $controlador->contarRegistrosMujeres("$sector","$comunidad");
    $total_registros_hombres = $controlador->contarRegistrosHombres("$sector","$comunidad");
    $total_registros_familia = $controlador->contarRegistrosFamilias("$sector","$comunidad");
    $lista_enfermedades = array();
    $lista_enfermedades = $controlador->listarEnfermedades("$sector","$comunidad");
    $lista_discapacidades = array();
    $lista_discapacidades = $controlador->listarDiscapacidades("$sector","$comunidad");
    $lista_estado_civil = array();
    $lista_estado_civil = $controlador->listarEstadoCivil("$sector","$comunidad");
    $lista_escolaridad = array();
    $lista_escolaridad = $controlador->listarEscolaridad("$sector","$comunidad");
    $lista_ocupacion = array();
    $lista_ocupacion = $controlador->listarOcupacion("$sector","$comunidad");
    $lista_rango_edades = array();
    $lista_rango_edades = $controlador->listarRangosEdades("$sector","$comunidad");

    $lista_recreaciones = array();
    $lista_recreaciones = $controlador->listarRecreaciones("$sector","$comunidad");
    $lista_servicios_medicos = array();
    $lista_servicios_medicos = $controlador->listarServiciosMedicos("$sector","$comunidad");
    $lista_tenencias = array();
    $lista_tenencias = $controlador->listarTenencias("$sector","$comunidad");
    $lista_servicios_basicos = array();
    $lista_servicios_basicos = $controlador->listarServiciosBasicos("$sector","$comunidad");

?>



<div class="content-wrapper">

    <!--Termina content-heaer-->
    <div class="content">
        <div class="row">
            <div class="box color-light">
                <div class="box-header">
                    <h3>Buscar</h3>
                    <div>
                        <a href="imprimirConteo.php?sector=<?php echo $sector ?>&comunidad=<?php echo $comunidad ?>" target="_blank" id="editar-domicilio" class="btn color-danger text-light">Imprimir</a>
                    </div> 
                </div>
                <div class="form-contaniter">
                    <form role="form" name="buscar-index" id="buscar-index" method="POST"
                        action="controllers/boletaProcesos.php">
                        <div class="form-row-2">
                            <div class="form-item">
                                <label for="txt_sector" class="text-gray">Sector</label>
                                <select required class="form-control" name="txt_sector" id="txt_sector_index">
                                    <option value="" disabled selected>Seleccione una opción</option>
                                </select>
                            </div>
                            <div class="form-item">
                                <label for="txt_comunidad" class="text-gray">Comunidad</label>
                                <select class="form-control submit-buscar-index" name="txt_comunidad"
                                    id="txt_comunidad_index">
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="form-contaniter">
                <form role="form" name="buscar-index" id="buscar-index" method="POST"
                    action="controllers/boletaProcesos.php">
                    <div class="form-row-2">
                        <div class="content-header">
                            <h2>Sector: <?php if($sector == "%%"){echo "Todos";}else{echo $sector;} ?></h2>
                        </div>
                        <div class="content-header">
                            <h2>Comunidad: <?php echo $nombre_comunidad;?></h2>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <div class="cardBox">

            <div class="card color-light">
                <div>
                    <div class="cardTitle text-gray">
                        Personas
                    </div>
                    <div class="cardContent text-gray-dark">
                        <?php echo $total_registros_persona; ?>
                    </div>
                </div>
                <div class="cardIcon"><i class="las la-user-alt text-success"></i></div>
            </div>

            <div class="card color-light">
                <div>
                    <div class="cardTitle text-gray">
                        Familias
                    </div>
                    <div class="cardContent text-gray-dark">
                        <?php echo $total_registros_familia; ?>
                    </div>
                </div>
                <div class="cardIcon"><i class="las la-user-friends text-danger"></i></div>
            </div>

            <div class="card color-light">
                <div>
                    <div class="cardTitle text-gray">
                        Hombres
                    </div>
                    <div class="cardContent text-gray-dark">
                        <?php echo $total_registros_hombres; ?>
                    </div>
                </div>
                <div class="cardIcon"><i class="las la-male text-warning"></i></div>
            </div>

            <div class="card color-light">
                <div>
                    <div class="cardTitle text-gray">
                        Mujeres
                    </div>
                    <div class="cardContent text-gray-dark">
                        <?php echo $total_registros_mujeres; ?>
                    </div>
                </div>
                <div class="cardIcon"><i class="las la-female text-info"></i></div>
            </div>

        </div>
        <!--Termina CardBox-->

        <div class="row-2 scroll-x">

            <div class="box scroll color-light">
                <div class="box-header">
                    <h3>Edades</h3>
                    <!--<a href="#" class="btn color-info">Ver todo</a>-->
                </div>

                <table class="table">
                    <thead>
                        <td>RANGO</td>
                        <td>RESULTADO</td>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($lista_rango_edades as $ld){
                        ?>
                        <tr>
                            <td><?php echo $ld['grupo_edad']; ?></td>
                            <td><?php echo $ld['total']; ?></td>
                        </tr>
                        <?php 
                        }//termina ciclo for
                        ?>
                    </tbody>
                </table>

                <div class="box-footer">

                </div>
            </div>

            <div class="box color-light">
                <div class="box-header">
                    <h3>Enfermedades</h3>
                    <!--<a href="#" class="btn color-info">Ver todo</a>-->
                </div>
                <table class="table table-2">
                    <thead>
                        <td>ID</td>
                        <td>NOMBRE</td>
                        <td>RESULTADO</td>
                        <td>OPCIONES</td>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($lista_enfermedades as $le){
                        ?>
                        <tr>
                            <td><?php echo $le['id']; ?></td>
                            <td><?php echo ucwords($le['nombre']); ?></td>
                            <td><?php echo $le['total']; ?></td>
                            <td>
                                <a href="indexPoblacionEnfermedad.php?data=<?php echo $le['nombre']; ?>&comunidad=<?php echo $comunidad ?>&sector=<?php echo $sector ?>&enfermedad=<?php echo $le['id']; ?>&registros=<?php echo$le['total']; ?>" class="btn color-primary">Ver</a>
                            </td>
                        </tr>
                        <?php 
                        }//termina ciclo for
                        ?>
                    </tbody>
                </table>

                <div class="box-footer">

                </div>
            </div>

            <div class="box scroll color-light">
                <div class="box-header">
                    <h3>Discapacidades</h3>
                    <!--<a href="#" class="btn color-info">Ver todo</a>-->
                </div>

                <table class="table">
                    <thead>
                        <td>ID</td>
                        <td>NOMBRE</td>
                        <td>RESULTADO</td>
                        <td>OPCIONES</td>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($lista_discapacidades as $ld){
                        ?>
                        <tr>
                            <td><?php echo $ld['id']; ?></td>
                            <td><?php echo ucwords($ld['nombre']); ?></td>
                            <td><?php echo $ld['total']; ?></td>
                            <td>
                                <a href="indexPoblacionDiscapacidad.php?data=<?php echo $ld['nombre']; ?>&comunidad=<?php echo $comunidad ?>&sector=<?php echo $sector ?>&discapacidad=<?php echo $ld['id']; ?>&registros=<?php echo $ld['total']; ?>" class="btn color-primary">Ver</a>
                            </td>
                        </tr>
                        <?php 
                        }//termina ciclo for
                        ?>
                    </tbody>
                </table>

                <div class="box-footer">

                </div>
            </div>

            <div class="box scroll color-light">
                <div class="box-header">
                    <h3>Estado Civil</h3>
                    <!--<a href="#" class="btn color-info">Ver todo</a>-->
                </div>

                <table class="table">
                    <thead>
                        <td>NOMBRE</td>
                        <td>RESULTADO</td>
                        <td>OPCIONES</td>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($lista_estado_civil as $l){
                        ?>
                        <tr>
                            <td><?php echo ucwords($l['estado_civil']); ?></td>
                            <td><?php echo $l['total']; ?></td>
                            <td>
                                <a href="indexPoblacionEstadoCivil.php?comunidad=<?php echo $comunidad ?>&sector=<?php echo $sector ?>&estado_civil=<?php echo $l['estado_civil']; ?>&registros=<?php echo $l['total']; ?>" class="btn color-primary">Ver</a>
                            </td>
                        </tr>
                        <?php 
                        }//termina ciclo for
                        ?>
                    </tbody>
                </table>

                <div class="box-footer">

                </div>
            </div>

            <div class="box scroll color-light">
                <div class="box-header">
                    <h3>Escolaridad</h3>
                    <!--<a href="#" class="btn color-info">Ver todo</a>-->
                </div>

                <table class="table">
                    <thead>
                        <td>NOMBRE</td>
                        <td>RESULTADO</td>
                        <td>OPCIONES</td>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($lista_escolaridad as $ld){
                        ?>
                        <tr>
                            <td><?php echo ucwords($ld['escolaridad']); ?></td>
                            <td><?php echo $ld['total']; ?></td>
                            <td>
                                <a href="indexPoblacionEscolaridad.php?comunidad=<?php echo $comunidad ?>&sector=<?php echo $sector ?>&escolaridad=<?php echo $ld['escolaridad']; ?>&registros=<?php echo $ld['total']; ?>" class="btn color-primary">Ver</a>
                            </td>
                        </tr>
                        <?php 
                        }//termina ciclo for
                        ?>
                    </tbody>
                </table>

                <div class="box-footer">

                </div>
            </div>

            <div class="box scroll color-light">
                <div class="box-header">
                    <h3>Ocupación</h3>
                    <!--<a href="#" class="btn color-info">Ver todo</a>-->
                </div>

                <table class="table">
                    <thead>
                        <td>NOMBRE</td>
                        <td>RESULTADO</td>
                        <td>OPCIONES</td>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($lista_ocupacion as $ld){
                        ?>
                        <tr>
                            <td><?php echo ucwords($ld['ocupacion']); ?></td>
                            <td><?php echo $ld['total']; ?></td>
                            <td>
                                <a href="indexPoblacionOcupacion.php?comunidad=<?php echo $comunidad ?>&sector=<?php echo $sector ?>&ocupacion=<?php echo $ld['ocupacion']; ?>&registros=<?php echo $ld['total']; ?>" class="btn color-primary">Ver</a>
                            </td>
                        </tr>
                        <?php 
                        }//termina ciclo for
                        ?>
                    </tbody>
                </table>

                <div class="box-footer">

                </div>
            </div>

            <div class="box color-light">
                <div class="box-header">
                    <h3>Recreación y uso del tiempo familiar</h3>
                    <!--<a href="#" class="btn color-info">Ver todo</a>-->
                </div>
                <table class="table table-2">
                    <thead>
                        <td>ID</td>
                        <td>NOMBRE</td>
                        <td>RESULTADO</td>
                        <td>OPCIONES</td>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($lista_recreaciones as $le){
                        ?>
                        <tr>
                            <td><?php echo $le['id']; ?></td>
                            <td><?php echo ucwords($le['nombre']); ?></td>
                            <td><?php echo $le['total']; ?></td>
                            <td>
                                <a href="indexFamiliaRecreacion.php?recreacion=<?php echo $le['nombre']; ?>&comunidad=<?php echo $comunidad ?>&sector=<?php echo $sector ?>&id_recreacion=<?php echo $le['id']; ?>&registros=<?php echo $le['total']; ?>" class="btn color-primary">Ver</a>
                            </td>
                        </tr>
                        <?php 
                        }//termina ciclo for
                        ?>
                    </tbody>
                </table>

                <div class="box-footer">

                </div>
            </div>

            <div class="box color-light">
                <div class="box-header">
                    <h3>Servicios médicos</h3>
                    <!--<a href="#" class="btn color-info">Ver todo</a>-->
                </div>
                <table class="table table-2">
                    <thead>
                        <td>ID</td>
                        <td>NOMBRE</td>
                        <td>RESULTADO</td>
                        <td>OPCIONES</td>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($lista_servicios_medicos as $le){
                        ?>
                        <tr>
                            <td><?php echo $le['id']; ?></td>
                            <td><?php echo ucwords($le['nombre']); ?></td>
                            <td><?php echo $le['total']; ?></td>
                            <td>
                                <a href="indexFamiliaMedico.php?comunidad=<?php echo $comunidad ?>&sector=<?php echo $sector ?>&data=<?php echo $le['nombre']; ?>&id_data=<?php echo $le['id']; ?>&registros=<?php echo $le['total']; ?>" class="btn color-primary">Ver</a>
                            </td>
                            
                        </tr>
                        <?php 
                        }//termina ciclo for
                        ?>
                    </tbody>
                </table>

                <div class="box-footer">

                </div>
            </div>

            <div class="box color-light">
                <div class="box-header">
                    <h3>Tenencia de la vivienda</h3>
                    <!--<a href="#" class="btn color-info">Ver todo</a>-->
                </div>
                <table class="table table-2">
                    <thead>
                        <td>ID</td>
                        <td>NOMBRE</td>
                        <td>RESULTADO</td>
                        <td>OPCIONES</td>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($lista_tenencias as $le){
                        ?>
                        <tr>
                            <td><?php echo $le['id']; ?></td>
                            <td><?php echo ucwords($le['nombre']); ?></td>
                            <td><?php echo $le['total']; ?></td>
                            <td>
                                <a href="indexFamiliaTenencia.php?comunidad=<?php echo $comunidad ?>&sector=<?php echo $sector ?>&data=<?php echo $le['nombre']; ?>&id_data=<?php echo $le['id']; ?>&registros=<?php echo $le['total']; ?>" class="btn color-primary">Ver</a>
                            </td>
                        </tr>
                        <?php 
                        }//termina ciclo for
                        ?>
                    </tbody>
                </table>

                <div class="box-footer">

                </div>
            </div>

            <div class="box color-light">
                <div class="box-header">
                    <h3>Servicios básicos de las viviendas</h3>
                    <!--<a href="#" class="btn color-info">Ver todo</a>-->
                </div>
                <table class="table table-2">
                    <thead>
                        <td>ID</td>
                        <td>NOMBRE</td>
                        <td>RESULTADO</td>
                        <td>OPCIONES</td>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($lista_servicios_basicos as $le){
                        ?>
                        <tr>
                            <td><?php echo $le['id']; ?></td>
                            <td><?php echo ucwords($le['nombre']); ?></td>
                            <td><?php echo $le['total']; ?></td>
                            <td>
                                <a href="indexFamiliaServicioBasico.php?comunidad=<?php echo $comunidad ?>&sector=<?php echo $sector ?>&data=<?php echo $le['nombre']; ?>&id_data=<?php echo $le['id']; ?>&registros=<?php echo $le['total']; ?>" class="btn color-primary">Ver</a>
                            </td>
                        </tr>
                        <?php 
                        }//termina ciclo for
                        ?>
                    </tbody>
                </table>

                <div class="box-footer">

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
    include_once 'views/layout/footer.php';
?>