$(document).ready(function(){
    $(".dataTableAcudiente").DataTable({
        "ajax":"Ajax/AjaxAcudiente.php?a=listap",
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
    $(".dataTableAcudiente").on("click",".btnEstudiante",function(){
        var id = $(this).attr("IdAcudiente");
        var oBJEC_ADMIN = new FormData();
        oBJEC_ADMIN.append("Id", id); 
        $.ajax({
            url:"Ajax/AjaxAcudiente.php?a=sesion",
            method:"POST",
            data:oBJEC_ADMIN,
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success : function(respuesta){
                if(respuesta == true){
                    window.location = "AcudienteEstudiante";
                }	
            }
        });        
    });
});