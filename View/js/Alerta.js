$(document).ready(function(){
    $(".dataTableAlerta").DataTable({
        "ajax":"../Ajax/AjaxAlerta.php?a=lista",
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
    $('#TxtRolPersona').select2();
    $('#TxtRolPersonaEdit').select2();
    $('#TxtIdPersona').select2();
    $('#TxtIdPersonaEdit').select2();
    $('#TxtEstado').select2();
    $('#TxtEstadoEdit').select2();
    $('#TxtRolPersona').change(function(){
        SearchPersona();
    });
});
function SubmitFunction(){
    return false;
}
$(".formCreate").on("click",".botonCreate",function(){
    
    if($('#TxtRolPersona').val().length == 0){
        var m = "Por favor seleccione el Rol de la Persona.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtIdPersona').val().length == 0){
        var m = "Por favor seleccione el "+$('#TxtRolPersona').val()+".";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtFecha').val().length == 0){
        var m = "Por favor ingrese la Fecha de la Notificacion.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtTitulo').val().length == 0){
        var m = "Por favor ingrese el Titulo.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtMensaje').val().length == 0){
        var m = "Por favor ingrese el Mensaje.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtEstado').val().length == 0){
        var m = "Por favor seleccione el Estado de el Mensaje.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var RolPersona = $('#TxtRolPersona').val();
        var IdPersona = $('#TxtIdPersona').val();
        var Fecha = $('#TxtFecha').val();
        var Titulo = $('#TxtTitulo').val();
        var Mensaje = $('#TxtMensaje').val();
        var Estado = $('#TxtEstado').val();
        var oBJEC_ALERT = new FormData();
        oBJEC_ALERT.append("RolPersona", RolPersona); 
        oBJEC_ALERT.append("IdPersona", IdPersona); 
        oBJEC_ALERT.append("Fecha", Fecha);
        oBJEC_ALERT.append("Titulo", Titulo); 
        oBJEC_ALERT.append("Mensaje", Mensaje); 
        oBJEC_ALERT.append("Estado", Estado);
    
        $.ajax({
            url:"../Ajax/AjaxAlerta.php?a=crear",
            method:"POST",
            data:oBJEC_ALERT,
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success:function(respuesta){
                if(respuesta = true){
                    var m = "Datos Almacenados.";
                    ValidateCreateUpdate(m);
                    window.location = "Alerta.php";
                }else if(respuesta = false){
                    var m = "¡¡¡Datos No Almacenados.!!!";
                    ValidateCreateUpdate(m);
                }
                
            }
        });
    }
});
$(".dataTableAlerta").on("click",".btnDelete",function(){
    var id = $(this).attr("IdAlerta");
    var oBJEC_ALERT = new FormData();
    oBJEC_ALERT.append("Id", id); 
    Swal.fire({
        title: 'Estas Seguro de Eliminar el Alerta?',
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
                url:"../Ajax/AjaxAlerta.php?a=eliminar",
                method:"POST",
                data:oBJEC_ALERT,
                cache:false,
                contentType:false,
                processData:false,
                dataType:"json",
                success : function(respuesta){
                    if(respuesta = true){
                        var m = "Datos Eliminados.";
                        ValidateCreateUpdate(m);
                        window.location = "Alerta.php";
                    }else if(respuesta = false){
                        var m = "¡¡¡Datos No Eliminados.!!!";
                        ValidateCreateUpdate(m);
                    }		
                }
            });
        }
    });
});
$(".dataTableAlerta").on("click",".btnUpdate",function(){
    var id = $(this).attr("IdAlerta");
    var oBJEC_ALERT = new FormData();
    oBJEC_ALERT.append("Id", id); 
    $.ajax({
        url:"../Ajax/AjaxAlerta.php?a=buscar",
        method:"POST",
        data:oBJEC_ALERT,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success : function(respuesta){
            $("#botonEdit").attr("IdAlerta",id);
            $("#TxtRolPersonaEdit option[value='"+respuesta["RolPersona"]+"']").attr("selected",true);
            $('#TxtRolPersonaEdit').select2();
            SearchPersona();
            $("#TxtIdPersonaEdit option[value='"+respuesta["IdPersona"]+"']").attr("selected",true);
            $('#TxtIdPersonaEdit').select2();
            $('#TxtFechaEdit').val(respuesta["Fecha"]);
            $('#TxtTituloEdit').val(respuesta["Titulo"]);
            $('#TxtMensajeEdit').val(respuesta["Mensaje"]);
            $("#TxtEstadoEdit option[value='"+respuesta["Estado"]+"']").attr("selected",true);
            $('#TxtEstadoEdit').select2();
            $("#ModalEdit").modal();
        }
    });
});


$(".formEdit").on("click",".botonEdit",function(){
    if($('#TxtRolPersonaEdit').val().length == 0){
        var m = "Por favor seleccione el Rol de la Persona.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtIdPersonaEdit').val().length == 0){
        var m = "Por favor seleccione el "+$('#TxtRolPersona').val()+".";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtFechaEdit').val().length == 0){
        var m = "Por favor ingrese la Fecha de la Notificacion.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtTituloEdit').val().length == 0){
        var m = "Por favor ingrese el Titulo.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtMensajeEdit').val().length == 0){
        var m = "Por favor ingrese el Mensaje.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtEstadoEdit').val().length == 0){
        var m = "Por favor seleccione el Estado de el Mensaje.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var Id = $("#botonEdit").attr("IdAlerta");
        var RolPersona = $('#TxtRolPersonaEdit').val();
        var IdPersona = $('#TxtIdPersonaEdit').val();
        var Fecha = $('#TxtFechaEdit').val();
        var Titulo = $('#TxtTituloEdit').val();
        var Mensaje = $('#TxtMensajeEdit').val();
        var Estado = $('#TxtEstadoEdit').val();
        var oBJEC_ALERT = new FormData();
        oBJEC_ALERT.append("Id", Id); 
        oBJEC_ALERT.append("RolPersona", RolPersona); 
        oBJEC_ALERT.append("IdPersona", IdPersona); 
        oBJEC_ALERT.append("Fecha", Fecha);
        oBJEC_ALERT.append("Titulo", Titulo); 
        oBJEC_ALERT.append("Mensaje", Mensaje); 
        oBJEC_ALERT.append("Estado", Estado);
    
        $.ajax({
            url:"../Ajax/AjaxAlerta.php?a=editar",
            method:"POST",
            data:oBJEC_ALERT,
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success:function(respuesta){
                if(respuesta = true){
                    var m = "Datos Editados.";
                    ValidateCreateUpdate(m);
                    window.location = "Alerta.php";
                }else if(respuesta = false){
                    var m = "¡¡¡Datos No Editados.!!!";
                    ValidateCreateUpdate(m);
                }
                
            }
        });
    }
}); 

function SearchPersona(){
    if($("#TxtRolPersona").val().length>0){
        $.ajax({
            url:"../Ajax/Ajax"+$("#TxtRolPersona").val()+".php?a=lista",
            method:"GET",
            dataType: "JSON",
            success : function(respuesta){
                $('#TxtIdPersona').empty();
                $("#TxtIdPersona").append("<option value=''>-- Por favor seleccione la Persona --</option>");
                for(var i = 0;i<respuesta.data.length;i++){
                    if (respuesta.data[i][0].length > 0 && respuesta.data[i][2].length > 0){
                        $("#TxtIdPersona").append("<option value='"+respuesta.data[i][0]+"'>"+respuesta.data[i][2]+"</option>");
                    }                
                }
                $('#TxtIdPersona').change();
                $('#TxtIdPersona').select2(); 
            }
        });
    }else{
        $('#TxtIdPersona').empty();
        $("#TxtIdPersona").append("<option value=''>-- Por favor seleccione la Persona --</option>");
        $('#TxtIdPersona').change();
        $('#TxtIdPersona').select2(); 
    }
}