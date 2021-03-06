$(document).ready(function(){
    
    $('#txt_sector-edit').change(function(){
        var sector = $('#txt_sector-edit').val()
        listarComunidadesEdit(sector);
    });

    $('#edit-form-domicilio').submit(function (e){
        e.preventDefault();
        var domicilio = addDomicilio($(this).serializeArray());//domicilio
        var domicilioJson = JSON.stringify(domicilio);

        var id_domicilio = $('#edit-form-domicilio #id_vivienda').val(); 
        var editar = $('#edit-form-domicilio #editar').val(); 

        $.post("controllers/editarBoletaProcesos.php",
            "editar="+editar+
            "&id_vivienda="+id_domicilio+
            "&domicilio="+domicilioJson, 
            function (respuesta){
                console.log(respuesta);
                if(respuesta == 'exito'){
                    msjSucess();
                }else{
                    msjError();
                }
            });
    });

    $('#edit-form-alimentacion').submit(function (e){
        e.preventDefault();
        var alimentacion = addAlimentacion($(this).serializeArray());
        var alimentacionJson = JSON.stringify(alimentacion);

        var id_familia = $('#edit-form-alimentacion #id').val(); 
        var editar = $('#edit-form-alimentacion #editar').val(); 

        $.post("controllers/editarBoletaProcesos.php",
            "editar="+editar+
            "&id_familia="+id_familia+
            "&alimentacion="+alimentacionJson, 
            function (respuesta){
                console.log(respuesta);
                if(respuesta == 'exito'){
                    msjSucess();
                }else{
                    msjError();
                }
            });
    });

    $('#edit-form-egreso').submit(function (e){
        e.preventDefault();
        var egreso = addEgresos($(this).serializeArray());
        var egresoJson = JSON.stringify(egreso);

        var id_familia = $('#edit-form-egreso #id').val(); 
        var editar = $('#edit-form-egreso #editar').val(); 

        $.post("controllers/editarBoletaProcesos.php",
            "editar="+editar+
            "&id_familia="+id_familia+
            "&egreso="+egresoJson, 
            function (respuesta){
                console.log(respuesta);
                if(respuesta == 'exito'){
                    msjSucess();
                }else{
                    msjError();
                }
            });
    });

    $('#edit-form-datos-boleta').submit(function (e){
        e.preventDefault();
        var datosBoleta = addObservacion($(this).serializeArray());
        var datosBoletaJson = JSON.stringify(datosBoleta);

        var id_boleta = $('#edit-form-datos-boleta #id').val(); 
        
        var editar = $('#edit-form-datos-boleta #editar').val(); 

        $.post("controllers/editarBoletaProcesos.php",
            "editar="+editar+
            "&id_boleta="+id_boleta+
            "&datosBoleta="+datosBoletaJson, 
            function (respuesta){
                console.log(respuesta);
                if(respuesta == 'exito'){
                    msjSucess();
                }else{
                    msjError();
                }
            });
    });

    $('#edit-form-datos-salud').submit(function (e){
        e.preventDefault();
        var salud = addSalud($(this).serializeArray());
        var saludJson = JSON.stringify(salud);

        var id_familia = $('#edit-form-datos-salud #id').val(); 
        
        var editar = $('#edit-form-datos-salud #editar').val(); 

        $.post("controllers/editarBoletaProcesos.php",
            "editar="+editar+
            "&id_familia="+id_familia+
            "&salud="+saludJson, 
            function (respuesta){
                console.log(respuesta);
                if(respuesta == 'exito'){
                    msjSucess();
                }else{
                    msjError();
                }
            });
    });

    $('#edit-form-recreacion').submit(function (e){
        e.preventDefault();
        var recreacion = addRecreacion($(this).serializeArray());
        var recreacionJson = JSON.stringify(recreacion);

        var id_familia = $('#edit-form-recreacion #id').val(); 
        
        var editar = $('#edit-form-recreacion #editar').val(); 

        $.post("controllers/editarBoletaProcesos.php",
            "editar="+editar+
            "&id_familia="+id_familia+
            "&recreacion="+recreacionJson, 
            function (respuesta){
                console.log(respuesta);
                if(respuesta == 'exito'){
                    msjSucess();
                }else{
                    msjError();
                }
            });
    });

    $('#edit-form-vivienda').submit(function (e){
        e.preventDefault();
        var vivienda = addVivienda($(this).serializeArray());//vivienda
        var viviendaJson = JSON.stringify(vivienda);

        var id_vivienda = $('#edit-form-vivienda #id').val(); 
        var editar = $('#edit-form-vivienda #editar').val(); 


        /*console.log(id_vivienda);
        console.log(editar);
        console.log(viviendaJson);*/

        $.post("controllers/editarBoletaProcesos.php",
            "editar="+editar+
            "&id_vivienda="+id_vivienda+
            "&vivienda="+viviendaJson, 
            function (respuesta){
                console.log(respuesta);
                if(respuesta == 'exito'){
                    msjSucess();
                }else{
                    msjError();
                }
            });
    });

    $('#edit-form-persona').submit(function (e){
        e.preventDefault();

        let persona = {
            entrevistado: $('#txt_entrevistado-edit').val(),
            nombres: $('#txt_nombres').val(),
            primer_apellido: $('#txt_primer_apellido').val(),
            segundo_apellido: $('#txt_segundo_apellido').val(),
            sexo: $('#txt_sexo').val(),
            fecha_nacimiento: $('#txt_fecha_nacimiento-edit').val(),
            parentesco: $('#txt_parentesco-edit').val(),
            edad: '',
            dpi: $('#txt_dpi').val(),
            estado_civil: $('#txt_estado_civil').val(),
            escolaridad: $('#txt_escolaridad').val(),
            ocupacion: $('#txt_ocupacion').val(),
            telefono: $('#txt_telefono').val(),
            correo: $('#txt_correo').val(),
            gestacion: $('#txt_gestacion').val(),
            semanas_gestacion: $('#txt_semanas_gestacion').val(),
            ingreso_mensual: $('#txt_ingreso_mensual').val(),
            enfermedades: $('#txt_enfermedad-edit').val(),
            discapacidades: $('#txt_discapacidad-edit').val()
        }

        let personaJson = JSON.stringify(persona);

        let id_persona = $('#id_persona-edit').val(); 
        let editar = $('#editar-p').val(); 

        $.post("controllers/editarBoletaProcesos.php",
            "editar="+editar+
            "&id_persona="+id_persona+
            "&persona="+personaJson, 
            function (respuesta){
                console.log(respuesta);
                if(respuesta == 'exito'){
                    msjSucess();
                }else{
                    msjError();
                }
            });
    });

    

    let sexo = $('#txt_sexo').val();
    
    if(sexo == "M"){
        $('#div-gestacion').hide();
        $('#div-semanas-gestacion').hide();
        $('#txt_gestacion').val("0")

        $('#txt_semanas_gestacion').val("0")
        
    }else if(sexo == "F"){
        $('#div-gestacion').show();
        $('#div-semanas-gestacion').show();
    }   

   
    if(persona['entrevistado']==1){
        $('#cbox_entrevistado').prop("checked",true);
        $('#div-parentesco').hide();
        $('#txt_parentesco').val("yo");
        $('#txt_entrevistado').val(1);
    }else{
        
        $('#cbox_entrevistado').prop("checked",false);
        $('#div-parentesco').show();
        $('#txt_parentesco').val("");
        $('#txt_entrevistado').val(0);
    }

});


function listarComunidadesEdit(sector){
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

            $('#txt_comunidad-edit').html(lista);
        }
    });
}



function msjSucess(){
    $('.modal-container').fadeIn();
        $('.modal-title').text('Mensaje');
        $('.modal-body').html(  '<div>'+
                                '<p>Los cambios se guardaron exitosamente</p><br>'+
                                '<input type="button" value="Aceptar" onclick="cerrarModal();" style="padding: 10px 15px;" class="btn color-primary text-light cerrar-modal">'+
                                '</div>');
}

function msjError(){
    $('.modal-container').fadeIn();
        $('.modal-title').text('Mensaje');
        $('.modal-body').html(  '<div>'+
                                '<p>Ups! Hubo un error al guardar los cambios</p><br>'+
                                '<input type="button" value="Aceptar" onclick="cerrarModal();" style="padding: 10px 15px;" class="btn color-primary text-light cerrar-modal">'+
                                '</div>');
}






