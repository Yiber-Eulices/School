$(document).ready(function(){
    $(".dataTableEvento").DataTable({
        "ajax":"Ajax/AjaxEvento.php?a=lista",
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
    var fileName = "";
    var ext = "";
    if(document.getElementById("TxtFoto").files.length > 0){
        var fileName = document.getElementById("TxtFoto").files[0].name;
        var ext = fileName.split('.').pop();
    }
    if($('#TxtFecha').val().length == 0){
        var m = "Por favor ingrese la fecha del Evento.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtTitulo').val().length == 0){
        var m = "Por favor ingrese el titulo del Evento.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtDescripcion').val().length == 0){
        var m = "Por favor ingrese la descripcion del Evento.";
        ValidateCreateUpdate(m);
        return false;
    }else if(document.getElementById("TxtFoto").files.length == 0){
        var m = "Por favor seleccione la Foto de el Evento.";
        ValidateCreateUpdate(m);
        return false;
    }else if(ext!='png' && ext!='jpg' && ext!='gif'){
        var m = "El archivo seleccionado no es un archivo de Imagen.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtLugar').val().length == 0){
        var m = "Por favor ingrese el lugar del Evento.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        from = $('#TxtFecha').val().split("/");
        var Fecha = from[2]+'/'+from[0]+'/'+from[1];
        var Titulo = $('#TxtTitulo').val();
        var Descripcion = $('#TxtDescripcion').val();
        var Foto = document.getElementById("TxtFoto").files[0];
        var Lugar = $('#TxtLugar').val();
        var oBJEC_EVEN = new FormData();
        oBJEC_EVEN.append("Fecha", Fecha); 
        oBJEC_EVEN.append("Titulo", Titulo);
        oBJEC_EVEN.append("Descripcion", Descripcion);   
        oBJEC_EVEN.append("Foto", Foto);
        oBJEC_EVEN.append("Lugar", Lugar);
    
        $.ajax({
            url:"Ajax/AjaxEvento.php?a=crear",
            method:"POST",
            data:oBJEC_EVEN,
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
                    $(".dataTableEvento").DataTable().ajax.reload();
                }else if(respuesta == false){
                    var m = "¡¡¡Datos No Almacenados.!!!";
                    ValidateError(m);
                }
                
            }
        });
    }
    return false;
});
$(".dataTableEvento").on("click",".btnDelete",function(){
    var id = $(this).attr("IdEvento");
    var oBJEC_EVEN= new FormData();
    oBJEC_EVEN.append("Id", id); 
    Swal.fire({
        title: 'Estas Seguro de Eliminar el Evento?',
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
                url:"Ajax/AjaxEvento.php?a=eliminar",
                method:"POST",
                data:oBJEC_EVEN,
                cache:false,
                contentType:false,
                processData:false,
                dataType:"json",
                success : function(respuesta){
                    if(respuesta == true){
                        var c = "Datos Eliminados.";
                        ValidateCreateEliminar(c);
                        $(".dataTableEvento").DataTable().ajax.reload();
                    }else if(respuesta == false){
                        var m = "¡¡¡Datos No Eliminados.!!!";
                        ValidateError(m);
                    }		
                }
            });
        }
    });
});
$(".dataTableEvento").on("click",".btnUpdate",function(){
    var id = $(this).attr("IdEvento");
    var oBJEC_EVEN = new FormData();
    oBJEC_EVEN.append("Id", id); 
    $.ajax({
        url:"Ajax/AjaxEvento.php?a=buscar",
        method:"POST",
        data:oBJEC_EVEN,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success : function(respuesta){
            $("#botonEdit").attr("IdEvento",id);
            $("#imgProfileEdit").attr("src",respuesta["Foto"]);
            from = respuesta["Fecha"].split("-");
            $('#TxtFechaEdit').val(from[1]+'/'+from[2]+'/'+from[0]);
            $('#TxtTituloEdit').val(respuesta["Titulo"]);
            $('#TxtLugarEdit').val(respuesta["Lugar"]);
            $('#TxtDescripcionEdit').val(respuesta["Descripcion"]);
            $("#TxtDescripcionEdit").focus();
            $("#TxtLugarEdit").focus();
            $("#TxtTituloEdit").focus();
            $("#TxtFechaEdit").focus();
            $("#ModalEdit").modal();
        }
    });
});
$(".formEdit").on('submit', function(){
    var fileName = "";
    var ext = "";
    if(document.getElementById("TxtFotoEdit").files.length > 0){
        var fileName = document.getElementById("TxtFotoEdit").files[0].name;
        var ext = fileName.split('.').pop();
    }
    if($('#TxtFechaEdit').val().length == 0){
        var m = "Por favor ingrese la fecha del Evento."
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtTituloEdit').val().length == 0){
        var m = "Por favor ingrese el titulo del Evento.";
        ValidateCreateUpdate(m);
        return false;
    }else if(document.getElementById("TxtFotoEdit").files.length > 0 && ext!='png' && ext!='jpg' && ext!='gif'){
        var m = "El archivo seleccionado no es un archivo de Imagen.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtDescripcionEdit').val().length == 0){
        var m = "Por favor ingrese la descripcion del Evento.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtLugarEdit').val().length == 0){
        var m = "Por favor ingrese el lugar del Evento.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var Id = $("#botonEdit").attr("IdEvento");
        from = $('#TxtFechaEdit').val().split("/");
        var Fecha = from[2]+'/'+from[0]+'/'+from[1];
        var Titulo = $('#TxtTituloEdit').val();
        var Foto = "";
        var FotoSrc = "";
        if(document.getElementById("TxtFotoEdit").files.length > 0){
            var Foto = document.getElementById("TxtFotoEdit").files[0];
        }else{
            var FotoSrc = $("#imgProfileEdit").attr("src");
        }
        var Descripcion = $('#TxtDescripcionEdit').val();
        var Lugar = $('#TxtLugarEdit').val();
        var oBJEC_EVEN = new FormData();
        oBJEC_EVEN.append("Id", Id); 
        oBJEC_EVEN.append("Fecha", Fecha); 
        oBJEC_EVEN.append("Titulo", Titulo); 
        oBJEC_EVEN.append("Foto", Foto);
        oBJEC_EVEN.append("FotoSrc", FotoSrc);
        oBJEC_EVEN.append("Descripcion", Descripcion); 
        oBJEC_EVEN.append("Lugar", Lugar); 
    
        $.ajax({
            url:"Ajax/AjaxEvento.php?a=editar",
            method:"POST",
            data:oBJEC_EVEN,
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
                    $(".dataTableEvento").DataTable().ajax.reload();
                }else if(respuesta == false){
                    var m = "¡¡¡Datos No Editados.!!!";
                    ValidateError(m);
                }
                
            }
        });
    }
    return false;
}); 