$(document).ready(function(){
    $(".dataTableInformacion").DataTable({
        "ajax":"../Ajax/AjaxInformacion.php?a=lista",
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
    if($('#TxtDescripcion').val().length == 0){
        var m = "Por favor ingrese la descripción de la información.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtUbicacion').val().length == 0){
        var m = "Por favor ingrese la ubicación del colegio.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtCorreo').val().length == 0){
        var m = "Por favor ingrese el campo Correo.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtTelefono').val().length == 0){
        var m = "Por favor ingrese el campo telefono.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var Descripcion = $('#TxtDescripcion').val();
        var Ubicacion = $('#TxtUbicacion').val();
        var Correo = $('#TxtCorreo').val();
        var Telefono = $('#TxtTelefono').val();
        var oBJEC_INFO = new FormData();
        oBJEC_INFO.append("Descripcion", Descripcion); 
        oBJEC_INFO.append("Ubicacion", Ubicacion); 
        oBJEC_INFO.append("Correo", Correo); 
        oBJEC_INFO.append("Telefono", Telefono); 
        
        $.ajax({
            url:"../Ajax/AjaxInformacion.php?a=crear",
            method:"POST",
            data:oBJEC_INFO,
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success:function(respuesta){
                if(respuesta = true){
                    var m = "Datos Almacenados.";
                    ValidateCreateUpdate(m);
                    window.location = "Informacion.php";
                }else if(respuesta = false){
                    var m = "¡¡¡Datos No Almacenados.!!!";
                    ValidateCreateUpdate(m);
                }
                
            }
        });
    }
});
$(".dataTableInformacion").on("click",".btnDelete",function(){
    var id = $(this).attr("IdInformacion");
    var oBJEC_INFO = new FormData();
    oBJEC_INFO.append("Id", id); 
    Swal.fire({
        title: 'Estas Seguro de Eliminar el objetivo estrategico?',
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
                url:"../Ajax/AjaxInformacion.php?a=eliminar",
                method:"POST",
                data:oBJEC_INFO,
                cache:false,
                contentType:false,
                processData:false,
                dataType:"json",
                success : function(respuesta){
                    if(respuesta = true){
                        var m = "Datos Eliminados.";
                        ValidateCreateUpdate(m);
                        window.location = "Informacion.php";
                    }else if(respuesta = false){
                        var m = "¡¡¡Datos No Eliminados.!!!";
                        ValidateCreateUpdate(m);
                    }		
                }
            });
        }
    });
});
$(".dataTableInformacion").on("click",".btnUpdate",function(){
    var id = $(this).attr("IdInformacion");
    var oBJEC_INFO = new FormData();
    oBJEC_INFO.append("Id", id); 
    $.ajax({
        url:"../Ajax/AjaxInformacion.php?a=buscar",
        method:"POST",
        data:oBJEC_INFO,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success : function(respuesta){
            $("#botonEdit").attr("IdInformacion",id);
            $('#TxtDescripcionEdit').val(respuesta["Descripcion"]);
            $('#TxtUbicacionEdit').val(respuesta["Ubicacion"]);
            $('#TxtCorreoEdit').val(respuesta["Correo"]);
            $('#TxtTelefonoEdit').val(respuesta["Telefono"]);
            $("#ModalEdit").modal();
        }
    });
});
$(".formEdit").on("click",".botonEdit",function(){
    
    if($('#TxtDescripcionEdit').val().length == 0){
        var m = "Por favor ingrese la descripcion de la información."
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtUbicacionEdit').val().length == 0){
        var m = "Por favor ingrese la ubicación del colegio.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtCorreoEdit').val().length == 0){
        var m = "Por favor rellene el campo correo.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtTelefonoEdit').val().length == 0){
        var m = "Por favor rellene el campo telefono.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var Id = $("#botonEdit").attr("IdInformacion");
        var Descripcion = $('#TxtDescripcionEdit').val();
        var Ubicacion = $('#TxtUbicacionEdit').val();
        var Correo = $('#TxtCorreoEdit').val();
        var Correo = $('#TxtTelelfonoEdit').val();
        var oBJEC_INFO = new FormData();
        oBJEC_INFO.append("Id", Id); 
        oBJEC_INFO.append("Descripcion", Descripcion); 
        oBJEC_INFO.append("Ubicacion", Ubicacion); 
        oBJEC_INFO.append("Correo", Correo); 
        oBJEC_INFO.append("Telefono", Telefono); 
       
        $.ajax({
            url:"../Ajax/AjaxInformaccvcion.php?a=editar",
            method:"POST",
            data:oBJEC_INFO,
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success:function(respuesta){
                if(respuesta = true){
                    var m = "Datos Editados.";
                    ValidateCreateUpdate(m);
                    window.location = "Informacion.php";
                }else if(respuesta = false){
                    var m = "¡¡¡Datos No Editados.!!!";
                    ValidateCreateUpdate(m);
                }
                
            }
        });
    }
}); 