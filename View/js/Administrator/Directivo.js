$(document).ready(function(){
    $(".dataTableDirectivo").DataTable({
        "ajax":"Ajax/AjaxDirectivo.php?a=lista",
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
    },select: {
    	rows: ", %d filas seleccionadas"
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
});
$(".formCreate").on('submit', function(){
    if($('#TxtNombre').val().length == 0){
        var m = "Por favor ingrese el Nombre de el Directivo.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtCargo').val().length == 0){
        var m = "Por favor ingrese el Cargo de el Directivo.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtCorreo').val().length == 0){
        var m = "Por favor ingrese el Correo de el Directivo.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtTelefono').val().length == 0){
        var m = "Por favor ingrese el Telefono de Contacto de el Directivo.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var Nombre = $('#TxtNombre').val();
        var Cargo = $('#TxtCargo').val();
        var Correo = $('#TxtCorreo').val();
        var Telefono = $('#TxtTelefono').val();
        var oBJEC_DIREC = new FormData();
        oBJEC_DIREC.append("Nombre", Nombre); 
        oBJEC_DIREC.append("Cargo", Cargo); 
        oBJEC_DIREC.append("Correo", Correo);  
        oBJEC_DIREC.append("Telefono", Telefono);    
        $.ajax({
            url:"Ajax/AjaxDirectivo.php?a=crear",
            method:"POST",
            data:oBJEC_DIREC,
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
                    $(".dataTableDirectivo").DataTable().ajax.reload();
                }else if(respuesta == false){
                    var m = "¡¡¡Datos No Almacenados.!!!";
                    ValidateError(m);
                }else{
                    var m = respuesta;
                    ValidateError(m);
                }
                
            }
        });
    }
    return false;
});
$(".dataTableDirectivo").on("click",".btnDelete",function(){
    var id = $(this).attr("IdDirectivo");
    var oBJEC_DIREC= new FormData();
    oBJEC_DIREC.append("Id", id); 
    Swal.fire({
        title: 'Estas Seguro de Eliminar el Directivo?',
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
                url:"Ajax/AjaxDirectivo.php?a=eliminar",
                method:"POST",
                data:oBJEC_DIREC,
                cache:false,
                contentType:false,
                processData:false,
                dataType:"json",
                success : function(respuesta){
                    if(respuesta == true){
                        var c = "Datos Eliminados.";
                        ValidateCreateEliminar(c);
                        $(".dataTableDirectivo").DataTable().ajax.reload();
                    }else if(respuesta == false){
                        var m = "¡¡¡Datos No Eliminados.!!!";
                        ValidateError(m);
                    }		
                }
            });
        }
    });
});
$(".dataTableDirectivo").on("click",".btnUpdate",function(){
    var id = $(this).attr("IdDirectivo");
    var oBJEC_DIREC = new FormData();
    oBJEC_DIREC.append("Id", id); 
    $.ajax({
        url:"Ajax/AjaxDirectivo.php?a=buscar",
        method:"POST",
        data:oBJEC_DIREC,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success : function(respuesta){
            $("#botonEdit").attr("IdDirectivo",id);
            $('#TxtNombreEdit').val(respuesta["Nombre"]);
            $('#TxtCargoEdit').val(respuesta["Cargo"]);
            $('#TxtCorreoEdit').val(respuesta["Correo"]);
            $('#TxtTelefonoEdit').val(respuesta["Telefono"]);
            $("#TxtTelefonoEdit").focus();
            $("#TxtCorreoEdit").focus();
            $("#TxtNombreEdit").focus();
            $("#ModalEdit").modal();
        }
    });
});
$(".formEdit").on('submit', function(){
    if($('#TxtNombreEdit').val().length == 0){
        var m = "Por favor ingrese el Apellido de el Directivo."
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtCargoEdit').val().length == 0){
        var m = "Por favor ingrese el Cargo de el Directivo.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtCorreoEdit').val().length == 0){
        var m = "Por favor ingrese el Correo de el Directivo.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtTelefonoEdit').val().length == 0){
        var m = "Por favor ingrese el Telefono de Contacto de el Directivo.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var Id = $("#botonEdit").attr("IdDirectivo");
        var Nombre = $('#TxtNombreEdit').val();
        var Cargo = $('#TxtCargoEdit').val();
        var Correo = $('#TxtCorreoEdit').val();
        var Telefono = $('#TxtTelefonoEdit').val();
        var oBJEC_DIREC = new FormData();
        oBJEC_DIREC.append("Id", Id); 
        oBJEC_DIREC.append("Nombre", Nombre);
        oBJEC_DIREC.append("Cargo", Cargo);
        oBJEC_DIREC.append("Correo", Correo); 
        oBJEC_DIREC.append("Telefono", Telefono); 
    
        $.ajax({
            url:"Ajax/AjaxDirectivo.php?a=editar",
            method:"POST",
            data:oBJEC_DIREC,
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
                    $(".dataTableDirectivo").DataTable().ajax.reload();
                }else if(respuesta == false){
                    var m = "¡¡¡Datos No Editados.!!!";
                    ValidateError(m);
                }else{
                    var m = respuesta;
                    ValidateError(m);
                }
                
            }
        });
    }
    return false;
}); 