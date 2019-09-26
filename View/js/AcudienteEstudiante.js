$(document).ready(function(){
    $(".dataTableAcudienteEstudiante").DataTable({
        "ajax":"../Ajax/AjaxAcudienteEstudiante.php?a=lista",
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
});
function SubmitFunction(){
    return false;
}
$(".formCreate").on("click",".botonCreate",function(){
    var fileName = "";
    var ext = "";
   
    if($('#TxtEstudiante').val().length == 0){
        var m = "Por favor ingrese el Nombre del Estudiante.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtAcudiente').val().length == 0){
        var m = "Por favor ingrese el nombre del Acudiente.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var Estudiante = $('#TxtEstudiante').val();
        var Acudiente = $('#TxtAcudiente').val();
        var oBJEC_ACUES = new FormData();
        oBJEC_ACUES.append("EstudianteIdEstudiante", Estudiante); 
        oBJEC_ACUES.append("AcudienteIdAcudiente", Acudiente); 
    
        $.ajax({
            url:"../Ajax/AjaxAcudienteEstudiante.php?a=crear",
            method:"POST",
            data:oBJEC_ACUES,
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success:function(respuesta){
                if(respuesta = true){
                    var m = "Datos Almacenados.";
                    ValidateCreateUpdate(m);
                    window.location = "AcudienteEstudiante.php";
                }else if(respuesta = false){
                    var m = "¡¡¡Datos No Almacenados.!!!";
                    ValidateCreateUpdate(m);
                }
                
            }
        });
    }
});
$(".dataTableAcudienteEstudiante").on("click",".btnDelete",function(){
    var id = $(this).attr("IdAcudienteEstudiante");
    var oBJEC_ACUES= new FormData();
    oBJEC_ACUES.append("Id", id); 
    Swal.fire({
        title: 'Estas Seguro de Eliminar el AcudienteEstudiante?',
        text: "No podras revertir los cambios!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borrarlo!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url:"../Ajax/AjaxAcudienteEstudiante.php?a=eliminar",
                method:"POST",
                data:oBJEC_ACUES,
                cache:false,
                contentType:false,
                processData:false,
                dataType:"json",
                success : function(respuesta){
                    if(respuesta = true){
                        var m = "Datos Eliminados.";
                        ValidateCreateUpdate(m);
                        window.location = "AcudienteEstudiante.php";
                    }else if(respuesta = false){
                        var m = "¡¡¡Datos No Eliminados.!!!";
                        ValidateCreateUpdate(m);
                    }		
                }
            });
        }
    });
});
$(".dataTableAcudienteEstudiante").on("click",".btnUpdate",function(){
    var id = $(this).attr("IdAcudienteEstudiante");
    var oBJEC_ACUES = new FormData();
    oBJEC_ACUES.append("Id", id); 
    $.ajax({
        url:"../Ajax/AjaxAcudienteEstudiante.php?a=buscar",
        method:"POST",
        data:oBJEC_ACUES,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success : function(respuesta){
            $("#botonEdit").attr("IdAcudienteEstudiante",id);
            $("#TxtEstudiante").val(respuesta["EstudianteIdEstudiante"]);
            $('#TxtAcudiente').val(respuesta["ACUESenteIdAcudiente"]);
            $("#TxtEstudienteEdit").focus();
            $("#TxtAcudienteEdit").focus();
            $("#ModalEdit").modal();
        }
    });
});
$(".formEdit").on("click",".botonEdit",function(){
    var fileName = "";
    var ext = "";
    if($('#TxtEstudianteEdit').val().length == 0){
        var m = "Por favor ingrese el nombre del Estudiante."
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtAcudienteEdit').val().length == 0){
        var m = "Por favor ingrese el nombre del Acudiente.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var Id = $("#botonEdit").attr("IdAcudienteEstudiante");
        var Estudiante = $('#TxtEstudianteEdit').val();
        var Acudiente = $('#TxtAcudienteEdit').val();
        var oBJEC_ACUES = new FormData();
        oBJEC_ACUES.append("Id", Id); 
        oBJEC_ACUES.append("EstudianteIdEstudiante", Estudiante); 
        oBJEC_ACUES.append("AcudienteIdAcudiente", Acudiente);
    
        $.ajax({
            url:"../Ajax/AjaxAcudienteEstudiante.php?a=editar",
            method:"POST",
            data:oBJEC_ACUES,
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success:function(respuesta){
                if(respuesta = true){
                    var m = "Datos Editados.";
                    ValidateCreateUpdate(m);
                    window.location = "AcudienteEstudiante.php";
                }else if(respuesta = false){
                    var m = "¡¡¡Datos No Editados.!!!";
                    ValidateCreateUpdate(m);
                }
                
            }
        });
    }
}); 