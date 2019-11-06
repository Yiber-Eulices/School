$(document).ready(function(){
    $.ajax({
        url:"../Ajax/AjaxInformacion.php?a=lista",
        method:"GET",
        dataType: "JSON",
        success : function(respuesta){
            $('.contact').empty();            
            for(var i = 0;i<respuesta.data.length;i++){
                if (respuesta.data[i][0].length > 0 && respuesta.data[i][2].length > 0){
                    $('.contact').append('<div class="contact" style="margin: auto;"><div class="container"><div class="row"><div class="col-lg-12"><div class="about" ><div class="about_title"><center>INFORMACIÓN INSTITUCIONAL</center></div><p id="Informacion" class="about_text">'+respuesta.data[i][1]+'</p><div class="contact_info"><ul><li class="contact_info_item"><div class="contact_info_icon"><img src="images/placeholder.svg" alt="https://www.flaticon.com/authors/lucy-g"></div>'+respuesta.data[i][2]+'</li><li class="contact_info_item"><div id="Correo"class="contact_info_icon"><img src="images/envelope.svg" alt="https://www.flaticon.com/authors/lucy-g"></div><div id="NombreTele" class="contact_info_icon"><img src="images/smartphone.svg" alt="https://www.flaticon.com/authors/lucy-g"></div></li></ul></div></div></div></div></div></div>'); 
                    
                }                
            }
        }
    });
    $.ajax({
        url:"../Ajax/AjaxDirectivos.php?a=lista",
        method:"GET",
        dataType: "JSON",
        success : function(respuesta){
            $('.contact').empty();            
            for(var i = 0;i<respuesta.data.length;i++){
                if (respuesta.data[i][0].length > 0 && respuesta.data[i][2].length > 0){
                    $('.contact').append('<div class="contact" style="margin: auto;"><div class="container"><div class="row"><div class="col-lg-12"><div class="about" ><div class="about_title"><center>INFORMACIÓN INSTITUCIONAL</center></div><p id="Informacion" class="about_text">'+respuesta.data[i][1]+'</p><div class="contact_info"><ul><li class="contact_info_item"><div class="contact_info_icon"><img src="images/placeholder.svg" alt="https://www.flaticon.com/authors/lucy-g"></div>'+respuesta.data[i][2]+'</li><li class="contact_info_item"><div id="Correo"class="contact_info_icon"><img src="images/envelope.svg" alt="https://www.flaticon.com/authors/lucy-g"></div>'+respuesta.data[i][2]+'<div id="NombreTele" class="contact_info_icon"><img src="images/smartphone.svg" alt="https://www.flaticon.com/authors/lucy-g"></div>'+respuesta.data[i][2]+' '+respuesta.data[i][3]+'</li></ul></div></div></div></div></div></div>'); 
                }                
            }
        }
    });
})  