$(document).ready(function(){
    
    $('#crearRegistro').submit(function (e){
        e.preventDefault();
        var datos = $(this).serializeArray();
        
        $.post("controllers/usuarioProcesos.php", datos, function (respuesta){
            console.log(respuesta);
            if(respuesta == 'exito'){
                $('.modal-container').fadeIn();
                $('.modal-title').text('Mensaje');
                $('.modal-body').html(  '<div>'+
                                        '<p>El registro se guardó exitosamente</p><br>'+
                                        '<input type="button" value="Aceptar" onclick="cerrarModal();" style="padding: 10px 15px;" class="btn color-primary text-light cerrar-modal">'+
                                        '</div>');
                $('#crearRegistro').trigger('reset');
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

    $('#editarRegistro').submit(function (e){
        e.preventDefault();
        var datos = $(this).serializeArray();
        
        $.post("controllers/usuarioProcesos.php", datos, function (respuesta){
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

    $('.editarPassword').on('submit', function(){
        console.log("entro a la funcion");
        var datos = $(this).serializeArray();
        
        $.post("controllers/usuarioProcesos.php", datos, function (respuesta){
            console.log(respuesta);
            $('.modal-container').fadeOut();
            if(respuesta == 'exito'){
                
                Swal.fire("Contraseña editada exitosamente");
                $('#crearRegistro').trigger('reset');
            }else{
                Swal.fire("Error al editar la contraseña");
            }
        });
    });

    $(".cambiar_password").click(function(e){
        e.preventDefault();
        var producto = $(this).attr('product');
        
        $('.modal-container').fadeIn();
        $('.modal-title').text('Cambiar contraseña');
        $('.modal-body').html('<form action="" method="post" name="editarPassword" id="editarPassword"'+
                                'onsubmit="event.preventDefault(); editarPass();"'+
                                'class="form-container">'+
                                '<div class="form-row-1">'+
                                '<div class="form-item">'+
                                '<label for="txt_pass" class="text-gray">Contraseña</label>'+
                                '<input type="password" id="txt_pass" name="txt_pass" required value="" class="form-control"'+
                                'placeholder="Minimo 6 caracteres">'+
                                '</div>'+
                                '<div class="form-item">'+
                                '<label for="txt_confirmar" class="text-gray">Confirmar contraseña</label>'+
                                '<input type="password" id="txt_confirmar" name="txt_confirmar" required value=""'+
                                'class="form-control" placeholder="Minimo 6 caracteres" minlength="6">'+
                                '</div>'+
                                '</div>'+
                                '<div class="form-footer">'+
                                '<input type="hidden" name="registro" value="editarPassword">'+
                                '<input type="hidden" value="'+producto+'" name="txt_id" id="txt_id">'+
                                '<input type="submit" value="Guardar" class="btn color-primary text-light">'+
                                '<input type="button" value="Cancelar" onclick="cerrarModal();" class="btn color-danger text-light cerrar-modal">'+
                                '</div>'+
                                '</form>');                      
        
	});


    $('#loginUsuario').submit(function (e){
        e.preventDefault();
        var datos = $(this).serializeArray();
        $.post("controllers/usuarioProcesos.php", datos, function (respuesta){
            if(respuesta == 'exito'){
                $('.modal-container').fadeIn();
                $('.modal-title').text('Mensaje');
                $('.modal-body').html(  '<div>'+
                                        '<p>Bienvenido</p><br>'+
                                        '<input type="button" value="Aceptar" onclick="cerrarModal();" style="padding: 10px 15px;" class="btn color-primary text-light cerrar-modal">'+
                                        '</div>');
                setTimeout(function(){
                    window.location.href ='index.php';
                }, 1000);           
            }else{
                $('.modal-container').fadeIn();
                $('.modal-title').text('Mensaje');
                $('.modal-body').html(  '<div>'+
                                        '<p>Los datos ingresados son incorrectos</p><br>'+
                                        '<input type="button" value="Aceptar" onclick="cerrarModal();" style="padding: 10px 15px;" class="btn color-primary text-light cerrar-modal">'+
                                        '</div>');
            }
            $('#loginUsuario').trigger('reset');
        });
    });



    $(".inactivar_usuario").click(function(e){
        var producto = $(this).attr('product');
        
        $('.modal-container').fadeIn();
        $('.modal-title').text('Inactivar usuario');
        $('.modal-body').html('<form action="" method="post" name="inactivarUsuario" id="inactivarUsuario"'+
                                'onsubmit="event.preventDefault(); inactivar();"'+
                                'class="form-container">'+
                                '<div class="form-row-1">'+
                                '<div class="form-item">'+
                                '<p>¿Está seguro que desea inactivar el usuario?</p>'+
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

    $(".activar_usuario").click(function(e){
        var producto = $(this).attr('product');
        
        $('.modal-container').fadeIn();
        $('.modal-title').text('Inactivar usuario');
        $('.modal-body').html('<form action="" method="post" name="activarUsuario" id="activarUsuario"'+
                                'onsubmit="event.preventDefault(); activar();"'+
                                'class="form-container">'+
                                '<div class="form-row-1">'+
                                '<div class="form-item">'+
                                '<p>¿Está seguro que desea activar el usuario?</p>'+
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

function editarPass() {
    var datos = $('#editarPassword').serializeArray();
    
    $.post("controllers/usuarioProcesos.php", datos, function (respuesta){
        console.log(respuesta);
        $('.modal-container').fadeOut();

        setTimeout(function(){
            if(respuesta == 'exito'){
                $('.modal-container').fadeIn();
                $('.modal-title').text('Mensaje');
                $('.modal-body').html(  '<div>'+
                                            '<p>Contraseña editada exitosamente</p><br>'+
                                            '<input type="button" value="Aceptar" onclick="cerrarModal();" style="padding: 10px 15px;" class="btn color-primary text-light cerrar-modal">'+
                                            '</div>');
                $('#editarPassword').trigger('reset');
            }else{
                $('.modal-container').fadeIn();
                $('.modal-title').text('Mensaje');
                $('.modal-body').html(  '<div>'+
                                            '<p>Error al editar la contraseña</p><br>'+
                                            '<input type="button" value="Aceptar" onclick="cerrarModal();" style="padding: 10px 15px;" class="btn color-primary text-light cerrar-modal">'+
                                            '</div>');
        }
        }, 400);
    });
}

function inactivar(){
    var datos = $('#inactivarUsuario').serializeArray();
    
    $.post("controllers/usuarioProcesos.php", datos, function (respuesta){
      
        $('.modal-container').fadeOut();
        setTimeout(function(){
            if(respuesta == 'exito'){
                $('.modal-container').fadeIn();
                $('.modal-title').text('Mensaje');
                $('.modal-body').html(  '<div>'+
                                            '<p>El usuario fue dado de baja exitosamente</p><br>'+
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

function activar(){
    var datos = $('#activarUsuario').serializeArray();
    
    $.post("controllers/usuarioProcesos.php", datos, function (respuesta){
       
        $('.modal-container').fadeOut();
        setTimeout(function(){
            if(respuesta == 'exito'){
                $('.modal-container').fadeIn();
                $('.modal-title').text('Mensaje');
                $('.modal-body').html(  '<div>'+
                                            '<p>El usuario fue activado exitosamente</p><br>'+
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