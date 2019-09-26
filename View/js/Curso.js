$(document).ready(function(){
    $(".dataTableCurso").DataTable({
        "ajax":"../Ajax/AjaxCurso.php?a=lista",
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
    if($('#TxtNombre').val().length == 0){
        var m = "Por favor ingrese el Nombre del Curso.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtAnio').val().length == 0){
        var m = "Por favor ingrese la Descripcion del Año.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtGrado').val().length == 0){
        var m = "Por favor ingrese la Descripcion del Grado.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtProfesor').val().length == 0){
        var m = "Por favor ingrese la Descripcion del Profesor.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var Nombre = $('#TxtNombre').val();
        var Anio = $('#TxtAnio').val();
        var Grado = $('#TxtGrado').val();
        var Profesor = $('#TxtProfesor').val();
        var oBJEC_ADMIN = new FormData();
        oBJEC_ADMIN.append("Nombre", Nombre); 
        oBJEC_ADMIN.append("Anio", Anio); 
        oBJEC_ADMIN.append("Grado", Grado); 
        oBJEC_ADMIN.append("Profesor", Profesor); 
        $.ajax({
            url:"../Ajax/AjaxCurso.php?a=crear",
            method:"POST",
            data:oBJEC_ADMIN,
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success:function(respuesta){
                if(respuesta = true){
                    var m = "Datos Almacenados.";
                    ValidateCreateUpdate(m);
                    window.location = "Curso.php";
                }else if(respuesta = false){
                    var m = "¡¡¡Datos No Almacenados.!!!";
                    ValidateCreateUpdate(m);
                }
                
            }
        });
    }
});
$(".dataTableCurso").on("click",".btnDelete",function(){
    var id = $(this).attr("IdCurso");
    var oBJEC_ADMIN = new FormData();
    oBJEC_ADMIN.append("Id", id); 
    Swal.fire({
        title: 'Estas Seguro de Eliminar el Curso?',
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
                url:"../Ajax/AjaxCurso.php?a=eliminar",
                method:"POST",
                data:oBJEC_ADMIN,
                cache:false,
                contentType:false,
                processData:false,
                dataType:"json",
                success : function(respuesta){
                    if(respuesta = true){
                        var m = "Datos Eliminados.";
                        ValidateCreateUpdate(m);
                        window.location = "Curso.php";
                    }else if(respuesta = false){
                        var m = "¡¡¡Datos No Eliminados.!!!";
                        ValidateCreateUpdate(m);
                    }		
                }
            });
        }
    });
});
$(".dataTableCurso").on("click",".btnUpdate",function(){
    var id = $(this).attr("IdCurso");
    var oBJEC_ADMIN = new FormData();
    oBJEC_ADMIN.append("Id", id); 
    $.ajax({
        url:"../Ajax/AjaxCurso.php?a=buscar",
        method:"POST",
        data:oBJEC_ADMIN,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success : function(respuesta){
            $("#botonEdit").attr("IdCurso",id);
            $('#TxtNombreEdit').val(respuesta["Nombre"]);
            $('#TxtAnioEdit').val(respuesta["Anio"]);
            $('#TxtGradoEdit').val(respuesta["Grado"]);
            $('#TxtProfesorEdit').val(respuesta["Profesor"]);
            $("#TxtProfesorEdit").focus();
            $("#TxtGradoEdit").focus();
            $("#TxtAnioEdit").focus();
            $("#TxtNombreEdit").focus();
            $("#ModalEdit").modal();
        }
    });
});
$(".formEdit").on("click",".botonEdit",function(){
    var fileName = "";
    var ext = "";
    
    if($('#TxtNombreEdit').val().length == 0){
        var m = "Por favor ingrese el Nombre del Curso."
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtAnioEdit').val().length == 0){
        var m = "Por favor ingrese el Año.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtGradoEdit').val().length == 0){
        var m = "Por favor ingrese el Grado.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtProfesorEdit').val().length == 0){
        var m = "Por favor ingrese el profesor.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var Id = $("#botonEdit").attr("IdCurso");
        var Nombre = $('#TxtNombreEdit').val();
        var Anio = $('#TxtAnioEdit').val();
        var Grado = $('#TxtGradoEdit').val();
        var Profesor = $('#TxtProfesorEdit').val();
        var oBJEC_ADMIN = new FormData();
        oBJEC_ADMIN.append("Id", Id); 
        oBJEC_ADMIN.append("Nombre", Nombre); 
        oBJEC_ADMIN.append("Anio", Anio); 
        oBJEC_ADMIN.append("Grado", Grado); 
        oBJEC_ADMIN.append("Profesor", Profesor); 
       
        $.ajax({
            url:"../Ajax/AjaxCurso.php?a=editar",
            method:"POST",
            data:oBJEC_ADMIN,
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success:function(respuesta){
                if(respuesta = true){
                    var m = "Datos Editados.";
                    ValidateCreateUpdate(m);
                    window.location = "Curso.php";
                }else if(respuesta = false){
                    var m = "¡¡¡Datos No Editados.!!!";
                    ValidateCreateUpdate(m);
                }
                
            }
        });
    }
}); 