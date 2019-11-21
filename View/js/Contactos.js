$(document).ready(function(){
    $.ajax({
        url:"Ajax/AjaxInformacion.php?a=lista",
        method:"GET",
        dataType: "JSON",
        success : function(respuesta){
            $('.aboutinfo').empty();            
            for(var i = 0;i<respuesta.data.length;i++){
                if (respuesta.data[i][0].length > 0 && respuesta.data[i][2].length > 0){
                    $('.aboutinfo').append('<div class="about_title"><center>INFORMACIÓN INSTITUCIONAL</center></div><p id="Informacion" class="about_text">'+respuesta.data[i][1]+'</p><div class="contact_info"><ul><li class="contact_info_item"><div class="contact_info_icon"><img src="View/images/placeholder.svg" alt="https://www.flaticon.com/authors/lucy-g"></div>'+respuesta.data[i][2]+'</li><li class="contact_info_item"><div id="Correo"class="contact_info_icon"><img src="View/images/envelope.svg" alt="https://www.flaticon.com/authors/lucy-g"></div>'+respuesta.data[i][3]+'</li><li class="contact_info_item"><div id="NombreTele" class="contact_info_icon"><img src="View/images/smartphone.svg" alt="https://www.flaticon.com/authors/lucy-g"></div>+57 '+respuesta.data[i][4]+'</li></ul></div>');                    
                }                
            }
        }
    });
    $.ajax({
        url:"Ajax/AjaxDirectivo.php?a=lista",
        method:"GET",
        dataType: "JSON",
        success : function(respuesta){
            $('.table').empty();
            $('.table').append("<thead><th scope='col'>Nombre</th><th scope='col'>Cargo</th><th scope='col'>Correo</th><th scope='col'>Telefono</th></tr></thead>");
            $('.table').append("<tbody>");                
            for(var i = 0;i<respuesta.data.length;i++){
                if (respuesta.data[i][0].length > 0 && respuesta.data[i][3].length > 0){
                    $('.table').append("<tr><td>"+respuesta.data[i][1]+"</td><td>"+respuesta.data[i][2]+"</td><td>"+respuesta.data[i][3]+"</td><td>"+respuesta.data[i][4]+"</td></tr>"); 
                }                
            }
            $('.table').append("</tbody>");  
        }
    });
})  