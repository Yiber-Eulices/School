$(document).ready(function(){
    $("#forgot_password").on('submit', function(){
        
        if($('#TxtRol').val().length == 0){
            var m = "Por favor seleccione su Rol."
            ValidateCreateUpdate(m);
            return false;
        }else if($('#TxtUser').val().length == 0){
            var m = "Por favor ingrese su Correo Electronico.";
            ValidateCreateUpdate(m);
            return false;
        }else{
            $(".btnRecuperar").attr("disabled",true);
            var rol = $("#TxtRol").val();
            var user = $("#TxtUser").val();
            objeto = new FormData();
            objeto.append("Rol",rol);
            objeto.append("User",user);
            $.ajax({
                url:"Ajax/AjaxLogin.php?a=recuperar",
                method:"POST",
                data:objeto,
                cache:false,
                contentType:false,
                processData:false,
                dataType: "json",
                success : function(respuesta){
                    if(respuesta==true){
                        $(".btnRecuperar").attr("disabled",false);
                        Swal.fire({
                            title: 'Reestablecido correctamente!',
                            text: "Por favor revise su correo Electronico o su  SMS en el Telefono!",
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Si, Aceptar!'
                        }).then((result) => {
                            window.location = "Login"; 
                        })
                    }else{
                        $(".btnRecuperar").attr("disabled",false);
                        var m = respuesta;
                        ValidateError(m);
                    }                
                }
            });
        }
        return false;
    });
});