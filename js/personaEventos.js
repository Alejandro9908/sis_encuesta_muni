let banderaEntrevistado = 0;
let personas = [];

$(document).ready(function(){

    $('#txt_entrevistado').val(0);

    $('#div-gestacion').hide();
    $('#div-semanas-gestacion').hide();

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
            console.log("valor de bandera: "+ $('#txt_entrevistado').val());
        } else {
            $('#txt_entrevistado').val(0);
            console.log("valor de bandera: "+ $('#txt_entrevistado').val());
        }
    });

    $('#addPersona').submit(function (e){
        e.preventDefault();
        var datos = $(this).serializeArray();
        addPersona(datos);
    });

    $('#crearBoleta').submit(function (e){
        e.preventDefault();
        var personasJson = JSON.encode(personas);
        //console.log(personasJson);
        $.post("controllers/boletaProcesos.php", "personas="+personasJson, function (respuesta){
            console.log(respuesta);
            if(respuesta == 'exito'){
               
            }else{
  
            }
        });
        
    });


});

function addPersona(datos){
    //personas.push(datos);
    //console.log(datos);
    var persona = {
        txt_entrevistado: '',
        txt_nombres: '',
        txt_primer_apellido: '',
        txt_segundo_apellido: '',
        txt_sexo: '',
        txt_fecha_nacimiento: '',
        txt_edad: '',
        txt_dpi: '',
        txt_estado_civil: '',
        txt_escolaridad: '',
        txt_ocupacion: '',
        txt_ocupacion: '',
        txt_telefono: '',
        txt_gestacion:'',
        txt_semanas_gestacion: '',
        txt_ingreso_mensual: '',
        txt_enfermedades: '',
        txt_discapacidades: ''
    }

    var discapacidades=[];
    var enfermedades=[];

    for(i = 0; i < datos.length; i++){
        //console.log(datos[i]['name']);
        switch(datos[i]['name']){
            case 'txt_nombres': persona['txt_nombres'] = datos[i]["value"]; break;
            case 'txt_entrevistado': persona['txt_entrevistado'] = datos[i]["value"]; break;
            case 'txt_primer_apellido': persona['txt_primer_apellido'] = datos[i]["value"]; break;
            case 'txt_segundo_apellido': persona['txt_segundo_apellido'] = datos[i]["value"]; break;
            case 'txt_sexo': persona['txt_sexo'] = datos[i]["value"]; break;
            case 'txt_fecha_nacimiento': persona['txt_fecha_nacimiento'] = datos[i]["value"]; break;
            case 'txt_edad': persona['txt_edad'] = datos[i]["value"]; break;
            case 'txt_dpi': persona['txt_dpi'] = datos[i]["value"]; break;
            case 'txt_estado_civil': persona['txt_estado_civil'] = datos[i]["value"]; break;
            case 'txt_escolaridad': persona['txt_escolaridad'] = datos[i]["value"]; break;
            case 'txt_ocupacion': persona['txt_ocupacion'] = datos[i]["value"]; break;
            case 'txt_telefono': persona['txt_telefono'] = datos[i]["value"]; break;
            case 'txt_gestacion': persona['txt_gestacion'] = datos[i]["value"]; break;
            case 'txt_semanas_gestacion': persona['txt_semanas_gestacion'] = datos[i]["value"]; break;
            case 'txt_ingreso_mensual': persona['txt_ingreso_mensual'] = datos[i]["value"]; break;
            case 'enfermedades[]': enfermedades.push(datos[i]["value"]); break;
            case 'discapacidades[]': discapacidades.push(datos[i]["value"]); break;
            
        }
        
    }

    //console.log(enfermedades);
    //console.log(discapacidades);
    persona['txt_enfermedades'] = enfermedades;
    persona['txt_discapacidades'] = discapacidades;
    personas.push(persona);
    addTabla(personas);


}

function addTabla(personas){
    let lista = '';
    for(i = 0; i < personas.length; i++){
        
        var banderaEntrevistado = "";
        if(personas[i]['txt_entrevistado']=="1"){
            banderaEntrevistado = "◉"
        }
        lista += `
        <tr>
        <td>${banderaEntrevistado}</td>
        <td>${personas[i]['txt_nombres']+" "+personas[i]['txt_primer_apellido']+" "+personas[i]['txt_segundo_apellido']}</td>
        <td>${personas[i]['txt_dpi']}</td>
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

function quitarRegistro(id){
    personas.splice(id,1);
    addTabla(personas);
}

