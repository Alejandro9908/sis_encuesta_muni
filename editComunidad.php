<?php 
    include_once 'controllers/sesiones.php';
    include_once 'views/layout/header.php';
    $id = $_GET['id_comunidad'];
    if(!filter_var($id,FILTER_VALIDATE_INT)){
      die('Error');
    }
    include_once 'views/layout/sidebar.php';
    include_once 'views/layout/topbar.php';
    include_once 'controllers/comunidadController.php';

    $controlador = new ComunidadController();

    $sectores = array();
    $sectores = $controlador->listarSectores();

    $resultado = $controlador->buscar($id);
    
?>



<div class="content-wrapper">
    <div class="box-header">
    	<h2>Comunidades</h2>
        <div>
            <p style="font-size: small; color: red;">* Campo Obligatorio</p>
        </div>
    </div>
    <!--Termina content-heaer-->

    <div class="content">
        <div class="row">
            <div class="box color-light">
                <div class="box-header">
                    <h2>Editar Comunidad</h2>
                    <div>
                        <a href="indexComunidad.php" class="btn color-danger text-light"><i class="las la-times"></i></a>
                    </div>   
                </div>
                <div class="form-container">
                    <form role="form" name="editarComunidad" id="editarComunidad" method="POST" action="controllers/comunidadProcesos.php">
                        <div class="form-row-2">
                            <div class="form-item">
                                <label for="txt_nombre" class="text-gray">Nombre <span style="color: red;">*</span></label>
                                <input type="text" id="txt_nombre" name="txt_nombre" required value="<?php echo $resultado->get('nombre');?>" class="form-control"
                                placeholder="Ingresar nombre completo">
                            </div>
                            <div class="form-item">
                                <label  for="txt_descripcion" class="text-gray">Descripcion</label>
                                <input type="text" id="txt_descripcion" name="txt_descripcion" value="<?php echo $resultado->get('descripcion');?>" class="form-control"
                                placeholder="Nombre de usuario">
                            </div>
                            <div class="form-item">
                                <label  for="txt_tipo" class="text-gray">Tipo <span style="color: red;">*</span></label>
                                <select class="form-control" name="txt_tipo" id="txt_tipo" required>
                                    <option <?php if($resultado->get('tipo')=="barrio"){?>selected <?php } ?> value="barrio">Barrio</option>
                                    <option <?php if($resultado->get('tipo')=="colonia"){?>selected <?php } ?> value="colonia">Colonia</option>
                                    <option <?php if($resultado->get('tipo')=="lotificacion"){?>selected <?php } ?> value="lotificacion">Lotificacion</option>
                                    <option <?php if($resultado->get('tipo')=="aldea"){?>selected <?php } ?> value="aldea">Aldea</option>
                                    <option <?php if($resultado->get('tipo')=="caserio"){?>selected <?php } ?> value="caserio">Caserio</option>
                                </select>
                            </div>
                            <div class="form-item">
                                <label for="txt_sector" class="text-gray">Sector <span style="color: red;">*</span></label>
                                <select class="form-control" name="txt_sector" id="txt_sector-edit" required >
                                    <?php 
                                    foreach ($sectores as $s){
                                    ?>
                                        <option <?php if($s->get('id_sector') == $resultado->get('id_sector')){?>selected <?php } ?> value="<?php echo $s->get('id_sector');?>"><?php echo $s->get('nombre');?></option>
                                    <?php 
                                    }//termina ciclo for
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-footer">
                            <input type="hidden" name="registro" value="editar">
                            <input type="hidden" name="txt_id" value="<?php echo $resultado->get('id_comunidad');?>">      
                            <input type="submit" value="Guardar" class="color-primary text-light">
                            <a href="indexComunidad.php"><input type="button" value="Cancelar" class="color-danger text-light"></a>
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
    include_once 'views/layout/footer.php';
?>