<?php 
    include ("./constantes.php");
    
    //$nombre_carpeta_proyecto = 'proyectoCensoMuni';
    $nombre_carpeta_proyecto = UBICACION_PROYECTO;

    include_once ($_SERVER['DOCUMENT_ROOT'].'/' . $nombre_carpeta_proyecto . '/routes.php');
    include_once ('controllers/sesiones.php');
    include_once ('views/layout/header.php');
    include_once ('views/layout/sidebar.php');
    include_once ('views/layout/topbar.php');
    include_once ('controllers/usuarioController.php');
    
    $controlador = new usuarioController();

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
                    <h2>Usuarios</h2>
                    <div>
                        <a href="indexUsuario.php" class="btn color-success text-light"><i class="las la-sync-alt"></i></a>
                        <a href="createUsuario.php" class="btn color-primary text-light">Nuevo Usuario</a>
                    </div>  
                </div>
                <form role="form" name="buscar" id="buscar" method="GET" action="indexUsuario.php" class="search">
                    <label>
                        <input type="text" placeholder="Buscar" name="b" value="<?php echo $buscar; ?>">
                        <i class="las la-search"></i>
                    </label>
                </form>
                <table class="table">
                    <thead>
                        <td>ID</td>
                        <td>NOMBRE</td>
                        <td>USUARIO</td>
                        <td>ROL</td>
                        <td>ESTADO</td>
                        <td>OPCIONES</td>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($resultado as $r){
                        ?>
                        <tr>
                            <td><?php echo $r->get('id_usuario'); ?></td>
                            <td><?php echo $r->get('nombre'); ?></td>
                            <td><?php echo $r->get('usuario'); ?></td>
                            <td><?php echo $r->get('rol'); ?></td>
                            <td>
                                <?php 
                                if($r->get('estado')==0){
                                    echo "Inactivo";
                                } else if($r->get('estado')==1){
                                    echo "Activo";
                                } 
                                ?>
                            </td>
                            <td>
                                <a href="showUsuario.php?id_usuario=<?php echo $r->get('id_usuario'); ?>" class="btn color-info">Ver</a>
                                <a href="editUsuario.php?id_usuario=<?php echo $r->get('id_usuario'); ?>" class="btn color-warning">Editar</a>
                                <?php if($r->get('estado')==1){ ?>
                                <a href="#" product="<?php echo $r->get('id_usuario'); ?>" class="btn color-danger inactivar_usuario">Inactivar</a>
                                <?php }else  if($r->get('estado')==0){?>
                                <a href="#" product="<?php echo $r->get('id_usuario'); ?>" class="btn color-primary activar_usuario">Activar</a>
                                <?php } ?>   
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