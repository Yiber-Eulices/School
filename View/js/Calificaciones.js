$(document).ready(function(){
    $(".dataTableCalificacion").DataTable({
        "ajax":"Ajax/AjaxCalificacion.php?a=listaprofesor",
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
$(".formCreate").on('submit', function(){
    
    if($('#TxtIdEstudiante').val().length == 0){
        var m = "Por favor seleccione el Estudiante.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtIdMateria').val().length == 0){
        var m = "Por favor seleccione la Materia.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtPeriodo').val().length == 0){
        var m = "Por favor seleccione el Periodo.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtNotaAcumulativa').val().length == 0){
        var m = "Por favor ingrese la Nota Acumulativa.";
        ValidateCreateUpdate(m);
        return false;
    }else if(parseFloat($('#TxtNotaAcumulativa').val())>5){
        var m = "Por favor ingrese la Nota Acumulativa menor a 5.";
        ValidateCreateUpdate(m);
        return false;
    }else if(parseFloat($('#TxtNotaAcumulativa').val())<0){
        var m = "Por favor ingrese la Nota Acumulativa mayor a 0.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtNotaComportamental').val().length == 0){
        var m = "Por favor ingrese la Nota Comportamental.";
        ValidateCreateUpdate(m);
        return false;
    }else if(parseFloat($('#TxtNotaComportamental').val())>5){
        var m = "Por favor ingrese la Nota Comportamental menor a 5.";
        ValidateCreateUpdate(m);
        return false;
    }else if(parseFloat($('#TxtNotaComportamental').val())<0){
        var m = "Por favor ingrese la Nota Comportamental mayor a 0.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtEvaluacion').val().length == 0){
        var m = "Por favor ingrese la Evaluacion.";
        ValidateCreateUpdate(m);
        return false;
    }else if(parseFloat($('#TxtEvaluacion').val())>5){
        var m = "Por favor ingrese la Evaluacion menor a 5.";
        ValidateCreateUpdate(m);
        return false;
    }else if(parseFloat($('#TxtEvaluacion').val())<0){
        var m = "Por favor ingrese la Evaluacion mayor a 0.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtAutoEvaluacion').val().length == 0){
        var m = "Por favor ingrese la Auto Evaluacion.";
        ValidateCreateUpdate(m);
        return false;
    }else if(parseFloat($('#TxtAutoEvaluacion').val())>5){
        var m = "Por favor ingrese la Auto Evaluacion menor a 5.";
        ValidateCreateUpdate(m);
        return false;
    }else if(parseFloat($('#TxtAutoEvaluacion').val())<0){
        var m = "Por favor ingrese la Auto Evaluacion mayor a 0.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var IdEstudiante = $('#TxtIdEstudiante').val();
        var IdMateria = $('#TxtIdMateria').val();
        var Periodo = $('#TxtPeriodo').val();
        var NotaAcumulativa = $('#TxtNotaAcumulativa').val();
        var NotaComportamental = $('#TxtNotaComportamental').val();
        var Evaluacion = $('#TxtEvaluacion').val();
        var AutoEvaluacion = $('#TxtAutoEvaluacion').val();
        var oBJEC_CALFIC = new FormData();
        oBJEC_CALFIC.append("IdEstudiante", IdEstudiante); 
        oBJEC_CALFIC.append("IdMateria", IdMateria); 
        oBJEC_CALFIC.append("Periodo", Periodo);
        oBJEC_CALFIC.append("NotaAcumulativa", NotaAcumulativa); 
        oBJEC_CALFIC.append("NotaComportamental", NotaComportamental); 
        oBJEC_CALFIC.append("Evaluacion", Evaluacion);
        oBJEC_CALFIC.append("AutoEvaluacion", AutoEvaluacion);    
        $.ajax({
            url:"Ajax/AjaxCalificacion.php?a=crear",
            method:"POST",
            data:oBJEC_CALFIC,
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success:function(respuesta){
                if(respuesta = true){
                    $("#ModalCreate").modal('toggle');
                    $('form').trigger("reset");
                    var a = "Datos Almacenados.";
                    ValidateCreateExito(a);
                    $(".dataTableCalificacion").DataTable().ajax.reload();
                }else if(respuesta = false){
                    var m = "¡¡¡Datos No Almacenados.!!!";
                    ValidateCreateUpdate(m);
                }
                
            }
        });
    }
    return false;
});
$(".dataTableCalificacion").on("click",".btnDelete",function(){
    var id = $(this).attr("IdCalificacion");
    var oBJEC_CALFIC = new FormData();
    oBJEC_CALFIC.append("Id", id); 
    Swal.fire({
        title: 'Estas Seguro de Eliminar el Calificacion?',
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
                url:"Ajax/AjaxCalificacion.php?a=eliminar",
                method:"POST",
                data:oBJEC_CALFIC,
                cache:false,
                contentType:false,
                processData:false,
                dataType:"json",
                success : function(respuesta){
                    if(respuesta = true){
                        var c = "Datos Eliminados.";
                        ValidateCreateEliminar(c);
                        $(".dataTableCalificacion").DataTable().ajax.reload();
                    }else if(respuesta = false){
                        var m = "¡¡¡Datos No Eliminados.!!!";
                        ValidateCreateUpdate(m);
                    }		
                }
            });
        }
    });
});
$(".dataTableCalificacion").on("click",".btnUpdate",function(){
    var id = $(this).attr("IdCalificacion");
    var oBJEC_CALFIC = new FormData();
    oBJEC_CALFIC.append("Id", id); 
    $.ajax({
        url:"Ajax/AjaxCalificacion.php?a=buscar",
        method:"POST",
        data:oBJEC_CALFIC,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success : function(respuesta){
            $("#botonEdit").attr("IdCalificacion",id);
            $("#TxtPeriodoEdit option[value='"+respuesta["Periodo"]+"']").attr("selected",true);
            $("#TxtPeriodoEdit").select2();
            $('#TxtNotaAcumulativaEdit').val(respuesta["NotaAcumulativa"]);
            $('#TxtNotaComportamentalEdit').val(respuesta["NotaComportamental"]);
            $('#TxtEvaluacionEdit').val(respuesta["Evaluacion"]);
            $('#TxtAutoEvaluacionEdit').val(respuesta["AutoEvaluacion"]);
            $("#ModalEdit").modal();
        }
    });
});
$(".formEdit").on('submit', function(){
    if($('#TxtIdEstudianteEdit').val().length == 0){
        var m = "Por favor seleccione el Estudiante.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtIdMateriaEdit').val().length == 0){
        var m = "Por favor seleccione la Materia.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtPeriodoEdit').val().length == 0){
        var m = "Por favor seleccione el Periodo.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtNotaAcumulativaEdit').val().length == 0){
        var m = "Por favor ingrese la Nota Acumulativa.";
        ValidateCreateUpdate(m);
        return false;
    }else if(parseFloat($('#TxtNotaAcumulativaEdit').val())>5){
        var m = "Por favor ingrese la Nota Acumulativa menor a 5.";
        ValidateCreateUpdate(m);
        return false;
    }else if(parseFloat($('#TxtNotaAcumulativaEdit').val())<0){
        var m = "Por favor ingrese la Nota Acumulativa mayor a 0.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtNotaComportamentalEdit').val().length == 0){
        var m = "Por favor ingrese la Nota Comportamental.";
        ValidateCreateUpdate(m);
        return false;
    }else if(parseFloat($('#TxtNotaComportamentalEdit').val())>5){
        var m = "Por favor ingrese la Nota Comportamental menor a 5.";
        ValidateCreateUpdate(m);
        return false;
    }else if(parseFloat($('#TxtNotaComportamentalEdit').val())<0){
        var m = "Por favor ingrese la Nota Comportamental mayor a 0.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtEvaluacionEdit').val().length == 0){
        var m = "Por favor ingrese la Evaluacion.";
        ValidateCreateUpdate(m);
        return false;
    }else if(parseFloat($('#TxtEvaluacionEdit').val())>5){
        var m = "Por favor ingrese la Evaluacion menor a 5.";
        ValidateCreateUpdate(m);
        return false;
    }else if(parseFloat($('#TxtEvaluacionEdit').val())<0){
        var m = "Por favor ingrese la Evaluacion mayor a 0.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtAutoEvaluacionEdit').val().length == 0){
        var m = "Por favor ingrese la Auto Evaluacion.";
        ValidateCreateUpdate(m);
        return false;
    }else if(parseFloat($('#TxtAutoEvaluacionEdit').val())>5){
        var m = "Por favor ingrese la Auto Evaluacion menor a 5.";
        ValidateCreateUpdate(m);
        return false;
    }else if(parseFloat($('#TxtAutoEvaluacionEdit').val())<0){
        var m = "Por favor ingrese la Auto Evaluacion mayor a 0.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var Id = $("#botonEdit").attr("IdCalificacion");
        var IdEstudiante = $('#TxtIdEstudianteEdit').val();
        var IdMateria = $('#TxtIdMateriaEdit').val();
        var Periodo = $('#TxtPeriodoEdit').val();
        var NotaAcumulativa = $('#TxtNotaAcumulativaEdit').val();
        var NotaComportamental = $('#TxtNotaComportamentalEdit').val();
        var Evaluacion = $('#TxtEvaluacionEdit').val();
        var AutoEvaluacion = $('#TxtAutoEvaluacionEdit').val();
        var oBJEC_CALFIC = new FormData();
        oBJEC_CALFIC.append("Id", Id); 
        oBJEC_CALFIC.append("IdEstudiante", IdEstudiante); 
        oBJEC_CALFIC.append("IdMateria", IdMateria); 
        oBJEC_CALFIC.append("Periodo", Periodo);
        oBJEC_CALFIC.append("NotaAcumulativa", NotaAcumulativa); 
        oBJEC_CALFIC.append("NotaComportamental", NotaComportamental); 
        oBJEC_CALFIC.append("Evaluacion", Evaluacion);
        oBJEC_CALFIC.append("AutoEvaluacion", AutoEvaluacion); 
        $.ajax({
            url:"Ajax/AjaxCalificacion.php?a=editar",
            method:"POST",
            data:oBJEC_CALFIC,
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success:function(respuesta){
                if(respuesta = true){
                    $("#ModalEdit").modal('toggle');
                    $('form').trigger("reset");
                    var a = "Datos Editados.";
                    ValidateCreateExito(a);
                    $(".dataTableCalificacion").DataTable().ajax.reload();
                }else if(respuesta = false){
                    var m = "¡¡¡Datos No Editados.!!!";
                    ValidateCreateUpdate(m);
                }
                
            }
        });
    }
    return false;
}); 