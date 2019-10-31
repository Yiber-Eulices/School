$(document).ready(function(){
    $(".dataTableEstudiante").DataTable({
        "ajax":"../Ajax/AjaxEstudiante.php?a=lista",
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
    $.ajax({
        url:"../Ajax/AjaxCurso.php?a=lista",
        method:"GET",
        dataType: "JSON",
        success : function(respuesta){
            $('#TxtCurso').empty();
            $('#TxtCursoEdit').empty();
            $("#TxtCurso").append("<option value=''>-- Por favor seleccione --</option>");
            $("#TxtCursoEdit").append("<option value=''>-- Por favor seleccione --</option>");
            for(var i = 0;i<respuesta.data.length;i++){
                if (respuesta.data[i][0].length > 0 && respuesta.data[i][1].length > 0){
                    $("#TxtCurso").append("<option value='"+respuesta.data[i][0]+"'>"+respuesta.data[i][3]+" "+respuesta.data[i][1]+"</option>"); 
                    $("#TxtCursoEdit").append("<option value='"+respuesta.data[i][0]+"'>"+respuesta.data[i][3]+" "+respuesta.data[i][1]+"</option>"); 
                }                
            }
            $('#TxtCurso').change();
            $('#TxtCursoEdit').change();
            $("#TxtCurso").select2();
            $("#TxtCursoEdit").select2();
        }
    });


    $('#TxtTipoDocumento').select2();
    $('#TxtRh').select2();
    $('#TxtTipoDocumentoEdit').select2();
    $('#TxtRhEdit').select2();
});
function SubmitFunction(){
    return false;
}
$(".formCreate").on("click",".botonCreate",function(){
    var fileName = "";
    var ext = "";
    if(document.getElementById("TxtFoto").files.length > 0){
        var fileName = document.getElementById("TxtFoto").files[0].name;
        var ext = fileName.split('.').pop();
    }
    if($('#TxtNombre').val().length == 0){
        var m = "Por favor ingrese el Nombre de el Estudiante.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtApellido').val().length == 0){
        var m = "Por favor ingrese el Apellido de el Estudiante.";
        ValidateCreateUpdate(m);
        return false;
    }else if(document.getElementById("TxtFoto").files.length == 0){
        var m = "Por favor seleccione la Foto de el Estudiante.";
        ValidateCreateUpdate(m);
        return false;
    }else if(ext!='png' && ext!='jpg' && ext!='gif'){
        var m = "El archivo seleccionado no es un archivo de Imagen.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtFechaNacimiento').val().length == 0){
        var m = "Por favor ingrese la Fecha de Nacimiento de el Estudiante.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtTipoDocumento').val().length == 0){
        var m = "Por favor seleccione el Tipo de Documento de el Estudiante.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtDocumento').val().length == 0){
        var m = "Por favor ingrese el Documento de Identificacion de el Estudiante.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtRh').val().length == 0){
        var m = "Por favor seleccione el Rh de el Estudiante.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtCorreo').val().length == 0){
        var m = "Por favor ingrese el Correo de el Estudiante.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtPassword').val().length == 0){
        var m = "Por favor ingrese la Contrasena de el Estudiante.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtTelefono').val().length == 0){
        var m = "Por favor ingrese el Telefono de Contacto de el Estudiante.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtCurso').val().length == 0){
        var m = "Por favor ingrese el Curso de el Estudiante.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var Nombre = $('#TxtNombre').val();
        var Apellido = $('#TxtApellido').val();
        var Foto = document.getElementById("TxtFoto").files[0];
        var FechaNacimiento = $('#TxtFechaNacimiento').val();
        var TipoDocumento = $('#TxtTipoDocumento').val();
        var Documento = $('#TxtDocumento').val();
        var Rh = $('#TxtRh').val();
        var Correo = $('#TxtCorreo').val();
        var Password = $('#TxtPassword').val();
        var Telefono = $('#TxtTelefono').val();
        var Curso = $('#TxtCurso').val();
        var oBJEC_ADMIN = new FormData();
        oBJEC_ADMIN.append("Nombre", Nombre); 
        oBJEC_ADMIN.append("Apellido", Apellido); 
        oBJEC_ADMIN.append("Foto", Foto);
        oBJEC_ADMIN.append("FechaNacimiento", FechaNacimiento); 
        oBJEC_ADMIN.append("TipoDocumento", TipoDocumento); 
        oBJEC_ADMIN.append("Documento", Documento); 
        oBJEC_ADMIN.append("Rh", Rh); 
        oBJEC_ADMIN.append("Correo", Correo); 
        oBJEC_ADMIN.append("Password", Password); 
        oBJEC_ADMIN.append("Telefono", Telefono); 
        oBJEC_ADMIN.append("Curso", Curso); 
    
        $.ajax({
            url:"../Ajax/AjaxEstudiante.php?a=crear",
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
                    window.location = "estudiante.php";
                }else if(respuesta = false){
                    var m = "¡¡¡Datos No Almacenados.!!!";
                    ValidateCreateUpdate(m);
                }
                
            }
        });
    }
});
$(".dataTableEstudiante").on("click",".btnDelete",function(){
    var id = $(this).attr("IdEstudiante");
    var oBJEC_ADMIN = new FormData();
    oBJEC_ADMIN.append("Id", id); 
    Swal.fire({
        title: 'Estas Seguro de Eliminar el Estudiante?',
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
                url:"../Ajax/AjaxEstudiante.php?a=eliminar",
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
                        window.location = "Estudiante.php";
                    }else if(respuesta = false){
                        var m = "¡¡¡Datos No Eliminados.!!!";
                        ValidateCreateUpdate(m);
                    }		
                }
            });
        }
    });
});
$(".dataTableEstudiante").on("click",".btnUpdate",function(){
    var id = $(this).attr("IdEstudiante");
    var oBJEC_ADMIN = new FormData();
    oBJEC_ADMIN.append("Id", id); 
    $.ajax({
        url:"../Ajax/AjaxEstudiante.php?a=buscar",
        method:"POST",
        data:oBJEC_ADMIN,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success : function(respuesta){
            $("#botonEdit").attr("IdEstudiante",id);
            $("#imgProfileEdit").attr("src",respuesta["Foto"]);
            $('#TxtNombreEdit').val(respuesta["Nombre"]);
            $('#TxtApellidoEdit').val(respuesta["Apellido"]);
            $('#TxtFechaNacimientoEdit').val(respuesta["FechaNacimiento"]);
            $("#TxtTipoDocumentoEdit option[value='"+respuesta["TipoDocumento"]+"']").attr("selected",true);
            $('#TxtDocumentoEdit').val(respuesta["Documento"]);
            $("#TxtRhEdit option[value='"+respuesta["Rh"]+"']").attr("selected",true);
            $('#TxtCorreoEdit').val(respuesta["Correo"]);
            $('#TxtTelefonoEdit').val(respuesta["Telefono"]);
            $('#TxtCursoEdit').val(respuesta["Curso"]);
            $('#TxtTipoDocumentoEdit').select2();
            $('#TxtRhEdit').select2();
            $("#ModalEdit").modal();
        }
    });
});
$(".formEdit").on("click",".botonEdit",function(){
    var fileName = "";
    var ext = "";
    if(document.getElementById("TxtFotoEdit").files.length > 0){
        var fileName = document.getElementById("TxtFotoEdit").files[0].name;
        var ext = fileName.split('.').pop();
    }
    if($('#TxtNombreEdit').val().length == 0){
        var m = "Por favor ingrese el Nombre de el Estudiante."
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtApellidoEdit').val().length == 0){
        var m = "Por favor ingrese el Apellido de el Estudiante.";
        ValidateCreateUpdate(m);
        return false;
    }else if(document.getElementById("TxtFotoEdit").files.length > 0 && ext!='png' && ext!='jpg' && ext!='gif'){
        var m = "El archivo seleccionado no es un archivo de Imagen.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtFechaNacimientoEdit').val().length == 0){
        var m = "Por favor ingrese la Fecha de Nacimiento de el Estudiante.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtTipoDocumentoEdit').val().length == 0){
        var m = "Por favor seleccione el Tipo de Documento de el Estudiante.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtDocumentoEdit').val().length == 0){
        var m = "Por favor ingrese el Documento de Identificacion de el Estudiante.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtRhEdit').val().length == 0){
        var m = "Por favor seleccione el Rh de el Estudiante.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtCorreoEdit').val().length == 0){
        var m = "Por favor ingrese el Correo de el Estudiante.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtPasswordEdit').val().length == 0){
        var m = "Por favor ingrese la Contrasena de el Estudiante.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtTelefonoEdit').val().length == 0){
        var m = "Por favor ingrese el Telefono de Contacto de el Estudiante.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtCursoEdit').val().length == 0){
        var m = "Por favor ingrese el Curso de Contacto de el Estudiante.";
        ValidateCreateUpdate(m);
        return false;
    }else{
        var Id = $("#botonEdit").attr("IdEstudiante");
        var Nombre = $('#TxtNombreEdit').val();
        var Apellido = $('#TxtApellidoEdit').val();
        var Foto = "";
        var FotoSrc = "";
        if(document.getElementById("TxtFotoEdit").files.length > 0){
            var Foto = document.getElementById("TxtFotoEdit").files[0];
        }else{
            var FotoSrc = $("#imgProfileEdit").attr("src");
        }
        var FechaNacimiento = $('#TxtFechaNacimientoEdit').val();
        var TipoDocumento = $('#TxtTipoDocumentoEdit').val();
        var Documento = $('#TxtDocumentoEdit').val();
        var Rh = $('#TxtRhEdit').val();
        var Correo = $('#TxtCorreoEdit').val();
        var Password = $('#TxtPasswordEdit').val();
        var Telefono = $('#TxtTelefonoEdit').val();
        var Curso = $('#TxtCursoEdit').val();
        var oBJEC_ADMIN = new FormData();
        oBJEC_ADMIN.append("Id", Id); 
        oBJEC_ADMIN.append("Nombre", Nombre); 
        oBJEC_ADMIN.append("Apellido", Apellido); 
        oBJEC_ADMIN.append("Foto", Foto);
        oBJEC_ADMIN.append("FotoSrc", FotoSrc);
        oBJEC_ADMIN.append("FechaNacimiento", FechaNacimiento); 
        oBJEC_ADMIN.append("TipoDocumento", TipoDocumento); 
        oBJEC_ADMIN.append("Documento", Documento); 
        oBJEC_ADMIN.append("Rh", Rh); 
        oBJEC_ADMIN.append("Correo", Correo); 
        oBJEC_ADMIN.append("Password", Password); 
        oBJEC_ADMIN.append("Telefono", Telefono); 
        oBJEC_ADMIN.append("Curso", Curso); 
    
        $.ajax({
            url:"../Ajax/AjaxEstudiante.php?a=editar",
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
                    window.location = "Estudiante.php";
                }else if(respuesta = false){
                    var m = "¡¡¡Datos No Editados.!!!";
                    ValidateCreateUpdate(m);
                }
                
            }
        });
    }
}); 