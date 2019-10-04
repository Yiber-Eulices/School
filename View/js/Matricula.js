$(document).ready(function(){
    $(".dataTableMatricula").DataTable({
        "ajax":"../Ajax/AjaxMatricula.php?a=lista",
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
    $.ajax({
        url:"../Ajax/AjaxGrado.php?a=lista",
        method:"GET",
        dataType: "JSON",
        success : function(respuesta){
            $('#TxtGrado').empty();
            $('#TxtGradoEdit').empty();
            $("#TxtGrado").append("<option value=''>-- Por favor seleccione --</option>");
            $("#TxtGradoEdit").append("<option value=''>-- Por favor seleccione --</option>");
            for(var i = 0;i<respuesta.data.length;i++){
                if (respuesta.data[i][0].length > 0 && respuesta.data[i][1].length > 0){
                    $("#TxtGrado").append("<option value='"+respuesta.data[i][0]+"'>"+respuesta.data[i][1]+"</option>"); 
                    $("#TxtGradoEdit").append("<option value='"+respuesta.data[i][0]+"'>"+respuesta.data[i][1]+"</option>"); 
                }                
            }
            $('#TxtGrado').change();
            $('#TxtGradoEdit').change();
            $("#TxtGrado").select2();
            $("#TxtGradoEdit").select2();
        }
    });
    $.ajax({
        url:"../Ajax/AjaxEstudiante.php?a=lista",
        method:"GET",
        dataType: "JSON",
        success : function(respuesta){
            $('#TxtEstuidiante').empty();
            $('#TxtEstuidianteEdit').empty();
            $("#TxtEstuidiante").append("<option value=''>-- Por favor seleccione --</option>");
            $("#TxtEstuidianteEdit").append("<option value=''>-- Por favor seleccione --</option>");
            for(var i = 0;i<respuesta.data.length;i++){
                if (respuesta.data[i][0].length > 0 && respuesta.data[i][2].length > 0){
                    $("#TxtEstuidiante").append("<option value='"+respuesta.data[i][0]+"'>"+respuesta.data[i][2]+"</option>"); 
                    $("#TxtEstuidianteEdit").append("<option value='"+respuesta.data[i][0]+"'>"+respuesta.data[i][2]+"</option>"); 
                }                
            }
            $('#TxtEstuidiante').change();
            $('#TxtEstuidianteEdit').change();
            $("#TxtEstuidiante").select2();
            $("#TxtEstuidianteEdit").select2();
        }
    });
});
function SubmitFunction(){
    return false;
}
$(".formCreate").on("click",".botonCreate",function(){
    if($('#TxtFechaMatricula').val().length == 0){
        var m = "Por favor ingrese la fecha de la matricula.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtCosto').val().length == 0){
        var m = "Por favor ingrese el costo de la matricula.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtGrado').val().length == 0){
        var m = "Por favor seleccione el grado de la matricula.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtEstuidiante').val().length == 0){
        var m = "Por favor seleccione el estudiante de la matricula.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var Fecha = $('#TxtFecha').val();
        var Costo = $('#TxtCosto').val();
        var Grado = $('#TxtGrado').val();
        var Estudiante = $('#TxtEstudiante').val();
        var oBJEC_MATR = new FormData();
        oBJEC_MATR.append("Fecha", Fecha); 
        oBJEC_MATR.append("Costo", Costo);
        oBJEC_MATR.append("Grado", Grado); 
        oBJEC_MATR.append("Estudiante", Estudiante);
    
        $.ajax({
            url:"../Ajax/AjaxMatricula.php?a=crear",
            method:"POST",
            data:oBJEC_MATR,
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success:function(respuesta){
                if(respuesta = true){
                    var m = "Datos Almacenados.";
                    ValidateCreateUpdate(m);
                    window.location = "Matricula.php";
                }else if(respuesta = false){
                    var m = "¡¡¡Datos No Almacenados.!!!";
                    ValidateCreateUpdate(m);
                }
                
            }
        });
    }
});
$(".dataTableMatricula").on("click",".btnDelete",function(){
    var id = $(this).attr("IdMatricula");
    var oBJEC_MATR = new FormData();
    oBJEC_MATR.append("Id", id); 
    Swal.fire({
        title: 'Estas Seguro de Eliminar la matricula?',
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
                url:"../Ajax/AjaxMatricula.php?a=eliminar",
                method:"POST",
                data:oBJEC_MATR,
                cache:false,
                contentType:false,
                processData:false,
                dataType:"json",
                success : function(respuesta){
                    if(respuesta = true){
                        var m = "Datos Eliminados.";
                        ValidateCreateUpdate(m);
                        window.location = "Matricula.php";
                    }else if(respuesta = false){
                        var m = "¡¡¡Datos No Eliminados.!!!";
                        ValidateCreateUpdate(m);
                    }		
                }
            });
        }
    });
});
$(".dataTableMatricula").on("click",".btnUpdate",function(){
    var id = $(this).attr("IdMatricula");
    var oBJEC_MATR = new FormData();
    oBJEC_MATR.append("Id", id); 
    $.ajax({
        url:"../Ajax/AjaxMatricula.php?a=buscar",
        method:"POST",
        data:oBJEC_MATR,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success : function(respuesta){
            $('#TxtGradoEdit option[value="'+respuesta["GradoIdGrado"]+'"]').attr("selected", true);
            $("#TxtGradoEdit").select2();
            $('#TxtEstudianteEdit option[value="'+respuesta["EstudianteIdEstudiante"]+'"]').attr("selected", true);
            $("#TxtEstudianteEdit").select2();
            $("#botonEdit").attr("IdMatricula",id);
            $('#TxtFechaMatriculaEdit').val(respuesta["Fecha"]);
            $('#TxtCostoEdit').val(respuesta["Costo"]);
            $("#ModalEdit").modal();
        }
    });
});
$(".formEdit").on("click",".botonEdit",function(){
    if($('#TxtFechaMatriculaEdit').val().length == 0){
        var m = "Por favor ingrese la fecha de la matricula."
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtCostoEdit').val().length == 0){
        var m = "Por favor ingrese el costo de el matricula.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtGradoEdit').val().length == 0){
        var m = "Por favor seleccione el grado de la matricula.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtEstudianteEdit').val().length == 0){
        var m = "Por favor seleccione el estudiante de el matricula.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var Id = $("#botonEdit").attr("IdMatricula");
        var Fecha = $('#TxtFechaMatriculaEdit').val();
        var Costo = $('#TxtCostoEdit').val();
        var Grado = $('#TxtGradoEdit').val();
        var Estudiante = $('#TxtEstudianteEdit').val();
        var oBJEC_MATR = new FormData();
        oBJEC_MATR.append("Id", Id); 
        oBJEC_MATR.append("Fecha", Fecha); 
        oBJEC_MATR.append("Costo", Costo);
        oBJEC_MATR.append("Grado", Grado); 
        oBJEC_MATR.append("Estudiante", Estudiante);
    
        $.ajax({
            url:"../Ajax/AjaxMatricula.php?a=editar",
            method:"POST",
            data:oBJEC_MATR,
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success:function(respuesta){
                if(respuesta = true){
                    var m = "Datos Editados.";
                    ValidateCreateUpdate(m);
                    window.location = "Matricula.php";
                }else if(respuesta = false){
                    var m = "¡¡¡Datos No Editados.!!!";
                    ValidateCreateUpdate(m);
                }                
            }
        });
    }
}); 