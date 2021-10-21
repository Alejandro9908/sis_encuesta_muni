<?php 


    include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
    include_once ('controllers/sesiones.php');
    include_once ('views/layout/header.php');
    include_once ('views/layout/sidebar.php');
    include_once ('views/layout/topbar.php');
    include_once ('controllers/familiaController.php');
    include_once ('controllers/comunidadController.php');
    
    $controlador = new FamiliaController();
    $controladorComunidad = new ComunidadController();

    if(!isset($_GET['b'])){
        $_GET['b'] = "";
    }

    $buscar = $_GET['b'];

    $sector = $_GET['sector'];
    $comunidad = $_GET['comunidad'];
    //servicio medico
    $id_data = $_GET['id_data'];
    $data = $_GET['data'];

    //paginador
    $total_registros = $_GET['registros'];
    $registros_por_pagina = 10;

    if(empty($_GET['pagina'])){
        $pagina = 1;
    }else{
        $pagina = $_GET['pagina'];
    }

    $desde = ($pagina - 1) * $registros_por_pagina;
    $total_paginas = ceil($total_registros/$registros_por_pagina);

    //lista
    $resultado = array();
    $resultado = $controlador->listarMedico($desde, $registros_por_pagina,$sector, $comunidad, $id_data, $buscar);

    if($comunidad != "%%"){
        $comunidadInfo = $controladorComunidad->buscarInfo($comunidad);
    }else{
        $comunidadInfo['nombre'] = "Todos";
    }
    
    

    $rol = $_SESSION['rol'];
?>



<div class="content-wrapper">
    <!--no tiene content-heaer-->
    <div class="content">
        <div class="row">
            <div class="box scroll-x color-light">
                <div class="box-header">
                    <h2>Reporte por familia</h2>
                    
                    <div>
                        <a href="indexFamiliaMedico.php?comunidad=<?php echo $comunidad ?>&sector=<?php echo $sector ?>&data=<?php echo $data; ?>&id_data=<?php echo $id_data; ?>&registros=<?php echo $total_registros; ?>" class="btn color-success text-light"><i class="las la-sync-alt"></i></a>
                    </div>  
                    
                </div>
                <?php if($sector == "%%"){ $sectorMostrar = "Todos";}else{$sectorMostrar = $sector;} ?>
                <?php if($comunidad == "%%"){ $comunidadMostrar = "Todos";}else{$comunidadMostrar = $comunidad;} ?>
                <p style="font-size: small; margin-top: -20px;"> 🡢 <strong>Sector:</strong> <?= $sectorMostrar ?> 🡢 <strong>Comunidad:</strong> <?= $comunidadInfo['nombre'] ?> 🡢 <strong>Servicio Medico: </strong><?= $data ?></p>
                <br>
                <form role="form" name="buscar" id="buscar" method="GET" action="indexFamiliaMedico.php" class="search">
                    <label>
                        <input type="hidden" name="comunidad" value="<?= $comunidad ?>">
                        <input type="hidden" name="sector" value="<?= $sector ?>">
                        <input type="hidden" name="id_data" value="<?= $id_data ?>">
                        <input type="hidden" name="data" value="<?= $data ?>">
                        <input type="hidden" name="registros" value="<?= $total_registros ?>">
                        <input type="text" placeholder="Buscar por DPI o nombre" name="b" value="<?php echo $buscar; ?>">
                        <i class="las la-search"></i>
                    </label>
                </form>
                <table class="table tabla-normal-ancho">
                    <thead>
                        <th scope="col">ID FAMILIA</th>
                        <th scope="col">ENTREVISTADO</th>
                        <th scope="col">DPI</th>
                        <th scope="col">TELEFONO CELULAR</th>
                        <th scope="col">TELEFONO DOMICILIAR</th>
                        <th scope="col">NUMERO CASA</th>
                        <th scope="col">DIRECCION</th>
                        <th scope="col">COMUNIDAD</th>
                        <th scope="col">SECTOR</th>
                        <th scope="col">TENENCIA</th>
                        <th scope="col">OPCIONES</th>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($resultado as $r){
                        ?>
                        <tr>
                            <td><?php echo $r['id_familia']; ?></td>
                            <td><?php echo $r['nombre_entrevistado']; ?></td>
                            <td><?php echo $r['dpi_entrevistado']; ?></td>
                            <td><?php echo $r['telefono_entrevistado']; ?></td>
                            <td><?php echo $r['telefono_domiciliar']; ?></td>
                            <td><?php echo $r['numero_casa']; ?></td>
                            <td><?php echo $r['direccion']; ?></td>
                            <td><?php echo $r['comunidad']; ?></td>
                            <td><?php echo $r['sector']; ?></td>
                            <td><?php echo $r['tenencia']; ?></td>
                            <td>
                                <a href="showFamilia.php?id_familia=<?php echo $r['id_familia']; ?>" class="btn color-info">Ver</a>
                            </td>
                        </tr>
                        <?php 
                        }//termina ciclo for
                        ?>
                        
                    </tbody>
                </table>

                <div class="box-footer">
                    <div class="paginador">
                        <ul>
                            <li><a href="?pagina=<?php echo 1; ?>&b=<?php echo $buscar; ?>&comunidad=<?php echo $comunidad ?>&sector=<?php echo $sector ?>&data=<?php echo $data; ?>&id_data=<?php echo $id_data; ?>&registros=<?php echo $total_registros; ?>"><i class="las la-angle-double-left"></i></a></li>
                            <li><a href="?pagina=<?php echo $pagina - 1; ?>&b=<?php echo $buscar; ?>&comunidad=<?php echo $comunidad ?>&sector=<?php echo $sector ?>&data=<?php echo $data; ?>&id_data=<?php echo $id_data; ?>&registros=<?php echo $total_registros; ?>"><i class="las la-angle-left"></i></a></li>   
                            <?php 
                            for($i=1; $i <= $total_paginas ; $i++){
                                if($i == $pagina){
                                    echo '<li class="paginaSelect">'.$i.'</li>';
                                }
                            }
                            ?>
                            <li><a href="?pagina=<?php if($pagina < $total_paginas){echo $pagina + 1;}else{echo $pagina;}?>&b=<?php echo $buscar; ?>&comunidad=<?php echo $comunidad ?>&sector=<?php echo $sector ?>&data=<?php echo $data; ?>&id_data=<?php echo $id_data; ?>&registros=<?php echo $total_registros; ?>"><i class="las la-angle-right"></i></a></li>
                            <li><a href="?pagina=<?php echo $total_paginas; ?>&b=<?php echo $buscar; ?>&comunidad=<?php echo $comunidad ?>&sector=<?php echo $sector ?>&data=<?php echo $data; ?>&id_data=<?php echo $id_data; ?>&registros=<?php echo $total_registros; ?>"><i class="las la-angle-double-right"></i></a></li>
                        </ul>
                    </div>
                    <div><p style="font-size: 14px;">Resultados encontrados: <?php echo $total_registros ?></p></div>
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