$(document).ready(function(){
    $(".dataTableProfesor").DataTable({
        "ajax":"Ajax/AjaxProfesor.php?a=lista",
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
    $('#TxtTipoDocumento').select2();
    $('#TxtRh').select2();
    $('#TxtTipoDocumentoEdit').select2();
    $('#TxtRhEdit').select2();
});
$(".formCreate").on('submit', function(){
    var fechaActual = new Date();
    var fileName = "";
    var ext = "";
    if(document.getElementById("TxtFoto").files.length > 0){
        var fileName = document.getElementById("TxtFoto").files[0].name;
        var ext = fileName.split('.').pop();
    }
    if($('#TxtNombre').val().length == 0){
        var m = "Por favor ingrese el Nombre de el Profesor.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtApellido').val().length == 0){
        var m = "Por favor ingrese el Apellido de el Profesor.";
        ValidateCreateUpdate(m);
        return false;
    }else if(document.getElementById("TxtFoto").files.length == 0){
        var m = "Por favor seleccione la Foto de el Profesor.";
        ValidateCreateUpdate(m);
        return false;
    }else if(ext!='png' && ext!='jpg' && ext!='gif'){
        var m = "El archivo seleccionado no es un archivo de Imagen.";
        ValidateError(m);
        return false;
    }else if($('#TxtFechaNacimiento').val().length == 0){
        var m = "Por favor ingrese la Fecha de Nacimiento de el Profesor.";
        ValidateCreateUpdate(m);
        return false;
    }else if( (fechaActual.getFullYear()-$('#TxtFechaNacimiento').val().split("/")[2])<18 ){
        var m = "Por favor ingrese la Fecha de Nacimiento de el Profesor mayor de 18 Años.";
        ValidateError(m);
        return false;
    }else if($('#TxtTipoDocumento').val().length == 0){
        var m = "Por favor seleccione el Tipo de Documento de el Profesor.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtDocumento').val().length == 0){
        var m = "Por favor ingrese el Documento de Identificacion de el Profesor.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtRh').val().length == 0){
        var m = "Por favor seleccione el Rh de el Profesor.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtCorreo').val().length == 0){
        var m = "Por favor ingrese el Correo de el Profesor.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtPassword').val().length == 0){
        var m = "Por favor ingrese la Contrasena de el Profesor.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtTelefono').val().length == 0){
        var m = "Por favor ingrese el Telefono de Contacto de el Profesor.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var Nombre = $('#TxtNombre').val();
        var Apellido = $('#TxtApellido').val();
        var Foto = document.getElementById("TxtFoto").files[0];
        from = $('#TxtFechaNacimiento').val().split("/");
        var FechaNacimiento = from[2]+'/'+from[0]+'/'+from[1];
        var TipoDocumento = $('#TxtTipoDocumento').val();
        var Documento = $('#TxtDocumento').val();
        var Rh = $('#TxtRh').val();
        var Correo = $('#TxtCorreo').val();
        var Password = $('#TxtPassword').val();
        var Telefono = $('#TxtTelefono').val();
        var oBJEC_PROF = new FormData();
        oBJEC_PROF.append("Nombre", Nombre); 
        oBJEC_PROF.append("Apellido", Apellido); 
        oBJEC_PROF.append("Foto", Foto);
        oBJEC_PROF.append("FechaNacimiento", FechaNacimiento); 
        oBJEC_PROF.append("TipoDocumento", TipoDocumento); 
        oBJEC_PROF.append("Documento", Documento); 
        oBJEC_PROF.append("Rh", Rh); 
        oBJEC_PROF.append("Correo", Correo); 
        oBJEC_PROF.append("Password", Password); 
        oBJEC_PROF.append("Telefono", Telefono);
        
        $.ajax({
            url:"Ajax/AjaxProfesor.php?a=crear",
            method:"POST",
            data:oBJEC_PROF,
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
                    $(".dataTableProfesor").DataTable().ajax.reload();
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
$(".dataTableProfesor").on("click",".btnDelete",function(){
    var id = $(this).attr("IdProfesor");
    var oBJEC_PROF = new FormData();
    oBJEC_PROF.append("Id", id); 
    Swal.fire({
        title: 'Estas Seguro de Eliminar el Profesor?',
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
                url:"Ajax/AjaxProfesor.php?a=eliminar",
                method:"POST",
                data:oBJEC_PROF,
                cache:false,
                contentType:false,
                processData:false,
                dataType:"json",
                success : function(respuesta){
                    if(respuesta == true){
                        var c = "Datos Eliminados.";
                        ValidateCreateEliminar(c);
                        $(".dataTableProfesor").DataTable().ajax.reload();
                    }else if(respuesta == false){
                        var m = "¡¡¡Datos No Eliminados.!!!";
                        ValidateError(m);
                    }		
                }
            });
        }
    });
});
$(".dataTableProfesor").on("click",".btnUpdate",function(){
    var id = $(this).attr("IdProfesor");
    var oBJEC_PROF = new FormData();
    oBJEC_PROF.append("Id", id); 
    $.ajax({
        url:"Ajax/AjaxProfesor.php?a=buscar",
        method:"POST",
        data:oBJEC_PROF,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success : function(respuesta){
            $("#botonEdit").attr("IdProfesor",id);
            $("#imgProfileEdit").attr("src",respuesta["Foto"]);
            $('#TxtNombreEdit').val(respuesta["Nombre"]);
            $('#TxtApellidoEdit').val(respuesta["Apellido"]);
            from = respuesta["FechaNacimiento"].split("-");
            $('#TxtFechaNacimientoEdit').val(from[1]+'/'+from[2]+'/'+from[0]);
            $("#TxtTipoDocumentoEdit option[value='"+respuesta["TipoDocumento"]+"']").attr("selected",true);
            $('#TxtDocumentoEdit').val(respuesta["Documento"]);
            $("#TxtRhEdit option[value='"+respuesta["Rh"]+"']").attr("selected",true);
            $('#TxtCorreoEdit').val(respuesta["Correo"]);
            $('#TxtTelefonoEdit').val(respuesta["Telefono"]);
            $('#TxtTipoDocumentoEdit').select2();
            $('#TxtRhEdit').select2();
            $("#ModalEdit").modal();
        }
    });
});
$(".formEdit").on('submit', function(){
    var fechaActual = new Date();
    var fileName = "";
    var ext = "";
    if(document.getElementById("TxtFotoEdit").files.length > 0){
        var fileName = document.getElementById("TxtFotoEdit").files[0].name;
        var ext = fileName.split('.').pop();
    }
    if($('#TxtNombreEdit').val().length == 0){
        var m = "Por favor ingrese el Apellido de el Profesor."
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtApellidoEdit').val().length == 0){
        var m = "Por favor ingrese el Apellido de el Profesor.";
        ValidateCreateUpdate(m);
        return false;
    }else if(document.getElementById("TxtFotoEdit").files.length > 0 && ext!='png' && ext!='jpg' && ext!='gif'){
        var m = "El archivo seleccionado no es un archivo de Imagen.";
        ValidateError(m);
        return false;
    }else if($('#TxtFechaNacimientoEdit').val().length == 0){
        var m = "Por favor ingrese la Fecha de Nacimiento de el Profesor.";
        ValidateCreateUpdate(m);
        return false;
    }else if( (fechaActual.getFullYear()-$('#TxtFechaNacimientoEdit').val().split("/")[2])<18 ){
        var m = "Por favor ingrese la Fecha de Nacimiento de el Profesor mayor de 18 Años.";
        ValidateError(m);
        return false;
    }else if($('#TxtTipoDocumentoEdit').val().length == 0){
        var m = "Por favor seleccione el Tipo de Documento de el Profesor.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtDocumentoEdit').val().length == 0){
        var m = "Por favor ingrese el Documento de Identificacion de el Profesor.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtRhEdit').val().length == 0){
        var m = "Por favor seleccione el Rh de el Profesor.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtCorreoEdit').val().length == 0){
        var m = "Por favor ingrese el Correo de el Profesor.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtTelefonoEdit').val().length == 0){
        var m = "Por favor ingrese el Telefono de Contacto de el Profesor.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var Id = $("#botonEdit").attr("IdProfesor");
        var Nombre = $('#TxtNombreEdit').val();
        var Apellido = $('#TxtApellidoEdit').val();
        var Foto = null;
        if(document.getElementById("TxtFotoEdit").files.length > 0){
            var Foto = document.getElementById("TxtFotoEdit").files[0];
        }
        from = $('#TxtFechaNacimientoEdit').val().split("/");
        var FechaNacimiento = from[2]+'/'+from[0]+'/'+from[1];
        var TipoDocumento = $('#TxtTipoDocumentoEdit').val();
        var Documento = $('#TxtDocumentoEdit').val();
        var Rh = $('#TxtRhEdit').val();
        var Correo = $('#TxtCorreoEdit').val();
        var Password = null;
        if($('#TxtPasswordEdit').val().length > 0){
            var Password = $('#TxtPasswordEdit').val();
        }
        var Telefono = $('#TxtTelefonoEdit').val();
        var oBJEC_PROF = new FormData();
        oBJEC_PROF.append("Id", Id); 
        oBJEC_PROF.append("Nombre", Nombre); 
        oBJEC_PROF.append("Apellido", Apellido); 
        oBJEC_PROF.append("Foto", Foto);
        oBJEC_PROF.append("FechaNacimiento", FechaNacimiento); 
        oBJEC_PROF.append("TipoDocumento", TipoDocumento); 
        oBJEC_PROF.append("Documento", Documento); 
        oBJEC_PROF.append("Rh", Rh); 
        oBJEC_PROF.append("Correo", Correo); 
        oBJEC_PROF.append("Password", Password); 
        oBJEC_PROF.append("Telefono", Telefono); 
    
        $.ajax({
            url:"Ajax/AjaxProfesor.php?a=editar",
            method:"POST",
            data:oBJEC_PROF,
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
                    $(".dataTableProfesor").DataTable().ajax.reload();
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
$(".dataTableProfesor").on("click",".btnCurso",function(){
    var id = $(this).attr("IdProfesor");
    var oBJEC_ADMIN = new FormData();
    oBJEC_ADMIN.append("Id", id); 
    $.ajax({
        url:"Ajax/AjaxProfesor.php?a=sesion",
        method:"POST",
        data:oBJEC_ADMIN,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success : function(respuesta){
            if(respuesta == true){
                window.location = "ProfesorCurso";
            }	
        }
    });        
});
$(".iconovisibipassedit").click(function(){
    if($(this).html()=='visibility'){
        $(this).html('visibility_off');
        $("#TxtPasswordEdit").attr("type","text");
    }else if($(this).html()=='visibility_off'){
        $(this).html('visibility');
        $("#TxtPasswordEdit").attr("type","password");
    }
});
$(".iconovisibipass").click(function(){
    if($(this).html()=='visibility'){
        $(this).html('visibility_off');
        $("#TxtPassword").attr("type","text");
    }else if($(this).html()=='visibility_off'){
        $(this).html('visibility');
        $("#TxtPassword").attr("type","password");
    }
});