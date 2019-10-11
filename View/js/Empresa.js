$(document).ready(function(){
    $(".dataTableEmpresa").DataTable({
        "ajax":"../Ajax/AjaxEmpresa.php?a=lista",
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
    if($('#TxtMision').val().length == 0){
        var m = "Por favor ingrese la misión del colegio.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtVision').val().length == 0){
        var m = "Por favor ingrese la visión del colegio.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtSomos').val().length == 0){
        var m = "Por favor ingrese el campo quienes somos.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var Mision = $('#TxtMision').val();
        var Vision = $('#TxtVision').val();
        var Somos = $('#TxtSomos').val();
        var oBJEC_ADMIN = new FormData();
        oBJEC_ADMIN.append("Mision", Mision); 
        oBJEC_ADMIN.append("Vision", Vision); 
        oBJEC_ADMIN.append("Somos", Somos); 
        
        $.ajax({
            url:"../Ajax/AjaxEmpresa.php?a=crear",
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
                    window.location = "Empresa.php";
                }else if(respuesta = false){
                    var m = "¡¡¡Datos No Almacenados.!!!";
                    ValidateCreateUpdate(m);
                }
                
            }
        });
    }
});
$(".dataTableEmpresa").on("click",".btnDelete",function(){
    var id = $(this).attr("IdEmpresa");
    var oBJEC_ADMIN = new FormData();
    oBJEC_ADMIN.append("Id", id); 
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
                url:"../Ajax/AjaxEmpresa.php?a=eliminar",
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
                        window.location = "Empresa.php";
                    }else if(respuesta = false){
                        var m = "¡¡¡Datos No Eliminados.!!!";
                        ValidateCreateUpdate(m);
                    }		
                }
            });
        }
    });
});
$(".dataTableEmpresa").on("click",".btnUpdate",function(){
    var id = $(this).attr("IdEmpresa");
    var oBJEC_ADMIN = new FormData();
    oBJEC_ADMIN.append("Id", id); 
    $.ajax({
        url:"../Ajax/AjaxEmpresa.php?a=buscar",
        method:"POST",
        data:oBJEC_ADMIN,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success : function(respuesta){
            $("#botonEdit").attr("IdEmpresa",id);
            $('#TxtMisionEdit').val(respuesta["Mision"]);
            $('#TxtVisionEdit').val(respuesta["Vision"]);
            $('#TxtSomosEdit').val(respuesta["QuienesSomos"]);
            $("#ModalEdit").modal();
        }
    });
});
$(".formEdit").on("click",".botonEdit",function(){
    
    if($('#TxtMisionEdit').val().length == 0){
        var m = "Por favor ingrese la misión del colegio."
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtVisionEdit').val().length == 0){
        var m = "Por favor ingrese la visión del colegio.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtSomosEdit').val().length == 0){
        var m = "Por favor rellene el campo ¿quienes somos?.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var Id = $("#botonEdit").attr("IdEmpresa");
        var Mision = $('#TxtMisionEdit').val();
        var Vision = $('#TxtVisionEdit').val();
        var Somos = $('#TxtSomosEdit').val();
        var oBJEC_ADMIN = new FormData();
        oBJEC_ADMIN.append("Id", Id); 
        oBJEC_ADMIN.append("Mision", Mision); 
        oBJEC_ADMIN.append("Vision", Vision); 
        oBJEC_ADMIN.append("Somos", Somos); 
       
        $.ajax({
            url:"../Ajax/AjaxEmpresa.php?a=editar",
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
                    window.location = "Empresa.php";
                }else if(respuesta = false){
                    var m = "¡¡¡Datos No Editados.!!!";
                    ValidateCreateUpdate(m);
                }
                
            }
        });
    }
}); 