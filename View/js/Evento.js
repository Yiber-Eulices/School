$(document).ready(function(){
    $(".dataTableEvento").DataTable({
        "ajax":"../Ajax/AjaxEvento.php?a=lista",
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
    }else{
        var Fecha = $('#TxtFecha').val();
        var Titulo = $('#TxtTitulo').val();
        var Descripcion = $('#TxtDescripcion').val();
        var Foto = document.getElementById("TxtFoto").files[0];
        var oBJEC_EVEN = new FormData();
        oBJEC_EVEN.append("Fecha", Fecha); 
        oBJEC_EVEN.append("Titulo", Titulo);
        oBJEC_EVEN.append("Descripcion", Descripcion);   
        oBJEC_EVEN.append("Foto", Foto);
    
        $.ajax({
            url:"../Ajax/AjaxEvento.php?a=crear",
            method:"POST",
            data:oBJEC_EVEN,
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success:function(respuesta){
                if(respuesta = true){
                    var m = "Datos Almacenados.";
                    ValidateCreateUpdate(m);
                    window.location = "Evento.php";
                }else if(respuesta = false){
                    var m = "¡¡¡Datos No Almacenados.!!!";
                    ValidateCreateUpdate(m);
                }
                
            }
        });
    }
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
                url:"../Ajax/AjaxEvento.php?a=eliminar",
                method:"POST",
                data:oBJEC_EVEN,
                cache:false,
                contentType:false,
                processData:false,
                dataType:"json",
                success : function(respuesta){
                    if(respuesta = true){
                        var m = "Datos Eliminados.";
                        ValidateCreateUpdate(m);
                        window.location = "Evento.php";
                    }else if(respuesta = false){
                        var m = "¡¡¡Datos No Eliminados.!!!";
                        ValidateCreateUpdate(m);
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
        url:"../Ajax/AjaxEvento.php?a=buscar",
        method:"POST",
        data:oBJEC_EVEN,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success : function(respuesta){
            $("#botonEdit").attr("IdEvento",id);
            $("#imgProfileEdit").attr("src",respuesta["Foto"]);
            $('#TxtFechaEdit').val(respuesta["Fecha"]);
            $('#TxtTituloEdit').val(respuesta["Titulo"]);
            $('#TxtDescripcionEdit').val(respuesta["Descripcion"]);
            $("#TxtDescripcionEdit").focus();
            $("#TxtTituloEdit").focus();
            $("#TxtFechaEdit").focus();
            $("#ModalEdit").modal();
        }
    });
});
$(".formEdit").on("click",".botonEdit",function(){
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
    }else{
        var Id = $("#botonEdit").attr("IdEvento");
        var Fecha = $('#TxtFechaEdit').val();
        var Titulo = $('#TxtTituloEdit').val();
        var Foto = "";
        var FotoSrc = "";
        if(document.getElementById("TxtFotoEdit").files.length > 0){
            var Foto = document.getElementById("TxtFotoEdit").files[0];
        }else{
            var FotoSrc = $("#imgProfileEdit").attr("src");
        }
        var Descripcion = $('#TxtDescripcionEdit').val();
        var oBJEC_EVEN = new FormData();
        oBJEC_EVEN.append("Id", Id); 
        oBJEC_EVEN.append("Fecha", Fecha); 
        oBJEC_EVEN.append("Titulo", Titulo); 
        oBJEC_EVEN.append("Foto", Foto);
        oBJEC_EVEN.append("FotoSrc", FotoSrc);
        oBJEC_EVEN.append("Descripcion", Descripcion); 
    
        $.ajax({
            url:"../Ajax/AjaxEvento.php?a=editar",
            method:"POST",
            data:oBJEC_EVEN,
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success:function(respuesta){
                if(respuesta = true){
                    var m = "Datos Editados.";
                    ValidateCreateUpdate(m);
                    window.location = "Evento.php";
                }else if(respuesta = false){
                    var m = "¡¡¡Datos No Editados.!!!";
                    ValidateCreateUpdate(m);
                }
                
            }
        });
    }
}); 