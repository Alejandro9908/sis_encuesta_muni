$(document).ready(function(){ 
    
    listarEnfermedades();
    listarDiscapacidades();
    listarTransportes();
    listarParedes();
    listarTechos();
    listarPisos();
    listarMobiliarios();
    listarServicios();
    listarServiciosMedicos();
    listarRecreaciones();
    listarSectores();
    listarTenencia();
    listarSanitarios();
    

    $("#addEnfermedad").click(function(e){
        e.preventDefault();
        
        $('.modal-container').fadeIn();
        $('.modal-title').text('Agregar Enfermedad');
        $('.modal-body').html('<form action="" method="post" name="agregarEnfermedad" id="agregarEnfermedad"'+
                                'onsubmit="event.preventDefault(); agregar_enfermedad();"'+
                                'class="form-container">'+
                                '<div class="form-row-1">'+
                                '<div class="form-item">'+
                                '<label for="txt_nombre" class="text-gray">Enfermedad <span style="color: red;">*</span></label>'+
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
                                '<input type="hidden" name="opcion" value="enfermedad">'+
                                '<input type="submit" value="Guardar" class="btn color-primary text-light">'+
                                '<input type="button" value="Cancelar" onclick="cerrarModal();" class="btn color-danger text-light cerrar-modal">'+
                                '</div>'+
                                '</form>');                      
        
	});

    $("#addDiscapacidad").click(function(e){
        e.preventDefault();
        
        $('.modal-container').fadeIn();
        $('.modal-title').text('Agregar Discapacidad');
        $('.modal-body').html('<form action="" method="post" name="agregarDiscapacidad" id="agregarDiscapacidad"'+
                                'onsubmit="event.preventDefault(); agregar_discapacidad();"'+
                                'class="form-container">'+
                                '<div class="form-row-1">'+
                                '<div class="form-item">'+
                                '<label for="txt_nombre" class="text-gray">Discapacidad <span style="color: red;">*</span></label>'+
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
                                '<input type="hidden" name="opcion" value="discapacidad">'+
                                '<input type="submit" value="Guardar" class="btn color-primary text-light">'+
                                '<input type="button" value="Cancelar" onclick="cerrarModal();" class="btn color-danger text-light cerrar-modal">'+
                                '</div>'+
                                '</form>');                      
        
	});


    $("#addTransporte").click(function(e){
        e.preventDefault();
        
        $('.modal-container').fadeIn();
        $('.modal-title').text('Agregar Transporte');
        $('.modal-body').html('<form action="" method="post" name="agregarTransporte" id="agregarTransporte"'+
                                'onsubmit="event.preventDefault(); agregar_transporte();"'+
                                'class="form-container">'+
                                '<div class="form-row-1">'+
                                '<div class="form-item">'+
                                '<label for="txt_nombre" class="text-gray">Transporte <span style="color: red;">*</span></label>'+
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
                                '<input type="hidden" name="opcion" value="transporte">'+
                                '<input type="submit" value="Guardar" class="btn color-primary text-light">'+
                                '<input type="button" value="Cancelar" onclick="cerrarModal();" class="btn color-danger text-light cerrar-modal">'+
                                '</div>'+
                                '</form>');                      
        
	});

    $("#addPared").click(function(e){
        e.preventDefault();
        
        $('.modal-container').fadeIn();
        $('.modal-title').text('Agregar tipo de pared');
        $('.modal-body').html('<form action="" method="post" name="agregarPared" id="agregarPared"'+
                                'onsubmit="event.preventDefault(); agregar_pared();"'+
                                'class="form-container">'+
                                '<div class="form-row-1">'+
                                '<div class="form-item">'+
                                '<label for="txt_nombre" class="text-gray">Tipo de pared <span style="color: red;">*</span></label>'+
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
                                '<input type="hidden" name="opcion" value="pared">'+
                                '<input type="submit" value="Guardar" class="btn color-primary text-light">'+
                                '<input type="button" value="Cancelar" onclick="cerrarModal();" class="btn color-danger text-light cerrar-modal">'+
                                '</div>'+
                                '</form>');                      
        
	});

    $("#addTecho").click(function(e){
        e.preventDefault();
        
        $('.modal-container').fadeIn();
        $('.modal-title').text('Agregar tipo de techo');
        $('.modal-body').html('<form action="" method="post" name="agregarTecho" id="agregarTecho"'+
                                'onsubmit="event.preventDefault(); agregar_techo();"'+
                                'class="form-container">'+
                                '<div class="form-row-1">'+
                                '<div class="form-item">'+
                                '<label for="txt_nombre" class="text-gray">Tipo de techo <span style="color: red;">*</span></label>'+
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
                                '<input type="hidden" name="opcion" value="techo">'+
                                '<input type="submit" value="Guardar" class="btn color-primary text-light">'+
                                '<input type="button" value="Cancelar" onclick="cerrarModal();" class="btn color-danger text-light cerrar-modal">'+
                                '</div>'+
                                '</form>');                      
        
	});

    $("#addPiso").click(function(e){
        e.preventDefault();
        
        $('.modal-container').fadeIn();
        $('.modal-title').text('Agregar tipo de piso');
        $('.modal-body').html('<form action="" method="post" name="agregarPiso" id="agregarPiso"'+
                                'onsubmit="event.preventDefault(); agregar_piso();"'+
                                'class="form-container">'+
                                '<div class="form-row-1">'+
                                '<div class="form-item">'+
                                '<label for="txt_nombre" class="text-gray">Tipo de piso <span style="color: red;">*</span></label>'+
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
                                '<input type="hidden" name="opcion" value="piso">'+
                                '<input type="submit" value="Guardar" class="btn color-primary text-light">'+
                                '<input type="button" value="Cancelar" onclick="cerrarModal();" class="btn color-danger text-light cerrar-modal">'+
                                '</div>'+
                                '</form>');                      
        
	});

    $("#addMobiliario").click(function(e){
        e.preventDefault();
        
        $('.modal-container').fadeIn();
        $('.modal-title').text('Agregar Mobiliario y Equipo');
        $('.modal-body').html('<form action="" method="post" name="agregarMobiliario" id="agregarMobiliario"'+
                                'onsubmit="event.preventDefault(); agregar_mobiliario();"'+
                                'class="form-container">'+
                                '<div class="form-row-1">'+
                                '<div class="form-item">'+
                                '<label for="txt_nombre" class="text-gray">Mobiliario o equipo <span style="color: red;">*</span></label>'+
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
                                '<input type="hidden" name="opcion" value="mobiliario">'+
                                '<input type="submit" value="Guardar" class="btn color-primary text-light">'+
                                '<input type="button" value="Cancelar" onclick="cerrarModal();" class="btn color-danger text-light cerrar-modal">'+
                                '</div>'+
                                '</form>');                      
        
	});

    $("#addServicio").click(function(e){
        e.preventDefault();
        
        $('.modal-container').fadeIn();
        $('.modal-title').text('Agregar servicio b??sico');
        $('.modal-body').html('<form action="" method="post" name="agregarServicio" id="agregarServicio"'+
                                'onsubmit="event.preventDefault(); agregar_servicio();"'+
                                'class="form-container">'+
                                '<div class="form-row-1">'+
                                '<div class="form-item">'+
                                '<label for="txt_nombre" class="text-gray">Servicio b??sico <span style="color: red;">*</span></label>'+
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
                                '<input type="hidden" name="opcion" value="servicio_basico">'+
                                '<input type="submit" value="Guardar" class="btn color-primary text-light">'+
                                '<input type="button" value="Cancelar" onclick="cerrarModal();" class="btn color-danger text-light cerrar-modal">'+
                                '</div>'+
                                '</form>');                      
        
	});

    $("#addServicioMedico").click(function(e){
        e.preventDefault();
        
        $('.modal-container').fadeIn();
        $('.modal-title').text('Agregar servicio medico');
        $('.modal-body').html('<form action="" method="post" name="agregarServicioMedico" id="agregarServicioMedico"'+
                                'onsubmit="event.preventDefault(); agregar_servicio_medico();"'+
                                'class="form-container">'+
                                '<div class="form-row-1">'+
                                '<div class="form-item">'+
                                '<label for="txt_nombre" class="text-gray">Servicio medico <span style="color: red;">*</span></label>'+
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
                                '<input type="hidden" name="opcion" value="servicio_medico">'+
                                '<input type="submit" value="Guardar" class="btn color-primary text-light">'+
                                '<input type="button" value="Cancelar" onclick="cerrarModal();" class="btn color-danger text-light cerrar-modal">'+
                                '</div>'+
                                '</form>');                      
        
	});

    $("#addRecreacion").click(function(e){
        e.preventDefault();
        
        $('.modal-container').fadeIn();
        $('.modal-title').text('Agregar recreacion');
        $('.modal-body').html('<form action="" method="post" name="agregarRecreacion" id="agregarRecreacion"'+
                                'onsubmit="event.preventDefault(); agregar_recreacion();"'+
                                'class="form-container">'+
                                '<div class="form-row-1">'+
                                '<div class="form-item">'+
                                '<label for="txt_nombre" class="text-gray">Recreaci??n <span style="color: red;">*</span></label>'+
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
                                '<input type="hidden" name="opcion" value="recreacion">'+
                                '<input type="submit" value="Guardar" class="btn color-primary text-light">'+
                                '<input type="button" value="Cancelar" onclick="cerrarModal();" class="btn color-danger text-light cerrar-modal">'+
                                '</div>'+
                                '</form>');                      
        
	});

    $("#addSanitario").click(function(e){
        e.preventDefault();
        
        $('.modal-container').fadeIn();
        $('.modal-title').text('Agregar tipo de sanitario');
        $('.modal-body').html('<form action="" method="post" name="agregarSanitario" id="agregarSanitario"'+
                                'onsubmit="event.preventDefault(); agregar_sanitario();"'+
                                'class="form-container">'+
                                '<div class="form-row-1">'+
                                '<div class="form-item">'+
                                '<label for="txt_nombre" class="text-gray">Tipo de sanitario <span style="color: red;">*</span></label>'+
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
                                '<input type="hidden" name="opcion" value="sanitario">'+
                                '<input type="submit" value="Guardar" class="btn color-primary text-light">'+
                                '<input type="button" value="Cancelar" onclick="cerrarModal();" class="btn color-danger text-light cerrar-modal">'+
                                '</div>'+
                                '</form>');                      
        
	});

    $('#txt_sector').change(function(){
        var sector = $('#txt_sector').val()
        listarComunidades(sector);
    });

});


function agregar_enfermedad(){
    var datos = $('#agregarEnfermedad').serializeArray();
    
    $.post("controllers/opcionesProcesos.php", datos, function (respuesta){
        $('.modal-container').fadeOut();
        listarEnfermedades();
        setTimeout(function(){
            console.log(respuesta);
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

function listarEnfermedades(){
    $.ajax({
        url: 'controllers/select/listarEnfermedades.php',
        type: 'GET',
        success: function(respuesta){
            let enfermedades = JSON.parse(respuesta);
            let lista = '';
            enfermedades.forEach(e => {
                lista += `
                <option value="${e.id_opcion}">${e.nombre}</option>
                `
            });
            $('#txt_enfermedad').html(lista);
        }
    });
}

function agregar_discapacidad(){
    var datos = $('#agregarDiscapacidad').serializeArray();
    
    $.post("controllers/opcionesProcesos.php", datos, function (respuesta){
        $('.modal-container').fadeOut();
        listarDiscapacidades();
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

function listarDiscapacidades(){
    $.ajax({
        url: 'controllers/select/listarDiscapacidades.php',
        type: 'GET',
        success: function(respuesta){
            let Discapacidades = JSON.parse(respuesta);
            let lista = '';
            Discapacidades.forEach(e => {
                lista += `
                <option value="${e.id_opcion}">${e.nombre}</option>
                `
            });
            $('#txt_discapacidad').html(lista);
        }
    });
}

function agregar_transporte(){
    var datos = $('#agregarTransporte').serializeArray();
    
    $.post("controllers/opcionesProcesos.php", datos, function (respuesta){
        $('.modal-container').fadeOut();
        listarTransportes();
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

function listarTransportes(){
    $.ajax({
        url: 'controllers/select/listarTransportes.php',
        type: 'GET',
        success: function(respuesta){
            let Transportes = JSON.parse(respuesta);
            let lista = '';
            Transportes.forEach(e => {
                lista += `
                <option value="${e.id_opcion}">${e.nombre}</option>
                `
            });
            $('#txt_transportes').html(lista);
        }
    });
}

function agregar_pared(){
    var datos = $('#agregarPared').serializeArray();
    
    $.post("controllers/opcionesProcesos.php", datos, function (respuesta){
        $('.modal-container').fadeOut();
        listarParedes();
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

function listarParedes(){
    $.ajax({
        url: 'controllers/select/listarParedes.php',
        type: 'GET',
        success: function(respuesta){
            let Transportes = JSON.parse(respuesta);
            let lista = '<option value="" disabled selected>Seleccione una opci??n</option>';
            Transportes.forEach(e => {
                lista += `
                <option value="${e.id_opcion}">${e.nombre}</option>
                `
            });
            $('#txt_pared').html(lista);
        }
    });
}

function agregar_techo(){
    var datos = $('#agregarTecho').serializeArray();
    
    $.post("controllers/opcionesProcesos.php", datos, function (respuesta){
        $('.modal-container').fadeOut();
        listarTechos();
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

function listarTechos(){
    $.ajax({
        url: 'controllers/select/listarTechos.php',
        type: 'GET',
        success: function(respuesta){
            let Resultado = JSON.parse(respuesta);
            let lista = '<option value="" disabled selected>Seleccione una opci??n</option>';
            Resultado.forEach(e => {
                lista += `
                <option value="${e.id_opcion}">${e.nombre}</option>
                `
            });
            $('#txt_techo').html(lista);
        }
    });
}

function agregar_piso(){
    var datos = $('#agregarPiso').serializeArray();
    
    $.post("controllers/opcionesProcesos.php", datos, function (respuesta){
        $('.modal-container').fadeOut();
        listarPisos();
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

function listarPisos(){
    $.ajax({
        url: 'controllers/select/listarPisos.php',
        type: 'GET',
        success: function(respuesta){
            let Resultado = JSON.parse(respuesta);
            let lista = '<option value="" disabled selected>Seleccione una opci??n</option>';
            Resultado.forEach(e => {
                lista += `
                <option value="${e.id_opcion}">${e.nombre}</option>
                `
            });
            $('#txt_piso').html(lista);
        }
    });
}

function agregar_mobiliario(){
    var datos = $('#agregarMobiliario').serializeArray();
    
    $.post("controllers/opcionesProcesos.php", datos, function (respuesta){
        $('.modal-container').fadeOut();
        listarMobiliarios();
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

function listarMobiliarios(){
    $.ajax({
        url: 'controllers/select/listarMobiliarios.php',
        type: 'GET',
        success: function(respuesta){
            let Resultado = JSON.parse(respuesta);
            let lista = '';
            Resultado.forEach(e => {
                lista += `
                <option value="${e.id_opcion}">${e.nombre}</option>
                `
            });
            $('#txt_mobiliario').html(lista);
        }
    });
}

function agregar_servicio(){
    var datos = $('#agregarServicio').serializeArray();
    
    $.post("controllers/opcionesProcesos.php", datos, function (respuesta){
        $('.modal-container').fadeOut();
        listarServicios();
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

function listarServicios(){
    $.ajax({
        url: 'controllers/select/listarServicios.php',
        type: 'GET',
        success: function(respuesta){
            let Resultado = JSON.parse(respuesta);
            let lista = '';
            Resultado.forEach(e => {
                lista += `
                <option value="${e.id_opcion}">${e.nombre}</option>
                `
            });
            $('#txt_servicio').html(lista);
        }
    });
}

function agregar_servicio_medico(){
    var datos = $('#agregarServicioMedico').serializeArray();
    
    $.post("controllers/opcionesProcesos.php", datos, function (respuesta){
        $('.modal-container').fadeOut();
        listarServiciosMedicos();
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

function listarServiciosMedicos(){
    $.ajax({
        url: 'controllers/select/listarServiciosMedicos.php',
        type: 'GET',
        success: function(respuesta){
            let Resultado = JSON.parse(respuesta);
            let lista = '<option value="" disabled selected>Seleccione una opci??n</option>';
            Resultado.forEach(e => {
                lista += `
                <option value="${e.id_opcion}">${e.nombre}</option>
                `
            });
            $('#txt_servicio_medico').html(lista);
        }
    });
}

function agregar_recreacion(){
    var datos = $('#agregarRecreacion').serializeArray();
    
    $.post("controllers/opcionesProcesos.php", datos, function (respuesta){
        $('.modal-container').fadeOut();
        listarRecreaciones();
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

function listarRecreaciones(){
    $.ajax({
        url: 'controllers/select/listarRecreaciones.php',
        type: 'GET',
        success: function(respuesta){
            let Resultado = JSON.parse(respuesta);
            let lista = '';
            Resultado.forEach(e => {
                lista += `
                <option value="${e.id_opcion}">${e.nombre}</option>
                `
            });
            $('#txt_recreacion').html(lista);
        }
    });
}

function listarSectores(){
    $.ajax({
        url: 'controllers/select/listarSectores.php',
        type: 'GET',
        success: function(respuesta){
            let Resultado = JSON.parse(respuesta);
            let lista = '<option value="" disabled selected>Seleccione una opci??n</option>';
            Resultado.forEach(e => {
                lista += `
                <option value="${e.id_opcion}">${e.nombre}</option>
                `
            });
            $('#txt_sector').html(lista);
        }
    });
}

function listarComunidades(sector){
    $.ajax({
        url: 'controllers/select/listarComunidades.php?sector='+sector,
        type: 'GET',
        success: function(respuesta){
            let Resultado = JSON.parse(respuesta);
            let lista = '<option value="" disabled selected>Seleccione una opci??n</option>';
            Resultado.forEach(e => {
                lista += `
                <option value="${e.id_comunidad}">${e.nombre}</option>
                `
            });

            $('#txt_comunidad').html(lista);
        }
    });
}

function listarTenencia(){
    $.ajax({
        url: 'controllers/select/listarTenencia.php',
        type: 'GET',
        success: function(respuesta){
            let Resultado = JSON.parse(respuesta);
            let lista = '<option value="" disabled selected>Seleccione una opci??n</option>';
            Resultado.forEach(e => {
                lista += `
                <option value="${e.id_opcion}">${e.nombre}</option>
                `
            });
            $('#txt_tenencia').html(lista);
        }
    });
}

function agregar_sanitario(){
    var datos = $('#agregarSanitario').serializeArray();
    
    $.post("controllers/opcionesProcesos.php", datos, function (respuesta){
        $('.modal-container').fadeOut();
        listarSanitarios();
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

function listarSanitarios(){
    $.ajax({
        url: 'controllers/select/listarSanitarios.php',
        type: 'GET',
        success: function(respuesta){
            let Resultado = JSON.parse(respuesta);
            let lista = '<option value="" disabled selected>Seleccione una opci??n</option>';
            Resultado.forEach(e => {
                lista += `
                <option value="${e.id_opcion}">${e.nombre}</option>
                `
            });
            $('#txt_sanitario').html(lista);
        }
    });
}