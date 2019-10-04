$(document).ready(function(){
    $(".dataTableProfesorMateria").DataTable({
        "ajax":"../Ajax/AjaxProfesorMateria.php?a=lista",
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
        url:"../Ajax/AjaxProfesor.php?a=lista",
        method:"GET",
        dataType: "JSON",
        success : function(respuesta){
            $('#TxtProfesor').empty();
            $('#TxtProfesorEdit').empty();
            $("#TxtProfesor").append("<option value=''>-- Por favor seleccione --</option>");
            $("#TxtProfesorEdit").append("<option value=''>-- Por favor seleccione --</option>");
            for(var i = 0;i<respuesta.data.length;i++){
                if (respuesta.data[i][0].length > 0 && respuesta.data[i][2].length > 0){
                    $("#TxtProfesor").append("<option value='"+respuesta.data[i][0]+"'>"+respuesta.data[i][2]+"</option>"); 
                    $("#TxtProfesorEdit").append("<option value='"+respuesta.data[i][0]+"'>"+respuesta.data[i][2]+"</option>"); 
                }                
            }
            $('#TxtProfesor').change();
            $('#TxtProfesorEdit').change();
            $("#TxtProfesor").select2();
            $("#TxtProfesorEdit").select2();
        }
    });
    $.ajax({
        url:"../Ajax/AjaxMateria.php?a=lista",
        method:"GET",
        dataType: "JSON",
        success : function(respuesta){
            $('#TxtMateria').empty();
            $('#TxtMateriaEdit').empty();
            $("#TxtMateria").append("<option value=''>-- Por favor seleccione --</option>");
            $("#TxtMateriaEdit").append("<option value=''>-- Por favor seleccione --</option>");
            for(var i = 0;i<respuesta.data.length;i++){
                if (respuesta.data[i][0].length > 0 && respuesta.data[i][2].length > 0){
                    $("#TxtMateria").append("<option value='"+respuesta.data[i][0]+"'>"+respuesta.data[i][2]+"</option>"); 
                    $("#TxtMateriaEdit").append("<option value='"+respuesta.data[i][0]+"'>"+respuesta.data[i][2]+"</option>"); 
                }                
            }
            $('#TxtMateria').change();
            $('#TxtMateriaEdit').change();
            $("#TxtMateria").select2();
            $("#TxtMateriaEdit").select2();
        }
    });
});
function SubmitFunction(){
    return false;
}
$(".formCreate").on("click",".botonCreate",function(){
    if($('#TxtProfesor').val().length == 0){
        var m = "Por favor seleccione el profesor para asignar a la materia.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtMateria').val().length == 0){
        var m = "Por favor seleccione el materia a la que desea asignar el profesor.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var Profesor = $('#TxtProfesor').val();
        var Materia = $('#TxtMateria').val();
        var oBJEC_PROFMA = new FormData();
        oBJEC_PROFMA.append("Profesor", Profesor); 
        oBJEC_PROFMA.append("Materia", Materia);
    
        $.ajax({
            url:"../Ajax/AjaxProfesorMateria.php?a=crear",
            method:"POST",
            data:oBJEC_PROFMA,
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success:function(respuesta){
                if(respuesta = true){
                    var m = "Datos Almacenados.";
                    ValidateCreateUpdate(m);
                    window.location = "ProfesorMateria.php";
                }else if(respuesta = false){
                    var m = "¡¡¡Datos No Almacenados.!!!";
                    ValidateCreateUpdate(m);
                }
                
            }
        });
    }
});
$(".dataTableProfesorMateria").on("click",".btnDelete",function(){
    var id = $(this).attr("IdProfesorMateria");
    var oBJEC_PROFMA = new FormData();
    oBJEC_PROFMA.append("Id", id); 
    Swal.fire({
        title: 'Estas Seguro de Eliminar la asignacion de profesor de Materia?',
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
                url:"../Ajax/AjaxProfesorMateria.php?a=eliminar",
                method:"POST",
                data:oBJEC_PROFMA,
                cache:false,
                contentType:false,
                processData:false,
                dataType:"json",
                success : function(respuesta){
                    if(respuesta = true){
                        var m = "Datos Eliminados.";
                        ValidateCreateUpdate(m);
                        window.location = "ProfesorMateria.php";
                    }else if(respuesta = false){
                        var m = "¡¡¡Datos No Eliminados.!!!";
                        ValidateCreateUpdate(m);
                    }		
                }
            });
        }
    });
});
$(".dataTableProfesorMateria").on("click",".btnUpdate",function(){
    var id = $(this).attr("IdProfesorMateria");
    var oBJEC_PROFMA = new FormData();
    oBJEC_PROFMA.append("Id", id); 
    $.ajax({
        url:"../Ajax/AjaxProfesorMateria.php?a=buscar",
        method:"POST",
        data:oBJEC_PROFMA,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success : function(respuesta){
            $('#TxtProfesorEdit option[value="'+respuesta["ProfesorIdProfesor"]+'"]').attr("selected", true);
            $("#TxtProfesorEdit").select2();
            $('#TxtMateriaEdit option[value="'+respuesta["MateriaIdMateria"]+'"]').attr("selected", true);
            $("#TxtMateriaEdit").select2();
            $("#botonEdit").attr("IdProfesorMateria",id);
            $("#ModalEdit").modal();
        }
    });
});
$(".formEdit").on("click",".botonEdit",function(){
    if($('#TxtProfesorEdit').val().length == 0){
        var m = "Por favor seleccione el Profesor para asignar a un Materia";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtMateriaEdit').val().length == 0){
        var m = "Por favor seleccione la Materia a la que desea asignar el profesor.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var Id = $("#botonEdit").attr("IdProfesorMateria");
        var Profesor = $('#TxtProfesorEdit').val();
        var Materia = $('#TxtMateriaEdit').val();
        var oBJEC_PROFMA = new FormData();
        oBJEC_PROFMA.append("Id", Id);
        oBJEC_PROFMA.append("Profesor", Profesor); 
        oBJEC_PROFMA.append("Materia", Materia);
    
        $.ajax({
            url:"../Ajax/AjaxProfesorMateria.php?a=editar",
            method:"POST",
            data:oBJEC_PROFMA,
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success:function(respuesta){
                if(respuesta = true){
                    var m = "Datos Editados.";
                    ValidateCreateUpdate(m);
                    window.location = "ProfesorMateria.php";
                }else if(respuesta = false){
                    var m = "¡¡¡Datos No Editados.!!!";
                    ValidateCreateUpdate(m);
                }                
            }
        });
    }
}); 