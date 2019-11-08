$(document).ready(function(){
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