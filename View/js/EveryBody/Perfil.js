$(document).ready(function(){
    var FileCamara = "";
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
    function cargarPerfil(){
        $.ajax({
            url:"Ajax/AjaxLogin.php?a=profile",
            method:"GET",
            dataType: "JSON",
            success : function(respuesta){
                //$("#botonEdit").attr("IdAdministrador",id);
                $("#fotoEdit").attr("src",respuesta["Foto"]);
                $('#TxtNombreEdit').val(respuesta["Nombre"]);
                $("#h3Nombre").html(respuesta["Nombre"]);
                $('#TxtApellidoEdit').val(respuesta["Apellido"]);
                $("#pApellido").html(respuesta["Apellido"]);
                from = respuesta["FechaNacimiento"].split("-");
                $('#TxtFechaNacimientoEdit').val(from[1]+'/'+from[2]+'/'+from[0]);
                $('#bs_datepicker_container input').datepicker({
                    autoclose: true,
                    container: '#bs_datepicker_container'
                });
                $("#TxtTipoDocumentoEdit option[value='"+respuesta["TipoDocumento"]+"']").attr("selected",true);
                $("#TxtTipoDocumentoEdit").select2();
                $('#TxtDocumentoEdit').val(respuesta["Documento"]);
                $("#TxtRhEdit option[value='"+respuesta["Rh"]+"']").attr("selected",true);
                $("#TxtRhEdit").select2();
                $('#TxtCorreoEdit').val(respuesta["Correo"]);
                $('#TxtTelefonoEdit').val(respuesta["Telefono"]);        
            }
        });
    }
    cargarPerfil();
    $(".formEdit").on('submit', function(){
        var fechaActual = new Date();
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
            ValidateError(m);
            return false;
        }else if($('#TxtFechaNacimientoEdit').val().length == 0){
            var m = "Por favor ingrese la Fecha de Nacimiento.";
            ValidateCreateUpdate(m);
            return false;
        }else if($("#pRol").html()!="Estudiante" && (fechaActual.getFullYear()-$('#TxtFechaNacimientoEdit').val().split("/")[2])<=18 ){
            var m = "Por favor ingrese la Fecha de Nacimiento de el "+$("#pRol").html()+" mayor de 18 Años.";
            ValidateError(m);
            return false;
        }else if($("#pRol").html()=="Estudiante" && (fechaActual.getFullYear()-$('#TxtFechaNacimientoEdit').val().split("/")[2])<=5 ){
            var m = "Por favor ingrese la Fecha de Nacimiento de el "+$("#pRol").html()+" mayor de 5 Años.";
            ValidateError(m);
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
        }else if($('#TxtTelefonoEdit').val().length == 0){
            var m = "Por favor ingrese el Telefono de Contacto.";
            ValidateCreateUpdate(m);
            return false;
        }else{
            var Nombre = $('#TxtNombreEdit').val();
            var Apellido = $('#TxtApellidoEdit').val();
            var Foto = null;
            if(document.getElementById("TxtFotoEdit").files.length > 0){
                Foto = document.getElementById("TxtFotoEdit").files[0];
            }else if($('#CamaraFotoSrc').length>0){
               Foto = FileCamara;
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
        
            $.ajax({
                url:"Ajax/AjaxLogin.php?a=edit",
                method:"POST",
                data:oBJEC_ADMIN,
                cache:false,
                contentType:false,
                processData:false,
                dataType:"json",
                success:function(respuesta){
                    if(respuesta == true){
                        var m = "Datos Editados.";
                        ValidateCreateUpdate(m);
                        cargarPerfil();
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
    $(".btnCamara").click(function(){
        // Configure a few settings and attach camera
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90,
            force_flash: true
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
            $("#fotoCamara").empty();
            $("#fotoCamara").html('<img id = "CamaraFotoSrc" src="'+data_uri+'"/>');
        } );
        Webcam.reset();
        async function createFile(){
            let response = await fetch($("#CamaraFotoSrc").attr("src"));
            let data = await response.blob();
            let metadata = {
                type: 'image/jpeg'
            };
            let file = new File([data], "profileImageCamera.jpg", metadata);
            FileCamara = file;
        }
        createFile();
        $('#TxtFotoEdit').val("");       
        $("#ModalCamara").modal('toggle');
    });
    $('#ModalCamara').on('hidden.bs.modal', function () {
        Webcam.reset();
    });
    $('#TxtFotoEdit').change(function(){
        $("#fotoCamara").empty();
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
    
});