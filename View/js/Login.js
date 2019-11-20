$(document).ready(function(){
    $("#sign_in").on('submit', function(){
        if($('#TxtRol').val().length == 0){
            var m = "Por favor seleccione su Rol."
            ValidateCreateUpdate(m);
            return false;
        }else if($('#TxtUser').val().length == 0){
            var m = "Por favor ingrese su Correo Electronico.";
            ValidateCreateUpdate(m);
            return false;
        }else if($('#TxtPassword').val().length == 0){
            var m = "Por favor ingrese su Contraseña.";
            ValidateCreateUpdate(m);
            return false;
        }else{
            var rol = $("#TxtRol").val();
            var user = $("#TxtUser").val();
            var password = $("#TxtPassword").val();
            objeto = new FormData();
            objeto.append("Rol",rol);
            objeto.append("User",user);
            objeto.append("Paswword",password);
            $.ajax({
                url:"Ajax/AjaxLogin.php?a=login",
                method:"POST",
                data:objeto,
                cache:false,
                contentType:false,
                processData:false,
                dataType: "json",
                success : function(respuesta){
                    if(respuesta==true){
                        window.location = "Home"; 
                    }else{
                        var m = respuesta;
                        ValidateCreateUpdate(m);
                    }                
                }
            });
        }
        return false;
    });
    $(".iconovisibipass").click(function(){
        if($(this).html()=='visibility'){
            $(this).html('visibility_off');
            $("#TxtPassword").attr("type","text");
            $(".nameiconpass").html("Ocultar Contrase&ntilde;a.")
        }else if($(this).html()=='visibility_off'){
            $(this).html('visibility');
            $("#TxtPassword").attr("type","password");
            $(".nameiconpass").html("Ver Contrase&ntilde;a.")
        }
    });
});