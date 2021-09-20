$(document).ready(function(){
    
    listarSectoresIndex();

    $('#txt_sector_index').change(function(){
        var sector = $('#txt_sector_index').val();

        if(sector == "%%"){
            let lista = `<option value="" disabled selected>Seleccione una opción</option>
                        <option value="%%">Todos</option>`;
            $('#txt_comunidad_index').html(lista);
        }else{
            listarComunidadesIndex(sector);
        }
        
    });

    $('#txt_comunidad_index').change(function (e) { 
        var datos = $('#buscar-index').serializeArray();
        
        window.location="index.php?sector="+datos[0]['value']+"&comunidad="+datos[1]['value'];
    });
    
});


function listarSectoresIndex(){
    $.ajax({
        url: 'controllers/select/listarSectores.php',
        type: 'GET',
        success: function(respuesta){
            let Resultado = JSON.parse(respuesta);
            let lista = `<option value="" disabled selected>Seleccione una opción</option>
                            <option value="%%">Todos</option>`;
            Resultado.forEach(e => {
                lista += `
                <option value="${e.id_opcion}">${e.nombre}</option>
                `
            });
            $('#txt_sector_index').html(lista);
        }
    });
}

function listarComunidadesIndex(sector){
    $.ajax({
        url: 'controllers/select/listarComunidades.php?sector='+sector,
        type: 'GET',
        success: function(respuesta){
            let Resultado = JSON.parse(respuesta);
            let lista = `<option value="" disabled selected>Seleccione una opción</option>
                        <option value="%%">Todos</option>`;
            Resultado.forEach(e => {
                lista += `
                <option value="${e.id_comunidad}">${e.nombre}</option>
                `
            });
            $('#txt_comunidad_index').html(lista);
        }
    });
}

