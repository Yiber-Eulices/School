$(document).ready(function(){
    $(".dataTableObservacion").DataTable({
        "ajax":"Ajax/AjaxObservacion.php?a=lista",
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
    $("#TxtGravedad").select2();    
    $(".formCreate").on('submit', function(){
        var fechaActual = new Date();
        if($('#TxtEstudiante').val().length == 0){
            var m = "Por favor seleccione el Estudiante.";
            ValidateCreateUpdate(m);
            return false;
        }else if($('#TxtProfesor').val().length == 0){
            var m = "Por favor seleccione el Profesor.";
            ValidateCreateUpdate(m);
            return false;
        }else if($('#TxtGravedad').val().length == 0){
            var m = "Por favor seleccione la Gravedad de la Observacion.";
            ValidateCreateUpdate(m);
            return false;
        }else if($('#TxtDescripcion').val().length == 0){
            var m = "Por favor ingrese la Descripcion de la Observación.";
            ValidateCreateUpdate(m);
            return false;
        }else if($('#TxtCompromiso').val().length == 0){
            var m = "Por favor ingrese El Compromiso de el Estudiante.";
            ValidateCreateUpdate(m);
            return false;
        }else{
            var Estudiante = $('#TxtEstudiante').val();
            var Profesor = $('#TxtProfesor').val();
            var Gravedad = $('#TxtGravedad').val();
            var Fecha = fechaActual.getFullYear()+'/'+parseInt(fechaActual.getMonth()+1) +'/'+fechaActual.getDate();
            var Descripcion = $('#TxtDescripcion').val();
            var Compromiso = $('#TxtCompromiso').val();
            var oBJEC_ADMIN = new FormData();
            oBJEC_ADMIN.append("Fecha", Fecha); 
            oBJEC_ADMIN.append("Estudiante", Estudiante); 
            oBJEC_ADMIN.append("Profesor", Profesor); 
            oBJEC_ADMIN.append("Gravedad", Gravedad); 
            oBJEC_ADMIN.append("Descripcion", Descripcion); 
            oBJEC_ADMIN.append("Compromiso", Compromiso); 
            $.ajax({
                url:"Ajax/AjaxObservacion.php?a=crear",
                method:"POST",
                data:oBJEC_ADMIN,
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
                        $(".dataTableObservacion").DataTable().ajax.reload();
                    }else if(respuesta == false){
                        var m = "¡¡¡Datos No Almacenados.!!!";
                        ValidateError(m);
                    }
                    
                }
            });
        }
        return false;
    });
    $(".dataTableObservacion").on("click",".btnDelete",function(){
        var id = $(this).attr("IdObservacion");
        var oBJEC_ADMIN = new FormData();
        oBJEC_ADMIN.append("Id", id); 
        Swal.fire({
            title: 'Estas Seguro de Eliminar el Curso?',
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
                    url:"Ajax/AjaxObservacion.php?a=eliminar",
                    method:"POST",
                    data:oBJEC_ADMIN,
                    cache:false,
                    contentType:false,
                    processData:false,
                    dataType:"json",
                    success : function(respuesta){
                        if(respuesta == true){
                            var c = "Datos Eliminados.";
                            ValidateCreateEliminar(c);
                            $(".dataTableObservacion").DataTable().ajax.reload();
                        }else if(respuesta == false){
                            var m = "¡¡¡Datos No Eliminados.!!!";
                            ValidateError(m);
                        }		
                    }
                });
            }
        });
    });
    $(".dataTableObservacion").on("click",".btnUpdate",function(){
        var id = $(this).attr("IdObservacion");
        var oBJEC_ADMIN = new FormData();
        oBJEC_ADMIN.append("Id", id); 
        $.ajax({
            url:"Ajax/AjaxObservacion.php?a=buscar",
            method:"POST",
            data:oBJEC_ADMIN,
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success : function(respuesta){
                $("#botonEdit").attr("IdObservacion",id);
                from = respuesta["Fecha"].split("-");
                $('#TxtFechaEdit').val(from[1]+'/'+from[2]+'/'+from[0]);
                $('#TxtGravedadEdit option[value="'+respuesta["Gravedad"]+'"]').attr("selected", true);
                $('#TxtDescripcionEdit').val(respuesta["Descripcion"]);
                $('#TxtCompromisoEdit').val(respuesta["Compromiso"]);
                $("#TxtGravedadEdit").select2();
                $("#ModalEdit").modal();
            }
        });
    });
    $(".formEdit").on('submit', function(){
        if($('#TxtEstudianteEdit').val().length == 0){
            var m = "Por favor seleccione el Estudiante.";
            ValidateCreateUpdate(m);
            return false;
        }else if($('#TxtFechaEdit').val().length == 0){
            var m = "Por favor Ingrese la Fecha de la Observacion.";
            ValidateCreateUpdate(m);
            return false;
        }else if($('#TxtProfesorEdit').val().length == 0){
            var m = "Por favor seleccione el Profesor.";
            ValidateCreateUpdate(m);
            return false;
        }else if($('#TxtGravedadEdit').val().length == 0){
            var m = "Por favor seleccione la Gravedad de la Observacion.";
            ValidateCreateUpdate(m);
            return false;
        }else if($('#TxtDescripcionEdit').val().length == 0){
            var m = "Por favor ingrese la Descripcion de la Observación.";
            ValidateCreateUpdate(m);
            return false;
        }else if($('#TxtCompromisoEdit').val().length == 0){
            var m = "Por favor ingrese El Compromiso de el Estudiante.";
            ValidateCreateUpdate(m);
            return false;
        }else{
            var Id = $("#botonEdit").attr("IdObservacion");
            var Estudiante = $('#TxtEstudianteEdit').val();
            var Profesor = $('#TxtProfesorEdit').val();
            from = $('#TxtFechaEdit').val().split("/");
            var Fecha = from[2]+'/'+from[0]+'/'+from[1];
            var Gravedad = $('#TxtGravedadEdit').val();
            var Descripcion = $('#TxtDescripcionEdit').val();
            var Compromiso = $('#TxtCompromisoEdit').val();
            var oBJEC_ADMIN = new FormData();
            oBJEC_ADMIN.append("Id", Id); 
            oBJEC_ADMIN.append("Estudiante", Estudiante); 
            oBJEC_ADMIN.append("Profesor", Profesor); 
            oBJEC_ADMIN.append("Fecha", Fecha); 
            oBJEC_ADMIN.append("Gravedad", Gravedad); 
            oBJEC_ADMIN.append("Descripcion", Descripcion); 
            oBJEC_ADMIN.append("Compromiso", Compromiso); 
           
            $.ajax({
                url:"Ajax/AjaxObservacion.php?a=editar",
                method:"POST",
                data:oBJEC_ADMIN,
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
                        $(".dataTableObservacion").DataTable().ajax.reload();
                    }else if(respuesta == false){
                        var m = "¡¡¡Datos No Editados.!!!";
                        ValidateError(m);
                    }
                    
                }
            });
        }
        return false;
    }); 
});