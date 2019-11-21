$(document).ready(function(){
    $(".dataTableGrado").DataTable({
        "ajax":"Ajax/AjaxGrado.php?a=lista",
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
    if($('#TxtNivel').val().length == 0){
        var m = "Por favor ingrese el Grado.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var Nivel = $('#TxtNivel').val();
        var oBJEC_GRADO = new FormData();
        oBJEC_GRADO.append("Nivel", Nivel); 
    
        $.ajax({
            url:"Ajax/AjaxGrado.php?a=crear",
            method:"POST",
            data:oBJEC_GRADO,
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success:function(respuesta){
                if(respuesta == true){
                    $("#ModalCreate").modal('toggle');
                    $('form').trigger("reset");
                    var a = "Datos Almacenados.";
                    ValidateCreateExito(a);
                    $(".dataTableGrado").DataTable().ajax.reload();
                }else if(respuesta == false){
                    var m = "¡¡¡Datos No Almacenados.!!!";
                    ValidateError(m);
                }                
            }
        });
    }
    return false;
});
$(".dataTableGrado").on("click",".btnDelete",function(){
    var id = $(this).attr("IdGrado");
    var oBJEC_GRADO= new FormData();
    oBJEC_GRADO.append("Id", id); 
    Swal.fire({
        title: 'Estas Seguro de Eliminar el Grado?',
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
                url:"Ajax/AjaxGrado.php?a=eliminar",
                method:"POST",
                data:oBJEC_GRADO,
                cache:false,
                contentType:false,
                processData:false,
                dataType:"json",
                success : function(respuesta){
                    if(respuesta == true){
                        var c = "Datos Eliminados.";
                        ValidateCreateEliminar(c);
                        $(".dataTableGrado").DataTable().ajax.reload();
                    }else if(respuesta == false){
                        var m = "¡¡¡Datos No Eliminados.!!!";
                        ValidateError(m);
                    }		
                }
            });
        }
    });
});
$(".dataTableGrado").on("click",".btnUpdate",function(){
    var id = $(this).attr("IdGrado");
    var oBJEC_GRADO = new FormData();
    oBJEC_GRADO.append("Id", id); 
    $.ajax({
        url:"Ajax/AjaxGrado.php?a=buscar",
        method:"POST",
        data:oBJEC_GRADO,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success : function(respuesta){
            $("#botonEdit").attr("IdGrado",id);
            $('#TxtNivelEdit').val(respuesta["Nivel"]);
            $("#TxtNivelEdit").focus();
            $("#ModalEdit").modal();
        }
    });
});
$(".formEdit").on('submit', function(){
    if($('#TxtNivelEdit').val().length == 0){
        var m = "Por favor ingrese  el Grado."
        ValidateCreateUpdate(m);
        return false;
    }else{
        var Id = $("#botonEdit").attr("IdGrado");
        var Nivel = $('#TxtNivelEdit').val();
        var oBJEC_GRADO = new FormData();
        oBJEC_GRADO.append("Id", Id); 
        oBJEC_GRADO.append("Nivel", Nivel); 
    
        $.ajax({
            url:"Ajax/AjaxGrado.php?a=editar",
            method:"POST",
            data:oBJEC_GRADO,
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success:function(respuesta){
                if(respuesta == true){
                    $("#ModalEdit").modal('toggle');
                    $('form').trigger("reset");
                    var a = "Datos Editados.";
                    ValidateCreateExito(a);
                    $(".dataTableGrado").DataTable().ajax.reload();
                }else if(respuesta == false){
                    var m = "¡¡¡Datos No Editados.!!!";
                    ValidateError(m);
                }
                
            }
        });
    }
    return false;
}); 