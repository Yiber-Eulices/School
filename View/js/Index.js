$(document).ready(function(){
    $.ajax({
        url:"../Ajax/AjaxEvento.php?a=lista",
        method:"GET",
        dataType: "JSON",
        success : function(respuesta){
            $('.event_items').empty();            
            for(var i = 0;i<respuesta.data.length;i++){
                if (respuesta.data[i][0].length > 0 && respuesta.data[i][2].length > 0){
                    $('.event_items').append('<div class="row event_item"><div class="col"><div class="row d-flex flex-row align-items-end"><div class="col-lg-2 order-lg-1 order-2"><div class="event_date d-flex flex-column align-items-center justify-content-center"><div id="Fecha" class="event_day">'+respuesta.data[i][2]+'</div></div></div><div class="col-lg-6 order-lg-2 order-3"><div class="event_content"><div id="Titulo" class="event_name">'+respuesta.data[i][3]+'</div><div id="Ubicacion" class="event_location">'+respuesta.data[i][5]+'</div><p id="Descripcion">'+respuesta.data[i][4]+'</p></div></div><div class="col-lg-4 order-lg-3 order-1"><div id="Foto" class="event_image">'+respuesta.data[i][1]+'</div></div></div></div></div>');
                }                
            }
        }
    });
    $.ajax({
        url:"../Ajax/AjaxEmpresa.php?a=lista",
        method:"GET",
        dataType: "JSON",
        success : function(respuesta){          
            for(var i = 0;i<respuesta.data.length;i++){
                if (respuesta.data[i][0].length > 0 && respuesta.data[i][2].length > 0){
                    $("#Mision").html(respuesta.data[i][1]);
                    $("#Vision").html(respuesta.data[i][2]);
                    $("#Somos").html(respuesta.data[i][3]);
                }                
            }
        }
    });
})  