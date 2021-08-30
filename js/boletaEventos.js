$(document).ready(function(){ 

    $(".select-multiple").mousedown(function(e){
        e.preventDefault();
    
        var select = this;
        var scroll = select .scrollTop;
    
        e.target.selected = !e.target.selected;
    
        setTimeout(function(){select.scrollTop = scroll;}, 0);
    
        $(select ).focus();
    }).mousemove(function(e){e.preventDefault()});
    
    listarEnfermedades();


    $('#txt_enfermedad').click(function(){
        enfermedades = $('#txt_enfermedad').val()
        console.log(enfermedades);
    });

    $("#addEnfermedad").click(function(e){
        e.preventDefault();
        
        $('.modal-container').fadeIn();
        $('.modal-title').text('Agregar Enfermedad');
        $('.modal-body').html('<form action="" method="post" name="agregarEnfermedad" id="agregarEnfermedad"'+
                                'onsubmit="event.preventDefault(); agregar_enfermedad();"'+
                                'class="form-container">'+
                                '<div class="form-row-1">'+
                                '<div class="form-item">'+
                                '<label for="txt_nombre" class="text-gray">Enfermedad</label>'+
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

    $('#txt_discapacidad').click(function(){
        discapacidades = $('#txt_discapacidad').val()
        console.log(discapacidades);
    });
  

});


function agregar_enfermedad(){
    var datos = $('#agregarEnfermedad').serializeArray();
    
    $.post("controllers/enfermedadProcesos.php", datos, function (respuesta){
        console.log(respuesta);
        $('.modal-container').fadeOut();

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
    listarEnfermedades();
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