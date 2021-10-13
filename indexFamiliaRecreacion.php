<?php 


    include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
    include_once ('controllers/sesiones.php');
    include_once ('views/layout/header.php');
    include_once ('views/layout/sidebar.php');
    include_once ('views/layout/topbar.php');
    include_once ('controllers/familiaController.php');
    include_once ('controllers/comunidadController.php');
    
    $controlador = new familiaController();
    $controladorComunidad = new comunidadController();

    if(!isset($_GET['b'])){
        $_GET['b'] = "";
    }

    $buscar = $_GET['b'];

    $sector = $_GET['sector'];
    $comunidad = $_GET['comunidad'];
    $id_recreacion = $_GET['id_recreacion'];
    $recreacion = $_GET['recreacion'];

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
    $resultado = $controlador->listarRecreaciones($desde, $registros_por_pagina,$sector, $comunidad, $id_recreacion, $buscar);

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
                    <h2>Reporte por recreacion</h2>
                    
                    <div>
                        <a href="indexFamiliaRecreacion.php?comunidad=<?php echo $comunidad ?>&sector=<?php echo $sector ?>&recreacion=<?php echo $recreacion; ?>&id_recreacion=<?php echo $id_recreacion; ?>&registros=<?php echo $total_registros; ?>" class="btn color-success text-light"><i class="las la-sync-alt"></i></a>
                    </div>  
                    
                </div>
                <?php if($sector == "%%"){ $sectorMostrar = "Todos";}else{$sectorMostrar = $sector;} ?>
                <?php if($comunidad == "%%"){ $comunidadMostrar = "Todos";}else{$comunidadMostrar = $comunidad;} ?>
                <p style="font-size: small; margin-top: -20px;"> 🡢 <b>Sector:</b> <?= $sectorMostrar ?> 🡢 <b>Comunidad:</b> <?= $comunidadInfo['nombre'] ?> 🡢 <b>Recreacion: </b><?= $recreacion ?></p>
                <br>
                <form role="form" name="buscar" id="buscar" method="GET" action="indexFamiliaRecreacion.php" class="search">
                    <label>
                        <input type="hidden" name="comunidad" value="<?= $comunidad ?>">
                        <input type="hidden" name="sector" value="<?= $sector ?>">
                        <input type="hidden" name="id_recreacion" value="<?= $id_recreacion ?>">
                        <input type="hidden" name="recreacion" value="<?= $recreacion ?>">
                        <input type="hidden" name="registros" value="<?= $total_registros ?>">
                        <input type="text" placeholder="Buscar por DPI o nombre" name="b" value="<?php echo $buscar; ?>">
                        <i class="las la-search"></i>
                    </label>
                </form>
                <table class="table tabla-normal-ancho">
                    <thead>
                        <td>ID FAMILIA</td>
                        <td>ENTREVISTADO</td>
                        <td>DPI</td>
                        <td>TELEFONO CELULAR</td>
                        <td>TELEFONO DOMICILIAR</td>
                        <td>NUMERO CASA</td>
                        <td>DIRECCION</td>
                        <td>COMUNIDAD</td>
                        <td>SECTOR</td>
                        <td>TENENCIA</td>
                        <td>OPCIONES</td>
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
                            <li><a href="?pagina=<?php echo 1; ?>&b=<?php echo $buscar; ?>&comunidad=<?php echo $comunidad ?>&sector=<?php echo $sector ?>&recreacion=<?php echo $recreacion; ?>&id_recreacion=<?php echo $id_recreacion; ?>&registros=<?php echo $total_registros; ?>"><i class="las la-angle-double-left"></i></a></li>
                            <li><a href="?pagina=<?php echo $pagina - 1; ?>&b=<?php echo $buscar; ?>&comunidad=<?php echo $comunidad ?>&sector=<?php echo $sector ?>&recreacion=<?php echo $recreacion; ?>&id_recreacion=<?php echo $id_recreacion; ?>&registros=<?php echo $total_registros; ?>"><i class="las la-angle-left"></i></a></li>   
                            <?php 
                            for($i=1; $i <= $total_paginas ; $i++){
                                if($i == $pagina){
                                    echo '<li class="paginaSelect">'.$i.'</li>';
                                }else{
                                echo '<li><a href="?pagina='.$i.'&b='.$buscar.'&comunidad='.$comunidad.'&sector='.$sector.'&recreacion='.$recreacion.'&id_recreacion='.$id_recreacion.'&registros='.$total_registros.'">'.$i.'</a></li>';
                                }
                            }
                            ?>
                            <li><a href="?pagina=<?php if($pagina < $total_paginas){echo $pagina + 1;}else{echo $pagina;}?>&b=<?php echo $buscar; ?>&comunidad=<?php echo $comunidad ?>&sector=<?php echo $sector ?>&recreacion=<?php echo $recreacion; ?>&id_recreacion=<?php echo $id_recreacion; ?>&registros=<?php echo $total_registros; ?>"><i class="las la-angle-right"></i></a></li>
                            <li><a href="?pagina=<?php echo $total_paginas; ?>&b=<?php echo $buscar; ?>&comunidad=<?php echo $comunidad ?>&sector=<?php echo $sector ?>&recreacion=<?php echo $recreacion; ?>&id_recreacion=<?php echo $id_recreacion; ?>&registros=<?php echo $total_registros; ?>"><i class="las la-angle-double-right"></i></a></li>
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