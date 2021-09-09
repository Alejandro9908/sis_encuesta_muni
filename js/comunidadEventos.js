$(document).ready(function(){
    
    $('#crearComunidad').submit(function (e){
        e.preventDefault();
        var datos = $(this).serializeArray();
        
        $.post("controllers/comunidadProcesos.php", datos, function (respuesta){
            console.log(respuesta);
            if(respuesta == 'exito'){
                $('.modal-container').fadeIn();
                $('.modal-title').text('Mensaje');
                $('.modal-body').html(  '<div>'+
                                        '<p>El registro se guardó exitosamente</p><br>'+
                                        '<input type="button" value="Aceptar" onclick="cerrarModal();" style="padding: 10px 15px;" class="btn color-primary text-light cerrar-modal">'+
                                        '</div>');
                $('#crearComunidad').trigger('reset');
            }else{
                $('.modal-container').fadeIn();
                $('.modal-title').text('Mensaje');
                $('.modal-body').html(  '<div>'+
                                        '<p>Ups! Hubo un error al guardar el registro</p><br>'+
                                        '<input type="button" value="Aceptar" onclick="cerrarModal();" style="padding: 10px 15px;" class="btn color-primary text-light cerrar-modal">'+
                                        '</div>');
            }
        });
    });

    $('#editarComunidad').submit(function (e){
        e.preventDefault();
        var datos = $(this).serializeArray();
        
        $.post("controllers/comunidadProcesos.php", datos, function (respuesta){
            console.log(respuesta);
            if(respuesta == 'exito'){
                $('.modal-container').fadeIn();
                $('.modal-title').text('Mensaje');
                $('.modal-body').html(  '<div>'+
                                        '<p>Los cambios se guardaron exitosamente</p><br>'+
                                        '<input type="button" value="Aceptar" onclick="cerrarModal();" style="padding: 10px 15px;" class="btn color-primary text-light cerrar-modal">'+
                                        '</div>');
                $('#crearRegistro').trigger('reset');
            }else{
                $('.modal-container').fadeIn();
                $('.modal-title').text('Mensaje');
                $('.modal-body').html(  '<div>'+
                                        '<p>Ups! Hubo un error al guardar los cambios</p><br>'+
                                        '<input type="button" value="Aceptar" onclick="cerrarModal();" style="padding: 10px 15px;" class="btn color-primary text-light cerrar-modal">'+
                                        '</div>');
            }
        });
    });


    $(".inactivar_comunidad").click(function(e){
        var producto = $(this).attr('product');
        
        $('.modal-container').fadeIn();
        $('.modal-title').text('Inactivar Comunidad');
        $('.modal-body').html('<form action="" method="post" name="inactivarComunidad" id="inactivarComunidad"'+
                                'onsubmit="event.preventDefault(); inactivarC();"'+
                                'class="form-container">'+
                                '<div class="form-row-1">'+
                                '<div class="form-item">'+
                                '<p>¿Está seguro que desea inactivar la comunidad?</p>'+
                                '</div>'+
                                '</div>'+
                                '<div class="form-footer">'+
                                '<input type="hidden" name="registro" value="inactivar">'+
                                '<input type="hidden" value="'+producto+'" name="txt_id" id="txt_id">'+
                                '<input type="submit" value="Si" class="btn color-primary text-light">'+
                                '<input type="button" value="No" onclick="cerrarModal();" class="btn color-danger text-light cerrar-modal">'+
                                '</div>'+
                                '</form>');    
     
	});

    $(".activar_comunidad").click(function(e){
        var producto = $(this).attr('product');
        
        $('.modal-container').fadeIn();
        $('.modal-title').text('Inactivar comunidad');
        $('.modal-body').html('<form action="" method="post" name="activarComunidad" id="activarComunidad"'+
                                'onsubmit="event.preventDefault(); activarC();"'+
                                'class="form-container">'+
                                '<div class="form-row-1">'+
                                '<div class="form-item">'+
                                '<p>¿Está seguro que desea activar la comunidad?</p>'+
                                '</div>'+
                                '</div>'+
                                '<div class="form-footer">'+
                                '<input type="hidden" name="registro" value="activar">'+
                                '<input type="hidden" value="'+producto+'" name="txt_id" id="txt_id">'+
                                '<input type="submit" value="Si" class="btn color-primary text-light">'+
                                '<input type="button" value="No" onclick="cerrarModal();" class="btn color-danger text-light cerrar-modal">'+
                                '</div>'+
                                '</form>'); 
	});

    
});



function inactivarC(){
    var datos = $('#inactivarComunidad').serializeArray();
    
    $.post("controllers/comunidadProcesos.php", datos, function (respuesta){
      
        $('.modal-container').fadeOut();
        setTimeout(function(){
            if(respuesta == 'exito'){
                $('.modal-container').fadeIn();
                $('.modal-title').text('Mensaje');
                $('.modal-body').html(  '<div>'+
                                            '<p>La comunidad fue dada de baja exitosamente</p><br>'+
                                            '<input type="button" value="Aceptar" onclick="cerrarModal();" style="padding: 10px 15px;" class="btn color-primary text-light cerrar-modal">'+
                                            '</div>');
            }else{
                $('.modal-container').fadeIn();
                $('.modal-title').text('Mensaje');
                $('.modal-body').html(  '<div>'+
                                            '<p>Error</p><br>'+
                                            '<input type="button" value="Aceptar" onclick="cerrarModal();" style="padding: 10px 15px;" class="btn color-primary text-light cerrar-modal">'+
                                            '</div>');
            }
        }, 400);
    });
}

function activarC(){
    var datos = $('#activarComunidad').serializeArray();
    
    $.post("controllers/comunidadProcesos.php", datos, function (respuesta){
       
        $('.modal-container').fadeOut();
        setTimeout(function(){
            if(respuesta == 'exito'){
                $('.modal-container').fadeIn();
                $('.modal-title').text('Mensaje');
                $('.modal-body').html(  '<div>'+
                                            '<p>El comunidad fue activada exitosamente</p><br>'+
                                            '<input type="button" value="Aceptar" onclick="cerrarModal();" style="padding: 10px 15px;" class="btn color-primary text-light cerrar-modal">'+
                                            '</div>');
            }else{
                $('.modal-container').fadeIn();
                $('.modal-title').text('Mensaje');
                $('.modal-body').html(  '<div>'+
                                            '<p>Error</p><br>'+
                                            '<input type="button" value="Aceptar" onclick="cerrarModal();" style="padding: 10px 15px;" class="btn color-primary text-light cerrar-modal">'+
                                            '</div>');
            }
        }, 400);
    });
}

function cerrarModal(){
    $('.modal-container').fadeOut();
}