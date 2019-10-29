$(document).ready(function(){
    var inputBox = document.getElementById("TxtCedulaCiudadaniaEdit");
    var invalidChars = [ "-", "+", "e", ];
    inputBox.addEventListener("keydown", function(e) {
        if (invalidChars.includes(e.key)) {
            e.preventDefault(); 
        } 
    });
    var inputBox = document.getElementById("TxtTelefonoEdit");
    var invalidChars = [ "-", "+", "e", ];
    inputBox.addEventListener("keydown", function(e) {
        if (invalidChars.includes(e.key)) {
            e.preventDefault(); 
        } 
    });
    $.ajax({
        url:"Login.aga?a=select",
        method:"GET",
        dataType: "JSON",
        success : function(respuesta){
            $("#TxtIdPersonaEdit").val(respuesta.IdPersona);
            $("#fotoEdit").attr("src",respuesta.Foto);
            $("#TxtNombreEdit").val(respuesta.Nombre);
            $("#h3Nombre").html(respuesta.Nombre);
            $("#TxtApellidoEdit").val(respuesta.Apellido);
            $("#pApellido").html(respuesta.Apellido);
            $("#TxtCedulaCiudadaniaEdit").val(respuesta.CedulaCiudadania);
            $("#TxtRolEdit").val(respuesta.Rol);
            $("#pRol").html(respuesta.Rol);
            $("#TxtCorreoEdit").val(respuesta.Correo);
            $("#TxtTelefonoEdit").val(respuesta.Telefono);
            $("#TxtDireccionEdit").val(respuesta.Direccion);
            ValidateUniqueEdit($('#TxtIdPersonaEdit').val(),$('#TxtCedulaCiudadaniaEdit').val(),$('#TxtCorreoEdit').val());
        }
    });
    $('#TxtCedulaCiudadaniaEdit').change(function () { 
        ValidateUniqueEdit($('#TxtIdPersonaEdit').val(),$('#TxtCedulaCiudadaniaEdit').val(),$('#TxtCorreoEdit').val());
    });
    $('#TxtCorreoEdit').change(function () { 
        ValidateUniqueEdit($('#TxtIdPersonaEdit').val(),$('#TxtCedulaCiudadaniaEdit').val(),$('#TxtCorreoEdit').val());
    });
});
var errorBooleanoEdit=false;
var errorEditUnique="Espera";
function ValidateUniqueEdit(id,cedulaCiudadania,correo){
    errorBooleanoEdit=false;
    errorEditUnique="Espera";
    $.ajax({
        url:"Persona.aga?a=unique&TxtCedulaCiudadaniaUnique="+cedulaCiudadania+"&TxtCorreoUnique="+correo,
        method:"GET",
        dataType: "JSON",
        success : function(respuesta){
            if(respuesta.idCedulaCiudadania!=null && respuesta.errorCedulaCiudadania!=null && respuesta.idCedulaCiudadania!=id){
                errorEditUnique = respuesta.errorCedulaCiudadania;
                errorBooleanoEdit = false;
            }else if(respuesta.idCorreo!=null && respuesta.errorCorreo!=null && respuesta.idCorreo!=id ){
                errorEditUnique = respuesta.errorCorreo;
                errorBooleanoEdit = false;
            }else{
                errorBooleanoEdit = true;
            }
        }
    });
}
function SubmitFunctionEdit(){
    var fileName = "";
    var ext = "";
    if(document.getElementById("TxtFotoEdit").files.length > 0){
        fileName = document.getElementById("TxtFotoEdit").files[0].name;
        ext = fileName.split('.').pop();
    }
    if($('#TxtNombreEdit').val().length == 0){
        var m = "Por favor ingrese el Nombre de la Persona.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtApellidoEdit').val().length == 0){
        var m = "Por favor ingrese el Apellido de la Persona.";
        ValidateCreateUpdate(m);
        return false;
    }else if(document.getElementById("TxtFotoEdit").files.length > 0 && ext!='png' && ext!='jpg' && ext!='gif'){
        var m = "El archivo seleccionado no es un archivo de Imagen.";
        ValidateError(m);
        return false;
    }else if($('#TxtCedulaCiudadaniaEdit').val().length == 0){
        var m = "Por favor ingrese la C&eacute;dula de Ciudadan&iacute;a de la Persona.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtRolEdit').val().length == 0){
        var m = "Por favor seleccione el Rol de la Persona.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtCorreoEdit').val().length == 0){
        var m = "Por favor ingrese el Correo de la Persona.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtContrasenaEdit').val().length == 0){
        var m = "Por favor ingrese la Contrase&ntilde;a de la Persona.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtTelefonoEdit').val().length == 0){
        var m = "Por favor ingrese el Tel&eacute;fono de la Persona.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtDireccionEdit').val().length == 0){
        var m = "Por favor ingrese el Direcci&oacute;n de Recidencia de la Persona.";
        ValidateCreateUpdate(m);
        return false;
    }else if($('#TxtIdPersonaEdit').val().length == 0){
        var m = "Por favor ingrese el Id de la Persona.";
        ValidateCreateUpdate(m);
        return false;
    }else if(!errorBooleanoEdit){
        if (errorEditUnique!="Espera"){
            ValidateError(errorEditUnique);
            return false;            
        }else{
            EsperaSwalFire();
            return false;
        }
    }else{
        return true; 
    }
}