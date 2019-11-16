$(document).ready(function(){
    $.ajax({
        url:"Ajax/AjaxInformacion.php?a=lista",
        method:"GET",
        dataType: "JSON",
        success : function(respuesta){          
            for(var i = 0;i<respuesta.data.length;i++){
                if (respuesta.data[i][0].length > 0 && respuesta.data[i][2].length > 0){
                    $("#DireccionF").empty();
                    $("#TelefonoF").empty();
                    $("#CorreoF").empty();
                    $("#DireccionF").html(respuesta.data[i][2]);
                    $("#TelefonoF").html(respuesta.data[i][4]);
                    $("#telefonomenu").html(respuesta.data[i][4]);
                    $("#CorreoF").html(respuesta.data[i][3]);
                }                
            }
        }
    });
})  