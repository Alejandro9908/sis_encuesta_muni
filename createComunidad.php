<?php 
    include_once 'controllers/sesiones.php';
    include_once 'views/layout/header.php';
    include_once 'views/layout/sidebar.php';
    include_once 'views/layout/topbar.php';
    include_once 'controllers/comunidadController.php';
    include_once 'controllers/sectorController.php';
    $controlador = new ComunidadController();

    
    $sectores = array();
    $sectores = $controlador->listarSectores();
    
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
                    <h2>Nueva Comunidad</h2>
                    
                    <div>
                        <a href="indexComunidad.php" class="btn color-danger text-light"><i class="las la-times"></i></a>
                    </div>   
                </div>
                <div class="form-container">
                    <form role="form" name="crearComunidad" id="crearComunidad" method="POST" action="controllers/comunidadProcesos.php">
                        <div class="form-row-2">
                            <div class="form-item">
                                <label for="txt_nombre" class="text-gray">Nombre <span style="color: red;">*</span></label>
                                <input type="text" id="txt_nombre" name="txt_nombre" required value="" class="form-control"
                                placeholder="Ingresar nombre">
                            </div>
                            <div class="form-item">
                                <label for="txt_descripcion" class="text-gray">Descripcion</label>
                                <input type="text" id="txt_descripcion" name="txt_descripcion" value="" class="form-control"
                                placeholder="Ingrese una descripcion">
                            </div>
                            <div class="form-item">
                            <label for="txt_tipo" class="text-gray">Tipo <span style="color: red;">*</span></label>
                                <select class="form-control" name="txt_tipo" id="txt_tipo" required>
                                    <option value="barrio">Barrio</option>
                                    <option value="colonia">Colonia</option>
                                    <option value="lotificacion">Lotificacion</option>
                                    <option value="aldea">Aldea</option>
                                    <option value="caserio">Caserio</option>
                                </select>
                            </div>
                            
                            <div class="form-item">
                                <label for="txt_rol" class="text-gray">Sector <span style="color: red;">*</span></label>
                                <select class="form-control" name="txt_sector" id="txt_sector" required>
                                  
                                    <?php 
                                    foreach ($sectores as $s){
                                    ?>
                                        <option value="<?php echo $s->get('id_sector');?>"><?php echo $s->get('nombre');?></option>
                                    <?php 
                                    }//termina ciclo for
                                    ?>
                                </select>
                            </div>

                        </div>
                        <div class="form-footer">
                            <input type="hidden" name="registro" value="guardar">   
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

<script type="text/javascript" defer>

    listarSectores();

    $('#txt_sector').click(function(){
        sectores = $('#txt_sector').val()
        console.log(sectores);
    });

    $("#addSector").click(function(e){
        e.preventDefault();
        
        $('.modal-container').fadeIn();
        $('.modal-title').text('Agregar Sector');
        $('.modal-body').html('<form action="" method="post" name="agregarSector" id="agregarSector"'+
                                'onsubmit="event.preventDefault(); agregar_sector();"'+
                                'class="form-container">'+
                                '<div class="form-row-1">'+
                                '<div class="form-item">'+
                                '<label for="txt_nombre" class="text-gray">Nombre</label>'+
                                '<input type="text" id="txt_nombre" name="txt_nombre" required value="" class="form-control"'+
                                'placeholder="">'+
                                '</div>'+
                                '<div class="form-item">'+
                                '<label for="txt_descripcion" class="text-gray">Descripcion</label>'+
                                '<input type="text" id="txt_descripcion" name="txt_descripcion" value=""'+
                                'class="form-control" placeholder="">'+
                                '</div>'+
                                '</div>'+
                                '<div class="form-footer">'+
                                '<input type="hidden" name="registro" value="guardar">'+
                                '<input type="submit" value="Guardar" class="btn color-primary text-light">'+
                                '<input type="button" value="Cancelar" onclick="cerrarModal();" class="btn color-danger text-light cerrar-modal">'+
                                '</div>'+
                                '</form>');                      
        
	});

    function agregar_sector(){
    var datos = $('#agregarSector').serializeArray();
    
    $.post("controllers/sectorProcesos.php", datos, function (respuesta){
        $('.modal-container').fadeOut();
        listarSectores();
        setTimeout(function(){
            if(respuesta == 'exito'){
                $('.modal-container').fadeIn();
                $('.modal-title').text('Mensaje');
                $('.modal-body').html(  '<div>'+
                                            '<p>Registro agregado correctamente</p><br>'+
                                            '<input type="button" value="Aceptar" onclick="cerrarModal();" style="padding: 10px 15px;" class="btn color-primary text-light cerrar-modal">'+
                                            '</div>');
                $('#editarPassword').trigger('reset');
            }else{
                $('.modal-container').fadeIn();
                $('.modal-title').text('Mensaje');
                $('.modal-body').html(  '<div>'+
                                            '<p>Error al guardar el registro</p><br>'+
                                            '<input type="button" value="Aceptar" onclick="cerrarModal();" style="padding: 10px 15px;" class="btn color-primary text-light cerrar-modal">'+
                                            '</div>');
        }
        }, 400);
    });
    
}

function listarSectores(){
    $.ajax({
        url: 'controllers/select/listarSectores.php',
        type: 'GET',
        success: function(respuesta){
            let Sectores = JSON.parse(respuesta);
            let lista = '';
            Sectores.forEach(e => {
                lista += `
                <option value="${e.id_opcion}">${e.nombre}</option>
                `
            });
            $('#txt_sector').html(lista);
        }
    });
}
    
</script>