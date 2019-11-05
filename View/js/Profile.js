$(document).ready(function(){
    function SubmitFunctionProfile(){
        return false;
    } 
    var inputBox = document.getElementById("TxtDocumentoEdit");
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
        url:"../Ajax/AjaxLogin.php?a=profile",
        method:"GET",
        dataType: "JSON",
        success : function(respuesta){
            //$("#botonEdit").attr("IdAdministrador",id);
            $("#fotoEdit").attr("src",respuesta["Foto"]);
            $('#TxtNombreEdit').val(respuesta["Nombre"]);
            $("#h3Nombre").html(respuesta["Nombre"]);
            $('#TxtApellidoEdit').val(respuesta["Apellido"]);
            $("#pApellido").html(respuesta["Apellido"]);
            $('#TxtFechaNacimientoEdit').val(respuesta["FechaNacimiento"]);
            $("#TxtTipoDocumentoEdit option[value='"+respuesta["TipoDocumento"]+"']").attr("selected",true);
            $("#TxtTipoDocumentoEdit").select2();
            $('#TxtDocumentoEdit').val(respuesta["Documento"]);
            $("#TxtRhEdit option[value='"+respuesta["Rh"]+"']").attr("selected",true);
            $("#TxtRhEdit").select2();
            $('#TxtCorreoEdit').val(respuesta["Correo"]);
            $('#TxtTelefonoEdit').val(respuesta["Telefono"]);        
        }
    });
    $(".formEdit").on("click",".botonEdit",function(){
        var fileName = "";
        var ext = "";
        if(document.getElementById("TxtFotoEdit").files.length > 0){
            var fileName = document.getElementById("TxtFotoEdit").files[0].name;
            var ext = fileName.split('.').pop();
        }
        if($('#TxtNombreEdit').val().length == 0){
            var m = "Por favor ingrese el Nombre."
            ValidateCreateUpdate(m);
            return false;
        }else if($('#TxtApellidoEdit').val().length == 0){
            var m = "Por favor ingrese el Apellido.";
            ValidateCreateUpdate(m);
            return false;
        }else if(document.getElementById("TxtFotoEdit").files.length > 0 && ext!='png' && ext!='jpg' && ext!='gif'){
            var m = "El archivo seleccionado no es un archivo de Imagen.";
            ValidateCreateUpdate(m);
            return false;
        }else if($('#TxtFechaNacimientoEdit').val().length == 0){
            var m = "Por favor ingrese la Fecha de Nacimiento.";
            ValidateCreateUpdate(m);
            return false;
        }else if($('#TxtTipoDocumentoEdit').val().length == 0){
            var m = "Por favor seleccione el Tipo de Documento.";
            ValidateCreateUpdate(m);
            return false;
        }else if($('#TxtDocumentoEdit').val().length == 0){
            var m = "Por favor ingrese el Documento de Identificacion.";
            ValidateCreateUpdate(m);
            return false;
        }else if($('#TxtRhEdit').val().length == 0){
            var m = "Por favor seleccione el Rh.";
            ValidateCreateUpdate(m);
            return false;
        }else if($('#TxtCorreoEdit').val().length == 0){
            var m = "Por favor ingrese el Correo.";
            ValidateCreateUpdate(m);
            return false;
        }else if($('#TxtPasswordEdit').val().length == 0){
            var m = "Por favor ingrese la Contrasena.";
            ValidateCreateUpdate(m);
            return false;
        }else if($('#TxtTelefonoEdit').val().length == 0){
            var m = "Por favor ingrese el Telefono de Contacto.";
            ValidateCreateUpdate(m);
            return false;
        }else{
            var Nombre = $('#TxtNombreEdit').val();
            var Apellido = $('#TxtApellidoEdit').val();
            var Foto = "";
            var FotoSrc = "";
            if(document.getElementById("TxtFotoEdit").files.length > 0){
                var Foto = document.getElementById("TxtFotoEdit").files[0];
            }else{
                var FotoSrc = $("#fotoEdit").attr("src");
            }
            var FechaNacimiento = $('#TxtFechaNacimientoEdit').val();
            var TipoDocumento = $('#TxtTipoDocumentoEdit').val();
            var Documento = $('#TxtDocumentoEdit').val();
            var Rh = $('#TxtRhEdit').val();
            var Correo = $('#TxtCorreoEdit').val();
            var Password = $('#TxtPasswordEdit').val();
            var Telefono = $('#TxtTelefonoEdit').val();
            var oBJEC_ADMIN = new FormData();
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
        
            $.ajax({
                url:"../Ajax/AjaxLogin.php?a=edit",
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
                        window.location = "Perfil.php";
                    }else if(respuesta = false){
                        var m = "¡¡¡Datos No Editados.!!!";
                        ValidateCreateUpdate(m);
                    }
                    
                }
            });
        }
    });
    $(".btnCamara").click(function(){
        // Configure a few settings and attach camera
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach( '#my_camera' );
        $("#ModalCamara").modal();
    });
    $(".btnCapturarFoto").click(function(){
        // preload shutter audio clip
        var shutter = new Audio();
        shutter.autoplay = true;
        shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : 'shutter.mp3';
        // play sound effect
        shutter.play();
    
        // take snapshot and get image data
        Webcam.snap( function(data_uri) {
            // display results in page
            $(".from-foto-camara").append('<img src="'+data_uri+'"/>');
        } );
        Webcam.pause();
        $("#ModalCamara").modal('toggle');
    });
    
});