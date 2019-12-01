$(document).ready(function(){
    $(".dataTableProfesorCurso").DataTable({
        "ajax":"Ajax/AjaxProfesorCurso.php?a=listaProfesor",
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
    $.ajax({
        url:"Ajax/AjaxMateria.php?a=listaSelect",
        method:"GET",
        dataType: "JSON",
        success : function(respuesta){
            $('#TxtMateria').empty();
            $('#TxtMateriaEdit').empty();
            $("#TxtMateria").append("<option value=''>-- Por favor seleccione --</option>");
            $("#TxtMateriaEdit").append("<option value=''>-- Por favor seleccione la Materia --</option>");
            for(var i = 0;i<respuesta.data.length;i++){
                if (respuesta.data[i][0].length > 0 && respuesta.data[i][1].length > 0){
                    $("#TxtMateria").append("<option value='"+respuesta.data[i][0]+"'>"+respuesta.data[i][1]+"</option>");
                    $("#TxtMateriaEdit").append("<option value='"+respuesta.data[i][0]+"'>"+respuesta.data[i][1]+"</option>");
                }                
            }
            $('#TxtMateria').change();
            $('#TxtMateriaEdit').change();
            $("#TxtMateria").select2();
            $("#TxtMateriaEdit").select2();
        }
    });
    $.ajax({
        url:"Ajax/AjaxCurso.php?a=listaSelect",
        method:"GET",
        dataType: "JSON",
        success : function(respuesta){
            $('#TxtCurso').empty();
            $('#TxtCursoEdit').empty();
            $("#TxtCurso").append("<option value=''>-- Por favor seleccione --</option>");
            $("#TxtCursoEdit").append("<option value=''>-- Por favor seleccione --</option>");
            for(var i = 0;i<respuesta.data.length;i++){
                if (respuesta.data[i][0].length > 0 && respuesta.data[i][1].length > 0 && respuesta.data[i][2].length > 0){
                    $("#TxtCurso").append("<option value='"+respuesta.data[i][0]+"'>"+respuesta.data[i][1]+" "+respuesta.data[i][2]+"</option>"); 
                    $("#TxtCursoEdit").append("<option value='"+respuesta.data[i][0]+"'>"+respuesta.data[i][1]+" "+respuesta.data[i][2]+"</option>"); 
                }                
            }
            $('#TxtCurso').change();
            $('#TxtCursoEdit').change();
            $("#TxtCurso").select2();
            $("#TxtCursoEdit").select2();
        }
    });
});
$(".formCreate").on('submit', function(){
    if($('#TxtProfesor').val().length == 0){
        var m = "Por favor seleccione el profesor para asignar a curso.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtCurso').val().length == 0){
        var m = "Por favor seleccione el curso al que desea asignar el profesor.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtMateria').val().length == 0){
        var m = "Por favor seleccionen la materia que dictara el profesor en el curso.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var Profesor = $('#TxtProfesor').val();
        var Curso = $('#TxtCurso').val();
        var Materia = $('#TxtMateria').val();
        var oBJEC_PROFCU = new FormData();
        oBJEC_PROFCU.append("Profesor", Profesor); 
        oBJEC_PROFCU.append("Curso", Curso);
        oBJEC_PROFCU.append("Materia", Materia);    
        $.ajax({
            url:"Ajax/AjaxProfesorCurso.php?a=crear",
            method:"POST",
            data:oBJEC_PROFCU,
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
                    $(".dataTableProfesorCurso").DataTable().ajax.reload();
                }else if(respuesta == false){
                    var m = "¡¡¡Datos No Almacenados.!!!";
                    ValidateError(m);
                }
                
            }
        });
    }
    return false;
});
$(".dataTableProfesorCurso").on("click",".btnDelete",function(){
    var id = $(this).attr("IdProfesorCurso");
    var oBJEC_PROFCU = new FormData();
    oBJEC_PROFCU.append("Id", id); 
    Swal.fire({
        title: 'Estas Seguro de Eliminar la asignacion de profesor de curso?',
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
                url:"Ajax/AjaxProfesorCurso.php?a=eliminar",
                method:"POST",
                data:oBJEC_PROFCU,
                cache:false,
                contentType:false,
                processData:false,
                dataType:"json",
                success : function(respuesta){
                    if(respuesta == true){
                        var c = "Datos Eliminados.";
                        ValidateCreateEliminar(c);
                        $(".dataTableProfesorCurso").DataTable().ajax.reload();
                    }else if(respuesta == false){
                        var m = "¡¡¡Datos No Eliminados.!!!";
                        ValidateError(m);
                    }		
                }
            });
        }
    });
});
$(".dataTableProfesorCurso").on("click",".btnUpdate",function(){
    var id = $(this).attr("IdProfesorCurso");
    var oBJEC_PROFCU = new FormData();
    oBJEC_PROFCU.append("Id", id); 
    $.ajax({
        url:"Ajax/AjaxProfesorCurso.php?a=buscar",
        method:"POST",
        data:oBJEC_PROFCU,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success : function(respuesta){
            $('#TxtMateriaEdit option[value="'+respuesta["MateriaIdMateria"]+'"]').attr("selected", true);
            $("#TxtMateriaEdit").select2();
            $('#TxtCursoEdit option[value="'+respuesta["CursoIdCurso"]+'"]').attr("selected", true);
            $("#TxtCursoEdit").select2();
            $("#botonEdit").attr("IdProfesorCurso",id);
            $("#ModalEdit").modal();
        }
    });
});
$(".formEdit").on('submit', function(){
    if($('#TxtProfesorEdit').val().length == 0){
        var m = "Por favor seleccione el Profesor para asignar a un curso";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtCursoEdit').val().length == 0){
        var m = "Por favor seleccione el Curso al que desea asignar el profesor.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtMateriaEdit').val().length == 0){
        var m = "Por favor seleccionen la materia que dictara el profesor en el curso.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var Id = $("#botonEdit").attr("IdProfesorCurso");
        var Profesor = $('#TxtProfesorEdit').val();
        var Curso = $('#TxtCursoEdit').val();
        var Materia = $('#TxtMateriaEdit').val();
        var oBJEC_PROFCU = new FormData();
        oBJEC_PROFCU.append("Id", Id);
        oBJEC_PROFCU.append("Profesor", Profesor); 
        oBJEC_PROFCU.append("Curso", Curso);
        oBJEC_PROFCU.append("Materia", Materia); 
        $.ajax({
            url:"Ajax/AjaxProfesorCurso.php?a=editar",
            method:"POST",
            data:oBJEC_PROFCU,
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
                    $(".dataTableProfesorCurso").DataTable().ajax.reload();
                }else if(respuesta == false){
                    var m = "¡¡¡Datos No Editados.!!!";
                    ValidateError(m);
                }                
            }
        });
    }
    return false;
}); 