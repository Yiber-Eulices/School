$(document).ready(function(){
    $(".dataTableAcudiente").DataTable({
        "ajax":"Ajax/AjaxAcudiente.php?a=lista",
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
        },dom: 'Bfrtip',
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 Filas', '25 Filas', '50 Filas', 'Todas las Filas' ]
        ],
        buttons: [
            {
                extend: 'pageLength',
                className : "btn btn-primary waves-effect"
            },{
                extend: 'print',
                text: '<i class="material-icons">print</i> Imprimir Todo',
                className : "btn btn-primary waves-effect",
                footer: true,
                exportOptions: {
                    modifier: {
                        selected: null
                    }
                }
            },{
                extend: 'copy',
                text: '<i class="material-icons">content_copy</i> Copiar',
                className : "btn btn-primary waves-effect",
                footer: true,
                exportOptions: {
                    columns: ':visible'
                }
            },{
                extend: 'csv',
                text: '<i class="material-icons">save</i> CSV',
                className : "btn btn-primary waves-effect",
                footer: true,
                exportOptions: {
                    columns: ':visible'
                }
            },{
                extend: 'excel',
                text: '<i class="material-icons">grid_on</i> Excel',
                className : "btn btn-primary waves-effect",
                footer: true,
                exportOptions: {
                    columns: ':visible'
                }
            },{
                extend: 'pdf',
                text: '<i class="material-icons">picture_as_pdf</i> Pdf',
                className : "btn btn-primary waves-effect",
                footer: true,
                exportOptions: {
                    columns: ':visible'
                }
            },{
                extend: 'print',
                text: '<i class="material-icons">print</i> Imprimir',
                className : "btn btn-primary waves-effect",
                footer: true,
                exportOptions: {
                    columns: ':visible'
                }
            },{
                extend: 'colvis',
                text: '<i class="material-icons">playlist_add_check</i> Seleccionar Columnas',
                className : "btn btn-primary waves-effect"
            }
        ],
        select: true,
        columnDefs: [ {
            targets: -1,
            visible: false
        } ]
    });
    $('#TxtTipoDocumento').select2();
    $('#TxtRh').select2();
    $('#TxtTipoDocumentoEdit').select2();
    $('#TxtRhEdit').select2();
});
$(".formCreate").on('submit', function(){
    var fileName = "";
    var ext = "";
    var fechaActual = new Date();
    if(document.getElementById("TxtFoto").files.length > 0){
        var fileName = document.getElementById("TxtFoto").files[0].name;
        var ext = fileName.split('.').pop();
    }
    if($('#TxtNombre').val().length == 0){
        var m = "Por favor ingrese el Nombre de el Acudiente.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtApellido').val().length == 0){
        var m = "Por favor ingrese el Apellido de el Acudiente.";
        ValidateCreateUpdate(m);
        return false;
    }else if(document.getElementById("TxtFoto").files.length == 0){
        var m = "Por favor seleccione la Foto de el Acudiente.";
        ValidateCreateUpdate(m);
        return false;
    }else if(ext!='png' && ext!='jpg' && ext!='gif'){
        var m = "El archivo seleccionado no es un archivo de Imagen.";
        ValidateError(m);
        return false;
    }else if($('#TxtFechaNacimiento').val().length == 0){
        var m = "Por favor ingrese la Fecha de Nacimiento de el Acudiente.";
        ValidateCreateUpdate(m);
        return false;
    }else if( (fechaActual.getFullYear()-$('#TxtFechaNacimiento').val().split("/")[2])<=18 ){
        var m = "Por favor ingrese la Fecha de Nacimiento de el Acudiente mayor de 18 Años.";
        ValidateError(m);
        return false;
    }else if($('#TxtTipoDocumento').val().length == 0){
        var m = "Por favor seleccione el Tipo de Documento de el Acudiente.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtDocumento').val().length == 0){
        var m = "Por favor ingrese el Documento de Identificacion de el Acudiente.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtRh').val().length == 0){
        var m = "Por favor seleccione el Rh de el Acudiente.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtCorreo').val().length == 0){
        var m = "Por favor ingrese el Correo de el Acudiente.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtPassword').val().length == 0){
        var m = "Por favor ingrese la Contrasena de el Acudiente.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtTelefono').val().length == 0){
        var m = "Por favor ingrese el Telefono de Contacto de el Acudiente.";
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
        var oBJEC_ACUDI = new FormData();
        oBJEC_ACUDI.append("Nombre", Nombre); 
        oBJEC_ACUDI.append("Apellido", Apellido); 
        oBJEC_ACUDI.append("Foto", Foto);
        oBJEC_ACUDI.append("FechaNacimiento", FechaNacimiento); 
        oBJEC_ACUDI.append("TipoDocumento", TipoDocumento); 
        oBJEC_ACUDI.append("Documento", Documento); 
        oBJEC_ACUDI.append("Rh", Rh); 
        oBJEC_ACUDI.append("Correo", Correo); 
        oBJEC_ACUDI.append("Password", Password); 
        oBJEC_ACUDI.append("Telefono", Telefono); 
    
        $.ajax({
            url:"Ajax/AjaxAcudiente.php?a=crear",
            method:"POST",
            data:oBJEC_ACUDI,
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
                    $(".dataTableAcudiente").DataTable().ajax.reload();
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
$(".dataTableAcudiente").on("click",".btnDelete",function(){
    var id = $(this).attr("IdAcudiente");
    var oBJEC_ACUDI= new FormData();
    oBJEC_ACUDI.append("Id", id); 
    Swal.fire({
        title: 'Estas Seguro de Eliminar el Acudiente?',
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
                url:"Ajax/AjaxAcudiente.php?a=eliminar",
                method:"POST",
                data:oBJEC_ACUDI,
                cache:false,
                contentType:false,
                processData:false,
                dataType:"json",
                success : function(respuesta){
                    if(respuesta == true){
                        var c = "Datos Eliminados.";
                        ValidateCreateEliminar(c);
                        $(".dataTableAcudiente").DataTable().ajax.reload();
                    }else if(respuesta == false){
                        var m = "¡¡¡Datos No Eliminados.!!!";
                        ValidateError(m);
                    }		
                }
            });
        }
    });
});
$(".dataTableAcudiente").on("click",".btnUpdate",function(){
    var id = $(this).attr("IdAcudiente");
    var oBJEC_ACUDI = new FormData();
    oBJEC_ACUDI.append("Id", id); 
    $.ajax({
        url:"Ajax/AjaxAcudiente.php?a=buscar",
        method:"POST",
        data:oBJEC_ACUDI,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success : function(respuesta){
            $("#botonEdit").attr("IdAcudiente",id);
            $("#imgProfileEdit").attr("src",respuesta["Foto"]);
            $('#TxtNombreEdit').val(respuesta["Nombre"]);
            $('#TxtApellidoEdit').val(respuesta["Apellido"]);
            from = respuesta["FechaNacimiento"].split("-");
            $('#TxtFechaNacimientoEdit').val(from[1]+'/'+from[2]+'/'+from[0]);
            $('#bs_datepicker_container_edit input').datepicker();
            $("#TxtTipoDocumentoEdit option[value='"+respuesta["TipoDocumento"]+"']").attr("selected",true);
            $('#TxtDocumentoEdit').val(respuesta["Documento"]);
            $("#TxtRhEdit option[value='"+respuesta["Rh"]+"']").attr("selected",true);
            $('#TxtCorreoEdit').val(respuesta["Correo"]);
            $('#TxtTelefonoEdit').val(respuesta["Telefono"]);
            $("#TxtTelefonoEdit").focus();
            $("#TxtCorreoEdit").focus();
            $("#TxtDocumentoEdit").focus();
            $("#TxtTipoDocumentoEdit").focus();
            $("#TxtFechaNacimientoEdit").focus();
            $("#TxtApellidoEdit").focus();
            $("#TxtNombreEdit").focus();
            $('#TxtTipoDocumentoEdit').select2();
            $('#TxtRhEdit').select2();
            $("#ModalEdit").modal();
        }
    });
});
$(".formEdit").on('submit', function(){
    var fileName = "";
    var ext = "";
    var fechaActual = new Date();
    if(document.getElementById("TxtFotoEdit").files.length > 0){
        var fileName = document.getElementById("TxtFotoEdit").files[0].name;
        var ext = fileName.split('.').pop();
    }
    if($('#TxtNombreEdit').val().length == 0){
        var m = "Por favor ingrese el Apellido de el Acudiente."
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtApellidoEdit').val().length == 0){
        var m = "Por favor ingrese el Apellido de el Acudiente.";
        ValidateCreateUpdate(m);
        return false;
    }else if(document.getElementById("TxtFotoEdit").files.length > 0 && ext!='png' && ext!='jpg' && ext!='gif'){
        var m = "El archivo seleccionado no es un archivo de Imagen.";
        ValidateError(m);
        return false;
    }else if($('#TxtFechaNacimientoEdit').val().length == 0){
        var m = "Por favor ingrese la Fecha de Nacimiento de el Acudiente.";
        ValidateCreateUpdate(m);
        return false;
    }else if( (fechaActual.getFullYear()-$('#TxtFechaNacimientoEdit').val().split("/")[2])<=18 ){
        var m = "Por favor ingrese la Fecha de Nacimiento de el Acudiente mayor de 18 Años.";
        ValidateError(m);
        return false;
    }else if($('#TxtTipoDocumentoEdit').val().length == 0){
        var m = "Por favor seleccione el Tipo de Documento de el Acudiente.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtDocumentoEdit').val().length == 0){
        var m = "Por favor ingrese el Documento de Identificacion de el Acudiente.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtRhEdit').val().length == 0){
        var m = "Por favor seleccione el Rh de el Acudiente.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtCorreoEdit').val().length == 0){
        var m = "Por favor ingrese el Correo de el Acudiente.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtTelefonoEdit').val().length == 0){
        var m = "Por favor ingrese el Telefono de Contacto de el Acudiente.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var Id = $("#botonEdit").attr("IdAcudiente");
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
        var oBJEC_ACUDI = new FormData();
        oBJEC_ACUDI.append("Id", Id); 
        oBJEC_ACUDI.append("Nombre", Nombre); 
        oBJEC_ACUDI.append("Apellido", Apellido); 
        oBJEC_ACUDI.append("Foto", Foto);
        oBJEC_ACUDI.append("FechaNacimiento", FechaNacimiento); 
        oBJEC_ACUDI.append("TipoDocumento", TipoDocumento); 
        oBJEC_ACUDI.append("Documento", Documento); 
        oBJEC_ACUDI.append("Rh", Rh); 
        oBJEC_ACUDI.append("Correo", Correo); 
        oBJEC_ACUDI.append("Password", Password); 
        oBJEC_ACUDI.append("Telefono", Telefono); 
    
        $.ajax({
            url:"Ajax/AjaxAcudiente.php?a=editar",
            method:"POST",
            data:oBJEC_ACUDI,
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
                    $(".dataTableAcudiente").DataTable().ajax.reload();
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
$(".dataTableAcudiente").on("click",".btnEstudiante",function(){
    var id = $(this).attr("IdAcudiente");
    var oBJEC_ADMIN = new FormData();
    oBJEC_ADMIN.append("Id", id); 
    $.ajax({
        url:"Ajax/AjaxAcudiente.php?a=sesion",
        method:"POST",
        data:oBJEC_ADMIN,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success : function(respuesta){
            if(respuesta == true){
                window.location = "AcudienteEstudiante";
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