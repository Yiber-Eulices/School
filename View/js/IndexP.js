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
            $('.register').empty();            
            for(var i = 0;i<respuesta.data.length;i++){
                if (respuesta.data[i][0].length > 0 && respuesta.data[i][2].length > 0){
                    $('.register').append('<div class="register"><div class="container-fluid"><div class="row row-eq-height"><div class="col-lg-6 nopadding"><div class="register_section d-flex flex-column align-items-center justify-content-center"><div class="register_content text-center"><h1 class="register_title"><span>MISION</span> </h1><p id="Mision" class="register_text">'+respuesta.data[i][1]+'</p><br><br><h1 class="register_title"><span>VISION</span></h1><p id="Vision"class="register_text">'+respuesta.data[i][2]+'</p></div></div></div><div style="overflow: auto;" class="col-lg-6 nopadding"><div class="search_section d-flex flex-column align-items-center justify-content-center"><div class="search_background" style="background-image:url(images/search_background.jpg);"></div><div class="search_content text-center"><h1 class="search_title">¿QUIENES SOMOS?</h1><h1 id="Somos" class="register_title"><span>'+respuesta.data[i][3]+'</span></h1></div></div></div></div></div></div>'); 
                }                
            }
        }
    });
})  