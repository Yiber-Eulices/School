$(document).ready(function(){
    $(".btnPeriodo").click(function(){
        var periodo = $(this).attr("periodo");
        var  id = $("#UserId").val();
        var oBJEC_ADMIN = new FormData();
        oBJEC_ADMIN.append("Periodo", periodo);
        oBJEC_ADMIN.append("Id", id);
        $.ajax({
            url:"../Ajax/AjaxBoletin.php",
            method:"POST",
            data:oBJEC_ADMIN,
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success:function(respuesta){
                $("#PlanoPdfView").empty();
                if(periodo==1){
                    $("#NumPeriodo").html("Primer Periodo");
                }else if(periodo==2){
                    $("#NumPeriodo").html("Segundo Periodo");
                }else if(periodo==3){
                    $("#NumPeriodo").html("Tercer Periodo");
                }else if(periodo==4){
                    $("#NumPeriodo").html("Cuarto Periodo");
                }                
                $("#PlanoPdfView").append("<embed src='"+respuesta+"' type='application/pdf' width='100%' height='600px' />");
            }
        });
    });
    var periodo = 1;
    var  id = $("#UserId").val();
    var oBJEC_ADMIN = new FormData();
    oBJEC_ADMIN.append("Periodo", periodo);
    oBJEC_ADMIN.append("Id", id);
    $.ajax({
        url:"../Ajax/AjaxBoletin.php",
        method:"POST",
        data:oBJEC_ADMIN,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success:function(respuesta){
            $("#PlanoPdfView").empty();
            $("#NumPeriodo").html("Primer Periodo");
            $("#PlanoPdfView").append("<embed src='"+respuesta+"' type='application/pdf' width='100%' height='600px' />");
        }
    });
});