$(document).ready(function(){
    $(".dataTableAcudienteEstudiante").DataTable({
        "ajax":"Ajax/AjaxAcudienteEstudiante.php?a=listaEstudiante",
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
    $.ajax({
        url:"Ajax/AjaxAcudiente.php?a=listaSelect",
        method:"GET",
        dataType: "JSON",
        success : function(respuesta){
            $('#TxtAcudiente').empty();
            $('#TxtAcudienteEdit').empty();
            $("#TxtAcudiente").append("<option value=''>-- Por favor seleccione --</option>");
            $("#TxtAcudienteEdit").append("<option value=''>-- Por favor seleccione --</option>");
            for(var i = 0;i<respuesta.data.length;i++){
                if (respuesta.data[i][0].length > 0 && respuesta.data[i][1].length > 0 && respuesta.data[i][2].length > 0){
                    $("#TxtAcudiente").append("<option value='"+respuesta.data[i][0]+"'>"+respuesta.data[i][1]+" "+respuesta.data[i][2]+"</option>"); 
                    $("#TxtAcudienteEdit").append("<option value='"+respuesta.data[i][0]+"'>"+respuesta.data[i][1]+" "+respuesta.data[i][2]+"</option>"); 
                }                
            }
            $('#TxtAcudiente').change();
            $('#TxtAcudienteEdit').change();
            $("#TxtAcudiente").select2();
            $("#TxtAcudienteEdit").select2();
        }
    });
});
$(".formCreate").on('submit', function(){
    if($('#TxtEstudiante').val().length == 0){
        var m = "Por favor ingrese el Nombre del Estudiante.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtAcudiente').val().length == 0){
        var m = "Por favor ingrese el nombre del Acudiente.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var Estudiante = $('#TxtEstudiante').val();
        var Acudiente = $('#TxtAcudiente').val();
        var oBJEC_ACUES = new FormData();
        oBJEC_ACUES.append("EstudianteIdEstudiante", Estudiante); 
        oBJEC_ACUES.append("AcudienteIdAcudiente", Acudiente); 
    
        $.ajax({
            url:"Ajax/AjaxAcudienteEstudiante.php?a=crear",
            method:"POST",
            data:oBJEC_ACUES,
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
                    $(".dataTableAcudienteEstudiante").DataTable().ajax.reload();
                }else if(respuesta == false){
                    var m = "¡¡¡Datos No Almacenados.!!!";
                    ValidateError(m);
                }
                
            }
        });
    }
    return false;
});
$(".dataTableAcudienteEstudiante").on("click",".btnDelete",function(){
    var id = $(this).attr("IdAcudienteEstudiante");
    var oBJEC_ACUES= new FormData();
    oBJEC_ACUES.append("Id", id); 
    Swal.fire({
        title: 'Estas Seguro de Eliminar el AcudienteEstudiante?',
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
                url:"Ajax/AjaxAcudienteEstudiante.php?a=eliminar",
                method:"POST",
                data:oBJEC_ACUES,
                cache:false,
                contentType:false,
                processData:false,
                dataType:"json",
                success : function(respuesta){
                    if(respuesta == true){
                        var c = "Datos Eliminados.";
                        ValidateCreateEliminar(c);
                        $(".dataTableAcudienteEstudiante").DataTable().ajax.reload();
                    }else if(respuesta == false){
                        var m = "¡¡¡Datos No Eliminados.!!!";
                        ValidateError(m);
                    }		
                }
            });
        }
    });
});
$(".dataTableAcudienteEstudiante").on("click",".btnUpdate",function(){
    var id = $(this).attr("IdAcudienteEstudiante");
    var oBJEC_ACUES = new FormData();
    oBJEC_ACUES.append("Id", id); 
    $.ajax({
        url:"Ajax/AjaxAcudienteEstudiante.php?a=buscar",
        method:"POST",
        data:oBJEC_ACUES,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success : function(respuesta){
            $("#botonEdit").attr("IdAcudienteEstudiante",id);
            $('#TxtAcudienteEdit option[value="'+respuesta["AcudienteIdAcudiente"]+'"]').attr("selected", true);
            $("#TxtAcudienteEdit").select2();
            $("#ModalEdit").modal();
        }
    });
});
$(".formEdit").on('submit', function(){
    if($('#TxtEstudianteEdit').val().length == 0){
        var m = "Por favor ingrese el nombre del Estudiante."
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtAcudienteEdit').val().length == 0){
        var m = "Por favor ingrese el nombre del Acudiente.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var Id = $("#botonEdit").attr("IdAcudienteEstudiante");
        var Estudiante = $('#TxtEstudianteEdit').val();
        var Acudiente = $('#TxtAcudienteEdit').val();
        var oBJEC_ACUES = new FormData();
        oBJEC_ACUES.append("Id", Id); 
        oBJEC_ACUES.append("EstudianteIdEstudiante", Estudiante); 
        oBJEC_ACUES.append("AcudienteIdAcudiente", Acudiente);
    
        $.ajax({
            url:"Ajax/AjaxAcudienteEstudiante.php?a=editar",
            method:"POST",
            data:oBJEC_ACUES,
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
                    $(".dataTableAcudienteEstudiante").DataTable().ajax.reload();
                }else if(respuesta == false){
                    var m = "¡¡¡Datos No Editados.!!!";
                    ValidateError(m);
                }
                
            }
        });
    }
    return false;
}); 