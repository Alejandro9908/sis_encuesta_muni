$(document).ready(function(){ 

    $(".select-multiple").mousedown(function(e){
        e.preventDefault();
    
        var select = this;
        var scroll = select .scrollTop;
    
        e.target.selected = !e.target.selected;
    
        setTimeout(function(){select.scrollTop = scroll;}, 0);
    
        $(select ).focus();
    }).mousemove(function(e){e.preventDefault()});
    

    $(".agregar_persona").click(function(e){
        
        $('.modal-container').fadeIn();
        $('.modal-title').text('Inactivar usuario');
        $('.modal-body').html('<form action="" method="post" name="agregarPersona" id="agregarPersona"'+
                                'onsubmit="event.preventDefault(); addPersona();"'+
                                'class="form-container">'+
                                '<div class="form-row-1">'+
                                '<div class="form-item">'+
                                '<p>¿Está seguro que desea inactivar el usuario?</p>'+
                                '</div>'+
                                '</div>'+
                                '<div class="form-footer">'+
                                '<input type="hidden" name="registro" value="inactivar">'+
                                '<input type="submit" value="Si" class="btn color-primary text-light">'+
                                '<input type="button" value="No" onclick="cerrarModal();" class="btn color-danger text-light cerrar-modal">'+
                                '</div>'+
                                '</form>');    
     
	});


   

    $('#txt_transporte').click(function(){
        transportes = $('#txt_transporte').val()
        console.log(transportes);
    });

    

    

});

function addPersona(){
    console.log("Persona Agregada");
}