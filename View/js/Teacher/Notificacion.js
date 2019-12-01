$(document).ready(function(){
    $(".dataTableAlerta").DataTable({
        "ajax":"Ajax/AjaxAlerta.php?a=lista",
        "deferRender":true,
        "retrieve":true,
        "processing":true,
        "pagingType": "full_numbers",
        "lengthMenu": [[10, 25, 50 , 100], [10, 25, 50 , 100]],
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
        },dom: "<'row'<'col-sm-12 col-md-3'l><'col-sm-12 col-md-6'B><'col-sm-12 col-md-1'f>><'row'<'col-sm-12 col-md-12'rt>><'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>",
        buttons: [
            {
                extend: 'excel',
                text: '<i class="material-icons">grid_on</i> <span>Excel</span>',
                className : 'btn bg-teal  waves-effect',
                exportOptions: {
                    columns: ':visible'
                }
            },{
                extend: 'print',
                text: '<i class="material-icons">print</i> <span>Imprimir</span>',                
                className : 'btn bg-green  waves-effect',
                orientation: 'landscape',
                exportOptions: {
                    columns: ':visible'
                }
            },{
                extend: 'colvis',
                className : 'btn bg-light-green waves-effect',
                text: '<i class="material-icons">playlist_add_check</i> <span>Seleccionar Columnas</span>'
            }
        ],
        select: true,
        columnDefs: [ {
            targets: -1,
            visible: true
        } ]
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
    $('#TxtRolPersonaEdit').change(function(){
        SearchPersonaEdit();
    });
});
$(".formCreate").on('submit', function(){
    var fechaActual = new Date();
    
    if($('#TxtRolPersona').val().length == 0){
        var m = "Por favor seleccione el Rol de la Persona.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtIdPersona').val().length == 0){
        var m = "Por favor seleccione el "+$('#TxtRolPersona').val()+".";
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
    }else{
        var RolPersona = $('#TxtRolPersona').val();
        var IdPersona = $('#TxtIdPersona').val();
        var Fecha = fechaActual.getFullYear()+'/'+parseInt(fechaActual.getMonth()+1) +'/'+fechaActual.getDate();
        var Titulo = $('#TxtTitulo').val();
        var Mensaje = $('#TxtMensaje').val();
        var Estado = "Sin Ver";
        var oBJEC_ALERT = new FormData();
        oBJEC_ALERT.append("RolPersona", RolPersona); 
        oBJEC_ALERT.append("IdPersona", IdPersona); 
        oBJEC_ALERT.append("Fecha", Fecha);
        oBJEC_ALERT.append("Titulo", Titulo); 
        oBJEC_ALERT.append("Mensaje", Mensaje); 
        oBJEC_ALERT.append("Estado", Estado);
    
        $.ajax({
            url:"Ajax/AjaxAlerta.php?a=crear",
            method:"POST",
            data:oBJEC_ALERT,
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success:function(respuesta){
                if(respuesta == true){
                    $("#ModalCreate").modal('toggle');
                    $('form').trigger("reset");
                    var m = "Datos Almacenados.";
                    ValidateCreateExito(m);
                    $(".dataTableAlerta").DataTable().ajax.reload();
                }else if(respuesta == false){
                    var m = "¡¡¡Datos No Almacenados.!!!";
                    ValidateError(m);
                }
            }
        });
    }
    return false;
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
                url:"Ajax/AjaxAlerta.php?a=eliminar",
                method:"POST",
                data:oBJEC_ALERT,
                cache:false,
                contentType:false,
                processData:false,
                dataType:"json",
                success : function(respuesta){
                    if(respuesta == true){
                        var m = "Datos Eliminados.";
                        ValidateCreateEliminar(m);
                        $(".dataTableAlerta").DataTable().ajax.reload();
                    }else if(respuesta == false){
                        var m = "¡¡¡Datos No Eliminados.!!!";
                        ValidateError(m);
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
        url:"Ajax/AjaxAlerta.php?a=buscar",
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
            SearchPersonaEdit();
            setTimeout(function(){
                $("#TxtIdPersonaEdit option[value='"+respuesta["IdPersona"]+"']").attr("selected",true);
                $('#TxtIdPersonaEdit').select2();
            }, 2000);
            from = respuesta["Fecha"].split("-");
            $('#TxtFechaEdit').val(from[1]+'/'+from[2]+'/'+from[0]);
            $('#TxtTituloEdit').val(respuesta["Titulo"]);
            $('#TxtMensajeEdit').val(respuesta["Mensaje"]);
            $("#TxtEstadoEdit option[value='"+respuesta["Estado"]+"']").attr("selected",true);
            $('#TxtEstadoEdit').select2();
            
            $("#ModalEdit").modal();
        }
    });
});


$(".formEdit").on('submit', function(){
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
        from = $('#TxtFechaEdit').val().split("/");
        var Fecha = from[2]+'/'+from[0]+'/'+from[1];
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
            url:"Ajax/AjaxAlerta.php?a=editar",
            method:"POST",
            data:oBJEC_ALERT,
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success:function(respuesta){
                if(respuesta == true){
                    $("#ModalEdit").modal('toggle');
                    $('form').trigger("reset");
                    var m = "Datos Editados.";
                    ValidateCreateExito(m);
                    $(".dataTableAlerta").DataTable().ajax.reload();
                }else if(respuesta == false){
                    var m = "¡¡¡Datos No Editados.!!!";
                    ValidateError(m);
                }
                
            }
        });
    }
    return false;
}); 

function SearchPersona(){
    if($("#TxtRolPersona").val().length>0){
        $.ajax({
            url:"Ajax/Ajax"+$("#TxtRolPersona").val()+".php?a=listaSelect",
            method:"GET",
            dataType: "JSON",
            success : function(respuesta){
                $('#TxtIdPersona').empty();
                $("#TxtIdPersona").append("<option value=''>-- Por favor seleccione la Persona --</option>");
                for(var i = 0;i<respuesta.data.length;i++){
                    if (respuesta.data[i][0].length > 0 && respuesta.data[i][2].length > 0){
                        $("#TxtIdPersona").append("<option value='"+respuesta.data[i][0]+"'>"+respuesta.data[i][1]+" "+respuesta.data[i][2]+"</option>");
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
function SearchPersonaEdit(){
    if($("#TxtRolPersonaEdit").val().length>0){
        $.ajax({
            url:"Ajax/Ajax"+$("#TxtRolPersonaEdit").val()+".php?a=listaSelect",
            method:"GET",
            dataType: "JSON",
            success : function(respuesta){
                $('#TxtIdPersonaEdit').empty();
                $("#TxtIdPersonaEdit").append("<option value=''>-- Por favor seleccione la Persona --</option>");
                for(var i = 0;i<respuesta.data.length;i++){
                    if (respuesta.data[i][0].length > 0 && respuesta.data[i][2].length > 0){
                            $("#TxtIdPersonaEdit").append("<option value='"+respuesta.data[i][0]+"'>"+respuesta.data[i][1]+" "+respuesta.data[i][2]+"</option>");
                    }                
                }
                $('#TxtIdPersonaEdit').change();
                $('#TxtIdPersonaEdit').select2(); 
            }
        });
    }else{
        $('#TxtIdPersonaEdit').empty();
        $("#TxtIdPersonaEdit").append("<option value=''>-- Por favor seleccione la Persona --</option>");
        $('#TxtIdPersonaEdit').change();
        $('#TxtIdPersonaEdit').select2(); 
    }
}