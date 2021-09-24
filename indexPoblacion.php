<?php 

    include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
    include_once ('controllers/sesiones.php');
    include_once ('views/layout/header.php');
    include_once ('views/layout/sidebar.php');
    include_once ('views/layout/topbar.php');
    include_once ('controllers/reportePoblacionController.php');
    
    $controlador = new reportePoblacionController();

    if(!isset($_GET['b'])){
        $_GET['b'] = "";
    }

    $buscar = $_GET['b'];

    //paginador
    $total_registros = $controlador->contarRegistros($buscar);
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
    $resultado = $controlador->listar($buscar, $desde, $registros_por_pagina);

    $rol = $_SESSION['rol'];
?>



<div class="content-wrapper">
    <!--no tiene content-heaer-->
    <div class="content">
        <div class="row">
            <div class="box scroll-x color-light">
                <div class="box-header">
                    <h2>Reporte de población</h2>
                    <div>
                        <a href="indexPoblacion.php" class="btn color-success text-light"><i class="las la-sync-alt"></i></a>
                    </div>  
                </div>
                <form role="form" name="buscar" id="buscar" method="GET" action="indexPoblacion.php" class="search">
                    <label>
                        <input type="text" placeholder="Buscar por DPI, nombre, comunidad o sector" name="b" value="<?php echo $buscar; ?>">
                        <i class="las la-search"></i>
                    </label>
                </form>
                <table class="table tabla-normal-ancho">
                    <thead>
                        <td>ID FAMILIA</td>
                        <td>ID</td>
                        <td>NOMBRE</td>
                        <td>DPI</td>
                        <td>SEXO</td>
                        <td>EDAD</td>
                        <td>ESTADO CIVIL</td>
                        <td>ESCOLARIDAD</td>
                        <td>TELEFONO</td>
                        <td>COMUNIDAD</td>
                        <td>OPCIONES</td>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($resultado as $r){
                        ?>
                        <tr>
                            <td><?php echo $r['id_familia']; ?></td>
                            <td><?php echo $r['id_persona']; ?></td>
                            <td><?php echo $r['nombre_completo']; ?></td>
                            <td><?php echo $r['dpi']; ?></td>
                            <td><?php echo $r['sexo']; ?></td>
                            <td><?php echo $r['edad']; ?></td>
                            <td><?php echo $r['estado_civil']; ?></td>
                            <td><?php echo $r['escolaridad']; ?></td>
                            <td><?php echo $r['telefono']; ?></td>
                            <td><?php echo $r['comunidad']; ?></td>
                            <td>
                                <a href="showPersona.php?id_persona=<?php echo $r['id_persona']; ?>" class="btn color-info">Ver Detalle</a>
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
                            <li><a href="?pagina=<?php echo 1; ?>&b=<?php echo $buscar; ?>"><i class="las la-angle-double-left"></i></a></li>
                            <li><a href="?pagina=<?php echo $pagina - 1; ?>&b=<?php echo $buscar; ?>"><i class="las la-angle-left"></i></a></li>   
                            <?php 
                            for($i=1; $i <= $total_paginas ; $i++){
                                if($i == $pagina){
                                    echo '<li class="paginaSelect">'.$i.'</li>';
                                }else{
                                echo '<li><a href="?pagina='.$i.'&b='.$buscar.'">'.$i.'</a></li>';
                                }
                            }
                            ?>
                            <li><a href="?pagina=<?php if($pagina < $total_paginas){echo $pagina + 1;}else{echo $pagina;}?>&b=<?php echo $buscar; ?>"><i class="las la-angle-right"></i></a></li>
                            <li><a href="?pagina=<?php echo $total_paginas; ?>&b=<?php echo $buscar; ?>"><i class="las la-angle-double-right"></i></a></li>
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