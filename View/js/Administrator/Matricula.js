
$(document).ready(function(){
    $(".dataTableMatricula").DataTable({
        "ajax":"Ajax/AjaxMatricula.php?a=lista",
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
        url:"Ajax/AjaxGrado.php?a=listaSelect",
        method:"GET",
        dataType: "JSON",
        success : function(respuesta){
            $('#TxtGrado').empty();
            $('#TxtGradoEdit').empty();
            $("#TxtGrado").append("<option value=''>-- Por favor seleccione --</option>");
            $("#TxtGradoEdit").append("<option value=''>-- Por favor seleccione --</option>");
            for(var i = 0;i<respuesta.data.length;i++){
                if (respuesta.data[i][0].length > 0 && respuesta.data[i][1].length > 0){
                    $("#TxtGrado").append("<option value='"+respuesta.data[i][0]+"'>"+respuesta.data[i][1]+"</option>"); 
                    $("#TxtGradoEdit").append("<option value='"+respuesta.data[i][0]+"'>"+respuesta.data[i][1]+"</option>"); 
                }                
            }
            $('#TxtGrado').change();
            $('#TxtGradoEdit').change();
            $("#TxtGrado").select2();
            $("#TxtGradoEdit").select2();
        }
    });
    $.ajax({
        url:"Ajax/AjaxEstudiante.php?a=listaSelect",
        method:"GET",
        dataType: "JSON",
        success : function(respuesta){
            $('#TxtIdEstudiante').empty();
            $('#TxtIdEstudianteEdit').empty();
            $("#TxtIdEstudiante").append("<option value=''>-- Por favor seleccione --</option>");
            $("#TxtIdEstudianteEdit").append("<option value=''>-- Por favor seleccione la Materia --</option>");
            for(var i = 0;i<respuesta.data.length;i++){
                if (respuesta.data[i][0].length > 0 && respuesta.data[i][1].length > 0 && respuesta.data[i][2].length > 0){
                    $("#TxtIdEstudiante").append("<option value='"+respuesta.data[i][0]+"'>"+respuesta.data[i][1]+" "+respuesta.data[i][2]+"</option>");
                    $("#TxtIdEstudianteEdit").append("<option value='"+respuesta.data[i][0]+"'>"+respuesta.data[i][1]+" "+respuesta.data[i][2]+"</option>");
                }                
            }
            $('#TxtIdEstudiante').change();
            $('#TxtIdEstudianteEdit').change();
            $("#TxtIdEstudiante").select2();
            $("#TxtIdEstudianteEdit").select2();
        }
    });
});
$(".formCreate").on('submit', function(){
    var fechaActual = new Date();
    /*if($('#TxtFechaMatricula').val().length == 0){
        var m = "Por favor ingrese la fecha de la matricula.";
        ValidateCreateUpdate(m);
        return false;
    }else */if($('#TxtCosto').val().length == 0){
        var m = "Por favor ingrese el costo de la matricula.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtGrado').val().length == 0){
        var m = "Por favor ingrese el grado de la matricula.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtIdEstudiante').val().length == 0){
        var m = "Por favor ingrese el estudiante de la matricula.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        /*from = $('#TxtFechaMatricula').val().split("/");
        var Fecha = from[2]+'/'+from[0]+'/'+from[1];*/
        var Fecha = fechaActual.getFullYear()+'/'+parseInt(fechaActual.getMonth()+1) +'/'+fechaActual.getDate();
        var Costo = $('#TxtCosto').val();
        var Grado = $('#TxtGrado').val();
        var Estudiante = $('#TxtIdEstudiante').val();
        var oBJEC_Matricula = new FormData();
        oBJEC_Matricula.append("Fecha", Fecha); 
        oBJEC_Matricula.append("Costo", Costo); 
        oBJEC_Matricula.append("Grado", Grado); 
        oBJEC_Matricula.append("Estudiante", Estudiante); 
    
        $.ajax({
            url:"Ajax/AjaxMatricula.php?a=crear",
            method:"POST",
            data:oBJEC_Matricula,
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
                    $(".dataTableMatricula").DataTable().ajax.reload();
                }else if(respuesta == false){
                    var m = "¡¡¡Datos No Almacenados.!!!";
                    ValidateError(m);
                }
                
            }
        });
    }
    return false;
});
$(".dataTableMatricula").on("click",".btnDelete",function(){
    var id = $(this).attr("IdMatricula");
    var oBJEC_Matricula= new FormData();
    oBJEC_Matricula.append("Id", id); 
    Swal.fire({
        title: 'Estas Seguro de Eliminar la Matricula?',
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
                url:"Ajax/AjaxMatricula.php?a=eliminar",
                method:"POST",
                data:oBJEC_Matricula,
                cache:false,
                contentType:false,
                processData:false,
                dataType:"json",
                success : function(respuesta){
                    if(respuesta == true){
                        var c = "Datos Eliminados.";
                        ValidateCreateEliminar(c);
                        $(".dataTableMatricula").DataTable().ajax.reload();
                    }else if(respuesta == false){
                        var m = "¡¡¡Datos No Eliminados.!!!";
                        ValidateError(m);
                    }		
                }
            });
        }
    });
});
$(".dataTableMatricula").on("click",".btnUpdate",function(){
    var id = $(this).attr("IdMatricula");
    var oBJEC_Matricula = new FormData();
    oBJEC_Matricula.append("Id", id); 
    $.ajax({
        url:"Ajax/AjaxMatricula.php?a=buscar",
        method:"POST",
        data:oBJEC_Matricula,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success : function(respuesta){
            $("#botonEdit").attr("IdMatricula",id);
            from = respuesta["Fecha"].split("-");
            $('#TxtFechaMatriculaEdit').val(from[1]+'/'+from[2]+'/'+from[0]);
            $('#TxtCostoEdit').val(respuesta["Costo"]);
            $("#TxtGradoEdit option[value='"+respuesta["GradoIdGrado"]+"']").attr("selected",true);
            $('#TxtGradoEdit').select2();
            $("#TxtIdEstudianteEdit option[value='"+respuesta["EstudianteIdEstudiante"]+"']").attr("selected",true);
            $('#TxtIdEstudianteEdit').select2();
            $("#ModalEdit").modal();
        }
    });
});
$(".formEdit").on('submit', function(){
    
    if($('#TxtFechaMatriculaEdit').val().length == 0){
        var m = "Por favor ingrese la fecha de la matricula.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtCostoEdit').val().length == 0){
        var m = "Por favor ingrese el costo de la matricula.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtGradoEdit').val().length == 0){
        var m = "Por favor ingrese el grado de la matricula.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtIdEstudianteEdit').val().length == 0){
        var m = "Por favor ingrese el estudiante de la matricula.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var Id = $("#botonEdit").attr("IdMatricula");
        from = $('#TxtFechaMatriculaEdit').val().split("/");
        var Fecha = from[2]+'/'+from[0]+'/'+from[1];
        var Costo = $('#TxtCostoEdit').val();
        var Grado = $('#TxtGradoEdit').val();
        var Estudiante = $('#TxtIdEstudianteEdit').val();
        var oBJEC_Matricula = new FormData();
        oBJEC_Matricula.append("Id", Id); 
        oBJEC_Matricula.append("Fecha", Fecha); 
        oBJEC_Matricula.append("Costo", Costo); 
        oBJEC_Matricula.append("Grado", Grado); 
        oBJEC_Matricula.append("Estudiante", Estudiante); 
    
        $.ajax({
            url:"Ajax/AjaxMatricula.php?a=editar",
            method:"POST",
            data:oBJEC_Matricula,
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
                    $(".dataTableMatricula").DataTable().ajax.reload();
                }else if(respuesta == false){
                    var m = "¡¡¡Datos No Editados.!!!";
                    ValidateError(m);
                }
                
            }
        });
    }
    return false;
}); 