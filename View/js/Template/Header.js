$(document).ready(function(){
    var code = "";
    var count = 0;
    $.ajax({
        url:"Ajax/AjaxAlerta.php?a=milista",
        method:"GET",
        dataType:"json",
        success:function(respuesta){
            for(var i = 0;i<respuesta.data.length;i++){
                if (respuesta.data[i][2].length > 0 && respuesta.data[i][3].length > 0){ 
                    if(respuesta.data[i][4]=='Sin Ver'){
                        $("#ModalAlerta").attr("IdAlerta",respuesta.data[i][5]);
                        $("#TitleModalAlert").html(respuesta.data[i][2]);
                        $("#TextModalAlert").html(respuesta.data[i][3]);
                        $("#ModalAlerta").modal();
                    } 
                    count++;             
                    code = ""; 
                    code = "<li><a href='javascript:void(0);' class=' waves-effect waves-block'>";
                    code += "<div class='icon-circle bg-red'><i class='material-icons'>notifications</i><span class='label-count'>"+count+"</span></div>";
                    code += "<div class='menu-info'>";
                    code += "<h4>"+respuesta.data[i][2]+"</h4>";
                    code += "<p><i class='material-icons'>access_time</i>"+respuesta.data[i][1]+"";
                    code += "</p>";
                    code += "</div>";
                    code += "</a>";
                    code += "</li>";
                    $(".menuNotifications").append(code);
                    $(".label-countt").html(count);
                }                
            }
        }
    });
    $('#ModalAlerta').on('hidden.bs.modal', function () {
        var Id = $("#ModalAlerta").attr("IdAlerta");
        var Estado = "Visto";
        var oBJEC_ALERT = new FormData();
        oBJEC_ALERT.append("Id", Id);
        oBJEC_ALERT.append("Estado", Estado);
    
        $.ajax({
            url:"Ajax/AjaxAlerta.php?a=editarEstado",
            method:"POST",
            data:oBJEC_ALERT,
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success:function(respuesta){}
        });
    });
    $(document).click(function(){
        $.ajax({
            url:"View/EveryBody/LogoutTime.php?a=reload",
            method:"GET",
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success:function(respuesta){
                if(respuesta){
                    window.location = "Login"; 
                }
            }
        });
    });
    function verifLogin(){
        $.ajax({
            url:"View/EveryBody/LogoutTime.php?a=verif",
            method:"GET",
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success:function(respuesta){
                if(respuesta){
                    window.location = "Login"; 
                }
            }
        });
    }
    setInterval(verifLogin, 3000);
   
});