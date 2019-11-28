$(document).ready(function(){
    $(".dataTableAcudienteEstudiante").DataTable({
        "ajax":"Ajax/AjaxAcudienteEstudiante.php?a=listaAcudienteHijo",
        "deferRender":true,
        "retrieve":true,
        "processing":true,
        "language":{
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
    $(".dataTableAcudienteEstudiante").on("click",".btnCalificacion",function(){
        var id = $(this).attr("IdEstudiante");
        var oBJEC_ADMIN = new FormData();
        oBJEC_ADMIN.append("Id", id); 
        $.ajax({
            url:"Ajax/AjaxEstudiante.php?a=sesion",
            method:"POST",
            data:oBJEC_ADMIN,
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success : function(respuesta){
                if(respuesta == true){
                    window.location = "Materia";
                }	
            }
        });        
    });
    $(".dataTableAcudienteEstudiante").on("click",".btnBoletin",function(){
        var id = $(this).attr("IdEstudiante");
        var oBJEC_ADMIN = new FormData();
        oBJEC_ADMIN.append("Id", id); 
        $.ajax({
            url:"Ajax/AjaxEstudiante.php?a=sesion",
            method:"POST",
            data:oBJEC_ADMIN,
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success : function(respuesta){
                if(respuesta == true){
                    window.location = "Boletin";
                }	
            }
        });        
    });
    $(".dataTableAcudienteEstudiante").on("click",".btnObservacion",function(){
        var id = $(this).attr("IdEstudiante");
        var oBJEC_ADMIN = new FormData();
        oBJEC_ADMIN.append("Id", id); 
        $.ajax({
            url:"Ajax/AjaxEstudiante.php?a=sesion",
            method:"POST",
            data:oBJEC_ADMIN,
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success : function(respuesta){
                if(respuesta == true){
                    window.location = "Observacion";
                }	
            }
        });        
    });
});