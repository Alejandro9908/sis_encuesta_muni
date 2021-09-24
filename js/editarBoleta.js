$(document).ready(function(){
    
    console.log("Editar");
    
    sexo = $('#txt_sexo').val();
    if(sexo == "M"){
        $('#div-gestacion').hide();
        $('#div-semanas-gestacion').hide();
        $('#txt_gestacion').val("0")

        $('#txt_semanas_gestacion').val("0")
        
    }else if(sexo == "F"){
        $('#div-gestacion').show();
        $('#div-semanas-gestacion').show();
    }   

    // alert(persona['entrevistado']);
    if(persona['entrevistado']==1){
        // $('#cbox_entrevistado').prop("checked",false);
        $('#cbox_entrevistado').prop("checked",true);
        
        // alert("ËNTRA");
        $('#div-parentesco').hide();
        $('#txt_parentesco').val("yo");

        $('#div-fecha-nacimiento').show();
        // $('#txt_fecha_nacimiento').val("");

        $('#txt_entrevistado').val(1);
    }else{
        // alert("ELSSE");
        $('#cbox_entrevistado').prop("checked",false);
        $('#div-parentesco').show();
        $('#txt_parentesco').val("");

        $('#div-fecha-nacimiento').hide();
        // $('#txt_fecha_nacimiento').val("");

        $('#txt_entrevistado').val(0);
    }
});

