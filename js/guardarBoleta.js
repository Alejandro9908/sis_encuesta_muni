let banderaEntrevistado = 0;
let personas = [];
var bandera = 0;

$(document).ready(function(){

    $('#cbox_entrevistado').prop("checked",true);
    $('#txt_entrevistado').val(1);

    $('#div-gestacion').hide();
    $('#div-semanas-gestacion').hide();

    $('#div-parentesco').hide();
    $('#txt_parentesco').val("yo");



    $('#txt_sexo').change(function(){
        sexo = $('#txt_sexo').val()
        if(sexo == "M"){
            $('#div-gestacion').hide();
            $('#div-semanas-gestacion').hide();
            $('#txt_gestacion').val("0")
            $('#txt_semanas_gestacion').val("0")
            
        }else if(sexo == "F"){
            $('#div-gestacion').show();
            $('#div-semanas-gestacion').show();
        }
    });

    $( '#cbox_entrevistado' ).on( 'click', function() {
        if( $('#cbox_entrevistado').is(':checked') ){
            $('#txt_entrevistado').val(1);
            
            $('#div-parentesco').hide();
            $('#txt_parentesco').val("yo");

            $('#div-fecha-nacimiento').show();
            $('#txt_fecha_nacimiento').val("");
        } else {
            $('#txt_entrevistado').val(0);
            
            $('#div-parentesco').show();
            $('#txt_parentesco').val("");

            $('#div-fecha-nacimiento').hide();
            $('#txt_fecha_nacimiento').val("");
        }
    });

    $('#addPersona').submit(function (e){
        e.preventDefault();
        var datos = $(this).serializeArray();
        addPersona(datos);
    });

    $('#crearBoleta').submit(function (e){
        e.preventDefault();
        
        if(personas.length == 0){
            validacionFormulario('No se agregaron personas', '1. Estructura Familiar');
        }else if($('#txt_comunidad').val() == null || $('#txt_direccion').val() == ""){
            validacionFormulario('No se identificó la dirección domiciliaria', '2. Identificacion domiciliaria');
        }else if(($('#txt_alimentacion').val() == "") || 
                    ($('#txt_gas').val() == "") || 
                    ($('#txt_renta').val() == "") || 
                    ($('#txt_agua').val() == "") || 
                    ($('#txt_electricidad').val() == "") || 
                    ($('#txt_telefono_residencial').val() == "") ||
                    ($('#txt_telefono_celular').val() == "") || 
                    ($('#txt_transporte').val() == "") || 
                    ($('#txt_educacion').val() == "") || 
                    ($('#txt_medicos').val() == "") || 
                    ($('#txt_gastos_recreacion').val() == "") || 
                    ($('#txt_cable').val() == "") || 
                    ($('#txt_ropa_calzado').val() == "") || 
                    ($('#txt_fondos_ahorro').val() == "") || 
                    ($('#txt_creditos').val() == "")){
            validacionFormulario('Se deben completar los datos', '3. Egresos mensuales de la familia');
        }else if(($('#txt_numero_dormitorios').val() == "")){
            validacionFormulario('Se deben completar los datos', '4. Vivienda');
        }else if(($('#txt_servicio_medico').val() == null) || ($('#txt_frecuencia_medico').val() == null)){
            validacionFormulario('Se deben completar los datos', '5. Salud');
        }else if(($('#txt_carne_res').val() == null) || 
                    ($('#txt_carne_pollo').val() == null) || 
                    ($('#txt_carne_cerdo').val() == null) || 
                    ($('#txt_carne_pescado').val() == null) || 
                    ($('#txt_leche').val() == null) || 
                    ($('#txt_cereales').val() == null) ||
                    ($('#txt_huevos').val() == null) || 
                    ($('#txt_frutas').val() == null) || 
                    ($('#txt_verduras').val() == null) || 
                    ($('#txt_leguminosas').val() == null)){
            validacionFormulario('Se deben completar los datos', '6. Alimentacion');
        }else{
            console.log("Guardado");
            var personasJson = JSON.encode(personas);
            
            var domicilio = addDomicilio($("#add-form-2").serializeArray());//domicilio
            var domicilioJson = JSON.encode(domicilio);

            var egresos = addEgresos($("#add-form-3").serializeArray());//domicilio
            var egresosJson = JSON.encode(egresos);

            var vivienda = addVivienda($("#add-form-4").serializeArray());//domicilio
            var viviendaJson = JSON.encode(vivienda);

            var salud = addSalud($("#add-form-5").serializeArray());//domicilio
            var saludJson = JSON.encode(salud);

            var alimentacion = addAlimentacion($("#add-form-6").serializeArray());//domicilio
            var alimentacionJson = JSON.encode(alimentacion);

            var recreacion = addRecreacion($("#add-form-7").serializeArray());//domicilio
            var recreacionJson = JSON.encode(recreacion);

            var observacion = addObservacion($("#add-form-8").serializeArray());//domicilio
            var observacionJson = JSON.encode(observacion);
            //console.log(observacionJson);
            
            $.post("controllers/guardarBoleta.php",
            "personas="+personasJson+
            "&domicilio="+domicilioJson+
            "&egresos="+egresosJson+
            "&vivienda="+viviendaJson+
            "&salud="+saludJson+ 
            "&alimentacion="+alimentacionJson+ 
            "&recreacion="+recreacionJson+ 
            "&observacion="+observacionJson, 
            function (respuesta){
                console.log(respuesta);
                if(respuesta == 'exito'){
                
                }else{
    
                }
            });
        }
        
    });


});


function validacionFormulario(mensaje, modulo){
    $('.modal-container').fadeIn();
                $('.modal-title').text('La boleta no se puede guardar');
                $('.modal-body').html(  '<div>'+
                                        '<p>Problema detectado: '+mensaje+'</p><br>'+
                                        '<p>Módulo: '+modulo+'</p><br>'+
                                        '<input type="button" value="Aceptar" onclick="cerrarModal();" style="padding: 10px 15px;" class="btn color-primary text-light cerrar-modal">'+
                                        '</div>');
}

function addObservacion(datos){
    var observacion = {
        observaciones_encuesta: '',
        evaluador: '',
        fecha_evaluacion: '',
        id_usuario: ''
    }


    for(i = 0; i < datos.length; i++){
        //console.log(datos[i]['name']);
        switch(datos[i]['name']){
            case 'txt_observaciones_encuesta': observacion['observaciones_encuesta'] = datos[i]["value"]; break;
            case 'txt_evaluador': observacion['evaluador'] = datos[i]["value"]; break;
            case 'txt_fecha_evaluacion': observacion['fecha_evaluacion'] = datos[i]["value"]; break;
            case 'txt_usuario': observacion['id_usuario'] = datos[i]["value"]; break;
        }
        
    }
    
    return observacion;
}

function addRecreacion(datos){
    var recreacion = {
        recreaciones: ''
    }

    var recreaciones = [];

    for(i = 0; i < datos.length; i++){
        //console.log(datos[i]['name']);
        switch(datos[i]['name']){
            case 'recreaciones[]': recreaciones.push(datos[i]["value"]); break;
        }
        
    }

    recreacion['recreaciones'] = recreaciones;
    return recreacion;
}

function addAlimentacion(datos){
    var alimentacion = {
        carne_res: '',
        carne_pollo: '',
        carne_cerdo: '',
        carne_pescado: '',
        leche: '',
        cereales: '',
        huevos: '',
        frutas: '',
        verduras: '',
        leguminosas: ''
    }


    for(i = 0; i < datos.length; i++){
        //console.log(datos[i]['name']);
        switch(datos[i]['name']){
            case 'txt_carne_res': alimentacion['carne_res'] = datos[i]["value"]; break;
            case 'txt_carne_pollo': alimentacion['carne_pollo'] = datos[i]["value"]; break;
            case 'txt_carne_cerdo': alimentacion['carne_cerdo'] = datos[i]["value"]; break;
            case 'txt_carne_pescado': alimentacion['carne_pescado'] = datos[i]["value"]; break;
            case 'txt_leche': alimentacion['leche'] = datos[i]["value"]; break;
            case 'txt_cereales': alimentacion['cereales'] = datos[i]["value"]; break;
            case 'txt_huevos': alimentacion['huevos'] = datos[i]["value"]; break;
            case 'txt_frutas': alimentacion['frutas'] = datos[i]["value"]; break;
            case 'txt_verduras': alimentacion['verduras'] = datos[i]["value"]; break;
            case 'txt_leguminosas': alimentacion['leguminosas'] = datos[i]["value"]; break;
        }
        
    }
    
    return alimentacion;
}

function addSalud(datos){
    var salud = {
        servicio_medico: '',
        frecuencia_medico: ''
    }

    for(i = 0; i < datos.length; i++){
        //console.log(datos[i]['name']);
        switch(datos[i]['name']){

            case 'txt_frecuencia_medico': salud['frecuencia_medico'] = datos[i]["value"]; break;
            case 'servicios_medicos[]': salud['servicio_medico'] = datos[i]["value"]; break;
        }
        
    }

    return salud;
}



function addVivienda(datos){
    var vivienda = {
        tenencia: '',
        numero_dormitorios: '',
        sala: '',
        comedor: '',
        cocina: '',
        banio_privado: '',
        banio_colectivo: '',
        observaciones_vivienda: '',
        pared: '',
        techo: '',
        piso: '',
        mobiliarios: '',
        servicios: '',
        sanitario: '',
        eliminacion_basura: ''
    }

    var mobiliarios = [];
    var servicios = [];


    for(i = 0; i < datos.length; i++){
        //console.log(datos[i]['name']);
        switch(datos[i]['name']){
            case 'txt_tenencia': vivienda['tenencia'] = datos[i]["value"]; break;
            case 'txt_numero_dormitorios': vivienda['numero_dormitorios'] = datos[i]["value"]; break;
            case 'txt_sala': vivienda['sala'] = datos[i]["value"]; break;
            case 'txt_comedor': vivienda['comedor'] = datos[i]["value"]; break;
            case 'txt_cocina': vivienda['cocina'] = datos[i]["value"]; break;
            case 'txt_banio_privado': vivienda['banio_privado'] = datos[i]["value"]; break;
            case 'txt_banio_colectivo': vivienda['banio_colectivo'] = datos[i]["value"]; break;
            case 'txt_observaciones_vivienda': vivienda['observaciones_vivienda'] = datos[i]["value"]; break;
            case 'txt_pared': vivienda['pared'] = datos[i]["value"]; break;
            case 'txt_techo': vivienda['techo'] = datos[i]["value"]; break;
            case 'txt_piso': vivienda['piso'] = datos[i]["value"]; break;
            case 'txt_eliminacion_basura': vivienda['eliminacion_basura'] = datos[i]["value"]; break;
            case 'mobiliarios[]': mobiliarios.push(datos[i]["value"]); break;
            case 'servicios[]': servicios.push(datos[i]["value"]); break;
            case 'txt_sanitario': vivienda['sanitario'] = datos[i]["value"]; break;
        }
        
    }

    vivienda['mobiliarios'] = mobiliarios;
    vivienda['servicios'] = servicios;

    return vivienda;
}

function addEgresos(datos){
    var egresos = {
        alimentacion: '',
        gas: '',
        renta: '',
        agua: '',
        electricidad: '',
        telefono_residencial: '',
        telefono_celular: '',
        transporte: '',
        educacion: '',
        medicos: '',
        gastos_recreacion: '',
        cable: '',
        ropa_calzado: '',
        fondos_ahorro: '',
        creditos: ''
    }


    for(i = 0; i < datos.length; i++){
        //console.log(datos[i]['name']);
        switch(datos[i]['name']){
            case 'txt_alimentacion': egresos['alimentacion'] = datos[i]["value"]; break;
            case 'txt_gas': egresos['gas'] = datos[i]["value"]; break;
            case 'txt_renta': egresos['renta'] = datos[i]["value"]; break;
            case 'txt_agua': egresos['agua'] = datos[i]["value"]; break;
            case 'txt_electricidad': egresos['electricidad'] = datos[i]["value"]; break;
            case 'txt_telefono_residencial': egresos['telefono_residencial'] = datos[i]["value"]; break;
            case 'txt_telefono_celular': egresos['telefono_celular'] = datos[i]["value"]; break;
            case 'txt_transporte': egresos['transporte'] = datos[i]["value"]; break;
            case 'txt_educacion': egresos['educacion'] = datos[i]["value"]; break;
            case 'txt_medicos': egresos['medicos'] = datos[i]["value"]; break;
            case 'txt_gastos_recreacion': egresos['gastos_recreacion'] = datos[i]["value"]; break;
            case 'txt_cable': egresos['cable'] = datos[i]["value"]; break;
            case 'txt_ropa_calzado': egresos['ropa_calzado'] = datos[i]["value"]; break;
            case 'txt_fondos_ahorro': egresos['fondos_ahorro'] = datos[i]["value"]; break;
            case 'txt_creditos': egresos['creditos'] = datos[i]["value"]; break;
        }
        
    }
    
    return egresos;
}

function addDomicilio(datos){
    var domicilio = {
        sector: '',
        comunidad: '',
        direccion: '',
        numero_casa: '',
        colindantes: '',
        latitud: '',
        longitud: '',
        telefono: '',
        transportes: ''
    }

    var transportes = [];

    for(i = 0; i < datos.length; i++){
        //console.log(datos[i]['name']);
        switch(datos[i]['name']){
            case 'txt_sector': domicilio['sector'] = datos[i]["value"]; break;
            case 'txt_comunidad': domicilio['comunidad'] = datos[i]["value"]; break;
            case 'txt_direccion': domicilio['direccion'] = datos[i]["value"]; break;
            case 'txt_numero_casa': domicilio['numero_casa'] = datos[i]["value"]; break;
            case 'txt_colindantes': domicilio['colindantes'] = datos[i]["value"]; break;
            case 'txt_latitud': domicilio['latitud'] = datos[i]["value"]; break;
            case 'txt_longitud': domicilio['longitud'] = datos[i]["value"]; break;
            case 'txt_telefono': domicilio['telefono'] = datos[i]["value"]; break;
            case 'transportes[]': transportes.push(datos[i]["value"]); break;
        }
        
    }

    domicilio['transportes'] = transportes;
    return domicilio;
}

function addPersona(datos){
    //personas.push(datos);
    //console.log(datos);
    var persona = {
        entrevistado: '',
        nombres: '',
        primer_apellido: '',
        segundo_apellido: '',
        sexo: '',
        fecha_nacimiento: '',
        parentesco: '',
        edad: '',
        dpi: '',
        estado_civil: '',
        escolaridad: '',
        ocupacion: '',
        ocupacion: '',
        telefono: '',
        gestacion:'',
        semanas_gestacion: '',
        ingreso_mensual: '',
        enfermedades: '',
        discapacidades: ''
    }

    var discapacidades=[];
    var enfermedades=[];

    for(i = 0; i < datos.length; i++){
        //console.log(datos[i]['name']);
        switch(datos[i]['name']){
            case 'txt_nombres': persona['nombres'] = datos[i]["value"]; break;
            case 'txt_entrevistado': persona['entrevistado'] = datos[i]["value"]; break;
            case 'txt_primer_apellido': persona['primer_apellido'] = datos[i]["value"]; break;
            case 'txt_segundo_apellido': persona['segundo_apellido'] = datos[i]["value"]; break;
            case 'txt_sexo': persona['sexo'] = datos[i]["value"]; break;
            case 'txt_fecha_nacimiento': persona['fecha_nacimiento'] = datos[i]["value"]; break;
            case 'txt_edad': persona['edad'] = datos[i]["value"]; break;
            case 'txt_parentesco': persona['parentesco'] = datos[i]["value"]; break;
            case 'txt_dpi': persona['dpi'] = datos[i]["value"]; break;
            case 'txt_estado_civil': persona['estado_civil'] = datos[i]["value"]; break;
            case 'txt_escolaridad': persona['escolaridad'] = datos[i]["value"]; break;
            case 'txt_ocupacion': persona['ocupacion'] = datos[i]["value"]; break;
            case 'txt_telefono': persona['telefono'] = datos[i]["value"]; break;
            case 'txt_gestacion': persona['gestacion'] = datos[i]["value"]; break;
            case 'txt_semanas_gestacion': persona['semanas_gestacion'] = datos[i]["value"]; break;
            case 'txt_ingreso_mensual': persona['ingreso_mensual'] = datos[i]["value"]; break;
            case 'enfermedades[]': enfermedades.push(datos[i]["value"]); break;
            case 'discapacidades[]': discapacidades.push(datos[i]["value"]); break;
            
        }
        
    }

    //console.log(enfermedades);
    //console.log(discapacidades);
    persona['enfermedades'] = enfermedades;
    persona['discapacidades'] = discapacidades;

    if(persona['entrevistado']==1){
        $('#cbox_entrevistado').prop("checked",false);
        
        $('#div-parentesco').show();
        $('#txt_parentesco').val("");

        $('#div-fecha-nacimiento').hide();
        $('#txt_fecha_nacimiento').val("");

        $('#txt_entrevistado').val(0);
    }

    personas.push(persona);
    addTabla(personas);


}

function addTabla(personas){
    let lista = '';
    for(i = 0; i < personas.length; i++){
        
        var banderaEntrevistado = "";
        if(personas[i]['entrevistado']=="1"){
            banderaEntrevistado = "◉"
        }
        lista += `
        <tr>
        <td>${banderaEntrevistado}</td>
        <td>${personas[i]['nombres']+" "+personas[i]['primer_apellido']+" "+personas[i]['segundo_apellido']}</td>
        <td>${personas[i]['dpi']}</td>
        <td>
        <a class="btn color-danger" onclick="quitarRegistro(${i})">Eliminar</a>
        <a class="btn color-info" onclick="verRegistro(${i})">Ver</a>
        </td>
        </tr>
        `  
    }
    $('#listaPersonas').html(lista);
    //console.log(personas);
}

//quita una persona del array
function quitarRegistro(id){
    personas.splice(id,1);
    addTabla(personas);
}

